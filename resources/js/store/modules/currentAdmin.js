import axios from "axios";

const state = {
    admin: {}
};
const getters = {};
const actions = {
    getAdmin({ commit }) {
        axios.get("/api/v1/admin/current")
            .then(response => {
                commit('setAdmin', response.data);
            })
    },
    loginAdmin({ }, admin) {
        axios.post("/api/v1/admin/login", {
            email: admin.email,
            password: admin.password
        })
            .then(response => {
                if (response.data.access_token) {
                    //save token
                    localStorage.setItem("admin_token", response.data.access_token)
                    console.log(response.data);
                }
                window.location.replace("/admin");
            })
    },
    logoutAdmin() {
        localStorage.removeItem("admin_token");
        window.location.replace('/admin/login');
    }
};
const mutations = {
    setAdmin(state, data) {
        state.admin = data;
    }
};

export default {
    namespaced: true,
    state,
    getters,
    actions,
    mutations,
}