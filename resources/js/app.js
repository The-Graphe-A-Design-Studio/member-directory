require('./bootstrap');
<<<<<<< HEAD
window.Vue = require('vue');

import VueRouter from 'vue-router'
Vue.use(VueRouter)

Vue.config.productionTip = false;

// Vue.component('navigation-bar', require('./components/Navbar.vue').default);
// Vue.component('articles', require('./components/Articles.vue').default);
// Vue.component('mainapp', require('./App.vue').default)

import routes from './routes'
const router = new VueRouter({
    mode: 'history',
    // hashbang: false,
    // hash: false,
    // history: true,
    // linkActiveClass: 'active',
    routes,
});

import App from './App.vue'
new Vue({
    // el: '#app',
    router,
    render: h => h(App),
}).$mount('#app');
=======

window.Vue = require('vue');

import 'material-design-icons-iconfont/dist/material-design-icons.css';
import Vuetify from '../plugins/vuetify';
import axios from "axios";

axios.defaults.baseURL = "https://developers.thegraphe.com/member-directory/api/v1"

// Vue.config.productionTip = false;

import store from './store';
import router from './routes';

Vue.component('error-list', require('./components/errors/ErrorList.vue').default);
Vue.component('login-form', require('./components/LoginForm.vue').default);
Vue.component('register-form', require('./components/RegisterForm.vue').default);
Vue.component('admin-login-form', require('./components/AdminLoginForm.vue').default);
Vue.component('app-layout', require('./layouts/AppLayout.vue').default);
Vue.component('admin-layout', require('./layouts/AdminLayout.vue').default);

Vue.component('example-component', require('./components/ExampleComponent.vue').default);

const app = new Vue({
    vuetify: Vuetify,
    store,
    router,
    el: '#app',
    // mode: 'history',
    // components: {
    //     AppLayout
    // },
});
>>>>>>> 618d5a84e3460e9d830f42d69dd19295c6b2cbbd
