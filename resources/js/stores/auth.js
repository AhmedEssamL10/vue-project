import { defineStore } from 'pinia'
const token = localStorage.getItem('token');
import router from '../router/dashboard-router.js'

export const useAuthStore = defineStore('auth', {
    state: () => ({
      token: token || null
    }),
    getters: {
      isLoggedIn: (state) => !!state.token,
    },
    actions: {
      setToken(token) {
        this.token = token;
        localStorage.setItem('token', token);
      },
      logout() {
        this.token = null;
        localStorage.removeItem('token');
        router.push({ name: 'adminLogin' });
      },
    }
})