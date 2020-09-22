<<<<<<< HEAD
import Home from './pages/Home';
import Admin from './pages/admin/Admin';
import Members from './pages/admin/Members';
import Register from './pages/Register';
import Login from './pages/Login';

export default [
    {
        path: '/',
        component: Home,
        name: 'home'
    },
    {
        path: '/register',
        component: Register,
        name: 'register'
    },
    {
        path: '/login',
        component: Login,
        name: 'login'
    },
    {
        path: '/members',
        component: Members,
        name: 'members'
    },
    {
        path: '/admin',
        component: Admin,
        name: 'admin'
    },
    {
        path: '*',
        redirect: '/'
    }
]
=======
import Vue from 'vue';
import VueRouter from 'vue-router';

Vue.use(VueRouter);

import Dashboard from './components/dashboard/container';
import Groups from './components/groups/container';
import Members from './components/members/container';

const routes = [
    {
        component: Dashboard,
        name: 'dashboard',
        path: '/dashboard',
    },
    {
        component: Members,
        name: 'members',
        path: '/members',
    },
    {
        component: Groups,
        name: 'groups',
        path: '/groups',
    },
]
export default new VueRouter({
    routes,
})
>>>>>>> 618d5a84e3460e9d830f42d69dd19295c6b2cbbd
