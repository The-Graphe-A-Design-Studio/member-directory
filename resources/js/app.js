require('./bootstrap');
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
    hashbang: false,
    // hash: false,
    // history: true,
    linkActiveClass: 'active',
    routes,
});

import App from './App.vue'
new Vue({
    el: '#app',
    router,
    render: h => h(App),
}).$mount('#app');