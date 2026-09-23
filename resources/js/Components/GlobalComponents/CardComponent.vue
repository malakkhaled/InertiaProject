<script setup>
import { inject, ref } from "vue";
import { Link, router } from "@inertiajs/vue3";

const openEditModal = inject("openEditModal");
const modalIsOpen = inject("modalIsOpen");

defineProps({
    tasks: {
        type: Array,
        required: true,
    },
});

const handleEditClick = (task) => {
    modalIsOpen.value = !modalIsOpen;
    openEditModal(task);
};

const toggleTask = (task) => {
    router.put(
        `/tasks/${task.id}/toggle`,
        {},
        {
            preserveScroll: true,
            preserveState: true,
        },
    );
};

// متغير لتتبع حالة العرض (هل هو مفتوح أم لا لكل مهمة أو بشكل عام)
// لو كانت المهام داخل حلقة (v-for)، يفضل تخزين حالة كل مهمة بمعرفها (id)
const expandedTasks = ref({});
const getShortText = (text) => {
    if (!text) return ""; // إذا كانت القيمة فارغة لا تقم بشيء
    return text.length > 100 ? text.substring(0, 100) + "..." : text;
};
const toggleReadMore = (taskId) => {
    expandedTasks.value[taskId] = !expandedTasks.value[taskId];
};
</script>

<template>
    <div>
        <div
            v-if="tasks.length > 0"
            class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-4 my-5"
        >
            <div
                v-for="task in tasks"
                :key="task.id"
                class="w-full max-w-sm bg-white border border-gray-200 rounded-lg shadow-sm dark:bg-gray-800 dark:border-gray-700 mx-6 my-6 px-4"
            >
                <div class="flex justify-between px-4 pt-4">
                    <div>
                        <button
                            id="dropdownButton"
                            :data-dropdown-toggle="task.id"
                            class="inline-block text-gray-500 dark:text-gray-400 hover:bg-gray-100 dark:hover:bg-gray-700 focus:ring-4 focus:outline-none focus:ring-gray-200 dark:focus:ring-gray-700 rounded-lg text-sm p-1.5"
                            type="button"
                        >
                            <span class="sr-only">Open dropdown</span>
                            <svg
                                class="w-5 h-5"
                                aria-hidden="true"
                                xmlns="http://www.w3.org/2000/svg"
                                fill="currentColor"
                                viewBox="0 0 16 3"
                            >
                                <path
                                    d="M2 0a1.5 1.5 0 1 1 0 3 1.5 1.5 0 0 1 0-3Zm6.041 0a1.5 1.5 0 1 1 0 3 1.5 1.5 0 0 1 0-3ZM14 0a1.5 1.5 0 1 1 0 3 1.5 1.5 0 0 1 0-3Z"
                                />
                            </svg>
                        </button>
                        <!-- Dropdown menu -->
                        <div
                            :id="task.id"
                            class="z-10 hidden text-base list-none bg-white divide-y divide-gray-100 rounded-lg shadow-sm w-44 dark:bg-gray-700"
                        >
                            <ul class="py-2" aria-labelledby="dropdownButton">
                                <li>
                                    <Link
                                        method="delete"
                                        as="button"
                                        preserve-scroll
                                        :href="route('tasks.destroy', task.id)"
                                        class="block px-4 py-2 text-sm text-red-600 hover:bg-gray-100 dark:hover:bg-gray-600 dark:text-gray-200 dark:hover:text-white w-full text-left"
                                        >Delete</Link
                                    >
                                </li>
                                <li>
                                    <a
                                        @click="handleEditClick(task)"
                                        class="block px-4 py-2 text-sm text-red-600 hover:bg-gray-100 dark:hover:bg-gray-600 dark:text-gray-200 dark:hover:text-white"
                                    >
                                        Edit
                                    </a>
                                </li>
                            </ul>
                        </div>
                    </div>

                    <label class="inline-flex items-center cursor-pointer">
                        <span
                            class="me-3 text-sm font-medium text-gray-900 dark:text-gray-300"
                            >Not Done</span
                        >
                        <input
                            @change="toggleTask(task)"
                            type="checkbox"
                            value=""
                            class="sr-only peer"
                            :checked="task.done === 1"
                        />
                        <div
                            class="relative w-11 h-6 bg-gray-200 rounded-full peer dark:bg-gray-700 peer-focus:ring-4 peer-focus:ring-yellow-300 dark:peer-focus:ring-yellow-800 peer-checked:after:translate-x-full rtl:peer-checked:after:-translate-x-full peer-checked:after:border-white after:content-[''] after:absolute after:top-0.5 after:start-[2px] after:bg-white after:border-gray-300 after:border after:rounded-full after:h-5 after:w-5 after:transition-all dark:border-gray-600 peer-checked:bg-yellow-400 dark:peer-checked:bg-yellow-400"
                        ></div>
                    </label>
                </div>
                <div class="flex flex-col items-center pb-4">
                    <h5
                        class="truncate max-w-xs mb-1 text-xl font-medium text-gray-900 dark:text-white"
                    >
                        {{ task.task_name }}
                    </h5>
                    <span class="text-sm text-gray-500 dark:text-gray-400">
                        {{ task.priority + " Important" }}</span
                    >
                    <p
                        class="mt-2 text-sm text-gray-500 dark:text-gray-400 whitespace-normal text-left max-w-sm px-5 break-all overflow-hidden"
                    >
                        {{
                            expandedTasks[task.id]
                                ? task.task_info
                                : getShortText(task.task_info)
                        }}
                    </p>
                    <button
                        v-if="task.task_info && task.task_info.length > 100"
                        @click="toggleReadMore(task.id)"
                        class="text-blue-500 text-sm mt-1 focus:outline-none hover:underline"
                    >
                        {{
                            expandedTasks[task.id]
                                ? "عرض أقل (Read Less)"
                                : "عرض المزيد (Read More)"
                        }}
                    </button>
                    <div class="flex mt-4 md:mt-6">
                        <Link
                            method="delete"
                            as="button"
                            preserve-scroll
                            :href="route('tasks.destroy', task.id)"
                            class="inline-flex items-center px-4 py-2 text-sm font-medium text-center text-white bg-red-700 rounded-lg hover:bg-red-500 focus:ring-4 focus:outline-none focus:ring-blue-300"
                            >Delete</Link
                        >
                        <a
                            @click="handleEditClick(task)"
                            class="py-2 px-4 ms-2 text-sm font-medium text-gray-900 focus:outline-none bg-white rounded-lg border border-gray-200 hover:bg-gray-100 hover:text-blue-700 focus:z-10 focus:ring-4 focus:ring-gray-100 dark:focus:ring-gray-700 dark:bg-gray-800 dark:text-gray-400 dark:border-gray-600 dark:hover:text-white dark:hover:bg-gray-700"
                            >Edit</a
                        >
                    </div>
                </div>
            </div>
        </div>
    </div>
</template>

<style scoped></style>
