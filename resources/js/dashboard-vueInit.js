import { createApp } from 'vue';
import AppDashboard from '../components/AppDashboard.vue';
import dashboardRouter from './router/dashboard-router';
import { createPinia } from 'pinia'
// import { setupCalendar, Calendar, DatePicker } from 'v-calendar';
// import 'v-calendar/style.css';
const pinia = createPinia()

const app = createApp(AppDashboard);

app.use(dashboardRouter);
app.use(pinia)

// app.use(setupCalendar, {})
// app.component('VCalendar', Calendar)
// app.component('VDatePicker', DatePicker)

app.mount('#dashboard');