<template>
  <Header />
  <div class="min-h-screen bg-[#F5F5F5] p-6">

    <h1 class="text-2xl font-bold text-[#1A1A1A]">
      🚚 Tableau de bord chauffeur
    </h1>

    <div class="grid grid-cols-1 md:grid-cols-3 gap-4 mt-6">

      <Link
        href="/courier/orders" class="bg-[#FF6600] text-white p-4 rounded-xl shadow">
        📦 Commandes disponibles
      </Link>

      <Link href="/courier/active" class="bg-[#1A1A1A] text-white p-4 rounded-xl shadow">
        🚀 Mission actuelle
      </div>

      <div class="bg-[#333333] text-white p-4 rounded-xl shadow">
        👤 Profil
      </div>

    </div>

  </div>
</template>
<script setup>
import { Link } from '@inertiajs/vue3'
import Header from '@/Components/Header.vue'
</script>