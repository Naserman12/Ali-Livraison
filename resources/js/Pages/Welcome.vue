<template>
  <Header/>

  <!-- Hero Section -->
  <section class="bg-gradient-to-b from-[#FF7A00] to-[#E86A00] py-20 text-white fade-in">
    <div class="max-w-7xl mx-auto px-6 grid md:grid-cols-2 gap-12 items-center">

      <div>
        <span class="inline-block px-4 py-2 bg-white/20 text-white rounded-full text-sm font-semibold mb-4 backdrop-blur">
          🚚 Ali Livraison Express
        </span>

        <h1 class="text-5xl font-extrabold leading-tight animate-slide-up">
          {{ $t('hero_title') }}
        </h1>

        <p class="mt-6 text-lg text-white/90 leading-relaxed animate-fade-up">
          {{ $t('hero_subtitle') }}
        </p>

    <div class="mt-8 flex flex-wrap gap-4">

  <template v-if="!user">

    <Link
      href="/register/customer"
      class="px-6 py-3 bg-black text-white rounded-xl hover:bg-white hover:text-black transition-all duration-300"
    >
      {{ $t('order_now') }}
    </Link>

    <Link
      href="/register/courier"
      class="px-6 py-3 border border-white text-white rounded-xl hover:bg-white hover:text-black transition-all duration-300"
    >
      {{ $t('become_courier') }}
    </Link>

  </template>

  <template v-else>

    <Link
      :href="route('dashboard')"
      class="px-8 py-3 bg-black text-white rounded-xl hover:bg-white hover:text-black transition-all duration-300 shadow-lg"
    >
      🏠 {{ $t('dashboard') }}
    </Link>

  </template>

</div>
      </div>

      <div class="flex justify-center animate-float">
        <img src="/images/delivery-hero.svg" class="w-full max-w-lg drop-shadow-xl">
      </div>

    </div>
  </section>

  <!-- Services -->
  <section class="py-20 fade-in">
    <div class="max-w-7xl mx-auto px-6">

      <div class="text-center mb-12">
        <h2 class="text-4xl font-bold text-[#0D0D0D] animate-slide-up">
          {{ $t('services') }}
        </h2>

        <p class="mt-4 text-gray-600 animate-fade-up">
          {{ $t('services_subtitle') }}
        </p>
      </div>

      <div class="grid md:grid-cols-4 gap-6">

        <div class="service-card">
          <div class="text-5xl mb-4">📦</div>
          <h3 class="font-bold text-xl">{{ $t('parcels') }}</h3>
        </div>

        <div class="service-card">
          <div class="text-5xl mb-4">🍔</div>
          <h3 class="font-bold text-xl">{{ $t('food') }}</h3>
        </div>

        <div class="service-card">
          <div class="text-5xl mb-4">📄</div>
          <h3 class="font-bold text-xl">{{ $t('documents') }}</h3>
        </div>

        <div class="service-card">
          <div class="text-5xl mb-4">🛒</div>
          <h3 class="font-bold text-xl">{{ $t('shopping') }}</h3>
        </div>

      </div>

    </div>
  </section>

  <!-- Why Choose Us -->
  <section class="bg-[#FFF4E8] py-20 fade-in">

    <div class="max-w-7xl mx-auto px-6">

      <div class="text-center mb-12">
        <h2 class="text-4xl font-bold text-[#0D0D0D] animate-slide-up">
          {{ $t('why_choose_us') }}
        </h2>
      </div>

      <div class="grid md:grid-cols-3 gap-8">

        <div class="why-card">📍 {{ $t('live_tracking') }}</div>
        <div class="why-card">🔔 {{ $t('instant_notifications') }}</div>
        <div class="why-card">🔐 {{ $t('qr_security') }}</div>
        <div class="why-card">💰 {{ $t('transparent_prices') }}</div>
        <div class="why-card">🌍 {{ $t('multilingual') }}</div>
        <div class="why-card">⭐ {{ $t('trusted_service') }}</div>

      </div>

    </div>

  </section>

  <!-- How it works -->
  <section class="py-20 fade-in">

    <div class="max-w-7xl mx-auto px-6">

      <div class="text-center mb-12">
        <h2 class="text-4xl font-bold text-[#0D0D0D] animate-slide-up">
          {{ $t('how_it_works') }}
        </h2>
      </div>

      <div class="grid md:grid-cols-2 gap-10">

        <div class="how-card">
          <h3 class="text-2xl font-bold mb-6">👤 {{ $t('customer') }}</h3>
          <ul class="space-y-3">
            <li>1. {{ $t('step_customer_1') }}</li>
            <li>2. {{ $t('step_customer_2') }}</li>
            <li>3. {{ $t('step_customer_3') }}</li>
            <li>4. {{ $t('step_customer_4') }}</li>
            <li>5. {{ $t('step_customer_5') }}</li>
          </ul>
        </div>

        <div class="how-card">
          <h3 class="text-2xl font-bold mb-6">🚚 {{ $t('courier') }}</h3>
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
  <section class="bg-[#0D0D0D] py-20 text-white fade-in">

    <div class="max-w-7xl mx-auto px-6 grid md:grid-cols-4 gap-8 text-center">

      <div>
        <div class="text-5xl font-bold text-[#FF7A00]">5000+</div>
        <p>{{ $t('completed_orders') }}</p>
      </div>

      <div>
        <div class="text-5xl font-bold text-[#FF7A00]">120+</div>
        <p>{{ $t('active_couriers') }}</p>
      </div>

      <div>
        <div class="text-5xl font-bold text-[#FF7A00]">3000+</div>
        <p>{{ $t('customers') }}</p>
      </div>

      <div>
        <div class="text-5xl font-bold text-[#FF7A00]">98%</div>
        <p>{{ $t('satisfaction') }}</p>
      </div>

    </div>

  </section>

  <!-- Cities -->
  <section class="py-20 fade-in">

    <div class="max-w-7xl mx-auto px-6 text-center">

      <h2 class="text-4xl font-bold mb-8 text-[#0D0D0D] animate-slide-up">
        {{ $t('supported_cities') }}
      </h2>

      <div class="flex flex-wrap justify-center gap-4">
        <span class="city-pill">Niamey</span>
        <span class="city-pill">Maradi</span>
        <span class="city-pill">Zinder</span>
        <span class="city-pill">Tahoua</span>
        <span class="city-pill">Dosso</span>
      </div>

    </div>

  </section>

  <!-- Footer -->
  <footer class="bg-[#0D0D0D] text-white py-12 border-t-4 border-[#FF7A00] fade-in">

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

