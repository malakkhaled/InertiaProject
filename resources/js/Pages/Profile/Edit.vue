<script setup>
import GlobaLLayout from "@/Layouts/GlobaLLayout.vue";
import ButtonGroupComponent from "@/Components/ProfileComponents/ButtonGroupComponent.vue";
import DeleteUserForm from "@/Components/ProfileComponents/DeleteUserForm.vue";
import UpdatePasswordForm from "@/Components/ProfileComponents/UpdatePasswordForm.vue";
import UpdateProfileInformationForm from "@/Components/ProfileComponents/UpdateProfileInformationForm.vue";
import { Head } from "@inertiajs/vue3";

defineProps({
    mustVerifyEmail: {
        type: Boolean,
    },
    status: {
        type: String,
    },
});
</script>

<template>
    <div id="accordion-collapse" data-accordion="collapse">
        <Head title="Profile" />

        <GlobaLLayout>
            <ButtonGroupComponent></ButtonGroupComponent>
            <div class="py-12">
                <div class="mx-auto max-w-7xl space-y-6 sm:px-6 lg:px-8">
                    <div class="bg-white p-4 shadow sm:rounded-lg sm:p-8">
                        <UpdateProfileInformationForm
                            id="profile-information-1"
                            :must-verify-email="mustVerifyEmail"
                            :status="status"
                            class="max-w-xl"
                        />
                        <UpdatePasswordForm
                            id="update-password-2"
                            class="max-w-xl hidden"
                        />
                        <DeleteUserForm
                            id="delete-account-3"
                            class="max-w-xl hidden"
                        />
                    </div>
                </div>
            </div>
        </GlobaLLayout>
    </div>
</template>
