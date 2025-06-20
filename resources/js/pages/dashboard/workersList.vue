<template>
    <div class="overflow-x-auto text-black py-6">
        <h2 class="mb-4 text-xl font-bold">قائمة العمال</h2>
        <div class="py-6">
            <table v-if="workersList?.length" class="table">
                <!-- head -->
                <thead class="text-black">
                    <tr>
                        <!-- <th>
                            <label>
                                <input @change="toggleSelectionAll" type="checkbox" class="checkbox border !bg-transparent checked:border-client-dark border-client-dark checked:before:bg-client" />
                            </label>
                        </th> -->
                        <th>التسلسل</th>
                        <th>الإسم</th>
                        <th>رقم الهاتف</th>
                        <th>البريد الإلكترونى</th>
                        <!-- <th></th> -->
                    </tr>
                </thead>
                <tbody>
                    <!-- row 1 -->
                    <tr v-for="(client, index) in workersList">
                        <!-- <th>
                            <label>
                                <input type="checkbox" v-model="request.isSelected" class="checkbox border !bg-transparent checked:border-client-dark border-client-dark checked:before:bg-client" />
                            </label>
                        </th> -->
                        <td>
                            <span>{{ index+1 }}</span>
                        </td>
                        <td>
                            <span>{{ client.name }}</span>
                        </td>
                        <td>
                            <span>{{ client.phone || '-' }}</span>
                        </td>
                        <td>
                            <span>{{ client.email }}</span>
                        </td>
                        <!-- <td>
                            <span class="cursor-pointer group hover:opacity-80">
                                <svg class="group-hover:fill-client-dark" width="24" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor">
                                    <path d="M17 6H22V8H20V21C20 21.5523 19.5523 22 19 22H5C4.44772 22 4 21.5523 4 21V8H2V6H7V3C7 2.44772 7.44772 2 8 2H16C16.5523 2 17 2.44772 17 3V6ZM18 8H6V20H18V8ZM9 11H11V17H9V11ZM13 11H15V17H13V11ZM9 4V6H15V4H9Z"></path>
                                </svg>
                            </span>
                        </td> -->
                    </tr>
                </tbody>
            </table>
            <div class="text-center p-3 text-lg bg-[#E1E1E1]" v-else>
                لا يوجد عمال
            </div>
        </div>
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
            workersList: []
        }
    },
    mounted(){
        this.fetchWorkers();
    },
    methods: {
        fetchWorkers(){
            $axios.get('/admin/workers', {
                headers: {
                    Authorization: `Bearer ${this.authStore.token}`
                }
            })
                .then(response => {
                   console.log("response")
                   console.log(response)
                    if(response.data.isSuccess){
                        this.workersList = response.data?.data || [];
                    }
                })
        },
        toggleSelectionAll(e){
            const isSelected = e.target.checked;
            
            if(this.requestsList && this.requestsList.length){
                for(let request of this.requestsList){
                    request.isSelected = isSelected;
                }
            }
        }
    }
}
</script>