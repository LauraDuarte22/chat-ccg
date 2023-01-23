import axios from "axios";
import { createStore } from "vuex";
import axiosClient from "../axios";
const store = createStore({
    state: {
        user: {
            data: {},
            token: sessionStorage.getItem("TOKEN"),
        },
    },
    getters: {},
    actions: {
        register({ commit }, user) {
            const fullName = user.name.replace(/\s/g, ".");
            user.email = fullName.toLowerCase() + "@ccgltda.com";
            user.password = fullName.toLowerCase() + "ccgltda";
            return axiosClient.post("/register", user).then(({ data }) => {
                commit("setUser", data);
                return data.user;
            });
        },
        login({ commit }, user) {
            return axiosClient.post("/login", user).then(({ data }) => {
                commit("setUser", data);
                return data.user;
            });
        },
        logout({ commit }) {
            return axiosClient.post("/logout")
            .then((response) => {
                commit("logout");
                return response;
            });
        },
    },
    mutations: {
        logout: (state) => {
            state.user.data = {};
            state.user.token = null;
            sessionStorage.removeItem("TOKEN");
        },
        setUser: (state, userData) => {
            state.user.data = userData.user;
            state.user.token = userData.token;
            sessionStorage.setItem("TOKEN", userData.token);
        },
    },
    modules: {},
});

export default store;
