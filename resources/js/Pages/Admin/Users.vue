<script setup>
import { ref, onMounted } from 'vue'
import axios from 'axios'

const users = ref([])

onMounted(async () => {
  const res = await axios.get('/api/admin/users')
  users.value = res.data
})
</script>
<template>
  <AdminLayout>

    <h1 class="text-2xl font-bold mb-4">👤 {{$t('users')}}</h1>

    <div class="bg-white p-4 rounded shadow">

      <div v-for="user in users" :key="user.id" class="border-b p-2">

        <p> {{ user.name }}</p>
        <p class="text-sm text-gray-500">{{ user.phone }}</p>
        <select v-model="user.role">
        <option value="customer">${$t('customer')}</option>
        <option value="courier">${$t('courier')}</option>
        <option value="admin">${$t('admin')}</option>
        </select>

      </div>

    </div>

  </AdminLayout>
</template>