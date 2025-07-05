<template>
    <div class="overflow-x-auto text-black py-6">
        <div class="flex justify-between items-center mb-4">
            <h2 class="text-xl font-bold">
                {{ $t('offersList.title') }}
            </h2>
            <button 
                @click="openModal()" 
                class="btn border border-client bg-client text-white hover:bg-client-dark hover:border-client-dark"
            >
                {{ $t('offersList.addNewOffer') }}
            </button>
        </div>
        <div class="py-6">
            <table v-if="workersList?.length" class="table">
                <!-- head -->
                <thead class="text-black">
                    <tr>
                        <th>{{ $t('offersList.sequence') }}</th>
                        <th>{{ $t('offersList.offerTitle') }}</th>
                        <th>{{ $t('offersList.image') }}</th>
                        <th>{{ $t('offersList.status') }}</th>
                        <th>{{ $t('offersList.actions') }}</th>
                    </tr>
                </thead>
                <tbody>
                    <!-- row 1 -->
                    <tr v-for="(client, index) in workersList">
                        <td>
                            <span>{{ index+1 }}</span>
                        </td>
                        <td>
                            <span>{{ client.title }}</span>
                        </td>
                        <td>
                            <img v-if="client.image" :src="`/storage/${client.image}`" alt="Offer Image" class="w-16 h-16 object-cover rounded" />
                            <span v-else class="text-gray-400">{{ $t('offersList.noImage') }}</span>
                        </td>
                        <td>
                            <span :class="client.status === 'active' ? 'badge badge-success' : 'badge badge-error'">
                                {{ client.status === 'active' ? $t('offersList.active') : $t('offersList.inactive') }}
                            </span>
                        </td>
                        <td>
                            <div class="flex gap-2">
                                <button @click="editOffer(client)" class="btn btn-sm btn-outline">
                                    <svg width="16" height="16" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                        <path d="M11 4H4a2 2 0 0 0-2 2v14a2 2 0 0 0 2 2h14a2 2 0 0 0 2-2v-7" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                                        <path d="m18.5 2.5 3 3L12 15l-4 1 1-4 9.5-9.5z" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                                    </svg>
                                </button>
                                <button @click="deleteOffer(client.id)" class="btn btn-sm btn-outline btn-error">
                                    <svg width="16" height="16" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                        <path d="M3 6h18" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                                        <path d="M19 6v14c0 1-1 2-2 2H7c-1 0-2-1-2-2V6" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                                        <path d="M8 6V4c0-1 1-2 2-2h4c1 0 2 1 2 2v2" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                                    </svg>
                                </button>
                            </div>
                        </td>
                    </tr>
                </tbody>
            </table>
            <div class="text-center p-3 text-lg bg-[#E1E1E1]" v-else>
                {{ $t('offersList.noOffers') }}
            </div>
        </div>

        <!-- Modal for Add/Edit Offer -->
        <div v-if="showModal" class="modal modal-open">
            <div class="modal-box bg-[#f1f1f1] text-black">
                <h3 class="font-bold text-lg mb-4">
                    {{ isEditing ? $t('offersList.editOffer') : $t('offersList.addNewOffer') }}
                </h3>
                
                <form @submit.prevent="saveOffer" class="space-y-4">
                    <div class="form-control">
                        <label class="block text-sm font-medium text-gray-700 mb-1">
                            {{ $t('offersList.offerTitle') }}
                        </label>
                        <input 
                            v-model="formData.title" 
                            type="text" 
                            class="w-full px-4 py-3 rounded-lg bg-white transition duration-200 outline-none border border-[#1b1718] text-[#1b1718]" 
                            :placeholder="$t('offersList.offerTitle')"
                            required
                        />
                    </div>

                    <div class="form-control">
                        <label class="block text-sm font-medium text-gray-700 mb-1">
                            {{ $t('offersList.offerImage') }}
                        </label>
                        <input 
                            @change="handleImageUpload" 
                            type="file" 
                            accept="image/*"
                            class="file-input file-input-bordered w-full rounded-lg bg-white border border-[#1b1718] text-[#1b1718]" 
                        />
                        <div v-if="imagePreview" class="mt-2">
                            <img :src="imagePreview" alt="Preview" class="w-32 h-32 object-cover rounded-lg" />
                        </div>
                    </div>

                    <div class="form-control">
                        <label class="block text-sm font-medium text-gray-700 mb-1">
                            {{ $t('offersList.offerStatus') }}
                        </label>
                        <select v-model="formData.status" class="w-full px-4 py-2 rounded-lg bg-white transition duration-200 outline-none border border-[#1b1718] text-[#1b1718]">
                            <option value="active">{{ $t('offersList.active') }}</option>
                            <option value="inactive">{{ $t('offersList.inactive') }}</option>
                        </select>
                    </div>

                    <div class="modal-action">
                        <button type="button" @click="closeModal" class="btn">
                            {{ $t('offersList.cancel') }}
                        </button>
                        <button type="submit" class="btn border border-client bg-client text-white hover:bg-client-dark hover:border-client-dark" :class="loading ? 'isloading' : ''">
                            <span v-if="loading" class="loading loading-spinner loading-sm"></span>
                            {{ $t('offersList.saveOffer') }}
                        </button>
                    </div>
                </form>
            </div>
        </div>

        <!-- Modal for Delete Confirmation -->
        <div v-if="showDeleteModal" class="modal modal-open">
            <div class="modal-box bg-[#f1f1f1] text-black">
                <h3 class="font-bold text-lg mb-4">
                    {{ $t('offersList.deleteConfirmation.title') }}
                </h3>
                
                <p class="mb-6 text-gray-700">
                    {{ $t('offersList.deleteConfirmation.question') }}
                </p>

                <div class="modal-action">
                    <button @click="closeDeleteModal" class="btn">
                        {{ $t('offersList.deleteConfirmation.cancel') }}
                    </button>
                    <button @click="confirmDelete" class="btn btn-error text-white" :disabled="deleteLoading">
                        <span v-if="deleteLoading" class="loading loading-spinner loading-sm"></span>
                        {{ $t('offersList.deleteConfirmation.confirm') }}
                    </button>
                </div>
            </div>
        </div>
    </div>
