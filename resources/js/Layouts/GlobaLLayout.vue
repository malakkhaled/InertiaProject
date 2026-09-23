<script setup>
import NavbarComponent from "@/Components/GlobalComponents/NavbarComponent.vue";
import FooterComponents from "@/Components/GlobalComponents/FooterComponents.vue";
import TimeComponent from "@/Components/GlobalComponents/TimeComponent.vue";
import SpeedDialComponent from "@/Components/GlobalComponents/SpeedDial.Component.vue";
import ModalComponent from "@/Components/GlobalComponents/ModalComponent.vue";
import { computed, onMounted } from "vue";
import { usePage } from "@inertiajs/vue3";
import { initFlowbite } from "flowbite";
import { useToast } from "@/Composables/useToast.js";
import { useProvide } from "@/Composables/useProvide.js";

onMounted(() => {
    initFlowbite();
});

const page = usePage();
const isWelcomePage = computed(() => {
    return page.url === "/";
}); 

useToast();
useProvide();
</script>

<template>
    <div>
        <div class="min-h-screen flex flex-col">
            <ModalComponent ></ModalComponent>
            <!-- Navigation -->
            <NavbarComponent
                
            ></NavbarComponent>
            <!-- Time Component -->
            <TimeComponent></TimeComponent>
            <!-- Speed Dial Component -->
            <SpeedDialComponent
                
            ></SpeedDialComponent>

            <!-- Page Content -->
            <main class="flex-grow">
                <slot />
            </main>

            <!--Footer section-->
            <FooterComponents
                v-if="$page.props.auth.user || isWelcomePage"
            ></FooterComponents>
        </div>
    </div>
</template>
