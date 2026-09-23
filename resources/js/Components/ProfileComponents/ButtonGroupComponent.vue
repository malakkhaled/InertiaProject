<script setup>
//
</script>

<template>
    <div>
        <div class="flex justify-center my-8">
            <div class="inline-flex rounded-md shadow-xs " role="group">
                <button
                    type="button"
                    data-accordion-target="#profile-information-1"
                    aria-expanded="true"
                    aria-controls="profile-information-1"
                    class="px-4 py-2 text-sm font-medium text-gray-900 bg-white border border-gray-200 rounded-s-lg hover:bg-gray-100 hover:text-blue-700 focus:z-10 focus:ring-2 focus:ring-blue-700 focus:text-blue-700 dark:bg-gray-800 dark:border-gray-700 dark:text-white dark:hover:text-white dark:hover:bg-gray-700 dark:focus:ring-blue-500 dark:focus:text-white hover:cursor-pointer "
                >
                    Profile Information
                </button>
                <button
                    type="button"
                    data-accordion-target="#update-password-2"
                    aria-expanded="true"
                    aria-controls="update-password-2"
                    class="px-4 py-2 text-sm font-medium text-gray-900 bg-white border-t border-b border-gray-200 hover:bg-gray-100 hover:text-blue-700 focus:z-10 focus:ring-2 focus:ring-blue-700 focus:text-blue-700 dark:bg-gray-800 dark:border-gray-700 dark:text-white dark:hover:text-white dark:hover:bg-gray-700 dark:focus:ring-blue-500 dark:focus:text-white hover:cursor-pointer"
                >
                    Update Password
                </button>
                <button
                    type="button"
                    data-accordion-target="#delete-account-3"
                    aria-expanded="true"
                    aria-controls="delete-account-3"
                    class="px-4 py-2 text-sm font-medium text-gray-900 bg-white border border-gray-200 rounded-e-lg hover:bg-gray-100 hover:text-blue-700 focus:z-10 focus:ring-2 focus:ring-blue-700 focus:text-blue-700 dark:bg-gray-800 dark:border-gray-700 dark:text-white dark:hover:text-white dark:hover:bg-gray-700 dark:focus:ring-blue-500 dark:focus:text-white hover:cursor-pointer"
                >
                    Delete Account
                </button>
            </div>
        </div>
    </div>
</template>

<style scoped></style>
