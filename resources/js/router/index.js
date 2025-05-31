import { createRouter, createWebHistory } from 'vue-router';
import Dashboard from '../pages/Dashboard.vue';
import Profile from '../pages/Profile.vue';
import Request from '../pages/Request.vue';
import RequestConfig from '../pages/RequestConfig.vue';

export default createRouter({
  history: createWebHistory(),
  routes: [
    { path: '/app', component: Dashboard },
    { path: '/app/request', component: Request },
    { path: '/app/request-configurations', component: RequestConfig },
    { path: '/app/profile', component: Profile },
  ],
});