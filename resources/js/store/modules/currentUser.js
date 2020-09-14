import myapi from "../../myapi";

const state = {
    user: {},
    errors: {}
};
const getters = {};
const actions = {
    getUser({ commit }) {
        myapi.get("/user/current")
            .then(response => {
                commit('setUser', response.data);
            })
    },
    loginUser({ commit }, user) {
        myapi.post("/user/login", {
            email: user.email,
            password: user.password
        })
            .then(response => {
                if (response.data.access_token) {
                    //save token
                    localStorage.setItem("user_token", response.data.access_token)
                    console.log(response.data);
                    window.location.replace("/app");
                } else {
                    commit('setError', response.data.errors);
                }
            })
    },
    registerUser({ commit }, user) {
        myapi.post("/user/register", {
            IM_no: user.IM_no,
            name: user.name,
            dob: user.dob,
            phone: user.phone,
            email: user.email,
            password: user.password,
            password_confirmation: user.password_confirmation,
            gender: user.gender,
            designation: user.designation,
            classification: user.classification,
            company: user.company,
            blood_group: user.blood_group,
        })
            .then(response => {
                if (response.data.access_token) {
                    //save token
                    localStorage.setItem("user_token", response.data.access_token)
                    console.log(response.data);
                    window.location.replace("/app");
                }
                else {
                    commit('setError', response.data.errors);
                }
                // console.log(response.data.errors);
            })
            .catch(error => {
                console.log(error);
            })
    },
    logoutUser() {
        localStorage.removeItem("user_token");
        window.location.replace('/login');
    },
    getUsers() {
        myapi.get("/user/all");
    }
};
const mutations = {
    setUser(state, data) {
        state.user = data;
    },
    setError(state, data) {
        state.errors = data;
    }
};

export default {
    namespaced: true,
    state,
    getters,
    actions,
    mutations,
}