</template>
<script>
import { useAuthStore } from '../../stores/auth';
import { useUiStore } from '../../stores/uiStore';

export default {
    setup(){
        const authStore = useAuthStore()
        const uiStore = useUiStore()
        return {
            authStore,
            uiStore
        }
    },
    data(){
        return {
            workersList: [],
            showModal: false,
            showDeleteModal: false,
            isEditing: false,
            loading: false,
            deleteLoading: false,
            formData: {
                title: '',
                image: null,
                status: 'active'
            },
            imagePreview: null,
            editingId: null,
            deletingId: null
        }
    },
    mounted(){
        this.fetchOffers();
    },
    methods: {
        fetchOffers(){
            $axios.get('/admin/items', {
                headers: {
                    Authorization: `Bearer ${this.authStore.token}`
                }
            })
                .then(response => {
                    if(response.data.isSuccess){
                        this.workersList = response.data?.data || [];
                    }
                })
                .catch(err => {
                    if(err.status == 401){
                        this.authStore.logout();
                    }
                })
        },
        openModal() {
            this.showModal = true;
            this.isEditing = false;
            this.resetForm();
        },
        closeModal() {
            this.showModal = false;
            this.resetForm();
        },
        resetForm() {
            this.formData = {
                title: '',
                image: null,
                status: 'active'
            };
            this.imagePreview = null;
            this.editingId = null;
        },
        editOffer(offer) {
            this.isEditing = true;
            this.editingId = offer.id;
            this.formData = {
                title: offer.title,
                image: offer.image,
                status: offer.status
            };
            // if (offer.image) {
            //     this.imagePreview = `/storage/${offer.image}`;
            // }
            this.showModal = true;
        },
        handleImageUpload(event) {
            const file = event.target.files[0];
            if (file) {
                this.formData.image = file;
                this.imagePreview = URL.createObjectURL(file);
            }
        },
        saveOffer() {
            this.loading = true;
            
            const formData = new FormData();
            formData.append('title', this.formData.title);
            formData.append('status', this.formData.status.toString());
            if (this.formData.image) {
                formData.append('image', this.formData.image);
            }

            const url = this.isEditing ? `/admin/items/${this.editingId}` : '/admin/items';
            const method = 'post';

            $axios[method](url, formData, {
                headers: {
                    Authorization: `Bearer ${this.authStore.token}`
                }
            })
            .then(response => {
                if (response.data.isSuccess) {
                    this.closeModal();
                    this.fetchOffers();
                    this.uiStore.setToaster({
                        type: "success",
                        duration: 5000,
                        message: this.isEditing ? this.$t('offersList.offerUpdated') : this.$t('offersList.offerCreated'),
                    });
                }
            })
            .catch(err => {
                if (err.status == 401) {
                    this.authStore.logout();
                } else {    
                    this.uiStore.setToaster({
                        type: "error",
                        duration: 5000,
                        message: this.$t('somethingWentWrong'),
                    });
                }
            })
            .finally(() => {
                this.loading = false;
            });
        },
        deleteOffer(id) {
            this.deletingId = id;
            this.showDeleteModal = true;
        },
        closeDeleteModal() {
            this.showDeleteModal = false;
            this.deletingId = null;
        },
        confirmDelete() {
            this.deleteLoading = true;
            $axios.delete(`/admin/items/${this.deletingId}`, {
                headers: {
                    Authorization: `Bearer ${this.authStore.token}`
                }
            })
            .then(response => {
                if (response.data.isSuccess) {
                    this.closeDeleteModal();
                    this.fetchOffers();
                    this.uiStore.setToaster({
                        type: "success",
                        duration: 5000,
                        message: this.$t('offersList.offerDeleted'),
                    });
                }
            })
            .catch(err => {
                if (err.status == 401) {
                    this.authStore.logout();
                } else {
                    this.uiStore.setToaster({
                        type: "error",
                        duration: 5000,
                        message: this.$t('somethingWentWrong'),
                    });
                }
            })
            .finally(() => {
                this.deleteLoading = false;
            });
        }
    }
}
</script>