import {createRouter, createWebHistory} from 'vue-router';
import LoginPage from './views/template/LoginPage.vue';
import HomePage from './views/template/HomePage.vue';

const routes = [
    {path: '/', component: LoginPage},
    {path: '/homepage',component: HomePage}
   
]

const router = createRouter({
    history: createWebHistory(),
    routes
});

export default router;