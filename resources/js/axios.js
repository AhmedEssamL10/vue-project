import axios from 'axios';

const axiosInstance = axios.create({
  baseURL: '/api',
  headers: {
    'X-Requested-With': 'XMLHttpRequest',
    'Authorization': `Bearer ` // Example for adding Authorization header
  }
});

window.$axios = axiosInstance;