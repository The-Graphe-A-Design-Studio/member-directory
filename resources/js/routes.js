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