<template>
    <div class="bg-[#f2f2f2] py-12 lg:py-20 relative">
        <div class="container">
            <div class="z-10 relative">
                <div class="grid grid-cols-2 md:grid-cols-3 gap-4">
                    <div class="text-gray-900 bg-white px-4 py-12 gap-4 flex flex-col justify-center items-center rounded-lg">
                        <span class="text-lg font-bold text-client-dark text-center">{{ $t('stats.individualClientsCount') }}</span>
                        <span class="text-2xl font-bold">{{ statsData?.total_individuals }}</span>
                    </div>
                    <div class="text-gray-900 bg-white px-4 py-12 gap-4 flex flex-col justify-center items-center rounded-lg">
                        <span class="text-lg font-bold text-client-dark text-center">{{ $t('stats.companyClientsCount') }}</span>
                        <span class="text-2xl font-bold">{{ statsData?.total_companies }}</span>
                    </div>
                    <div class="text-gray-900 bg-white px-4 py-12 gap-4 flex flex-col justify-center items-center rounded-lg">
                        <span class="text-lg font-bold text-client-dark text-center">{{ $t('stats.totalClientsCount') }}</span>
                        <span class="text-2xl font-bold">{{ statsData?.total_clients }}</span>
                    </div>
                    <div class="text-gray-900 bg-white px-4 py-12 gap-4 flex flex-col justify-center items-center rounded-lg">
                        <span class="text-lg font-bold text-client-dark text-center">{{ $t('stats.shippingRequestsCount') }}</span>
                        <span class="text-2xl font-bold">{{ statsData?.total_ship_requests }}</span>
                    </div>
                    <div class="text-gray-900 bg-white px-4 py-12 gap-4 flex flex-col justify-center items-center rounded-lg">
                        <span class="text-lg font-bold text-client-dark text-center">{{ $t('stats.laborRequestsCount') }}</span>
                        <span class="text-2xl font-bold">{{ statsData?.total_factor_requests }}</span>
                    </div>
                    <div class="text-gray-900 bg-white px-4 py-12 gap-4 flex flex-col justify-center items-center rounded-lg">
                        <span class="text-lg font-bold text-worker-dark">{{ $t('stats.workersCount') }}</span>
                        <span class="text-2xl font-bold">{{ statsData?.total_workers }}</span>
                    </div>
                </div>
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
            statsData: {}
        };
    },
    mounted(){
        this.fetchStats()
    },
    methods: {
        fetchStats(){
            $axios.get('stats', {
                headers: {
                    Authorization: `Bearer ${this.authStore.token}`
                }
            })
                .then(res => {
                    console.log(res)
                    if(res.data.isSuccess){
                        this.statsData = res.data.data;
                    }
                })
                .catch(err => {
                    console.log(err)
                    makeAlert(err.response?.data?.message, 'error')
                    if(err.status == 401){
                        this.authStore.logout();
                    }
                })
        }
    }
}
</script>