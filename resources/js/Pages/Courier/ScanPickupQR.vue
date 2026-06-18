<template>
  <Header />

  <div class="min-h-screen bg-gray-50 flex items-center justify-center px-4">

    <div class="bg-white shadow-xl rounded-2xl p-6 w-full max-w-md text-center">

      <h1 class="text-2xl font-bold text-[#0D0D0D]">
        📦  {{$t('scan_pickup_qr')}}
        
      </h1>

      <p class="text-gray-500 mt-2">
        {{$t('order_number')}}: {{ order.id }}
      </p>

      <p class="text-gray-500">
        {{ $t('status') }}: {{ order.status }}
      </p>

      <div class="mt-6">

        <button
          class="bg-[#1A1A1A] hover:bg-black text-white px-6 py-3 rounded-xl transition"
        >
          📷 {{ $t('scan') }}
        </button>

      </div>

    </div>

  </div>
</template>

<script setup>
import Header from '@/Components/Header.vue'

defineProps({
  order: Object
})
</script>