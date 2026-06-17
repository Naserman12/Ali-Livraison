<!--<script setup>
import { ref, onMounted } from 'vue'
import { Link } from '@inertiajs/vue3'
import axios from 'axios'
import Header from '@/Components/Header.vue'

const order = ref(null)

onMounted(async () => {
  const res = await axios.get('/api/orders')
  order.value = res.data.find(o => o.status !== 'delivered')
  startTracking()
})
function startTracking() {
  if (!navigator.geolocation) return

  setInterval(() => {
    navigator.geolocation.getCurrentPosition(async (pos) => {

      await axios.post('/api/location', {
        order_id: order.value.id,
        latitude: pos.coords.latitude,
        longitude: pos.coords.longitude,
      })

    })
  }, 5000)
}

async function updateStatus(status) {
  await axios.post(`/api/courier/orders/${order.value.id}/status`, {
    status
  })
}
</script>
 -->


<script setup>
import { ref, onMounted, onBeforeUnmount } from 'vue'
import { Link } from '@inertiajs/vue3'
import axios from 'axios'
import Header from '@/Components/Header.vue'

const order = ref(null)
let intervalId = null

onMounted(async () => {
  const res = await axios.get('/api/orders')
  order.value = res.data.find(o => o.status !== 'delivered')

  if (order.value) {
    startTracking()
  }
})

function startTracking() {
  if (!navigator.geolocation) return

  intervalId = setInterval(() => {
    navigator.geolocation.getCurrentPosition(
      async (pos) => {
        try {
          await axios.post('/api/location', {
            order_id: order.value.id,
            latitude: pos.coords.latitude,
            longitude: pos.coords.longitude,
          })
        } catch (err) {
          console.error('Location update failed', err)
        }
      },
      (err) => {
        console.warn('Geolocation denied', err)
      }
    )
  }, 5000)
}

onBeforeUnmount(() => {
  if (intervalId) clearInterval(intervalId)
})

async function updateStatus(status) {
  await axios.post(`/api/courier/orders/${order.value.id}/status`, { status })
}
</script>

<template>
  <Header />
  <div> 
  <div class="min-h-screen bg-[#F5F5F5] p-6" v-if="order">

    <h1 class="text-xl font-bold text-[#1A1A1A]">
      🚀 {{$t('mission_current')}}
    </h1>Q
        <div class="mt-6 bg-[#333333] text-white p-4 rounded-xl">
      <p class="text-sm text-gray-500 mb-2">
        {{$t('scan_qr_instruction')}}
      </p>
          <Link
  :href="`/courier/qr/${order.id}/pickup`"
  class="bg-blue-500 text-white p-2 rounded mt-2 "
>
  {{$t('scan_pickup_qr')}}
</Link>

<Link
  :href="`/courier/qr/${order.id}/delivery`"
  class="bg-green-500 text-white p-2 rounded ml-2 mt-2"
>
  {{$t('scan_delivery_qr')}}
</Link>
    </div>

    <div class="bg-[#333333] text-white p-4 rounded-xl mt-4">

      <p>📍 {{ $t('pickup') }}: {{ order.pickup_address }}</p>
      <p>🏁 {{ $t('dropoff') }}: {{ order.dropoff_address }}</p>
      <p>🚦 {{ $t('status') }}: {{ order.status }}</p>

    </div>

    <div class="grid grid-cols-2 gap-3 mt-4">

      <button
        @click="updateStatus('courier_arrived')"
        class="bg-[#1A1A1A] text-white p-2 rounded-lg"
      >
        {{$t('courier_arrived')}}
      </button>

      <button
        @click="updateStatus('picked_up')"
        class="bg-[#FF6600] text-white p-2 rounded-lg"
      >
        {{$t('picked_up')}}
      </button>

      <button
        @click="updateStatus('on_the_way')"
        class="bg-[#333333] text-white p-2 rounded-lg"
      >
        {{$t('on_the_way')}}
      </button>

      <button
        @click="updateStatus('arrived_destination')"
        class="bg-[#FF6600] text-white p-2 rounded-lg"
      >
        {{$t('arrived_destination')}}
      </button>
    </div>
  </div>
  <div v-else class="text-center text-gray-600 mt-10">
  {{$t('no_orders_found')}}
</div>
</div>
</template>