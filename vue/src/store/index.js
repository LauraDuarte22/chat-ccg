import { createStore } from "vuex";
import axiosClient from "../axios";


const store = createStore({
    state: {
        user: {
            data:  JSON.parse(sessionStorage.getItem('USER')),
            token: sessionStorage.getItem("TOKEN"),
        },
        campaing: {
            loading: false,
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
            user.email = fullName.toLowerCase() + "@" +user.campaing;
            user.password = fullName.toLowerCase()+'.' + user.campaing;
            return axiosClient.post("/register", user).then(({ data }) => {
                commit("setUser", data);
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
        getCampaing({commit}){
            commit("getCampaingLoading", true);
            commit("getDashboardLoading", true);
            return axiosClient
                .get("/getCampaing")
                .then((res) => {
                    commit("getCampaingLoading", false);
                    commit("setCampaingLoading", res.data);
                    return res.data;
                })
                .catch((e) => {
                    commit("getCampaingLoading", false);
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
        sendMessage({ commit },chat){
          
            return axiosClient
                .post("/send-message", chat)
                .then(({ data }) => {
                    commit("setChat", data);
                    return data;
                });
        }
 
      
    },
    mutations: {
        logout: (state) => {
            state.user.data = {};
            state.user.token = null;
            sessionStorage.removeItem('USER');
            sessionStorage.removeItem("TOKEN");
        },
        setUser: (state, userData) => {
            state.user.data = userData.user;
            state.user.token = userData.token;
            sessionStorage.setItem('USER', JSON.stringify(userData.user)),
            sessionStorage.setItem("TOKEN", userData.token);
        },
        setCampaing(state, newCampaing) {
            state.campaing.data = newCampaing.campaing;
            state.user.data = newCampaing.user;
        },
        setChat(state,userChat){
            state.chat.data = chat.userChat;
        },
        setCampaingLoading:(state,data)=>{
            state.campaing.data = data;
        },
        getCampaingLoading:(state,loading)=>{
            state.campaing.loading = loading
        },
        getDashboardLoading: (state, loading) => {
            state.dashboard.loading = loading;
        },
        setDashboardLoading: (state, data) => {
            state.dashboard.data = data;
        }
     
    },
    modules: {},
});

export default store;
