import {createRouter, createWebHistory} from 'vue-router';
import LoginPage from './views/template/LoginPage.vue';
import HomePage from './views/template/HomePage.vue';
import Layout from './components/template/Layout.vue';
import NewTourPage from './views/template/NewTourPage.vue';
import ChangePasswordPage from './views/template/ChangePasswordPage.vue';
import AllTourPage from './views/template/AllTourPage.vue';

const routes = [
    {path: '', component: LoginPage},
    {path: '/', component: Layout,
        children:[
            {path: 'dashboard',component: HomePage},
            {path: 'create-tournament',component: NewTourPage},
            {path: 'change-password', component: ChangePasswordPage},
            {path: 'all-tournaments', component: AllTourPage}
        ]
    },
    
]

const router = createRouter({
    history: createWebHistory(),
    routes
});

export default router;