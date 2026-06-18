<template>
  <Header />

  <div class="min-h-screen bg-gray-50 flex items-center justify-center">

    <div class="bg-white p-6 rounded-xl shadow text-center">

      <h1 class="text-2xl font-bold mb-4">
        📦 {{$t('scan_delivery_qr')}}
      </h1>

      <p>{{$t('order_number')}}: {{ order.id }}</p>
      <p>{{ $t('status') }}: {{ order.status }}</p>

      <button
        class="mt-4 bg-green-500 text-white px-4 py-2 rounded"
      >
        📷 {{$t('scan')}}
      </button>

    </div>

  </div>
</template>

<script setup>
import Header from '@/Components/Header.vue'

defineProps({
  order: Object
})
</script>