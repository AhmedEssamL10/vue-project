<template>
    <header class="w-full bg-white shadow-sm py-4 z-20">
        <div class="container flex justify-between items-center">
            <div class="flex items-center">
                <router-link :to="{ name: 'Dashboard' }">
                    <img class="w-[150px]" src="https://3m-services-v4.netlify.app/assets/Pur-CWmmJo9F.svg" alt="Logo" />
                </router-link>
            </div>

            <!-- Desktop Navigation -->
            <nav class="flex items-center gap-8">
                <router-link v-if="!isLoggedIn" class="nav-link" :to="{ name: 'adminLogin' }">
                    تسجيل دخول
                </router-link>
                <div v-else class="dropdown dropdown-hover dropdown-bottom dropdown-end">
                    <span tabindex="0" role="button" class="nav-link">الملف الشخصية</span>
                    <ul tabindex="0" class="dropdown-content menu bg-base-100 rounded-box z-[1] w-52 p-2 shadow">
                        <li>
                            <router-link :to="{ name: 'adminProfile' }">
                                الصفحة لشخصية
                            </router-link>
                        </li>
                        <li @click="handleLogout">
                            <span>تسجيل خروج</span>
                        </li>
                    </ul>
                </div>
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
                        <router-link class="sideMenuItem" :to="{ name: 'Dashboard' }">الرئيسية</router-link>
                    </li>
                    <li>
                        <router-link class="sideMenuItem" :to="{ name: 'requestConfigPage' }">أسعار حساب التكلفة</router-link>
                    </li>
                    <li>
                        <router-link class="sideMenuItem" :to="{ name: 'UsersList' }">قائمة المستخدمين</router-link>
                    </li>
                    <li>
                        <router-link class="sideMenuItem" :to="{ name: 'RequestsList' }">قائمة الطلبات</router-link>
                    </li>
                </ul>
            </div>
        </div>
    </main>
</template>
<script setup>
import { computed, onMounted } from 'vue';
import { useAuthStore } from '../../stores/auth';
import router from '../../router/dashboard-router';
import { useRoute, useRouter } from 'vue-router'

const authStore = useAuthStore()
const route = useRoute()   // Get current route info
const $router = useRouter() // Programmatic navigation

const isLoggedIn = computed(() => {
    return authStore.isLoggedIn;
})

const handleLogout = () => {
    authStore.logout();
    router.push({ name: "adminLogin" });
}

onMounted(() => {
    if(route.name == "Dashboard" && !isLoggedIn.value){
        router.push({ name: "adminLogin" });
    }
})


</script>
