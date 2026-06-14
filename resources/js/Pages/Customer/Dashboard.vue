<script setup>
import { Link } from '@inertiajs/vue3'
import AdminLayout from '../../Layouts/AdminLayout.vue'
</script>

<template>
  <AdminLayout>
  <div class="min-h-screen bg-[#F5F5F5] p-6">

    <!-- Header -->
    <h1 class="text-2xl font-bold text-[#1A1A1A]">
      👋 Bienvenue
    </h1>

    <p class="text-gray-600 mt-1">
      Gérez vos commandes facilement
    </p>

    <!-- Cards -->
    <div class="grid grid-cols-1 md:grid-cols-3 gap-5 mt-8">

      <!-- Create Order -->
      <Link
        href="/customer/orders/create"
        class="bg-[#FF6600] hover:bg-orange-600 transition text-white p-6 rounded-2xl shadow-md"
      >
        <div class="text-3xl mb-2">➕</div>
        <h2 class="text-lg font-bold">Créer une commande</h2>
        <p class="text-sm opacity-90 mt-1">
          Envoyer une nouvelle demande de livraison
        </p>
      </Link>

      <!-- My Orders -->
      <Link
        href="/customer/orders"
        class="bg-[#333333] hover:bg-[#444444] transition text-white p-6 rounded-2xl shadow-md"
      >
        <div class="text-3xl mb-2">📦</div>
        <h2 class="text-lg font-bold">Mes commandes</h2>
        <p class="text-sm opacity-80 mt-1">
          Voir et suivre vos commandes
        </p>
      </Link>

      <!-- Profile -->
      <Link
        href="/customer/profile"
        class="bg-[#1A1A1A] hover:bg-black transition text-white p-6 rounded-2xl shadow-md"
      >
        <div class="text-3xl mb-2">👤</div>
        <h2 class="text-lg font-bold">Profil</h2>
        <p class="text-sm opacity-80 mt-1">
          Gérer vos informations personnelles
        </p>
      </Link>

    </div>

  </div>
  </AdminLayout>
</template>