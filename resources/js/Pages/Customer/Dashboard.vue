<script setup>
import { Link } from '@inertiajs/vue3'
import AdminLayout from '../../Layouts/AdminLayout.vue'
import Header from '../../Components/Header.vue'
</script>

<template>
  <Header />
 
  
  <div class="min-h-screen bg-[#F5F5F5] p-6">

    <!-- Header -->
    <h1 class="text-2xl font-bold text-[#1A1A1A]">
      👋 {{$t('welcome')}}
    </h1>

    <p class="text-gray-600 mt-1">
      {{$t('manage_orders_easily')}}
    </p>

    <!-- Cards -->
    <div class="grid grid-cols-1 md:grid-cols-3 gap-5 mt-8">

      <!-- Create Order -->
      <Link
        href="/customer/orders/create"
        class="bg-[#FF6600] hover:bg-orange-600 transition text-white p-6 rounded-2xl shadow-md"
      >
        <div class="text-3xl mb-2">➕</div>
        <h2 class="text-lg font-bold">{{$t('create_order')}}</h2>
        <p class="text-sm opacity-90 mt-1">
          {{$t('create_order_desc')}}
        </p>
      </Link>

      <!-- My Orders -->
      <Link
        href="/customer/orders"
        class="bg-[#333333] hover:bg-[#444444] transition text-white p-6 rounded-2xl shadow-md"
      >
        <div class="text-3xl mb-2">📦</div>
        <h2 class="text-lg font-bold">{{$t('my_orders')}}</h2>
        <p class="text-sm opacity-80 mt-1">
          {{$t('my_orders_desc')}}
        </p>
      </Link>

      <!-- Profile -->
      <Link
        href="/customer/profile"
        class="bg-[#1A1A1A] hover:bg-black transition text-white p-6 rounded-2xl shadow-md"
      >
        <div class="text-3xl mb-2">👤</div>
        <h2 class="text-lg font-bold">{{$t('profile')}}</h2>
        <p class="text-sm opacity-80 mt-1">
          {{$t('profile_desc')}}
        </p>
      </Link>

    </div>

  </div>

</template>