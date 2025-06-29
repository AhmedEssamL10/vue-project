<template>
    <div class="overflow-x-auto text-black py-6">
        <h2 class="mb-4 text-xl font-bold">{{ $t('usersList.title') }}</h2>
        <div class="filters flex items-end justify-between gap-4">
            <div class="form-control w-full max-w-xs">
                <label class="label mb-1">
                    <span class="label-text">{{ $t('usersList.name') }}</span>
                </label>
                <input v-model="filters.name" type="text" :placeholder="$t('usersList.name')" class="w-full px-4 py-3 rounded-lg bg-white transition duration-200 outline-none text-[#1b1718]" />
            </div>
            <div class="form-control w-full max-w-xs">
                <label class="label mb-1">
                    <span class="label-text">{{ $t('usersList.email') }}</span>
                </label>
                <input v-model="filters.email" type="text" :placeholder="$t('usersList.email')" class="w-full px-4 py-3 rounded-lg bg-white transition duration-200 outline-none text-[#1b1718]" />
            </div>
            <div class="form-control w-full max-w-xs">
                <button @click="filterClients" class="btn btn-primary px-6 min-w-[150px]">{{ $t('search') }}</button>
            </div>
        </div>

        <div class="py-6">
            <table v-if="clientsList?.length" class="table">
                <!-- head -->
                <thead class="text-black">
                    <tr>
                        <!-- <th>
                            <label>
                                <input @change="toggleSelectionAll" type="checkbox" class="checkbox border !bg-transparent checked:border-client-dark border-client-dark checked:before:bg-client" />
                            </label>
                        </th> -->
                        <th>{{ $t('usersList.sequence') }}</th>
                        <th>{{ $t('usersList.name') }}</th>
                        <th>{{ $t('usersList.phoneNumber') }}</th>
                        <th>{{ $t('usersList.email') }}</th>
                        <th>{{ $t('usersList.clientType') }}</th>
                        <!-- <th></th> -->
                    </tr>
                </thead>
                <tbody>
                    <!-- row 1 -->
                    <tr v-for="(client, index) in filteredClients">
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
                            <span class="select-all cursor-pointer">{{ client.email }}</span>
                        </td>
                        <td>
                            <span>{{ client.client_type ? $t(client.client_type) : '-' }}</span>
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
                {{ $t('usersList.noUsers') }}
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
            clientsList: [],
            filteredClients: [],
            filters: {
                name: "",
                email: "",
            }
        }
    },
    mounted(){
        this.fetchClients();
    },
    methods: {
        fetchClients(){
            $axios.get('/admin/clients', {
                headers: {
                    Authorization: `Bearer ${this.authStore.token}`
                }
            })
                .then(response => {
                    if(response.data.isSuccess){
                        this.clientsList = response.data?.data || [];
                        this.filteredClients = [...this.clientsList];
                    }
                })
                .catch(err => {
                    if(err.status == 401){
                        this.authStore.logout();
                    }
                })
        },
        filterClients(){
            this.filteredClients = this.clientsList.filter(client => {
                if(this.filters.name && !client.name?.toLowerCase().includes(this.filters.name?.toLowerCase())){
                    return false;
                }

                if(this.filters.email && !client.email?.toLowerCase().includes(this.filters.email?.toLowerCase())){
                    return false;
                }
                return true;
            });
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