<script setup>
import { useForm } from "@inertiajs/vue3";
import { watch, inject } from "vue";
const modalIsOpen = inject("modalIsOpen");
const isCreateMode = inject("isCreateMode");
const selectedTask = inject("selectedTask");

const form = useForm({
    task_name: "",
    task_info: "",
    priority: "",
});

const submit = () => {
    if (selectedTask.value) {
        form.put(route("tasks.update", selectedTask.value.id), {
            onSuccess: () => {
                resetForm();
            },
        });
    } else {
        form.post(route("tasks.store"), {
            onSuccess: () => {
                resetForm();
            },
        });
    }
};

const resetForm = () => {
    form.reset();
    selectedTask.value = null;
    modalIsOpen.value = !modalIsOpen;
    isCreateMode.value = false;
};
watch(
    () => selectedTask.value,

    (newTask) => {
        if (newTask) {
            form.task_name = newTask.task_name;
            form.task_info = newTask.task_info;
            form.priority = newTask.priority;
        }
    },
    { immediate: true },
);
watch(modalIsOpen, (isOpen) => {
    if (!isOpen) {
        resetForm();
    }
});
</script>

<template>
    <div>
        <!-- Main modal -->
        <div
            v-if="modalIsOpen"
            class="fixed inset-0 bg-black/50 cursor-not-allowed z-50 flex items-center justify-center"
        >
            <div class="relative p-4 w-full max-w-md max-h-full">
                <!-- Modal content -->
                <div
                    class="relative bg-white rounded-lg shadow-sm dark:bg-gray-700"
                >
                    <!-- Modal header -->
                    <div
                        class="flex items-center justify-between p-4 md:p-5 border-b rounded-t dark:border-gray-600 border-gray-200"
                    >
                        <h3
                            class="text-lg font-semibold text-gray-900 dark:text-white"
                            v-if="isCreateMode"
                        >
                            Create New Task
                        </h3>
                        <h3
                            v-else
                            class="text-lg font-semibold text-gray-900 dark:text-white"
                        >
                            Edit Task
                        </h3>
                        <button
                            @click="modalIsOpen = !modalIsOpen"
                            type="button"
                            class="text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm w-8 h-8 ms-auto inline-flex justify-center items-center dark:hover:bg-gray-600 dark:hover:text-white"
                        >
                            <svg
                                class="w-3 h-3"
                                aria-hidden="true"
                                xmlns="http://www.w3.org/2000/svg"
                                fill="none"
                                viewBox="0 0 14 14"
                            >
                                <path
                                    stroke="currentColor"
                                    stroke-linecap="round"
                                    stroke-linejoin="round"
                                    stroke-width="2"
                                    d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6"
                                />
                            </svg>
                            <span class="sr-only">Close modal</span>
                        </button>
                    </div>
                    <!-- Modal body -->
                    <form @submit.prevent="submit" class="p-4 md:p-5">
                        <div class="grid gap-4 mb-4 grid-cols-2">
                            <div class="col-span-2 sm:col-span-1">
                                <label
                                    for="price"
                                    class="block mb-2 text-sm font-medium text-gray-900 dark:text-white"
                                    >Task name</label
                                >
                                <input
                                    v-model="form.task_name"
                                    type="text"
                                    name="task_name"
                                    id="task_name"
                                    class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500"
                                    placeholder="Task name"
                                    required=""
                                />
                                <div
                                    v-if="form.errors.task_name"
                                    class="text-white"
                                >
                                    {{ form.errors.task_name }}
                                </div>
                            </div>
                            <div class="col-span-2 sm:col-span-1">
                                <label
                                    for="category"
                                    class="block mb-2 text-sm font-medium text-gray-900 dark:text-white"
                                    >Importance</label
                                >
                                <select
                                    v-model="form.priority"
                                    id="category"
                                    class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-500 focus:border-primary-500 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500"
                                >
                                    <option value="" disabled>
                                        Select Importance
                                    </option>
                                    <option value="very">very Important</option>

                                    <option value="less">Less Important</option>
                                    <option value="not">Not Important</option>
                                </select>
                                <div
                                    v-if="form.errors.priority"
                                    class="text-white"
                                >
                                    {{ form.errors.priority }}
                                </div>
                            </div>
                            <div class="col-span-2">
                                <label
                                    for="description"
                                    class="block mb-2 text-sm font-medium text-gray-900 dark:text-white"
                                    >Task Description</label
                                >
                                <textarea
                                    v-model="form.task_info"
                                    id="description"
                                    rows="4"
                                    class="block p-2.5 w-full text-sm text-gray-900 bg-gray-50 rounded-lg border border-gray-300 focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                                    placeholder="Write task description here"
                                ></textarea>
                                <div
                                    v-if="form.errors.task_info"
                                    class="text-white"
                                >
                                    {{ form.errors.task_info }}
                                </div>
                            </div>
                        </div>
                        <button
                            type="submit"
                            class="text-white inline-flex items-center bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800"
                        >
                            <svg
                                class="me-1 -ms-1 w-5 h-5"
                                fill="currentColor"
                                viewBox="0 0 20 20"
                                xmlns="http://www.w3.org/2000/svg"
                            >
                                <path
                                    fill-rule="evenodd"
                                    d="M10 5a1 1 0 011 1v3h3a1 1 0 110 2h-3v3a1 1 0 11-2 0v-3H6a1 1 0 110-2h3V6a1 1 0 011-1z"
                                    clip-rule="evenodd"
                                ></path>
                            </svg>
                            <span v-if="isCreateMode">Add new task</span>
                            <span v-else>Edit task</span>
                        </button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</template>

<style scoped></style>
