require('./bootstrap');

window.Vue = require('vue');

import 'material-design-icons-iconfont/dist/material-design-icons.css';
import Vuetify from '../plugins/vuetify';
import store from './store';
import router from './routes';

Vue.component('login-form', require('./components/LoginForm.vue').default);
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
