<template>
    <div class="mb-6 border px-4 pt-4 rounded shadow-sm bg-gray-50">
        <h3 class="text-lg font-semibold text-gray-700 mb-3">
            طلب #{{ requestDetails?.id }}
        </h3>
        <table class="table-auto w-full text-sm text-gray-700">
            <tbody>
                <tr v-for="(value, key) in requestDetails" class="border-b">
                    <template v-if="!dataNotBeShown.includes(key) && value !== null && value != 0">
                        <td class="py-2 pr-4 font-medium capitalize">
                            {{ $t(`requestDetails.${key}`) }}
                        </td>
                        <td class="py-2">
                            {{ value === '0' ? false : value === '1' ? true : value || '-' }}
                        </td>
                    </template>
                </tr>
            </tbody>
        </table>
    </div>
</template>

<script>
import { useAuthStore } from '../../stores/auth';

export default {
    setup(){
        const authStore = useAuthStore()
        return {
            authStore
        }
    },
    data(){
        return {
            requestDetails: {},
            dataNotBeShown: ["user", "user_id", "id", "created_at", "updated_at"]
        }
    },
    mounted(){
        this.fetchRequestDetails(this.$route.params.id, this.$route.params.type);
    },
    methods: {
        fetchRequestDetails(id, type){
            const requestUrl = type == '' ? 'admin/factor-request' : 'admin/ship-request'
            $axios.get(`${requestUrl}/${id}`, {
                headers: {
                    Authorization: `Bearer ${this.authStore.token}`
                }
            })
                .then(response => {
                    console.log("response")
                    console.log(response)
                    if(response.data.isSuccess){
                        this.requestDetails = response.data?.data || {};
                    }
                })
        }
    }
}
</script>