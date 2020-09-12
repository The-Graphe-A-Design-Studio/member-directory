import axios from "axios";

const state = {
    user: {}
};
const getters = {};
const actions = {
    getUser({ commit }) {
        axios.get("/api/v1/user/current")
            .then(response => {
                commit('setUser', response.data);
            })
    },
    loginUser({ }, user) {
        axios.post("/api/v1/user/login", {
            email: user.email,
            password: user.password
        })
            .then(response => {
                if (response.data.access_token) {
                    //save token
                    localStorage.setItem("user_token", response.data.access_token)
                    console.log(response.data);
                }
                window.location.replace("/app");
            })
    },
    logoutUser() {
        localStorage.removeItem("user_token");
        window.location.replace('/login');
    },
    getUsers() {
        axios.get("/api/v1/user/all");
    }
};
const mutations = {
    setUser(state, data) {
        state.user = data;
    }
};

export default {
    namespaced: true,
    state,
    getters,
    actions,
    mutations,
}