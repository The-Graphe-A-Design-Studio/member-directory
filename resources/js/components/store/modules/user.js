import axios from "axios";

const state = {
    users: {}
};
const getters = {};
const actions = {
    // getList({ commit }, pageNumber) {
    //     axios.get("/user/all?page=" + pageNumber)
    //         .then(response => {
    //             commit('setUsers', response.data);
    //         })
    // },
    getList({ commit }) {
        axios.get("/user/all")
            .then(response => {
                commit('setUsers', response.data);
            })
    },
    // searchList({ commit }, term, pageNumber) {
    //     axios.post("/user/search?page=" + pageNumber, term)
    //         .then(response => {
    //             commit('setUsers', response.data);
    //         })
    // },
    searchList({ commit }, term) {
        axios.get("/user/search?term=" + term)
            .then(response => {
                commit('setUsers', response.data);
            })
    }
};
const mutations = {
    setUsers(state, data) {
        state.users = data;
    },
    setCurrentPage(state, data) {
        state.users.current_page = data;
    }
};

export default {
    namespaced: true,
    state,
    getters,
    actions,
    mutations,
}