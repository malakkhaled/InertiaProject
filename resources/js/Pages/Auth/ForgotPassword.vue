<script setup>
import GlobaLLayout from "@/Layouts/GlobaLLayout.vue";
import InputError from "@/Components/NativeComponentsForProject/InputError.vue";
import InputLabel from "@/Components/NativeComponentsForProject/InputLabel.vue";
import PrimaryButton from "@/Components/NativeComponentsForProject/PrimaryButton.vue";
import TextInput from "@/Components/NativeComponentsForProject/TextInput.vue";
import { Head, useForm } from "@inertiajs/vue3";
import { ref } from "vue";

const auth = ref(true);
defineProps({
    status: {
        type: String,
    },
});

const form = useForm({
    email: "",
});

const submit = () => {
    form.post(route("password.email"));
};
</script>

<template>
    <GlobaLLayout :auth="auth">
        <Head title="Forgot Password" />
        <div
            class="h-screen flex flex-col sm:justify-center items-center pt-6 sm:pt-0 bg-gray-100 overflow-hidden"
        >
            <div
                class="w-full sm:max-w-md px-6 py-4 bg-white shadow-md overflow-hidden sm:rounded-lg"
            >
                <div class="mb-4 text-sm text-gray-600">
                    Forgot your password?
                </div>

                <div
                    v-if="status"
                    class="mb-4 text-sm font-medium text-green-600"
                >
                    {{ status }}
                </div>

                <form @submit.prevent="submit">
                    <div>
                        <InputLabel for="email" value="Email" />

                        <TextInput
                            id="email"
                            type="email"
                            class="mt-1 block w-full"
                            v-model="form.email"
                            required
                            autofocus
                            autocomplete="username"
                        />

                        <InputError class="mt-2" :message="form.errors.email" />
                    </div>

                    <div class="mt-4 flex items-center justify-end">
                        <PrimaryButton
                            :class="{ 'opacity-25': form.processing }"
                            :disabled="form.processing"
                        >
                            Email Password Reset Link
                        </PrimaryButton>
                    </div>
                </form>
            </div>
        </div>
    </GlobaLLayout>
</template>
<style scoped>
.h-screen {
    height: 90vh;
}
</style>