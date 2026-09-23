<script setup>
//
</script>

<template>
    <div>
        <footer class="bg-white rounded-lg shadow-sm dark:bg-gray-900 m-4">
            <div class="w-full max-w-screen-xl mx-auto p-4 md:py-8">
                <div class="sm:flex sm:items-center sm:justify-between">
                    <a
                        :href="route('welcome')"
                        class="flex items-center mb-4 sm:mb-0 space-x-3 rtl:space-x-reverse"
                    >
                        <div class="w-8 h-8 rounded-full bg-primary flex items-center justify-center text-white">
                            <svg
                                xmlns="http://www.w3.org/2000/svg"
                                fill="none"
                                viewBox="0 0 24 24"
                                stroke-width="1.5"
                                stroke="currentColor"
                                class="size-6"
                            >
                                <path
                                    stroke-linecap="round"
                                    stroke-linejoin="round"
                                    d="M12 9v6m3-3H9m12 0a9 9 0 1 1-18 0 9 9 0 0 1 18 0Z"
                                />
                            </svg>
                        </div>
                        <span
                            class="self-center text-2xl font-semibold whitespace-nowrap dark:text-white"
                            >To Do Application</span
                        >
                    </a>
                    <ul
                        class="flex flex-wrap items-center mb-6 text-sm font-medium text-gray-500 sm:mb-0 dark:text-gray-400"
                    >
                        <li>
                            <a :href="route('welcome')" class="hover:underline me-4 md:me-6"
                                >Welcome</a
                            >
                        </li>
                        <li>
                            <a :href="route('dashboard')" class="hover:underline me-4 md:me-6"
                                >Dashboard</a
                            >
                        </li>
                    </ul>
                </div>
                <hr
                    class="my-6 border-gray-200 sm:mx-auto dark:border-gray-700 lg:my-8"
                />
                <span
                    class="block text-sm text-gray-500 sm:text-center dark:text-gray-400"
                    >© 2026
                    <a href="https://flowbite.com/" class="hover:underline"
                        >Malak khaled</a
                    >. All Rights Reserved.</span
                >
            </div>
        </footer>
    </div>
</template>

<style scoped></style>
