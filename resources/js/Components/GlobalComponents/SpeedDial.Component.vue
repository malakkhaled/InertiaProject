<script setup>
import { inject } from "vue";
const openCreateModal = inject("openCreateModal");
const modalIsOpen = inject("modalIsOpen");

const handleCreateClick = () => {
    modalIsOpen.value = !modalIsOpen;
    openCreateModal();
};
</script>

<template>
    <div>
        <div
            data-dial-init
            class="fixed end-6 bottom-6 group"
            v-if="$page.props.auth.user"
        >
            <div
                id="speed-dial-menu-square"
                class="flex flex-col items-center hidden mb-4 space-y-2"
            >
                <!--Add new Task Icon-->
                <button
                    @click="handleCreateClick"
                    type="button"
                    data-tooltip-target="tooltip-add-new-task"
                    data-tooltip-placement="left"
                    class="flex justify-center items-center w-[52px] h-[52px] text-body hover:text-heading bg-neutral-primary-soft rounded-full border border-default shadow-xs hover:bg-neutral-secondary-medium hover:border-default-medium focus:ring-4 focus:ring-neutral-secondary-soft focus:outline-none border-primary text-stone-500"
                >
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
                            d="M11.35 3.836c-.065.21-.1.433-.1.664 0 .414.336.75.75.75h4.5a.75.75 0 0 0 .75-.75 2.25 2.25 0 0 0-.1-.664m-5.8 0A2.251 2.251 0 0 1 13.5 2.25H15c1.012 0 1.867.668 2.15 1.586m-5.8 0c-.376.023-.75.05-1.124.08C9.095 4.01 8.25 4.973 8.25 6.108V8.25m8.9-4.414c.376.023.75.05 1.124.08 1.131.094 1.976 1.057 1.976 2.192V16.5A2.25 2.25 0 0 1 18 18.75h-2.25m-7.5-10.5H4.875c-.621 0-1.125.504-1.125 1.125v11.25c0 .621.504 1.125 1.125 1.125h9.75c.621 0 1.125-.504 1.125-1.125V18.75m-7.5-10.5h6.375c.621 0 1.125.504 1.125 1.125v9.375m-8.25-3 1.5 1.5 3-3.75"
                        />
                    </svg>

                    <span class="sr-only">Add New Task</span>
                </button>
                <div
                    id="tooltip-add-new-task"
                    role="tooltip"
                    class="absolute z-10 invisible inline-block px-3 py-2 text-sm font-medium text-primary transition-opacity duration-300 bg-dark rounded-base shadow-xs opacity-0 tooltip text-nowrap"
                >
                    Add New Task
                    <div class="tooltip-arrow" data-popper-arrow></div>
                </div>

                <!--Profile Icon-->
                <a
                    data-tooltip-target="tooltip-profile"
                    data-tooltip-placement="left"
                    :href="route('profile.edit')"
                    class="flex justify-center items-center w-[52px] h-[52px] text-body hover:text-heading bg-neutral-primary-soft rounded-full border border-default shadow-xs hover:bg-neutral-secondary-medium hover:border-default-medium focus:ring-4 focus:ring-neutral-secondary-soft focus:outline-none border-primary text-stone-500 hover:text-gray-700"
                >
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
                            d="M17.982 18.725A7.488 7.488 0 0 0 12 15.75a7.488 7.488 0 0 0-5.982 2.975m11.963 0a9 9 0 1 0-11.963 0m11.963 0A8.966 8.966 0 0 1 12 21a8.966 8.966 0 0 1-5.982-2.275M15 9.75a3 3 0 1 1-6 0 3 3 0 0 1 6 0Z"
                        />
                    </svg>
                </a>
                <div
                    id="tooltip-profile"
                    role="tooltip"
                    class="absolute z-10 invisible inline-block px-3 py-2 text-sm font-medium text-primary transition-opacity duration-300 bg-dark rounded-base shadow-xs opacity-0 tooltip text-nowrap"
                >
                    Profile
                    <div class="tooltip-arrow" data-popper-arrow></div>
                </div>
            </div>

            <!-- Speed Dial Toggle Button -->
            <button
                type="button"
                data-dial-toggle="speed-dial-menu-square"
                aria-controls="speed-dial-menu-square"
                aria-expanded="false"
                class="flex items-center justify-center text-white bg-brand rounded-full w-14 h-14 hover:bg-brand-strong focus:ring-4 focus:ring-brand-medium focus:outline-none bg-primary"
            >
                <svg
                    class="w-5 h-5 transition-transform group-hover:rotate-45"
                    aria-hidden="true"
                    xmlns="http://www.w3.org/2000/svg"
                    width="24"
                    height="24"
                    fill="none"
                    viewBox="0 0 24 24"
                >
                    <path
                        stroke="currentColor"
                        stroke-linecap="round"
                        stroke-linejoin="round"
                        stroke-width="2"
                        d="M5 12h14m-7 7V5"
                    />
                </svg>
                <span class="sr-only">Open actions menu</span>
            </button>
        </div>
    </div>
</template>

<style scoped></style>
