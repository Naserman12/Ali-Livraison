<script setup>
import { ref, onMounted } from 'vue'
import axios from 'axios'

const orders = ref([])

onMounted(async () => {
  const res = await axios.get('/api/admin/orders')
  orders.value = res.data
})
async function changeStatus(id, status) {
  await axios.post(`/api/admin/orders/${id}/status`, {
    status
  })

  const res = await axios.get('/api/admin/orders')
  orders.value = res.data
}
</script>

<template>
  <AdminLayout>

    <h1 class="text-2xl font-bold mb-4">📦 {{$t('orders')}}</h1>

    <div class="bg-white p-4 rounded shadow">

      <table class="w-full">

        <thead>
          <tr>
            <th>{{$t('id')}}</th>
            <th>{{$t('customer')}}</th>
            <th>{{$t('status')}}</th>
            <th>{{$t('price')}}</th>
            <th>{{$t('actions')}}</th>
          </tr>
        </thead>

        <tbody>
          <tr v-for="order in orders" :key="order.id">

            <td>#{{ order.id }}</td>
            <td>{{ order.customer.name }}</td>
            <td>{{ order.status }}</td>
            <td>{{ order.price }}</td>

            <td class="flex gap-2">

              <button
                @click="changeStatus(order.id, 'cancelled')"
                class="bg-red-500 text-white px-2 py-1 rounded"
              >
                {{$t('cancel')}}
              </button>

              <button
                @click="changeStatus(order.id, 'pending')"
                class="bg-yellow-500 text-white px-2 py-1 rounded"
              >
                {{$t('reset')}}
              </button>

            </td>

          </tr>
        </tbody>

      </table>

    </div>

  </AdminLayout>
</template>