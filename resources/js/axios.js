import axios from 'axios';

const axiosInstance = axios.create({
  baseURL: 'http://127.0.0.1:8000/api',
  headers: {
    'X-Requested-With': 'XMLHttpRequest',
    'Authorization': `Bearer ` // Example for adding Authorization header
  }
});

window.$axios = axiosInstance;