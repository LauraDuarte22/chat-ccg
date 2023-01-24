<template>
    <div >
        <svg
            class="mx-auto h-15 w-auto"
            version="1.0"
            id="Layer_1"
            xmlns="http://www.w3.org/2000/svg"
            xmlns:xlink="http://www.w3.org/1999/xlink"
            x="0px"
            y="0px"
            width="100px"
            height="100px"
            viewBox="0 0 100 100"
            enable-background="new 0 0 100 100"
            xml:space="preserve"
        >
            <path
                fill="#FFFFFF"
                stroke="#000000"
                stroke-width="2"
                stroke-linecap="round"
                stroke-linejoin="round"
                stroke-miterlimit="10"
                d="
	M45,10c-19.331,0-35,11.754-35,26.25c0,8.347,5.192,15.771,13.281,20.58c-1.768,5.266-4.708,10.229-8.907,14.422
	c8.299,0,15.685-3.861,20.494-9.869c3.208,0.726,6.608,1.121,10.132,1.121c19.33,0,35-11.754,35-26.254C80,21.754,64.33,10,45,10z
	 M27.5,41.25c-2.762,0-5-2.237-5-5c0-2.762,2.238-5,5-5c2.763,0,5,2.238,5,5C32.5,39.013,30.263,41.25,27.5,41.25z M45,41.25
	c-2.762,0-5.001-2.237-5.001-5c0-2.762,2.239-5,5.001-5c2.763,0,5,2.238,5,5C50,39.013,47.763,41.25,45,41.25z M62.5,41.25
	c-2.765,0-5.002-2.237-5.002-5c0-2.762,2.237-5,5.002-5c2.762,0,4.999,2.238,4.999,5C67.499,39.013,65.262,41.25,62.5,41.25z"
            />
            <circle
                fill="#FFFFFF"
                stroke="#000000"
                stroke-width="2"
                stroke-linecap="round"
                stroke-linejoin="round"
                stroke-miterlimit="10"
                cx="27.5"
                cy="36.25"
                r="5"
            />
            <circle
                fill="#FFFFFF"
                stroke="#000000"
                stroke-width="2"
                stroke-linecap="round"
                stroke-linejoin="round"
                stroke-miterlimit="10"
                cx="44.999"
                cy="36.25"
                r="5.001"
            />
            <path
                fill="#FFFFFF"
                stroke="#000000"
                stroke-width="2"
                stroke-linecap="round"
                stroke-linejoin="round"
                stroke-miterlimit="10"
                d="
	M67.499,36.25c0,2.763-2.237,5-4.999,5c-2.765,0-5.002-2.237-5.002-5c0-2.762,2.237-5,5.002-5
	C65.262,31.25,67.499,33.488,67.499,36.25z"
            />
            <path
                fill="#FFFFFF"
                stroke="#000000"
                stroke-width="2"
                stroke-linecap="round"
                stroke-linejoin="round"
                stroke-miterlimit="10"
                d="
	M82.848,61.249H55.671H82.848z"
            />
            <path
                fill="#FFFFFF"
                stroke="#3094c5"
                stroke-width="2"
                stroke-linecap="round"
                stroke-linejoin="round"
                stroke-miterlimit="10"
                d="
	M82.848,68.749H47.153H82.848z"
            />
            <path
                fill="#FFFFFF"
                stroke="#000000"
                stroke-width="2"
                stroke-linecap="round"
                stroke-linejoin="round"
                stroke-miterlimit="10"
                d="
	M72.983,76.249H57.017H72.983z"
            />
            <path
                fill="#FFFFFF"
                stroke="#000000"
                stroke-width="2"
                stroke-linecap="round"
                stroke-linejoin="round"
                stroke-miterlimit="10"
                d="
	M90,65.001c0-7.357-5.662-13.702-13.877-16.777C70.315,56.696,58.573,62.501,45,62.501c-1.598,0-3.158-0.107-4.7-0.263
	c-0.18,0.904-0.302,1.818-0.302,2.763c0,10.355,11.193,18.751,25.001,18.751c2.517,0,4.945-0.286,7.237-0.802
	C75.672,87.241,80.948,90,86.876,90c-2.999-2.992-5.099-6.54-6.365-10.302C86.29,76.265,90,70.961,90,65.001z"
            />
        </svg>

        <h2 class="mt-6 text-center text-3xl font-extrabold text-white">
            Chat multiagente
        </h2>
    </div>
    <form class="mt-8 space-y-6" @submit="login">
        <Alert v-if="errorMsg">
            {{ errorMsg }}
            <span
                @click="errorMsg = ''"
                class="w-8 h-8 flex items-center justify-center rounded-full transition-colors cursor-pointer hover:bg-[rgba(0,0,0,0.2)]"
            >
                <svg
                    xmlns="http://www.w3.org/2000/svg"
                    class="h-6 w-6"
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
        <input type="hidden" name="remember" value="true" />
        <div class="rounded-md shadow-sm -space-y-px">

            <div>
                <label for="email-address" class="sr-only">Email address</label>
                <input
                    id="email-address"
                    name="email"
                    type="email"
                    autocomplete="email"
                    required=""
                    v-model="user.email"
                    class="appearance-none rounded-none relative block w-full px-3 py-2 border border-gray-300 placeholder-gray-500 text-gray-900 rounded-t-md focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 focus:z-10 sm:text-sm"
                    placeholder="Correo"
                />
            </div>
            <div>
                <label for="password" class="sr-only">Password</label>
                <input
                    id="password"
                    name="password"
                    type="password"
                    autocomplete="current-password"
                    required=""
                    v-model="user.password"
                    class="appearance-none rounded-none relative block w-full px-3 py-2 border border-gray-300 placeholder-gray-500 text-gray-900 rounded-b-md focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 focus:z-10 sm:text-sm"
                    placeholder="Contraseña"
                />
            </div>
        </div>

        <div class="flex items-center justify-between">
            <div class="flex items-center">
                <input
                    id="remember-me"
                    name="remember-me"
                    type="checkbox"
                    v-model="user.remember"
                    class="h-4 w-4 text-indigo-600 focus:ring-indigo-500 border-gray-300 rounded"
                />
                <label
                    for="remember-me"
                    class="ml-2 block text-sm text-gray-900"
                >
                    Recordar
                </label>
            </div>
        </div>

        <div>
            <button
                type="submit"
                :disabled="loading"
                class="group relative w-full flex justify-center py-2 px-4 border border-transparent text-sm font-medium rounded-md text-white bg-indigo-600 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500"
                :class="{
                    'cursor-not-allowed': loading,
                }"
            >
                <span class="absolute left-0 inset-y-0 flex items-center pl-3">
                    <LockClosedIcon class="h-5 w-5" aria-hidden="true" />
                </span>
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
                Ingresar
            </button>
        </div>
    </form>
</template>

<script setup>
import { LockClosedIcon } from "@heroicons/vue/20/solid";
import store from "../store";
import { useRouter } from "vue-router";
import { ref } from "vue";
import Alert from "../components/Alert.vue";

const router = useRouter();
document.body.style.backgroundImage = "url(/src/assets/background.jpg)";

const user = {
    email: "",
    password: "",
    profile: "",
};
let loading = ref(false);
let errorMsg = ref("");

function login(ev) {
    ev.preventDefault();
    loading.value = true;
    store
        .dispatch("login", user)
        .then(() => {
            loading.value = true;
            if (user.profile == "Agente") {
                router.push({
                    name: "Dashboard",
                });
            } else {
                router.push({
                    name: "Reports",
                });
            }
        })
        .catch((err) => {
            errorMsg.value = "Credenciales erróneas";
            loading.value = false;
        });
}
</script>
