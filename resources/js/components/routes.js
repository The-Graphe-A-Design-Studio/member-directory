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