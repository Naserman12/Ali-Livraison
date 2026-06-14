<script setup>
import { Head, Link, useForm } from '@inertiajs/vue3'
import Header from '@/Components/Header.vue'

defineProps({
    canResetPassword: Boolean,
    status: String,
})

const form = useForm({
    email: '',
    password: '',
    remember: false,
})

const submit = () => {
    form.post(route('login'), {
        onFinish: () => form.reset('password'),
    })
}
</script>

<template>
    <Head title="Login" />

    <Header />

    <div
        class="min-h-screen bg-gray-50 flex items-center justify-center px-4 py-20 fade-in"
    >
        <div class="w-full max-w-md animate-slide-up">

            <!-- Card -->
            <div class="service-card">

                <div class="text-center mb-8">
                    <div class="text-6xl mb-4 animate-float">
                        🔐
                    </div>

                    <h1 class="text-3xl font-bold text-gray-800">
                        {{ $t('login') }}
                    </h1>

                    <p class="text-gray-500 mt-2">
                        {{ $t('login_subtitle') }}
                    </p>
                </div>

                <div
                    v-if="status"
                    class="mb-4 p-3 rounded-lg bg-green-100 text-green-700 text-sm"
                >
                    {{ status }}
                </div>

                <form @submit.prevent="submit">

                    <!-- Email -->
                    <div class="mb-4">
                        <label class="block font-medium mb-2">
                            {{ $t('email') }}
                        </label>

                        <input
                            v-model="form.email"
                            type="email"
                            class="w-full border rounded-xl p-3 focus:ring-2 focus:ring-orange-500 focus:border-orange-500"
                            required
                            autofocus
                        />

                        <div
                            v-if="form.errors.email"
                            class="text-red-500 text-sm mt-1"
                        >
                            {{ form.errors.email }}
                        </div>
                    </div>

                    <!-- Password -->
                    <div class="mb-4">
                        <label class="block font-medium mb-2">
                            {{ $t('password') }}
                        </label>

                        <input
                            v-model="form.password"
                            type="password"
                            class="w-full border rounded-xl p-3 focus:ring-2 focus:ring-orange-500 focus:border-orange-500"
                            required
                        />

                        <div
                            v-if="form.errors.password"
                            class="text-red-500 text-sm mt-1"
                        >
                            {{ form.errors.password }}
                        </div>
                    </div>

                    <!-- Remember -->
                    <div class="flex items-center justify-between mb-6">

                        <label class="flex items-center gap-2">
                            <input
                                type="checkbox"
                                v-model="form.remember"
                                class="rounded border-gray-300 text-orange-500 focus:ring-orange-500"
                            />

                            <span class="text-sm text-gray-600">
                                {{ $t('remember_me') }}
                            </span>
                        </label>

                        <Link
                            v-if="canResetPassword"
                            :href="route('password.request')"
                            class="text-orange-500 hover:text-orange-600 text-sm"
                        >
                            {{ $t('forgot_password') }}
                        </Link>

                    </div>

                    <!-- Login Button -->
                    <button
                        type="submit"
                        :disabled="form.processing"
                        class="w-full bg-orange-500 hover:bg-orange-600 text-white font-bold py-3 rounded-xl transition duration-300"
                    >
                        {{ $t('login') }}
                    </button>

                </form>

                <!-- Register -->
                <div class="mt-6 text-center">
                    <p class="text-gray-500">
                        {{ $t('dont_have_account') }}
                    </p>

                    <Link
                        href="/register"
                        class="text-orange-500 font-semibold hover:text-orange-600"
                    >
                        {{ $t('create_account') }}
                    </Link>
                </div>

            </div>

        </div>
    </div>
</template>