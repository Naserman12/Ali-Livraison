<template>
    <Header />
  <div class="min-h-screen flex items-center justify-center bg-gray-50 px-4 fade-in">

    <div class="w-full max-w-3xl text-center animate-slide-up">

      <h1 class="text-3xl font-bold mb-10 text-gray-800">
        {{$t('choose_user_type')}}
      </h1>

      <div class="grid md:grid-cols-2 gap-6">

        <!-- Customer -->
        <Link
          href="/register/customer"
          class="service-card cursor-pointer animate-fade-up"
        >
          <div class="text-5xl mb-4">👤</div>
          <h2 class="text-xl font-bold">{{ $t('customer') }}</h2>
          <p class="text-gray-500 mt-2">{{ $t('customer_subtitle') }}</p>
        </Link>
        <!-- Courier -->
        <Link
          href="/register/courier"
          class="service-card cursor-pointer animate-fade-up"
        >
          <div class="text-5xl mb-4">🚚</div>
          <h2 class="text-xl font-bold">{{ $t('courier') }}</h2>
          <p class="text-gray-500 mt-2">{{ $t('courier_subtitle') }}</p>
        </Link>

      </div>

    </div>
    
  </div>
</template>

<script setup>
import { Link } from '@inertiajs/vue3'
import { useI18n } from 'vue-i18n'
import { watch, onMounted } from 'vue'
import Header from '@/Components/Header.vue'
</script>