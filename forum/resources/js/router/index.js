import { createRouter, createWebHistory } from 'vue-router';
import Categories from '../views/Categories.vue';

const routes = [
    {
        path: '/',
        name: 'home',
        component: Categories,
    },
    {
        path: '/categories/:id',
        name: 'category',
        component: () => import('../views/Category.vue'),
    },
];

const router = createRouter({
    history: createWebHistory(),
    routes,
});

export default router;
