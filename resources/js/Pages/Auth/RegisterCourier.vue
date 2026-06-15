<template>
    <Header/>

    <div class="w-full max-w-md animate-slide-up">

      <div class="text-center mb-6">
        <h1 class="text-3xl font-bold">{{ $t('create_account_con') }}</h1>
        <p class="text-gray-500">{{ $t('create_account_con_subtitle') }}</p>
      </div>
      <form @submit.prevent="submit" class="service-card space-y-4">

        <input v-model="form.name" type="text" placeholder="Full Name"
          class="w-full p-3 border rounded-lg focus:ring-2 focus:ring-orange-500">

        <input v-model="form.email" type="email" placeholder="Email"
          class="w-full p-3 border rounded-lg focus:ring-2 focus:ring-orange-500">
          
          <input v-model="form.phone" type="text" placeholder="Phone"
          class="w-full p-3 border rounded-lg focus:ring-2 focus:ring-orange-500">

        <input v-model="form.password" type="password" placeholder="Password"
          class="w-full p-3 border rounded-lg focus:ring-2 focus:ring-orange-500">

        <input v-model="form.password_confirmation" type="password" placeholder="Confirm Password"
          class="w-full p-3 border rounded-lg focus:ring-2 focus:ring-orange-500">

        <button
          class="w-full bg-orange-500 text-white py-3 rounded-lg hover:bg-orange-600 transition"
        >
          {{ $t('create_account_con') }}
        </button>

      </form>
  </div>
</template>

<script setup>
import Header from '@/Components/Header.vue';
import { useForm } from '@inertiajs/vue3'

const form = useForm({
  name: '',
  phone: '',
  email: '',
  password: '',
  password_confirmation: '',
  role: 'courier',
})

const submit = () => {
  form.post('/register')
}
</script>