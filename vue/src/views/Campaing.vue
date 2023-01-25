<template>
    <div>
        <h2
            class="mt-6 text-center text-3xl font-bold tracking-tight text-white"
        >
            Crear Campaña
        </h2>
    </div>

    <form class="mt-8 space-y-6" @submit="createCampaing">
        <Alert v-if="errorMsg">
            {{ errorMsg }}
            <span
                @click="errorMsg = ''"
                class="w-8 h-8 flex items-center justify-center rounded-full transition-colors cursor-pointer"
            >
                <svg
                    xmlns="http://www.w3.org/2000/svg"
                    class="h-10 w-10"
                    fill="none"
                    viewBox="0 0 24 24"
                    stroke="currentColor"
                >
                    <path
                        stroke-linecap="round"
                        stroke-linejoin="round"
                        stroke-width="2"
                        d="M6 18L18 6M6 6l12 12"
                    />
                </svg>
            </span>
        </Alert>
        <div class="-space-y-px rounded-md shadow-sm">
            <div>
                <label for="campaing-name" class="sr-only"
                    >Nombre De la campaña</label
                >
                <input
                    id="campaing-name"
                    name="campaing-name"
                    type="text"
                    required=""
                    class="relative block w-full appearance-none rounded-none rounded-t-md border border-gray-300 px-3 py-2 text-gray-900 placeholder-gray-500 focus:z-10 focus:border-indigo-500 focus:outline-none focus:ring-indigo-500 sm:text-sm"
                    placeholder="Nombre de la Campaña"
                    v-model="campaing.name"
                />
            </div>
        </div>
        <div>
            <button
                :disabled="loading"
                type="submit"
                class="group relative flex w-full justify-center rounded-md border border-transparent py-2 px-4 text-sm font-medium text-white focus:outline-none focus:ring-2 focus:ring-offset-2"
                :class="{
                    'cursor-not-allowed': loading,
                }"
            >
                <svg
                    v-if="loading"
                    class="animate-spin -ml-1 mr-3 h-5 w-5 text-white"
                    xmlns="http://www.w3.org/2000/svg"
                    fill="none"
                    viewBox="0 0 24 24"
                >
                    <circle
                        class="opacity-25"
                        cx="12"
                        cy="12"
                        r="10"
                        stroke="currentColor"
                        stroke-width="4"
                    ></circle>
                    <path
                        class="opacity-75"
                        fill="currentColor"
                        d="M4 12a8 8 0 018-8V0C5.373 0 0 5.373 0 12h4zm2 5.291A7.962 7.962 0 014 12H0c0 3.042 1.135 5.824 3 7.938l3-2.647z"
                    ></path>
                </svg>
                Crear
            </button>
        </div>
    </form>
</template>

<script setup>
import store from "../store";
import { useRouter } from "vue-router";
import { ref } from "vue";
import Alert from "../components/Alert.vue";
import { inject } from "vue";
const swal = inject("$swal");
document.body.style.backgroundImage = "url(/src/assets/background.jpg)";
const campaing = {
    name: "",
    status: "",
};
const loading = ref(false);
const errorMsg = ref("");
const router = useRouter();

function createCampaing(ev) {
    ev.preventDefault();
    loading.value = true;
    store
        .dispatch("createCampaing", campaing)
        .then(() => {
            loading.value = false;
            swal.fire({
                icon: "success",
                title: "Campaña creada con exito",
                showConfirmButton: false,
                timer: 1500,
            });
            router.push({
                name: "Login",
            });
        })
        .catch(($e) => {
            errorMsg.value = "Esta campaña ya existe";
            loading.value = false;
        });
}
</script>
