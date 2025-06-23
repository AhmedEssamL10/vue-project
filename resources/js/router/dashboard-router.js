import { createRouter, createWebHistory } from 'vue-router';
import Dashboard from '../pages/dashboard/Dashboard.vue';
import Stats from '../pages/dashboard/Stats.vue';
import Profile from '../pages/dashboard/Profile.vue';
import usersList from '../pages/dashboard/usersList.vue';
import workersList from '../pages/dashboard/workersList.vue';
import RequestsList from '../pages/dashboard/RequestsList.vue';
import RequestDetails from '../pages/dashboard/RequestDetails.vue';
import Login from '../pages/dashboard/login.vue';
import Register from '../pages/dashboard/Register.vue';
import RequestConfig from '../pages/dashboard/RequestConfig.vue';
import { useAuthStore } from '../stores/auth'

const router = createRouter({
  history: createWebHistory(),
  routes: [
    { 
      path: '/dashboard', 
      component: Dashboard,
      name: "Dashboard",
      children: [
        { 
          name: "DashboardStats", 
          path: '', 
          component: Stats, 
          meta: { requiresAuth: true } 
        },
        { 
          name: "requestConfigPage", 
          path: '/dashboard/request-configurations', 
          component: RequestConfig, 
          meta: { requiresAuth: true } 
        },
        { 
          name: "adminProfile", 
          path: '/dashboard/profile', 
          component: Profile, 
          meta: { requiresAuth: true } 
        },
        { 
          name: "UsersList", 
          path: '/dashboard/users-list', 
          component: usersList, 
          meta: { requiresAuth: true } 
        },
        { 
          name: "WorkersList", 
          path: '/dashboard/workers-list', 
          component: workersList, 
          meta: { requiresAuth: true } 
        },
        { 
          name: "RequestsList", 
          path: '/dashboard/requests-list', 
          component: RequestsList, 
          meta: { requiresAuth: true },
        },
        { 
          name: "RequestDetails", 
          path: '/dashboard/requests/:type/:id', 
          component: RequestDetails, 
          meta: { requiresAuth: true } 
        },
      ]
    },
    { name: "adminLogin", path: '/dashboard/login', component: Login, meta: { guest: true } },
    { name: "adminRegister", path: '/dashboard/register', component: Register, meta: { guest: true } },
  ],
});

router.beforeEach((to, from, next) => {
  const auth = useAuthStore()
  
  if (to.meta.guest && auth.isLoggedIn) {
    next({ name: 'Dashboard' }) // or any login route name
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
