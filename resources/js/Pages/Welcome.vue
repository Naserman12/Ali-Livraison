<template>
    <AdminLayout>
        <div class="bg-white p-4 rounded shadow">
            <h1 class="text-2xl font-bold mb-4">👤 {{$t('users')}}</h1>
            <div v-for="user in users" :key="user.id" class="border-b p-2">
                <p> {{ user.name }}</p>
                <p class="text-sm text-gray-500">{{ user.phone }}</p>
                <select v-model="user.role" @change="updateRole(user)">
                    <option value="customer">${$t('customer')}</option>
                    <option value="courier">${$t('courier')}</option>
                    <option value="admin">${$t('admin')}</option>
                </select>
            </div>
        </div>
  <div class="bg-white">

```
<!-- Hero Section -->
<section class="bg-gradient-to-b from-cyan-50 to-white py-20">
  <div class="max-w-7xl mx-auto px-6">

    <div class="grid md:grid-cols-2 gap-12 items-center">

      <div>
        <span
          class="inline-block px-4 py-2 bg-cyan-100 text-cyan-700 rounded-full text-sm font-semibold mb-4"
        >
          🚚 Ali Livraison Express
        </span>

        <h1 class="text-5xl font-extrabold text-gray-900 leading-tight">
          {{ $t('hero_title') }}
        </h1>

        <p class="mt-6 text-lg text-gray-600 leading-relaxed">
          {{ $t('hero_subtitle') }}
        </p>

        <div class="mt-8 flex flex-wrap gap-4">

          <Link
            href="/register/customer"
            class="px-6 py-3 bg-cyan-600 text-white rounded-xl hover:bg-cyan-700 transition"
          >
            {{ $t('order_now') }}
          </Link>

          <Link
            href="/register/courier"
            class="px-6 py-3 border border-cyan-600 text-cyan-600 rounded-xl hover:bg-cyan-50 transition"
          >
            {{ $t('become_courier') }}
          </Link>

        </div>
      </div>

      <div class="flex justify-center">
        <img
          src="/images/delivery-hero.svg"
          class="w-full max-w-lg"
          alt="Ali Livraison Express"
        >
      </div>

    </div>

  </div>
</section>

<!-- Services -->
<section class="py-20">
  <div class="max-w-7xl mx-auto px-6">

    <div class="text-center mb-12">
      <h2 class="text-4xl font-bold text-gray-900">
        {{ $t('services') }}
      </h2>

      <p class="mt-4 text-gray-600">
        {{ $t('services_subtitle') }}
      </p>
    </div>

    <div class="grid md:grid-cols-4 gap-6">

      <div class="bg-white shadow-lg rounded-2xl p-6 text-center border border-cyan-100">
        <div class="text-5xl mb-4">📦</div>
        <h3 class="font-bold text-xl">{{ $t('parcels') }}</h3>
      </div>

      <div class="bg-white shadow-lg rounded-2xl p-6 text-center border border-cyan-100">
        <div class="text-5xl mb-4">🍔</div>
        <h3 class="font-bold text-xl">{{ $t('food') }}</h3>
      </div>

      <div class="bg-white shadow-lg rounded-2xl p-6 text-center border border-cyan-100">
        <div class="text-5xl mb-4">📄</div>
        <h3 class="font-bold text-xl">{{ $t('documents') }}</h3>
      </div>

      <div class="bg-white shadow-lg rounded-2xl p-6 text-center border border-cyan-100">
        <div class="text-5xl mb-4">🛒</div>
        <h3 class="font-bold text-xl">{{ $t('shopping') }}</h3>
      </div>

    </div>

  </div>
</section>

<!-- Why Choose Us -->
<section class="bg-cyan-50 py-20">

  <div class="max-w-7xl mx-auto px-6">

    <div class="text-center mb-12">
      <h2 class="text-4xl font-bold">
        {{ $t('why_choose_us') }}
      </h2>
    </div>

    <div class="grid md:grid-cols-3 gap-8">

      <div class="bg-white p-8 rounded-2xl shadow">
        📍 {{ $t('live_tracking') }}
      </div>

      <div class="bg-white p-8 rounded-2xl shadow">
        🔔 {{ $t('instant_notifications') }}
      </div>

      <div class="bg-white p-8 rounded-2xl shadow">
        🔐 {{ $t('qr_security') }}
      </div>

      <div class="bg-white p-8 rounded-2xl shadow">
        💰 {{ $t('transparent_prices') }}
      </div>

      <div class="bg-white p-8 rounded-2xl shadow">
        🌍 {{ $t('multilingual') }}
      </div>

      <div class="bg-white p-8 rounded-2xl shadow">
        ⭐ {{ $t('trusted_service') }}
      </div>

    </div>

  </div>

</section>

<!-- How it works -->
<section class="py-20">

  <div class="max-w-7xl mx-auto px-6">

    <div class="text-center mb-12">
      <h2 class="text-4xl font-bold">
        {{ $t('how_it_works') }}
      </h2>
    </div>

    <div class="grid md:grid-cols-2 gap-10">

      <div class="bg-white shadow-lg rounded-2xl p-8">

        <h3 class="text-2xl font-bold mb-6">
          👤 {{ $t('customer') }}
        </h3>

        <ul class="space-y-3">
          <li>1. {{ $t('step_customer_1') }}</li>
          <li>2. {{ $t('step_customer_2') }}</li>
          <li>3. {{ $t('step_customer_3') }}</li>
          <li>4. {{ $t('step_customer_4') }}</li>
          <li>5. {{ $t('step_customer_5') }}</li>
        </ul>

      </div>

      <div class="bg-white shadow-lg rounded-2xl p-8">

        <h3 class="text-2xl font-bold mb-6">
          🚚 {{ $t('courier') }}
        </h3>

        <ul class="space-y-3">
          <li>1. {{ $t('step_courier_1') }}</li>
          <li>2. {{ $t('step_courier_2') }}</li>
          <li>3. {{ $t('step_courier_3') }}</li>
          <li>4. {{ $t('step_courier_4') }}</li>
          <li>5. {{ $t('step_courier_5') }}</li>
        </ul>

      </div>

    </div>

  </div>

</section>

<!-- Stats -->
<section class="bg-cyan-600 py-20 text-white">

  <div class="max-w-7xl mx-auto px-6">

    <div class="grid md:grid-cols-4 gap-8 text-center">

      <div>
        <div class="text-5xl font-bold">5000+</div>
        <p>{{ $t('completed_orders') }}</p>
      </div>

      <div>
        <div class="text-5xl font-bold">120+</div>
        <p>{{ $t('active_couriers') }}</p>
      </div>

      <div>
        <div class="text-5xl font-bold">3000+</div>
        <p>{{ $t('customers') }}</p>
      </div>

      <div>
        <div class="text-5xl font-bold">98%</div>
        <p>{{ $t('satisfaction') }}</p>
      </div>

    </div>

  </div>

</section>

<!-- Cities -->
<section class="py-20">

  <div class="max-w-7xl mx-auto px-6 text-center">

    <h2 class="text-4xl font-bold mb-8">
      {{ $t('supported_cities') }}
    </h2>

    <div class="flex flex-wrap justify-center gap-4">

      <span class="bg-cyan-100 px-6 py-3 rounded-full">
        Niamey
      </span>

      <span class="bg-cyan-100 px-6 py-3 rounded-full">
        Maradi
      </span>

      <span class="bg-cyan-100 px-6 py-3 rounded-full">
        Zinder
      </span>

      <span class="bg-cyan-100 px-6 py-3 rounded-full">
        Tahoua
      </span>

      <span class="bg-cyan-100 px-6 py-3 rounded-full">
        Dosso
      </span>

    </div>

  </div>

</section>

<!-- Footer -->
<footer class="bg-gray-900 text-white py-12">

  <div class="max-w-7xl mx-auto px-6 text-center">

    <h3 class="text-2xl font-bold">
        {{ $t('footer_title') }}
    </h3>

    <p class="mt-4 text-gray-400">
      {{ $t('footer_text') }}
    </p>

    <div class="mt-6">
      © 2026 Ali Livraison Express
    </div>

  </div>

</footer>
```

  </div>
  </AdminLayout>
</template>
<script setup>
import { Link } from '@inertiajs/vue3'
import { useI18n } from 'vue-i18n'
import { watch, onMounted } from 'vue'

const { locale } = useI18n()

function switchLanguage(lang) {
  locale.value = lang
  localStorage.setItem('lang', lang)
}

onMounted(() => {
  const savedLang = localStorage.getItem('lang')
  if (savedLang) locale.value = savedLang
})

watch(locale, (lang) => {
  document.documentElement.lang = lang
  document.documentElement.dir = lang === 'ar' ? 'rtl' : 'ltr'
})
</script>
