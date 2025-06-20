import { createApp } from 'vue';
import App from '../components/App.vue';
import router from './router';
import { createPinia } from 'pinia'
import { setupCalendar, Calendar, DatePicker } from 'v-calendar';
import 'v-calendar/style.css';
import i18n from './i18n';


const pinia = createPinia()

const app = createApp(App);

const appDiv = document.getElementById('app')
if(appDiv){
    const userData = JSON.parse(appDiv.dataset.user)
    const loginPageUrl = appDiv.dataset.loginurl;
    
    // Provide the user data globally or pass as props
    app.provide('user', userData)
    app.provide('loginPageUrl', loginPageUrl)
    
    appDiv.dataset.user = null;
}

app.use(router);
app.use(pinia)
app.use(i18n)

app.use(setupCalendar, {})
app.component('VCalendar', Calendar)
app.component('VDatePicker', DatePicker)

app.mount('#app');