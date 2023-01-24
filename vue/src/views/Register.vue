<template>
    <div>
        <svg
            class="mx-auto h-15 w-auto"
            xmlns="http://www.w3.org/2000/svg"
            viewBox="0 0 24 24"
            x="0px"
            y="0px"
            width="120px"
            height="120px"
        >
            <g id="a" />
            <g id="b" />
            <g id="c" />
            <g id="d" />
            <g id="e" />
            <g id="f">
                <g>
                    <circle
                        fill="#FFFFFF"
                        stroke="#000000"
                        cx="10"
                        cy="7"
                        r="4.75"
                    />
                    <path
                        fill="#FFFFFF"
                        stroke="#000000"
                        d="M17,11.25c-2.62,0-4.75,2.13-4.75,4.75s2.13,4.75,4.75,4.75,4.75-2.13,4.75-4.75-2.13-4.75-4.75-4.75Zm2,5.5h-1.25v1.25c0,.41-.34,.75-.75,.75s-.75-.34-.75-.75v-1.25h-1.25c-.41,0-.75-.34-.75-.75s.34-.75,.75-.75h1.25v-1.25c0-.41,.34-.75,.75-.75s.75,.34,.75,.75v1.25h1.25c.41,0,.75,.34,.75,.75s-.34,.75-.75,.75Z"
                    />
                    <path
                        fill="#FFFFFF"
                        stroke="#000000"
                        d="M11.4,13.25h-3.3c-2.73,0-5.1,1.94-5.64,4.62l-.2,.98c-.04,.22,.01,.45,.16,.62s.36,.27,.58,.27H12.01c-.79-1.05-1.26-2.34-1.26-3.75,0-.99,.24-1.92,.65-2.75Z"
                    />
                </g>
            </g>
            <g id="g" />
            <g id="h" />
            <g id="i" />
            <g id="j" />
            <g id="k" />
            <g id="l" />
            <g id="m" />
            <g id="n" />
            <g id="o" />
            <g id="p" />
            <g id="q" />
            <g id="r" />
            <g id="s" />
            <g id="t" />
            <g id="u" />
        </svg>
        <h2 class="mt-6 text-center text-3xl font-extrabold text-white">
            Crear nuevo usuario
        </h2>
    </div>
    <form class="mt-8 space-y-6" @submit="register">
        <Alert v-if="errorMsg">
            {{ errorMsg }}
            <span
                @click="errorMsg = ''"
                class="w-8 h-8 flex items-center justify-center rounded-full transition-colors cursor-pointer"
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
        <div class="-space-y-px rounded-md shadow-sm">
            <div>
                <label for="full-name" class="sr-only">Nombre completo</label>
                <input
                    id="email-address"
                    name="full-name"
                    type="text"
                    required=""
                    class="relative block w-full appearance-none rounded-none rounded-t-md border border-gray-300 px-3 py-2 text-gray-900 placeholder-gray-500 focus:z-10 focus:border-indigo-500 focus:outline-none focus:ring-indigo-500 sm:text-sm"
                    placeholder="Nombre completo"
                    v-model="user.name"
                />
            </div>
        </div>
        <div class="-space-y-px rounded-md shadow-sm">
            <label for="profile" class="sr-only"
                >Seleccione el tipo de usuario</label
            >
            <select
                id="profile"
                v-model="user.profile"
                class="relative block w-full rounded-none rounded-t-md border border-gray-300 px-3 py-2 text-gray-900 placeholder-gray-500 focus:z-10 focus:border-indigo-500 focus:outline-none focus:ring-indigo-500 sm:text-sm"
            >
                <option selected disabled value="">Seleccione el tipo de usuario</option>
                <option value="Agente">Agente</option>
                <option value="Supervisor">Supervisor</option>
            </select>
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
document.body.style.backgroundImage = "url(/src/assets/background.jpg)";
const router = useRouter();

const user = {
    name: "",
    email: "",
    password: "",
    profile: "",
    status: false,
};
const loading = ref(false);
const errorMsg = ref("");
function register(ev) {
    ev.preventDefault();
    loading.value = true;
    store
        .dispatch("register", user)
        .then(() => {
            loading.value = false;
            if (user.profile == "Agente") {
                router.push({
                    name: "Login",
                });
            } else {
                router.push({
                    name: "Reports",
                });
            }
        })
        .catch((e) => {
            errorMsg.value = "Este usuario ya existe";
            loading.value = false;
        });
       
}
</script>
