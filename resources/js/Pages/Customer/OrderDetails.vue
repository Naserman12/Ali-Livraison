<script setup>
import { ref, onMounted } from 'vue'
import axios from 'axios'
import L from 'leaflet'
import header from '@/Components/Header.vue'

const props = defineProps({ id: Number })
const map = ref(null)

let marker = null;
const order = ref(null)
const tracking = ref([])
const loading = ref(true)

const qr = ref(null)
// const deliveryQr = ref(null)

onMounted(async () => {

})
onMounted(async () => {
  try {
    const res1 = await axios.get(`/api/orders/${props.id}`)
    order.value = res1.data

    const res2 = await axios.get(`/api/track/${props.id}`)
    tracking.value = res2.data

  const res = await axios.get(`/api/order/${props.id}/qr`)
    qr.value = res.data || res.data.data

  window.Echo.private(`orders.${props.id}`)
    .listen('.order.updated', (e) => {

      console.log('Realtime update:', e.order)

      order.value = e.order
    })
  window.Echo.private(`orders.${props.id}`)
  .listen('LocationUpdated', (e) => {

    updateMarker(e.latitude, e.longitude)

  })
  } catch (e) {
    console.error(e)
  } finally {
    loading.value = false
  }
})
onMounted(() => {
  map.value = L.map('map').setView([17.6078, 8.0817], 6)
  L.tileLayer('https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png', {
    attribution: 'OpenStreetMap'
  }).addTo(map.value)

  loadTracking()
  setInterval(loadTracking, 5000)
})
async function loadTracking() {
  const res = await axios.get(`/api/track/${props.id}`)

  const last = res.data[res.data.length - 1]

  if (last) {
    updateMarker(last.latitude, last.longitude)
  }
}
function updateMarker(lat, lng) {

  if (!map.value) return

  if (marker) {
    marker.setLatLng([lat, lng])
  } else {
    marker = L.marker([lat, lng]).addTo(map.value)
  }

  map.value.setView([lat, lng], 15)
}
</script>

<template>
  <Header />
  <div class="min-h-screen bg-[#F5F5F5] p-6" >
      <!-- Loading -->
      <div v-if="loading" class="text-gray-600">
        {{$t('tracking_loading')}}
      </div>
    <div v-if="order && !loading" class="">
    <!-- Title -->
    <h1 class="text-2xl font-bold text-[#1A1A1A] mb-4">
      🚚 {{$t('order_tracking_title')}} #{{ order.id }}
    </h1>

        <!-- QR Pickup -->
    <div v-if="order.status === 'accepted' || order.status === 'courier_arrived'">
      <h3>{{$t('pickup_qr')}}</h3>
      <img :src="qr?.pickup_qr" />
    </div>
    <!-- QR Delivery -->
    <div v-if="order.status === 'arrived_destination'">
      <h3>{{ $t('delivery_qr') }}</h3>
      <img :src="qr?.delivery_qr" />
    </div>

    <!-- Order Info -->
    <div v-if="order" class="bg-[#333333] text-white p-5 rounded-2xl shadow-md mb-6">

      <p class="text-lg font-bold mb-2">
        📦 {{$t('status')}}: {{ order.status }}
      </p>

      <p class="text-sm text-gray-300">
        📍 {{$t('from')}}: {{ order.pickup_address }}
      </p>

      <p class="text-sm text-gray-300">
        ➜ {{$t('to')}}: {{ order.dropoff_address }}
      </p>

      <!-- status badge -->
      <div class="mt-3">
        <span class="px-3 py-1 text-xs rounded-full bg-[#1A1A1A]">
          {{ order.status }}
        </span>
      </div>

    </div>

    <!-- Tracking Section -->
    <h2 class="text-lg font-bold text-[#1A1A1A] mb-3">
      📍 {{$t('courier_position')}}
    </h2>

    <!-- Empty -->
    <div v-if="tracking.length === 0" class="text-gray-500">
      {{$t('no_tracking_data')}}
    </div>

    <!-- Tracking List -->
    <div v-for="t in tracking" :key="t.id"
         class="bg-white border border-gray-200 p-3 rounded-xl mb-2 shadow-sm">

      <div class="flex justify-between text-sm">

        <span class="text-[#1A1A1A] font-semibold">
          📍 {{$t('latitude')}}: {{ t.latitude }}
        </span>

        <span class="text-[#FF6600] font-semibold">
          {{$t('longitude')}}: {{ t.longitude }}
        </span>

      </div>

      <p class="text-xs text-gray-500 mt-1">
        🕒{{ $t('time') }} : {{ t.created_at }}
      </p>

    </div>
    <div class="p-6">

    <h1 class="text-xl font-bold">📍 {{$t('live_tracking')}}</h1>

    <div id="map" class="h-[400px] mt-4 rounded"></div>

  </div>

  </div>
  </div>
</template>