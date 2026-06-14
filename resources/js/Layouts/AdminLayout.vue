<script setup>
import Header from '../Components/Header.vue'
import AdminSidebar from '../Components/AdminSidebar.vue'
</script>

<template>
  <div :dir="locale === 'ar' ? 'rtl' : 'ltr'" class="min-h-screen bg-gray-100">
      <Header />
    <AdminSidebar />


    <main >
      <slot />
    </main>

  </div>
</template>