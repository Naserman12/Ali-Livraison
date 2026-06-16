<script setup>
import { onMounted, ref } from 'vue'
import axios from 'axios'
import { Link } from '@inertiajs/vue3'
import Header from '@/Components/Header.vue'

const orders = ref([])
const loading = ref(true)

onMounted(async () => {
  try {
    const res = await axios.get('/api/orders')
    orders.value = res.data
  } catch (e) {
    console.error(e)
  } finally {
    loading.value = false
  }
})
</script>

<template>
  <Header />
  <div class="min-h-screen bg-[#F5F5F5] p-6">

    <!-- Title -->
    <h1 class="text-2xl font-bold text-[#1A1A1A] mb-6">
      📦 {{$t('my_orders')}}
    </h1>

    <!-- Loading -->
    <div v-if="loading" class="text-gray-600">
      {{$t('loading')}}
    </div>

    <!-- Empty state -->
    <div v-if="!loading && orders.length === 0"
         class="text-gray-500">
      {{$t('no_orders_found')}}
    </div>

    <!-- Orders list -->
    <div v-for="order in orders" :key="order.id"
         class="bg-[#333333] text-white p-5 rounded-2xl mb-4 shadow-md">

      <!-- Header -->
      <div class="flex justify-between items-center mb-2">
        <p class="font-bold">
          📦 {{$t('order_number')}} #{{ order.id }}
        </p>

        <span class="text-xs px-3 py-1 rounded-full bg-[#1A1A1A]">
         {{ $t('status') }}  {{ order.status }}
        </span>
      </div>

      <!-- Addresses -->
      <div class="text-sm text-gray-300 mb-3">
        📍 {{ $t('pickup_address') }}: {{ order.pickup_address }}
        <br />
        ➜ {{ $t('dropoff_address') }} {{ order.dropoff_address }}
      </div>

      <!-- Actions -->
      <div class="flex justify-between items-center">

        <Link
          :href="`/customer/orders/${order.id}`"
          class="text-[#FF6600] font-semibold hover:underline"
        >
          {{$t('view_details')}}
        </Link>

        <!-- status color indicator -->
        <div
          class="w-3 h-3 rounded-full"
          :class="{
            'bg-yellow-400': order.status === 'pending',
            'bg-blue-400': order.status === 'accepted',
            'bg-purple-400': order.status === 'on_the_way',
            'bg-green-500': order.status === 'delivered'
          }"
        ></div>

      </div>

    </div>

  </div>
</template>