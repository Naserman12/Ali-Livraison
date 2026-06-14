<script setup>
</script>

<template>
  <AdminLayout>
    <div>

      <h1 class="text-2xl font-bold">📊 {{$t('dashboard')}}</h1>

      <div class="grid grid-cols-4 gap-4 mt-6">

        <div class="bg-white p-4 rounded shadow">
          {{$t('orders')}}
        </div>

        <div class="bg-white p-4 rounded shadow">
          {{$t('users')}}
        </div>

        <div class="bg-white p-4 rounded shadow">
          {{$t('couriers')}}
        </div>

        <div class="bg-white p-4 rounded shadow">
          {{ $t('tracking') }}
        </div>

      </div>

    </div>
  </AdminLayout>
</template>