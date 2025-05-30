import { createRouter, createWebHistory } from 'vue-router';
import Dashboard from '../pages/Dashboard.vue';
import Profile from '../pages/Profile.vue';
import Request from '../pages/Request.vue';

export default createRouter({
  history: createWebHistory(),
  routes: [
    { path: '/app', component: Dashboard },
    { path: '/app/request', component: Request },
    { path: '/app/profile', component: Profile },
  ],
});