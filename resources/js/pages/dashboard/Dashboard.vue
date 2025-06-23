<template>
    <header class="w-full bg-white shadow-sm py-4 z-20">
        <div class="container flex justify-between items-center">
            <div class="flex items-center">
                <router-link :to="{ name: 'DashboardStats' }">
                    <img class="w-[150px]" src="https://3m-services-v4.netlify.app/assets/Pur-CWmmJo9F.svg"
                        alt="Logo" />
                </router-link>
            </div>

            <!-- Desktop Navigation -->
            <nav class="flex items-center gap-8">
                <router-link v-if="!isLoggedIn" class="nav-link" :to="{ name: 'adminLogin' }">
                    {{ $t('login') }}
                </router-link>
                <div v-else class="dropdown dropdown-hover dropdown-bottom dropdown-end">
                    <span tabindex="0" role="button" class="nav-link">{{ $t('profile') }}</span>
                    <ul tabindex="0" class="dropdown-content menu bg-base-100 rounded-box z-[1] w-52 p-2 shadow">
                        <li>
                            <router-link :to="{ name: 'adminProfile' }">
                                {{ $t('profile') }}
                            </router-link>
                        </li>
                        <li @click="handleLogout">
                            <span>{{ $t('logout') }}</span>
                        </li>
                    </ul>
                </div>
                <button @click="changeLanguage(this.$i18n.locale)" class="flex items-center gap-1 transition-all duration-500 hover:opacity-80 text-black">
                    <img width="20px" :src="locale === 'de' ? arabicFlag : germanFlag" alt="arabicFlag" />
                    <span>{{ locale == 'ar' ? 'De' : 'Ar' }}</span>
                </button>
            </nav>
        </div>
    </header>
    <main>
        <div class="bg-[#F1F1F1] drawer drawer-open">
            <input id="my-drawer-2" type="checkbox" class="drawer-toggle" />
            <div class="drawer-content p-4">
                <router-view />
            </div>
            <div class="drawer-side">
                <label for="my-drawer-2" aria-label="close sidebar" class="drawer-overlay"></label>
                <ul class="menu bg-base-200 text-base-content min-h-full w-80 p-4 gap-2">
                    <!-- Sidebar content here -->
                    <li>
                        <router-link class="sideMenuItem" :to="{ name: 'DashboardStats' }">
                            {{ $t('sideMenu.dashboard') }}
                        </router-link>
                    </li>
                    <li>
                        <router-link class="sideMenuItem" :to="{ name: 'requestConfigPage' }">
                            {{ $t('sideMenu.requestPricing') }}
                        </router-link>
                    </li>
                    <li>
                        <router-link class="sideMenuItem" :to="{ name: 'UsersList' }">
                            {{ $t('sideMenu.clientsList') }}
                        </router-link>
                    </li>
                    <li>
                        <router-link class="sideMenuItem" :to="{ name: 'WorkersList' }">
                            {{ $t('sideMenu.workersList') }}
                        </router-link>
                    </li>
                    <li>
                        <router-link class="sideMenuItem" :to="{ name: 'RequestsList' }">
                            {{ $t('sideMenu.requestsList') }}
                        </router-link>
                    </li>
                </ul>
            </div>
        </div>
    </main>
</template>
<script setup>
import { computed, onMounted, watch } from 'vue';
import { useAuthStore } from '../../stores/auth';
import router from '../../router/dashboard-router';
import { useRoute } from 'vue-router'
import { useI18n } from 'vue-i18n'
import arabicFlag from '@assets/images/arabic.webp';
import germanFlag from '@assets/images/germany.png';

const authStore = useAuthStore()
const route = useRoute()   // Get current route info
const { locale } = useI18n()
const isLoggedIn = computed(() => {
    return authStore.isLoggedIn;
})

const handleLogout = () => {
    window.$axios.post('/admin/logout', {}, {
        headers: {
            Authorization: `Bearer ${authStore.token}`
        }
    })
        .then(response => {
            if (response.data.isSuccess) {
                makeAlert(this.$t('logoutSuccessfully'), 'success')
                this.authStore.setToken(null);
                window.$axios.defaults.headers.common['Authorization'] = `Bearer `;
                this.$router.push({ name: "adminLogin" });
            }
        })
        .catch(error => {
            console.error(error);
            makeAlert(error.response?.data?.message, 'error')
        })
        .finally(() => {
            this.isloading = false;
        })
    authStore.logout();
    router.push({ name: "adminLogin" });
}

const changeLanguage = (currentLocale) => {
    locale.value = currentLocale == 'ar' ? 'de' : 'ar';
    localStorage.setItem('locale', locale.value);
}

onMounted(() => {
    if (route.name == "Dashboard" && !isLoggedIn.value) {
        router.push({ name: "adminLogin" });
    }
    locale.value = localStorage.getItem('locale') || 'de';

})

watch('$i18n.locale', async (newLocale) => {
    document.body.dir = newLocale === 'ar' ? 'rtl' : 'ltr';
    router.push({
        name: route.name,
        params: {
        ...route.params,
        locale: newLocale,
        },
        query: route.query,
    })
})

</script>
