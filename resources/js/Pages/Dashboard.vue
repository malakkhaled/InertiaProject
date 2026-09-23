<script setup>
import GlobaLLayout from "@/Layouts/GlobaLLayout.vue";
import { Head } from "@inertiajs/vue3";
import CardComponent from "@/Components/GlobalComponents/CardComponent.vue";
import FilterComponent from "@/Components/GlobalComponents/FilterComponent.vue";

defineProps({
    tasks: {
        type: Array,
        required: true,
    },
    type:{
        type:String,
        required: true,
    }
});
</script>

<template>
    <div>
        <Head title="Dashboard" />

        <GlobaLLayout>
            <!-- Filter Component -->
            <div class="px-4 py-6">
                <FilterComponent :type="type"></FilterComponent>
            </div>

            <!--Card Components-->

            <CardComponent :tasks="tasks"></CardComponent>
        </GlobaLLayout>
    </div>
</template>
