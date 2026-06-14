<script setup>
import { Link ,router } from '@inertiajs/vue3'
import { ref } from 'vue'

import { useI18n } from 'vue-i18n'
const { locale } = useI18n()
const  notifications = ref([])
const isLoggedIn = ref(true) // سنربطه لاحقًا بـ auth
</script>

<template>
  <header class="bg-white shadow px-6 py-3 flex justify-between items-center">

    <!-- Left: Logo -->
    <div @click="router.get('/')" class="font-bold text-xl">
      🚚 Ali Livraison
    </div>

    <!-- Center: Language -->
    <div class="flex gap-2 items-center">
      <select v-model="locale" class="border p-1 rounded">
        <option value="fr">FR</option>
        <option value="ar">AR</option>
      </select>

    </div>

    <!-- Right: Notifications + Auth -->
    <div class="flex items-center gap-4">

      <!-- 🔔 Notifications -->
      <button class="relative">
        🔔

        <span class="absolute -top-2 -right-2 bg-red-500 text-white text-xs px-1 rounded-full">
            {{ notifications?.length }}
        </span>
      </button>

      <!-- 👤 Auth -->
      <template v-if="isLoggedIn">

        <button
          @click="router.post('/logout')"
          class="text-red-600"
        >
          {{$t('logout')}}
        </button>

      </template>

      <template v-else>

        <Link href="/login" class="text-blue-600">
          {{$t('login')}}
        </Link>

      </template>

    </div>

  </header>
</template>