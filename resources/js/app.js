require('./bootstrap');
window.Vue = require('vue');

import VueRouter from 'vue-router'
Vue.use(VueRouter)

// Vue.component('navigation-bar', require('./components/Navbar.vue').default);
// Vue.component('articles', require('./components/Articles.vue').default);
// Vue.component('mainapp', require('./App.vue').default)

import routes from './routes'
const router = new VueRouter({
    routes
});

import App from './App.vue'
import Admin from './Admin.vue'
new Vue({
    // el: '#app',
    router,
    render: h => h(App),
    render: h => h(Admin)
}).$mount('#app');