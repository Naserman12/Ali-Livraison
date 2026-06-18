<script setup>
import InputError from '@/Components/InputError.vue';
import InputLabel from '@/Components/InputLabel.vue';
import PrimaryButton from '@/Components/PrimaryButton.vue';
import TextInput from '@/Components/TextInput.vue';
import { useForm } from '@inertiajs/vue3';
import { ref } from 'vue';

const passwordInput = ref(null);
const currentPasswordInput = ref(null);

const form = useForm({
    current_password: '',
    password: '',
    password_confirmation: '',
});

const updatePassword = () => {
    form.put(route('password.update'), {
        preserveScroll: true,
        onSuccess: () => form.reset(),
        onError: () => {
            if (form.errors.password) {
                form.reset('password', 'password_confirmation');
                passwordInput.value.focus();
            }
            if (form.errors.current_password) {
                form.reset('current_password');
                currentPasswordInput.value.focus();
            }
        },
    });
};
</script>

<template>
    <section class="service-card">

        <header class="mb-6">
            <h2 class="text-2xl font-bold text-[#0D0D0D]">
                🔒 {{$t('update_password')}}
            </h2>

            <p class="mt-2 text-gray-500">
                {{$t('update_password_desc')}}
            </p>
        </header>

        <form @submit.prevent="updatePassword" class="space-y-5">

            <div>
                <InputLabel
                    for="current_password"
                    :value="$t('current_password')"
                    class="font-semibold text-[#0D0D0D]"
                />

                <TextInput
                    id="current_password"
                    ref="currentPasswordInput"
                    v-model="form.current_password"
                    type="password"
                    class="mt-2 block w-full rounded-xl border-gray-300 focus:border-[#FF7A00] focus:ring-[#FF7A00]"
                />

                <InputError
                    :message="form.errors.current_password"
                    class="mt-2"
                />
            </div>

            <div>
                <InputLabel
                    for="password"
                    :value="$t('new_password')"
                    class="font-semibold text-[#0D0D0D]"
                />

                <TextInput
                    id="password"
                    ref="passwordInput"
                    v-model="form.password"
                    type="password"
                    class="mt-2 block w-full rounded-xl border-gray-300 focus:border-[#FF7A00] focus:ring-[#FF7A00]"
                />

                <InputError
                    :message="form.errors.password"
                    class="mt-2"
                />
            </div>

            <div>
                <InputLabel
                    for="password_confirmation"
                    :value="$t('confirm_password')"
                    class="font-semibold text-[#0D0D0D]"
                />

                <TextInput
                    id="password_confirmation"
                    v-model="form.password_confirmation"
                    type="password"
                    class="mt-2 block w-full rounded-xl border-gray-300 focus:border-[#FF7A00] focus:ring-[#FF7A00]"
                />

                <InputError
                    :message="form.errors.password_confirmation"
                    class="mt-2"
                />
            </div>

            <div class="flex items-center gap-4">

                <button
                    type="submit"
                    :disabled="form.processing"
                    class="bg-[#FF7A00] hover:bg-[#E86A00] text-white px-6 py-3 rounded-xl transition-all duration-300 disabled:opacity-50"
                >
                    {{$t('save_changes')}}
                </button>

                <Transition
                    enter-active-class="transition ease-in-out duration-300"
                    enter-from-class="opacity-0"
                    leave-active-class="transition ease-in-out duration-300"
                    leave-to-class="opacity-0"
                >
                    <p
                        v-if="form.recentlySuccessful"
                        class="text-green-600 font-medium"
                    >
                        ✅ {{$t('saved_successfully')}}
                    </p>
                </Transition>

            </div>

        </form>

    </section>
</template>
<style scoped>
.service-card {
    background: white;
    border: 1px solid #FF7A00;
    padding: 24px;
    border-radius: 16px;
    transition: all .3s ease;
}

.service-card:hover {
    box-shadow: 0 10px 25px rgba(0,0,0,.08);
}
</style>