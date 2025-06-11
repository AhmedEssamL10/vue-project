// import Dashboard from '../pages/Dashboard.vue';
// import Profile from '../pages/Profile.vue';
// import Login from '../pages/Login.vue';
// import RequestConfig from '../pages/RequestConfig.vue';
import { createRouter, createWebHistory } from 'vue-router';
import Request from '../pages/Request.vue';

const router = createRouter({
  history: createWebHistory(),
  routes: [
    // { path: '/app', component: Dashboard },
    { name: "makingRequestPage", path: '/:lang?/request', component: Request },
    // { name: "requestConfigPage", path: '/dashboard/request-configurations', component: RequestConfig, meta: { requiresAuth: true } },
    // { name: "adminLogin", path: '/dashboard/login', component: Login, meta: { guest: true } },
    // { path: '/app/profile', component: Profile },
  ],
});

export default router;
