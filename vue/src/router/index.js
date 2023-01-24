import { createRouter, createWebHistory } from "vue-router";
import Login from "../views/Login.vue";
import Register from "../views/Register.vue";
import Dashboard from "../views/Dashboard.vue";
import Reports from "../views/Reports.vue";
import Campaing from "../views/Campaing.vue";
import AuthLayout from "../components/AuthLayout.vue";
import DefaultLayout from "../components/DefaultLayout.vue";
import store from "../store";


const routes = [
    {
        path: "/dashboard",
        component: DefaultLayout,
        meta: {
            requiresAuth: true,
        },
        beforeEnter: auth,
        children: [
            { path: "/dashboard", name: "Dashboard", component: Dashboard },
            { path: "/reports", name: "Reports", component: Reports },
        ],
    },
 

    {
        path: "/auth",
        redirect: "/login",
        name: "Auth",
        component: AuthLayout,
        meta: { 
            isGuest: true,
            image: '../assets/background.jpg'
         },
        children: [
            {
                path: "/",
                name: "Login",
                component: Login,
            },
            {
                path: "/register",
                name: "Register",
                component: Register,
            },
            {
                path: "/campaing",
                name: "Campaing",
                component: Campaing,
            },
        ],
    },
];
const router = createRouter({
    history: createWebHistory(),
    routes,
});

router.beforeEach((to, from, next) => {
    if (to.meta.requiresAuth && !store.state.user.token) {
        next({ name: "Login" });
    } else if (store.state.user.token && to.meta.isGuest) {
        next({ name: "Dashboard" });
    } else {
        next();
    }
});
function auth(to, from, next) {
    if (store.state.user.data.type == "Agente") {
        alert('Sin autorización')
        next({name:'/'})
    } else {
        console.log("sigue")
        next();
    }
}

export default router;
