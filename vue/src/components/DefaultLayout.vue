<template>
    <div class="min-h-full">
        <Disclosure as="nav" class="bg-gray-800" v-slot="{ open }">
            <div class="mx-auto max-w-7xl px-4 sm:px-6 lg:px-8">
                <div class="flex h-16 items-center justify-between">
                    <div class="flex items-center">
                        <div class="hidden md:block">
                            <div class="ml-10 flex items-baseline space-x-4">
                                <router-link
                                    v-for="item in navigation"
                                    :key="item.name"
                                    :to="item.to"
                                    active-class="bg-gray-900 text-white"
                                    :class="[
                                        this.$route.name === item.to.name
                                            ? ''
                                            : 'text-gray-300 hover:bg-gray-700 hover:text-white',
                                        'px-3 py-2 rounded-md text-sm font-medium',
                                    ]"
                                    >{{ item.name }}
                                </router-link>
                            </div>
                        </div>
                    </div>
                    <div class="hidden md:block">
                        <div class="ml-4 flex items-center md:ml-6">
                            <!-- Profile dropdown -->
                            <Menu as="div" class="relative ml-3">
                                <div>
                                    <MenuButton
                                        class="flex max-w-xs items-center rounded-full bg-gray-800 text-sm focus:outline-none focus:ring-2 focus:ring-white focus:ring-offset-2 focus:ring-offset-gray-800"
                                    >
                                        <span class="sr-only"
                                            >Open user menu</span
                                        >
                                        <svg
                                            class="h-12 w-12"
                                            xmlns="http://www.w3.org/2000/svg"
                                            viewBox="0 0 24 24"
                                            fill="#FFFFFF"
                                            stroke="#000000"
                                        >
                                            <g id="a" />
                                            <g id="b" />
                                            <g id="c" />
                                            <g id="d" />
                                            <g id="e" />
                                            <g id="f" />
                                            <g id="g" />
                                            <g id="h" />
                                            <g id="i">
                                                <g>
                                                    <circle
                                                        cx="12"
                                                        cy="9"
                                                        r="2.25"
                                                    />
                                                    <path
                                                        fill="#FFFFFF"
                                                        stroke="#000000"
                                                        d="M12,14.75c-2.81,0-5.29,1.44-6.03,3.5l-.49,.97c1.73,1.56,4.01,2.52,6.52,2.52s4.77-.95,6.5-2.5l-.44-.93c-.77-2.13-3.25-3.57-6.06-3.57Z"
                                                    />
                                                    <path
                                                        fill="#FFFFFF"
                                                        stroke="#000000"
                                                        d="M12,2.25C6.62,2.25,2.25,6.62,2.25,12c0,2.3,.8,4.41,2.14,6.07l.21-.41c.92-2.56,3.98-4.41,7.41-4.41s6.49,1.85,7.44,4.5l.16,.34c1.34-1.67,2.15-3.78,2.15-6.09,0-5.38-4.37-9.75-9.75-9.75Zm0,10.5c-2.07,0-3.75-1.68-3.75-3.75s1.68-3.75,3.75-3.75,3.75,1.68,3.75,3.75-1.68,3.75-3.75,3.75Z"
                                                    />
                                                </g>
                                            </g>
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
                                    </MenuButton>
                                </div>
                                <transition
                                    enter-active-class="transition ease-out duration-100"
                                    enter-from-class="transform opacity-0 scale-95"
                                    enter-to-class="transform opacity-100 scale-100"
                                    leave-active-class="transition ease-in duration-75"
                                    leave-from-class="transform opacity-100 scale-100"
                                    leave-to-class="transform opacity-0 scale-95"
                                >
                                    <MenuItems
                                        class="absolute right-0 z-10 mt-2 w-48 origin-top-right rounded-md bg-white py-1 shadow-lg ring-1 ring-black ring-opacity-5 focus:outline-none"
                                    >
                                        <MenuItem v-slot="{ active }">
                                            <a
                                                @click="logout"
                                                :class="[
                                                    'block px-4 py-2 text-sm text-gray-700 cursor-pointer                                                   hover:#0095c7',
                                                ]"
                                            >
                                                Cerrar Sesión
                                            </a>
                                        </MenuItem>
                                    </MenuItems>
                                </transition>
                            </Menu>
                        </div>
                    </div>
                    <div class="-mr-2 flex md:hidden">
                        <!-- Mobile menu button -->
                        <DisclosureButton
                            class="inline-flex items-center justify-center rounded-md bg-gray-800 p-2 text-gray-400 hover:bg-gray-700 hover:text-white focus:outline-none focus:ring-2 focus:ring-white focus:ring-offset-2 focus:ring-offset-gray-800"
                        >
                            <span class="sr-only">Open main menu</span>
                            <Bars3Icon
                                v-if="!open"
                                class="block h-6 w-6"
                                aria-hidden="true"
                            />
                            <XMarkIcon
                                v-else
                                class="block h-6 w-6"
                                aria-hidden="true"
                            />
                        </DisclosureButton>
                    </div>
                </div>
            </div>

            <DisclosurePanel class="md:hidden">
                <div class="space-y-1 px-2 pt-2 pb-3 sm:px-3">
                    <router-link
                        v-for="item in navigation"
                        :key="item.name"
                        :to="item.to"
                        active-class="bg-gray-900 text-white"
                        :class="[
                            this.$route.name === item.to.name
                                ? ''
                                : 'text-gray-300 hover:bg-gray-700 hover:text-white',
                            'px-3 py-2 rounded-md text-sm font-medium',
                        ]"
                        >{{ item.name }}
                    </router-link>
                </div>
                <div class="border-t border-gray-700 pt-4 pb-3">
                    <div class="flex items-center px-5">
                        <div class="flex-shrink-0">
                            <svg
                                class="h-8 w-8"
                                xmlns="http://www.w3.org/2000/svg"
                                viewBox="0 0 24 24"
                                fill="#FFFFFF"
                                stroke="#000000"
                            >
                                <g id="a" />
                                <g id="b" />
                                <g id="c" />
                                <g id="d" />
                                <g id="e" />
                                <g id="f" />
                                <g id="g" />
                                <g id="h" />
                                <g id="i" />
                                <g id="j" />
                                <g id="k" />
                                <g id="l" />
                                <g id="m">
                                    <g>
                                        <circle cx="10.5" cy="8" r="1.75" />
                                        <path
                                            fill="#FFFFFF"
                                            stroke="#000000"
                                            d="M14,18.75c2.62,0,4.75-2.13,4.75-4.75V7c0-2.62-2.13-4.75-4.75-4.75H7c-2.62,0-4.75,2.13-4.75,4.75v7c0,2.62,2.13,4.75,4.75,4.75h7Zm-3.5-14c1.79,0,3.25,1.46,3.25,3.25s-1.46,3.25-3.25,3.25-3.25-1.46-3.25-3.25,1.46-3.25,3.25-3.25Zm-4.83,11.42c-.37-.19-.52-.64-.34-1.01l.45-.89c.47-.94,1.41-1.52,2.46-1.52h4.53c1.05,0,1.99,.58,2.46,1.52l.45,.89c.19,.37,.04,.82-.34,1.01-.11,.05-.22,.08-.33,.08-.28,0-.54-.15-.67-.41l-.45-.89c-.21-.43-.64-.69-1.12-.69h-4.53c-.48,0-.91,.26-1.12,.69l-.45,.89c-.19,.37-.63,.52-1.01,.34Z"
                                        />
                                        <path
                                            fill="#FFFFFF"
                                            stroke="#000000"
                                            d="M20.23,6.51c.01,.16,.02,.32,.02,.49v7c0,3.45-2.8,6.25-6.25,6.25H7c-.16,0-.33-.01-.49-.02,.88,.95,2.13,1.52,3.49,1.52h7c2.62,0,4.75-2.13,4.75-4.75v-7c0-1.36-.58-2.61-1.52-3.49Z"
                                        />
                                    </g>
                                </g>
                                <g id="n" />
                                <g id="o" />
                                <g id="p" />
                                <g id="q" />
                                <g id="r" />
                                <g id="s" />
                                <g id="t" />
                                <g id="u" />
                            </svg>
                        </div>
                        <div class="ml-3">
                            <div
                                class="text-base font-medium leading-none text-white"
                            >
                                {{ user.name }}
                            </div>
                            <div
                                class="text-sm font-medium leading-none text-gray-400"
                            >
                                {{ user.email }}
                            </div>
                            <div
                                class="text-sm font-medium leading-none text-gray-400"
                            >
                                {{ user.profile }}
                            </div>
                        </div>
                    </div>
                    <div class="mt-3 space-y-1 px-2">
                        <DisclosureButton
                            as="a"
                            @click="logout"
                            class="block rounded-md px-3 py-2 text-base font-medium text-gray-400 hover:text-white cursor-pointer"
                            >Cerrar sesión</DisclosureButton
                        >
                    </div>
                </div>
            </DisclosurePanel>
        </Disclosure>
        <router-view></router-view>
    </div>
</template>

<script>
import {
    Disclosure,
    DisclosureButton,
    DisclosurePanel,
    Menu,
    MenuButton,
    MenuItem,
    MenuItems,
} from "@headlessui/vue";
import { Bars3Icon, BellIcon, XMarkIcon } from "@heroicons/vue/24/outline";
import { useStore } from "vuex";
import { computed } from "vue";
import { useRouter } from "vue-router";
import { RouterLink } from "vue-router";

const navigation = [
    { name: "Dashboard", to: { name: "Dashboard" },current: false  },
    { name: "Chat", to: { name: "Chat" }, current: false },
    { name: "Configuration", to: { name: "Configuration" }, current: false },
];

export default {
    components: {
        Disclosure,
        DisclosureButton,
        DisclosurePanel,
        Menu,
        MenuButton,
        MenuItem,
        MenuItems,
        Bars3Icon,
        BellIcon,
        XMarkIcon,
        RouterLink,
    },
    setup() {
        const store = useStore();
        const router = useRouter();

        function logout() {
            store.dispatch("logout").then(() => {
                router.push({
                    name: "Login",
                });
            });
        }

        return {
            user: computed(() => store.state.user.data),
            navigation,
            logout,
        };
    },
};
</script>
<style></style>
