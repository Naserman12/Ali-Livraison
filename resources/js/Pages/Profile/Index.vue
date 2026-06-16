<script setup>
import Header from '@/Components/Header.vue'
import { usePage, useForm } from '@inertiajs/vue3'

const page = usePage()

const user = page.props.auth.user

const form = useForm({
    name: user.name,
    phone: user.phone,
})

const submit = () => {
    form.patch(route('profile.update'))
}
</script>

<template>
    <Header />

    <div class="min-h-screen bg-[#F5F5F5] py-10 px-4">

        <div class="max-w-3xl mx-auto bg-[#333333] text-white p-8 rounded-2xl shadow-lg">

            <!-- Profile Header -->
            <div class="text-center mb-10">

                <img
                    :src="`https://ui-avatars.com/api/?name=${user.name}`"
                    class="w-28 h-28 rounded-full mx-auto mb-4 border-4 border-[#FF6600]"
                >

                <h1 class="text-3xl font-bold">
                    {{ user.name }}
                </h1>

                <p class="text-gray-300">
                    {{ user.email }}
                </p>

            </div>

            <!-- Form -->
            <form @submit.prevent="submit">

                <div class="grid md:grid-cols-2 gap-6">

                    <!-- Name -->
                    <div>
                        <label class="font-semibold text-gray-200">
                            {{$t('name')}}
                        </label>

                        <input
                            v-model="form.name"
                            class="w-full mt-2 p-3 bg-[#1A1A1A] text-white border border-gray-600 rounded-xl focus:border-[#FF6600] focus:outline-none"
                        >
                    </div>

                    <!-- Phone -->
                    <div>
                        <label class="font-semibold text-gray-200">
                            {{$t('phone')}}
                        </label>

                        <input
                            v-model="form.phone"
                            class="w-full mt-2 p-3 bg-[#1A1A1A] text-white border border-gray-600 rounded-xl focus:border-[#FF6600] focus:outline-none"
                        >
                    </div>

                </div>

                <!-- Submit Button -->
                <button
                    class="mt-8 w-full bg-[#FF6600] hover:bg-orange-600 text-white font-bold py-3 rounded-xl transition"
                >
                    {{$t('save_changes')}}
                </button>

            </form>

        </div>

    </div>
</template>
