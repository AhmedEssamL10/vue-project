import { createApp } from 'vue';
import App from '../components/App.vue';
import router from './router';
import { createPinia } from 'pinia'
import { setupCalendar, Calendar, DatePicker } from 'v-calendar';
import 'v-calendar/style.css';
import i18n from './i18n';


const pinia = createPinia()

const app = createApp(App);

app.use(router);
app.use(pinia)
app.use(i18n)

app.use(setupCalendar, {})
app.component('VCalendar', Calendar)
app.component('VDatePicker', DatePicker)

app.mount('#app');