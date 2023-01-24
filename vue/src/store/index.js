import axios from "axios";
import { createStore } from "vuex";
import axiosClient from "../axios";
const store = createStore({
    state: {
        user: {
            data: {},
            token: sessionStorage.getItem("TOKEN"),
        },
        campaing: {
            data: {},
        },
        dashboard: {
            loading: false,
            data: {},
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
            return axiosClient.post("/logout").then((response) => {
                commit("logout");
                return response;
            });
        },
        getDashboardData({ commit }) {
            commit("getDashboardLoading", true);
            return axiosClient
                .get("/dashboard")
                .then((res) => {
                    commit("getDashboardLoading", false);
                    commit("setDashboardLoading", res.data);
                })
                .catch((e) => {
                    commit("getDashboardLoading", false);
                    return e;
                });
        },
        createCampaing({ commit }, campaing) {
            return axiosClient
                .post("/createCampaing", campaing)
                .then(({ data }) => {
                    commit("setCampaing", data);
                    return data;
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
        setCampaing(state, newCampaing) {
            state.campaing.data = newCampaing.campaing;
            state.user.data = newCampaing.user;

        },
        getDashboardLoading: (state, loading) => {
            state.dashboard.loading = loading;
        },
        setDashboardLoading: (state, data) => {
            state.dashboard.data = data;
        },
    },
    modules: {},
});

export default store;
