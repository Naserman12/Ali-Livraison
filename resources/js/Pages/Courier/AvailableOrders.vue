<script setup>
import { onMounted, ref } from 'vue'
import axios from 'axios'
import Header from '@/Components/Header.vue'

const orders = ref([])

onMounted(async () => {
  const res = await axios.get('/api/courier/orders')
  orders.value = res.data
})

async function acceptOrder(id) {
  await axios.post(`/api/courier/orders/${id}/accept`)
  alert($t('order_accepted'))
}
</script>

<template>
  <Header />
  <div class="min-h-screen bg-[#F5F5F5] p-6">

    <h1 class="text-xl font-bold text-[#1A1A1A] mb-4">
      📦 {{$t('available_orders')}}
    </h1>

    <div
      v-for="order in orders"
      :key="order.id"
      class="bg-[#333333] text-white p-4 rounded-xl mb-3 shadow"
    >

      <p>📍 {{ $t('pickup') }} : {{ order.pickup_address }}</p>
      <p>🏁 {{ $t('dropoff') }} : {{ order.dropoff_address }}</p>
      <p>💰 {{ $t('price') }} : {{ order.price }} CFA</p>

      <button
        @click="acceptOrder(order.id)"
        class="mt-3 bg-[#FF6600] text-white px-4 py-2 rounded-lg hover:opacity-90"
      >
        {{$t('accept')}}
      </button>

    </div>

  </div>
</template>