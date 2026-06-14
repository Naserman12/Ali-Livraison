<script setup>
import { ref,onMounted } from 'vue'
import axios from 'axios'

const notifications = ref([])

onMounted(async () => {
  const res = await axios.get('/api/notifications')
  notifications.value = res.data
})
</script>

<template>

<div class="relative">

  <button>
    🔔
    <span
      class="absolute -top-2 -right-2 bg-red-500 text-white rounded-full px-2 text-xs"
    >
      {{ notifications.length }}
    </span>
  </button>

</div>

</template>