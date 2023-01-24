<template>
    <PageComponent title="Dashboard">
        <div
            class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-5 text-gray-700"
        >
            <div
                class="bg-primary shadow-md p-3 text-center flex flex-col animate-fade-in-down order-1 lg:order-2"
                style="animation-delay: 0.1s"
            >
                <h3 class="text-2xl font-semibold">Total Agentes</h3>
                <div
                    class="text-8xl pb-4 font-semibold flex-1 flex items-center justify-center"
                >
                    {{ data.totalAgents }}
                </div>
            </div>
            <div
                class="bg-white shadow-md p-3 text-center flex flex-col animate-fade-in-down order-1 lg:order-2"
                style="animation-delay: 0.1s"
            >
                <h3 class="text-2xl font-semibold">Agentes Conectados</h3>
                <div
                    class="text-8xl pb-4 font-semibold flex-1 flex items-center justify-center"
                >
                    {{ data.totalAgents }}
                </div>
            </div>
            <div
                class="bg-white shadow-md p-3 text-center flex flex-col animate-fade-in-down order-1 lg:order-2"
                style="animation-delay: 0.1s"
            >
                <h3 class="text-2xl font-semibold">Agentes Deconectados</h3>
                <div
                    class="text-8xl pb-4 font-semibold flex-1 flex items-center justify-center"
                >
                    {{ data.totalAgents }}
                </div>
            </div>
            <div
                class="bg-white shadow-md p-3 text-center flex flex-col animate-fade-in-down order-1 lg:order-2"
                style="animation-delay: 0.1s"
            >
                <h3 class="text-2xl font-semibold">Total Chats</h3>
                <div
                    class="text-8xl pb-4 font-semibold flex-1 flex items-center justify-center"
                >
                    {{ data.totalAgents }}
                </div>
            </div>
            <div
                class="bg-white shadow-md p-3 text-center flex flex-col animate-fade-in-down order-1 lg:order-2"
                style="animation-delay: 0.1s"
            >
                <h3 class="text-2xl font-semibold">Chats Asignados</h3>
                <div
                    class="text-8xl pb-4 font-semibold flex-1 flex items-center justify-center"
                >
                    {{ data.totalAgents }}
                </div>
            </div>
            <div
                class="bg-white shadow-md p-3 text-center flex flex-col animate-fade-in-down order-1 lg:order-2"
                style="animation-delay: 0.1s"
            >
                <h3 class="text-2xl font-semibold">Chats finalizados</h3>
                <div
                    class="text-8xl pb-4 font-semibold flex-1 flex items-center justify-center"
                >
                    {{ data.totalAgents }}
                </div>
            </div>
        </div>
    </PageComponent>
</template>
<script setup>
import PageComponent from "../components/PageComponent.vue";
import { computed } from "vue";
import { useStore } from "vuex";

const store = useStore();

const loading = computed(() => store.state.dashboard.loading);
const data = computed(() => store.state.dashboard.data);

store.dispatch("getDashboardData");
</script>
<style scoped>

</style>
