<script setup>
import { ref, onMounted } from 'vue'
import axios from 'axios'
import AdminLayout from '@/Layouts/AdminLayout.vue'
import Header from '@/Components/Header.vue'

const couriers = ref([])

onMounted(async () => {
  const res = await axios.get('/api/admin/couriers')
  couriers.value = res.data
})
</script>
<template>
  <Header />
  <AdminLayout>

    <h1 class="text-2xl font-bold mb-4">🚚 {{$t('couriers')}}</h1>

    <div class="bg-white p-4 rounded shadow">

      <div v-for="c in couriers" :key="c.id" class="border-b p-2">

        <p>{{ c.name }}</p>
        <p class="text-sm text-gray-500">{{ c.phone }}</p>

      </div>

    </div>

  </AdminLayout>
</template>