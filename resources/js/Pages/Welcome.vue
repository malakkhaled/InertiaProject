<script setup>
import GlobaLLayout from "@/Layouts/GlobaLLayout.vue";
import SliderComponent from "@/Components/WelcomeComponents/SliderComponent.vue";
import InfoComponent from "@/Components/WelcomeComponents/InfoComponent.vue";
import ExampleCardComponent from "@/Components/GlobalComponents/ExampleCardComponent.vue";
</script>

<template>
    <div>
        <Head title="Welcome" />

        <GlobaLLayout>
            <!-- Slider Component -->
            <SliderComponent />

            <!-- Information Section -->
            <InfoComponent />
            <!-- Example Card Component -->
            <div>
                <h1 class="text-center font-bold text-xl py-4 font-sans">Example of Your Tasks</h1>
                <div
                    class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-4 my-5"
                >
                    <ExampleCardComponent />
                    <ExampleCardComponent />
                    <ExampleCardComponent />
                </div>
            </div>
        </GlobaLLayout>
    </div>
</template>
