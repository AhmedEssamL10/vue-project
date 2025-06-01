import { createRouter, createWebHistory } from 'vue-router';
import Dashboard from '../pages/Dashboard.vue';
import Profile from '../pages/Profile.vue';
import Request from '../pages/Request.vue';
import Login from '../pages/Login.vue';
import RequestConfig from '../pages/RequestConfig.vue';
import { useAuthStore } from '../stores/auth'

const router = createRouter({
  history: createWebHistory(),
  routes: [
    { path: '/app', component: Dashboard },
    { name: "makingRequestPage", path: '/app/request', component: Request },
    { name: "requestConfigPage", path: '/app/request-configurations', component: RequestConfig, meta: { requiresAuth: true } },
    { name: "adminLogin", path: '/app/login', component: Login, meta: { guest: true } },
    { path: '/app/profile', component: Profile },
  ],
});

router.beforeEach((to, from, next) => {
  const auth = useAuthStore()
  
  if (to.meta.guest && auth.isLoggedIn) {
    next({ name: 'requestConfigPage' }) // or any login route name
  } else {
    next()
  }
})

router.beforeEach((to, from, next) => {
  const auth = useAuthStore()
  
  if (to.meta.requiresAuth && !auth.isLoggedIn) {
    next({ name: 'adminLogin' }) // or any login route name
  } else {
    next()
  }
})


export default router;
