<template>
    <div class="bg-[#f2f2f2] py-12 lg:py-20 relative">
        <div class="container">
            <div class="absolute inset-0 z-0 opacity-40">
                <div class="absolute top-20 left-10 w-40 h-40 rounded-full bg-client animate-float"></div>
                <div class="absolute bottom-20 right-10 w-32 h-32 rounded-full bg-worker animate-float"
                    style="animation-delay: 1s;"></div>
                <div class="absolute top-40 right-40 w-24 h-24 rounded-full bg-client-light animate-float"
                    style="animation-delay: 1.5s;"></div>
                <div class="absolute bottom-40 left-20 w-36 h-36 rounded-full bg-worker-light animate-float"
                    style="animation-delay: 2s;"></div>
            </div>
            <div class="max-w-[600px] mx-auto z-10 relative">
                <h1
                    class="text-3xl md:text-4xl font-bold mb-6 !leading-normal text-center uppercase bg-gradient-to-r from-client to-worker bg-clip-text text-transparent">
                    تسجيل دخول
                </h1>

                <form @submit.prevent="handleSubmit" class="flex flex-col gap-6">
                    <!-- Email Input -->
                    <div>
                        <label for="email" class="block text-sm font-medium text-gray-700 mb-1">البريد
                            الإلكترونى</label>
                        <input type="email" v-model="formData.email" placeholder="البريد الإلكترونى"
                            class="w-full px-4 py-3 rounded-lg bg-white transition duration-200 outline-none text-[#1b1718]" />
                    </div>

                    <!-- Password Input -->
                    <div>
                        <div class="flex justify-between items-center mb-1">
                            <label for="password" class="block text-sm font-medium text-gray-700">كلمة المرور</label>
                        </div>
                        <input type="password" id="password" v-model="formData.password" placeholder="كلمة المرور"
                            class="w-full px-4 py-3 rounded-lg bg-white transition duration-200 outline-none text-[#1b1718]" />
                        <!-- <div class="flex justify-end mt-2">
                <a
                  href="#"
                  class="text-sm link-hover text-gray-600 hover:text-purple-600 transition duration-200"
                  >Forgot your password?</a
                >
              </div> -->
                    </div>

                    <!-- Login Button -->
                    <button type="submit"
                        class="w-full py-3 px-4 bg-worker-light hover:bg-worker text-white font-medium rounded-lg transition duration-200 shadow-md hover:shadow-lg transform hover:scale-[1.01]">
                        تسجيل دخول
                    </button>
                </form>
            </div>
        </div>
    </div>
</template>

<script>
import { useAuthStore } from '../../stores/auth'

export default {
    setup() {
        const authStore = useAuthStore();
        return {
            authStore
        }
    },
    data() {
        return {
            formData: {
                email: '',
                password: ''
            }
        };
    },
    methods: {
        handleSubmit() {
            if ((this.formData.email === 'admin@3m-services.com') && (this.formData.password === '123456789')) {
                this.authStore.setToken('as21d6as5d1as5d13as2d1asd1');
                this.$router.push({ name: "Dashboard" });
            } else {
                this.authStore.setToken(null);
            }
        }
    }
}
</script>