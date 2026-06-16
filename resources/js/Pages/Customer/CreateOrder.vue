<script setup>
import { ref, onMounted } from 'vue'
import { router } from '@inertiajs/vue3'
import AdminLayout from '@/Layouts/AdminLayout.vue'
import Header from '@/Components/Header.vue'

const form = ref({
  service_type_id: '',
  pickup_address: '',
  dropoff_address: '',
  price: 0,
})

function submit() {
  router.post('/orders', form.value)
}
function getLocation() {
  navigator.geolocation.getCurrentPosition((pos) => {

    form.value.pickup_lat = pos.coords.latitude
    form.value.pickup_lng = pos.coords.longitude

  })
}
onMounted(() => {
  getLocation()
})
</script>

<template>
  <Header />
 
  <div class="min-h-screen bg-[#F5F5F5] flex items-center justify-center p-6">

    <div class="w-full max-w-2xl bg-[#333333] rounded-2xl shadow-lg p-6">

      <!-- العنوان -->
      <h1 class="text-xl font-bold text-white mb-6">
        🚚 {{$t('create_order')}}
      </h1>

      <!-- نوع الخدمة -->
      <select
        v-model="form.service_type_id"
        class="w-full p-3 rounded-lg mb-4 bg-[#1A1A1A] text-white border border-gray-600 focus:outline-none focus:border-[#FF6600]"
      >
        <option value="">{{$t('choose_service')}}</option>
        <option value="1">{{$t('parcel')}}</option>
        <option value="2">{{$t('meal')}}</option>
        <option value="3">{{$t('documents')}}</option>
      </select>

      <!-- pickup -->
      <input
        v-model="form.pickup_address"
        placeholder="{{$t('pickup_address')}}"
        class="w-full p-3 rounded-lg mb-4 bg-[#1A1A1A] text-white border border-gray-600 focus:outline-none focus:border-[#FF6600]"
      />

      <!-- dropoff -->
      <input
        v-model="form.dropoff_address"
        placeholder="{{$t('dropoff_address')}}"
        class="w-full p-3 rounded-lg mb-4 bg-[#1A1A1A] text-white border border-gray-600 focus:outline-none focus:border-[#FF6600]"
      />

      <!-- price -->
      <input
        v-model="form.price"
        type="number"
        placeholder="{{ $t('estimated_price') }}"
        class="w-full p-3 rounded-lg mb-6 bg-[#1A1A1A] text-white border border-gray-600 focus:outline-none focus:border-[#FF6600]"
      />

      <!-- زر الإرسال -->
      <button
        @click="submit"
        class="w-full bg-[#FF6600] hover:bg-orange-600 text-white font-bold py-3 rounded-lg transition"
      >
        {{$t('send_order')}}
      </button>

    </div>
  </div>
</template>