</template>

<script setup>

import { Link } from '@inertiajs/vue3'
import { useI18n } from 'vue-i18n'
import { watch, onMounted } from 'vue'
import Header from '@/Components/Header.vue'
import { usePage } from '@inertiajs/vue3'

const page = usePage()

const user = page.props.auth?.user
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

<style>
.fade-in {
  opacity: 0;
  animation: fadeIn 1s ease forwards;
}

@keyframes fadeIn {
  to { opacity: 1; }
}

.animate-slide-up {
  animation: slideUp 0.8s ease forwards;
  opacity: 0;
  transform: translateY(20px);
}

@keyframes slideUp {
  to { opacity: 1; transform: translateY(0); }
}

.animate-fade-up {
  animation: fadeUp 1s ease forwards;
  opacity: 0;
  transform: translateY(10px);
}

@keyframes fadeUp {
  to { opacity: 1; transform: translateY(0); }
}

.animate-float {
  animation: float 3s ease-in-out infinite;
}

@keyframes float {
  0%, 100% { transform: translateY(0); }
  50% { transform: translateY(-10px); }
}

.service-card,
.why-card,
.how-card {
  background: white;
  border: 1px solid #FF7A00;
  padding: 24px;
  border-radius: 16px;
  text-align: center;
  transition: all 0.3s ease;
}

.service-card:hover,
.why-card:hover,
.how-card:hover {
  transform: translateY(-6px);
  box-shadow: 0 10px 25px rgba(0,0,0,0.15);
}

.city-pill {
  background: #FF7A00;
  color: white;
  padding: 12px 24px;
  border-radius: 999px;
  font-weight: bold;
  transition: all 0.3s ease;
}

.city-pill:hover {
  background: #E86A00;
  transform: scale(1.05);
}
</style>
