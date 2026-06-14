<script setup>
import { Link } from '@inertiajs/vue3'
</script>

<template>
  <aside class="w-64 bg-white shadow p-4">

    <h2 class="font-bold mb-4">{{$t('admin_panel')}}</h2>

    <nav class="flex flex-col gap-2">

      <Link href="/admin/dashboard" class="block p-2 hover:bg-gray-100">
        📊{{ $t('dashboard')}}
      </Link>

      <Link href="/admin/orders" class="block p-2 hover:bg-gray-100">
        📦 {{ $t('orders') }}
      </Link>

      <Link href="/admin/users" class="block p-2 hover:bg-gray-100">
        👤 {{ $t('users') }}
      </Link>

      <Link href="/admin/couriers" class="block p-2 hover:bg-gray-100">
        🚚 {{$t('couriers')}}
      </Link>

    </nav>

  </aside>
</template>