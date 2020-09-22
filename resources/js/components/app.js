require('./bootstrap');

window.Vue = require('vue');

import 'material-design-icons-iconfont/dist/material-design-icons.css';
import Vuetify from '../plugins/vuetify';
import axios from "axios";

axios.defaults.baseURL = "http://localhost:8000/api/v1"

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
