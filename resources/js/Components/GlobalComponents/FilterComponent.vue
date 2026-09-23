<script setup>
import { router } from "@inertiajs/vue3";
import { ref ,watch} from "vue";
import { usePage } from "@inertiajs/vue3";
const props = defineProps({ type: String });
const selectedFilter = ref(props?.type || "all");
const page = usePage();
const filterTasks = (type) => {

    router.get(
        "/dashboard",
        {
            filter: type, // ترسل نوع الفلتر (مثلاً: done, not_done, important...)
        },
        {
            preserveScroll: true,
            preserveState: true,
        },
    );
};
// 

</script>

<template>
    <div>
        <h3 class="mb-4 font-semibold text-gray-900 font-sans text-lg">
            Filter Section
        </h3>
        <ul
            class="items-center w-full text-sm font-medium text-gray-900 bg-white border border-gray-200 rounded-lg sm:flex dark:bg-gray-700 dark:border-gray-600 dark:text-white"
        >
            <li class="w-full dark:border-gray-600">
                <div class="flex items-center ps-3">
                    <input
                        id="horizontal-list-radio-passport"
                        value="all"
                        @change="filterTasks('all')"
                        v-model="selectedFilter"
                        type="radio"
                        name="list-radio"
                        class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-700 dark:focus:ring-offset-gray-700 focus:ring-2 dark:bg-gray-600 dark:border-gray-500"
                    />
                    <label
                        for="horizontal-list-radio-passport"
                        class="w-full py-3 ms-2 text-sm font-medium text-gray-900 dark:text-gray-300"
                        >All Tasks</label
                    >
                </div>
            </li>
            <li
                class="w-full border-b border-gray-200 sm:border-b-0 sm:border-r dark:border-gray-600"
            >
                <div class="flex items-center ps-3">
                    <input
                        v-model="selectedFilter"
                        value="notDone"
                        @change="filterTasks('notDone')"
                        id="horizontal-list-radio-license"
                        type="radio"
                        name="list-radio"
                        class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-700 dark:focus:ring-offset-gray-700 focus:ring-2 dark:bg-gray-600 dark:border-gray-500"
                    />
                    <label
                        for="horizontal-list-radio-license"
                        class="w-full py-3 ms-2 text-sm font-medium text-gray-900 dark:text-gray-300"
                        >Tasks Not Done
                    </label>
                </div>
            </li>
            <li
                class="w-full border-b border-gray-200 sm:border-b-0 sm:border-r dark:border-gray-600"
            >
                <div class="flex items-center ps-3">
                    <input
                        v-model="selectedFilter"
                        value="done"
                        @change="filterTasks('done')"
                        id="horizontal-list-radio-id"
                        type="radio"
                        name="list-radio"
                        class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-700 dark:focus:ring-offset-gray-700 focus:ring-2 dark:bg-gray-600 dark:border-gray-500"
                    />
                    <label
                        for="horizontal-list-radio-id"
                        class="w-full py-3 ms-2 text-sm font-medium text-gray-900 dark:text-gray-300"
                        >Tasks Done</label
                    >
                </div>
            </li>
            <li
                class="w-full border-b border-gray-200 sm:border-b-0 sm:border-r dark:border-gray-600"
            >
                <div class="flex items-center ps-3">
                    <input
                        value="very"
                        v-model="selectedFilter"
                        id="horizontal-list-radio-military"
                        type="radio"
                        @change="filterTasks('very')"
                        name="list-radio"
                        class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-700 dark:focus:ring-offset-gray-700 focus:ring-2 dark:bg-gray-600 dark:border-gray-500"
                    />
                    <label
                        for="horizontal-list-radio-military"
                        class="w-full py-3 ms-2 text-sm font-medium text-gray-900 dark:text-gray-300"
                        >Tasks Important</label
                    >
                </div>
            </li>
            <li class="w-full dark:border-gray-600">
                <div class="flex items-center ps-3">
                    <input
                        value="less"
                        v-model="selectedFilter"
                        id="horizontal-list-radio-passport"
                        type="radio"
                        @change="filterTasks('less')"
                        name="list-radio"
                        class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-700 dark:focus:ring-offset-gray-700 focus:ring-2 dark:bg-gray-600 dark:border-gray-500"
                    />
                    <label
                        for="horizontal-list-radio-passport"
                        class="w-full py-3 ms-2 text-sm font-medium text-gray-900 dark:text-gray-300"
                        >Tasks Not Important</label
                    >
                </div>
            </li>
            <li class="w-full dark:border-gray-600">
                <div class="flex items-center ps-3">
                    <input
                        value="today"
                        v-model="selectedFilter"
                        id="horizontal-list-radio-passport"
                        type="radio"
                        @change="filterTasks('today')"
                        name="list-radio"
                        class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-700 dark:focus:ring-offset-gray-700 focus:ring-2 dark:bg-gray-600 dark:border-gray-500"
                    />
                    <label
                        for="horizontal-list-radio-passport"
                        class="w-full py-3 ms-2 text-sm font-medium text-gray-900 dark:text-gray-300"
                        >Tasks For Today</label
                    >
                </div>
            </li>
        </ul>
    </div>
</template>

<style scoped></style>
