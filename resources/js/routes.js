import Home from './pages/Home';
import Register from './pages/Register';
import Login from './pages/Login';
// import Admin from './pages/Admin';

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
    // {
    //     path: '/admin',
    //     component: Admin,
    //     name: 'admin'
    // },
]