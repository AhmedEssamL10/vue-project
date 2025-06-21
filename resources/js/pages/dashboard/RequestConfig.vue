<template>
    <section class="py-12 bg-[#f1f1f1]">
        <div class="container">
            <div class="max-w-3xl mx-auto">
                <div class="max-w-xl mx-auto">
                    <h1 class="text-black font-bold text-2xl">أسعار حساب التكلفة</h1>
                </div>
                <div class="form_panel">
                    <div class="form_step_parent">
                        <form class="form-step">
                            <h3 class="text-xl font-bold mb-4">أسعار الخدمات الأساسية</h3>
                            <div class="flex flex-col gap-4 mb-4">
                                <div class="form_control_wrapper">
                                    <div>
                                        <label class="block text-sm font-medium text-gray-700 mb-1">سعر
                                            الكيلو متر للمسافة*</label>
                                        <input v-model="v$.formData.kiloMeterPrice.$model"
                                            :class="v$.formData.kiloMeterPrice.$error ? 'input-error' : ''"
                                            type="number" placeholder="سعر الكيلو متر للمسافة"
                                            class="w-full px-4 py-3 rounded-lg bg-white transition duration-200 outline-none border border-[#1b1718] text-[#1b1718]" />
                                    </div>
                                    <span class="error-msg" v-if="v$.formData.kiloMeterPrice.$error">
                                        {{ v$.formData.kiloMeterPrice.$errors[0].$message }}
                                    </span>
                                </div>
                                <div class="form_control_wrapper">
                                    <div>
                                        <label class="block text-sm font-medium text-gray-700 mb-1">سعر
                                            المتر للمسافة المقطوعه*</label>
                                        <input v-model="v$.formData.meterPrice.$model"
                                            :class="v$.formData.meterPrice.$error ? 'input-error' : ''" type="number"
                                            placeholder="سعر المتر للمسافة المقطوعه"
                                            class="w-full px-4 py-3 rounded-lg bg-white transition duration-200 outline-none border border-[#1b1718] text-[#1b1718]" />
                                    </div>
                                    <span class="error-msg" v-if="v$.formData.meterPrice.$error">
                                        {{ v$.formData.meterPrice.$errors[0].$message }}
                                    </span>
                                </div>
                                <div class="form_control_wrapper">
                                    <div>
                                        <label class="block text-sm font-medium text-gray-700 mb-1">سعر
                                            الطابق بدون أسانسير*</label>
                                        <input v-model="v$.formData.floorWithoutLifterPrice.$model"
                                            :class="v$.formData.floorWithoutLifterPrice.$error ? 'input-error' : ''"
                                            type="number" placeholder="سعر الطابق بدون أسانسير"
                                            class="w-full px-4 py-3 rounded-lg bg-white transition duration-200 outline-none border border-[#1b1718] text-[#1b1718]" />
                                    </div>
                                    <span class="error-msg" v-if="v$.formData.floorWithoutLifterPrice.$error">
                                        {{ v$.formData.floorWithoutLifterPrice.$errors[0].$message }}
                                    </span>
                                </div>
                                <div class="form_control_wrapper">
                                    <div>
                                        <label class="block text-sm font-medium text-gray-700 mb-1">سعر
                                            الطابق فى وجود أسانسير*</label>
                                        <input v-model="v$.formData.floorWithLifterPrice.$model"
                                            :class="v$.formData.floorWithLifterPrice.$error ? 'input-error' : ''"
                                            type="number" placeholder="سعر الطابق فى وجود أسانسير"
                                            class="w-full px-4 py-3 rounded-lg bg-white transition duration-200 outline-none border border-[#1b1718] text-[#1b1718]" />
                                    </div>
                                    <span class="error-msg" v-if="v$.formData.floorWithLifterPrice.$error">
                                        {{ v$.formData.floorWithLifterPrice.$errors[0].$message }}
                                    </span>
                                </div>
                                <div class="form_control_wrapper">
                                    <div>
                                        <label class="block text-sm font-medium text-gray-700 mb-1">سعر
                                            الصندوق*</label>
                                        <input v-model="v$.formData.boxPrice.$model"
                                            :class="v$.formData.boxPrice.$error ? 'input-error' : ''" type="number"
                                            placeholder="سعر الصندوق"
                                            class="w-full px-4 py-3 rounded-lg bg-white transition duration-200 outline-none border border-[#1b1718] text-[#1b1718]" />
                                    </div>
                                    <span class="error-msg" v-if="v$.formData.boxPrice.$error">
                                        {{ v$.formData.boxPrice.$errors[0].$message }}
                                    </span>
                                </div>
                                <div class="form_control_wrapper">
                                    <div>
                                        <label class="block text-sm font-medium text-gray-700 mb-1">سعر
                                            المتر فى مساحة التخزين الإضافية*</label>
                                        <input v-model="v$.formData.meterInBasementPrice.$model"
                                            :class="v$.formData.meterInBasementPrice.$error ? 'input-error' : ''"
                                            type="number" placeholder="سعر المتر فى مساحة التخزين الإضافية"
                                            class="w-full px-4 py-3 rounded-lg bg-white transition duration-200 outline-none border border-[#1b1718] text-[#1b1718]" />
                                    </div>
                                    <span class="error-msg" v-if="v$.formData.meterInBasementPrice.$error">
                                        {{ v$.formData.meterInBasementPrice.$errors[0].$message }}
                                    </span>
                                </div>
                                <div class="form_control_wrapper">
                                    <div>
                                        <label class="block text-sm font-medium text-gray-700 mb-1">سعر
                                            الحجرة*</label>
                                        <input v-model="v$.formData.roomPrice.$model"
                                            :class="v$.formData.roomPrice.$error ? 'input-error' : ''" type="number"
                                            placeholder="سعر الحجرة"
                                            class="w-full px-4 py-3 rounded-lg bg-white transition duration-200 outline-none border border-[#1b1718] text-[#1b1718]" />
                                    </div>
                                    <span class="error-msg" v-if="v$.formData.roomPrice.$error">
                                        {{ v$.formData.roomPrice.$errors[0].$message }}
                                    </span>
                                </div>
                                <div class="form_control_wrapper">
                                    <div>
                                        <label class="block text-sm font-medium text-gray-700 mb-1">سعر
                                            المتر المربع للعقار*</label>
                                        <input v-model="v$.formData.squareMeterPrice.$model"
                                            :class="v$.formData.squareMeterPrice.$error ? 'input-error' : ''"
                                            type="number" placeholder="سعر المتر المربع للعقار"
                                            class="w-full px-4 py-3 rounded-lg bg-white transition duration-200 outline-none border border-[#1b1718] text-[#1b1718]" />
                                    </div>
                                    <span class="error-msg" v-if="v$.formData.squareMeterPrice.$error">
                                        {{ v$.formData.squareMeterPrice.$errors[0].$message }}
                                    </span>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>

                <div class="form_panel">
                    <div class="form_step_parent">
                        <form class="form-step">
                            <h3 class="text-xl font-bold mb-4">أسعار الخدمات الإضافية</h3>
                            <div class="flex flex-col gap-4 mb-4">

                                <div class="form_control_wrapper">
                                    <div>
                                        <label class="block text-sm font-medium text-gray-700 mb-1">سعر
                                            خدمة التعبئة و التغليف*</label>
                                        <input v-model="v$.formData.packingServicePrice.$model"
                                            :class="v$.formData.packingServicePrice.$error ? 'input-error' : ''"
                                            type="number" placeholder="سعر خدمة التعبئة و التغليف"
                                            class="w-full px-4 py-3 rounded-lg bg-white transition duration-200 outline-none border border-[#1b1718] text-[#1b1718]" />
                                    </div>
                                    <span class="error-msg" v-if="v$.formData.packingServicePrice.$error">
                                        {{ v$.formData.packingServicePrice.$errors[0].$message }}
                                    </span>
                                </div>
                                <div class="form_control_wrapper">
                                    <div>
                                        <label class="block text-sm font-medium text-gray-700 mb-1">سعر
                                            تفريغ الصناديق*</label>
                                        <input v-model="v$.formData.unpackingServicePrice.$model"
                                            :class="v$.formData.unpackingServicePrice.$error ? 'input-error' : ''"
                                            type="number" placeholder="سعر تفريغ الصناديق"
                                            class="w-full px-4 py-3 rounded-lg bg-white transition duration-200 outline-none border border-[#1b1718] text-[#1b1718]" />
                                    </div>
                                    <span class="error-msg" v-if="v$.formData.unpackingServicePrice.$error">
                                        {{ v$.formData.unpackingServicePrice.$errors[0].$message }}
                                    </span>
                                </div>
                                <div class="form_control_wrapper">
                                    <div>
                                        <label class="block text-sm font-medium text-gray-700 mb-1">سعر
                                            تفكيك الأثاث*</label>
                                        <input v-model="v$.formData.furnitureUncollectingPrice.$model"
                                            :class="v$.formData.furnitureUncollectingPrice.$error ? 'input-error' : ''"
                                            type="number" placeholder="سعر تفكيك الأثاث"
                                            class="w-full px-4 py-3 rounded-lg bg-white transition duration-200 outline-none border border-[#1b1718] text-[#1b1718]" />
                                    </div>
                                    <span class="error-msg" v-if="v$.formData.furnitureUncollectingPrice.$error">
                                        {{ v$.formData.furnitureUncollectingPrice.$errors[0].$message }}
                                    </span>
                                </div>
                                <div class="form_control_wrapper">
                                    <div>
                                        <label class="block text-sm font-medium text-gray-700 mb-1">سعر
                                            تجميع الأثاث*</label>
                                        <input v-model="v$.formData.furnitureCollectingPrice.$model"
                                            :class="v$.formData.furnitureCollectingPrice.$error ? 'input-error' : ''"
                                            type="number" placeholder="سعر تجميع الأثاث"
                                            class="w-full px-4 py-3 rounded-lg bg-white transition duration-200 outline-none border border-[#1b1718] text-[#1b1718]" />
                                    </div>
                                    <span class="error-msg" v-if="v$.formData.furnitureCollectingPrice.$error">
                                        {{ v$.formData.furnitureCollectingPrice.$errors[0].$message }}
                                    </span>
                                </div>
                                <div class="form_control_wrapper">
                                    <div>
                                        <label class="block text-sm font-medium text-gray-700 mb-1">سعر
                                            تفكيك متر المطبخ*</label>
                                        <input v-model="v$.formData.KitchenMeterunInstallingPrice.$model"
                                            :class="v$.formData.KitchenMeterunInstallingPrice.$error ? 'input-error' : ''"
                                            type="number" placeholder="سعر تفكيك متر المطبخ"
                                            class="w-full px-4 py-3 rounded-lg bg-white transition duration-200 outline-none border border-[#1b1718] text-[#1b1718]" />
                                    </div>
                                    <span class="error-msg" v-if="v$.formData.KitchenMeterunInstallingPrice.$error">
                                        {{ v$.formData.KitchenMeterunInstallingPrice.$errors[0].$message }}
                                    </span>
                                </div>
                                <div class="form_control_wrapper">
                                    <div>
                                        <label class="block text-sm font-medium text-gray-700 mb-1">سعر
                                            تركيب متر المطبخ*</label>
                                        <input v-model="v$.formData.KitchenMeterInstallingPrice.$model"
                                            :class="v$.formData.KitchenMeterInstallingPrice.$error ? 'input-error' : ''"
                                            type="number" placeholder="سعر تركيب متر المطبخ"
                                            class="w-full px-4 py-3 rounded-lg bg-white transition duration-200 outline-none border border-[#1b1718] text-[#1b1718]" />
                                    </div>
                                    <span class="error-msg" v-if="v$.formData.KitchenMeterInstallingPrice.$error">
                                        {{ v$.formData.KitchenMeterInstallingPrice.$errors[0].$message }}
                                    </span>
                                </div>
                                <div class="form_control_wrapper">
                                    <div>
                                        <label class="block text-sm font-medium text-gray-700 mb-1">سعر
                                            إيجار صناديق النقل*</label>
                                        <input v-model="v$.formData.rentPackingBoxesPrice.$model"
                                            :class="v$.formData.rentPackingBoxesPrice.$error ? 'input-error' : ''"
                                            type="number" placeholder="سعر إيجار صناديق النقل"
                                            class="w-full px-4 py-3 rounded-lg bg-white transition duration-200 outline-none border border-[#1b1718] text-[#1b1718]" />
                                    </div>
                                    <span class="error-msg" v-if="v$.formData.rentPackingBoxesPrice.$error">
                                        {{ v$.formData.rentPackingBoxesPrice.$errors[0].$message }}
                                    </span>
                                </div>
                                <div class="form_control_wrapper">
                                    <div>
                                        <label class="block text-sm font-medium text-gray-700 mb-1">سعر
                                            شراء صناديق النقل*</label>
                                        <input v-model="v$.formData.buyPackingBoxesPrice.$model"
                                            :class="v$.formData.buyPackingBoxesPrice.$error ? 'input-error' : ''"
                                            type="number" placeholder="سعر شراء صناديق النقل"
                                            class="w-full px-4 py-3 rounded-lg bg-white transition duration-200 outline-none border border-[#1b1718] text-[#1b1718]" />
                                    </div>
                                    <span class="error-msg" v-if="v$.formData.buyPackingBoxesPrice.$error">
                                        {{ v$.formData.buyPackingBoxesPrice.$errors[0].$message }}
                                    </span>
                                </div>
                                <div class="form_control_wrapper">
                                    <div>
                                        <label class="block text-sm font-medium text-gray-700 mb-1">سعر
                                            اليوم لتخزين الأثاث*</label>
                                        <input v-model="v$.formData.furnitureStoreDayPrice.$model"
                                            :class="v$.formData.furnitureStoreDayPrice.$error ? 'input-error' : ''"
                                            type="number" placeholder="سعر اليوم لتخزين الأثاث"
                                            class="w-full px-4 py-3 rounded-lg bg-white transition duration-200 outline-none border border-[#1b1718] text-[#1b1718]" />
                                    </div>
                                    <span class="error-msg" v-if="v$.formData.furnitureStoreDayPrice.$error">
                                        {{ v$.formData.furnitureStoreDayPrice.$errors[0].$message }}
                                    </span>
                                </div>
                                <div class="form_control_wrapper">
                                    <div>
                                        <label class="block text-sm font-medium text-gray-700 mb-1">سعر
                                            التخلص من الأثاث*</label>
                                        <input v-model="v$.formData.furnitureGitRedOfPrice.$model"
                                            :class="v$.formData.furnitureGitRedOfPrice.$error ? 'input-error' : ''"
                                            type="number" placeholder="سعر التخلص من الأثاث"
                                            class="w-full px-4 py-3 rounded-lg bg-white transition duration-200 outline-none border border-[#1b1718] text-[#1b1718]" />
                                    </div>
                                    <span class="error-msg" v-if="v$.formData.furnitureGitRedOfPrice.$error">
                                        {{ v$.formData.furnitureGitRedOfPrice.$errors[0].$message }}
                                    </span>
                                </div>
                                <div class="form_control_wrapper">
                                    <div>
                                        <label class="block text-sm font-medium text-gray-700 mb-1">سعر
                                            التنظيف النهائى*</label>
                                        <input v-model="v$.formData.cleaningPrice.$model"
                                            :class="v$.formData.cleaningPrice.$error ? 'input-error' : ''"
                                            type="number" placeholder="سعر التنظيف النهائى"
                                            class="w-full px-4 py-3 rounded-lg bg-white transition duration-200 outline-none border border-[#1b1718] text-[#1b1718]" />
                                    </div>
                                    <span class="error-msg" v-if="v$.formData.cleaningPrice.$error">
                                        {{ v$.formData.cleaningPrice.$errors[0].$message }}
                                    </span>
                                </div>
                                <div class="form_control_wrapper">
                                    <div>
                                        <label class="block text-sm font-medium text-gray-700 mb-1">سعر
                                            توصيل الغسالة*</label>
                                        <input v-model="v$.formData.connectingWashingMachinePrice.$model"
                                            :class="v$.formData.connectingWashingMachinePrice.$error ? 'input-error' : ''"
                                            type="number" placeholder="سعر توصيل الغسالة"
                                            class="w-full px-4 py-3 rounded-lg bg-white transition duration-200 outline-none border border-[#1b1718] text-[#1b1718]" />
                                    </div>
                                    <span class="error-msg" v-if="v$.formData.connectingWashingMachinePrice.$error">
                                        {{ v$.formData.connectingWashingMachinePrice.$errors[0].$message }}
                                    </span>
                                </div>
                                <div class="form_control_wrapper">
                                    <div>
                                        <label class="block text-sm font-medium text-gray-700 mb-1">سعر
                                            رافعة الأثاث*</label>
                                        <input v-model="v$.formData.furnitureLifterToolPrice.$model"
                                            :class="v$.formData.furnitureLifterToolPrice.$error ? 'input-error' : ''"
                                            type="number" placeholder="سعر رافعة الأثاث"
                                            class="w-full px-4 py-3 rounded-lg bg-white transition duration-200 outline-none border border-[#1b1718] text-[#1b1718]" />
                                    </div>
                                    <span class="error-msg" v-if="v$.formData.furnitureLifterToolPrice.$error">
                                        {{ v$.formData.furnitureLifterToolPrice.$errors[0].$message }}
                                    </span>
                                </div>
                                <div class="form_control_wrapper">
                                    <div>
                                        <label class="block text-sm font-medium text-gray-700 mb-1">سعر
                                            إنشاء منطقه ممنوع الوقوف*</label>
                                        <input v-model="v$.formData.noParkingPrice.$model"
                                            :class="v$.formData.noParkingPrice.$error ? 'input-error' : ''"
                                            type="number" placeholder="سعر إنشاء منطقه ممنوع الوقوف"
                                            class="w-full px-4 py-3 rounded-lg bg-white transition duration-200 outline-none border border-[#1b1718] text-[#1b1718]" />
                                    </div>
                                    <span class="error-msg" v-if="v$.formData.noParkingPrice.$error">
                                        {{ v$.formData.noParkingPrice.$errors[0].$message }}
                                    </span>
                                </div>

                            </div>
                        </form>
                    </div>
                </div>

                <div class="form_panel">
                    <div class="form_step_parent">
                        <form class="form-step">
                            <h3 class="text-xl font-bold mb-4">أسعار خدمات العمال</h3>
                            <div class="flex flex-col gap-4 mb-4">
                                <div class="form_control_wrapper">
                                    <div>
                                        <label class="block text-sm font-medium text-gray-700 mb-1">سعر
                                            العامل فى اليوم*</label>
                                        <input v-model="v$.formData.workerPerDay.$model"
                                            :class="v$.formData.workerPerDay.$error ? 'input-error' : ''"
                                            type="number" placeholder="سعر العامل فى اليوم"
                                            class="w-full px-4 py-3 rounded-lg bg-white transition duration-200 outline-none border border-[#1b1718] text-[#1b1718]" />
                                    </div>
                                    <span class="error-msg" v-if="v$.formData.workerPerDay.$error">
                                        {{ v$.formData.workerPerDay.$errors[0].$message }}
                                    </span>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>

                <div class="max-w-xl mx-auto">
                    <div class="btn_wrapper flex items-center gap-2">
                        <button @click="saveRequestData()" :class="isloading ? 'isloading' : ''" type="button" class="bg-client-dark hover:bg-client-dark/80 transition text-white px-6 py-2 rounded">
                            <span v-if="isloading" class="loading loading-spinner"></span>
                            <span>حفظ البيانات</span>
                        </button>
                    </div>
                </div>
            </div>
        </div>
    </section>
</template>

<script>
import { required, helpers } from '@vuelidate/validators'
import useVuelidate from '@vuelidate/core'
import { reactive, toRefs } from 'vue'
import axios from 'axios';

export default {
    name: "RequestConfig",
    setup() {
        const fields = reactive({
            formData: {
                kiloMeterPrice: '',
                movementPrice: '',
                meterPrice: '',
                floorWithLifterPrice: '',
                floorWithoutLifterPrice: '',
                boxPrice: '',
                meterInBasementPrice: '',
                roomPrice: '',
                squareMeterPrice: '',

                packingServicePrice: '',
                unpackingServicePrice: '',
                furnitureUncollectingPrice: '',
                furnitureCollectingPrice: '',
                KitchenMeterInstallingPrice: '',
                KitchenMeterunInstallingPrice: '',
                rentPackingBoxesPrice: '',
                buyPackingBoxesPrice: '',
                furnitureStoreDayPrice: '',
                furnitureGitRedOfPrice: '',
                cleaningPrice: '',
                connectingWashingMachinePrice: '',
                furnitureLifterToolPrice: '',
                noParkingPrice: '',

                workerPerDay: '',
            }
        });

        const rules = reactive({
            formData: {
                kiloMeterPrice: { required: helpers.withMessage('هذا الحقل مطلوب.', required) },
                movementPrice: { required: helpers.withMessage('هذا الحقل مطلوب.', required) },
                meterPrice: { required: helpers.withMessage('هذا الحقل مطلوب.', required) },
                floorWithLifterPrice: { required: helpers.withMessage('هذا الحقل مطلوب.', required) },
                floorWithoutLifterPrice: { required: helpers.withMessage('هذا الحقل مطلوب.', required) },
                boxPrice: { required: helpers.withMessage('هذا الحقل مطلوب.', required) },
                meterInBasementPrice: { required: helpers.withMessage('هذا الحقل مطلوب.', required) },
                roomPrice: { required: helpers.withMessage('هذا الحقل مطلوب.', required) },
                squareMeterPrice: { required: helpers.withMessage('هذا الحقل مطلوب.', required) },
                packingServicePrice: { required: helpers.withMessage('هذا الحقل مطلوب.', required) },
                unpackingServicePrice: { required: helpers.withMessage('هذا الحقل مطلوب.', required) },
                furnitureUncollectingPrice: { required: helpers.withMessage('هذا الحقل مطلوب.', required) },
                furnitureCollectingPrice: { required: helpers.withMessage('هذا الحقل مطلوب.', required) },
                KitchenMeterInstallingPrice: { required: helpers.withMessage('هذا الحقل مطلوب.', required) },
                KitchenMeterunInstallingPrice: { required: helpers.withMessage('هذا الحقل مطلوب.', required) },
                rentPackingBoxesPrice: { required: helpers.withMessage('هذا الحقل مطلوب.', required) },
                buyPackingBoxesPrice: { required: helpers.withMessage('هذا الحقل مطلوب.', required) },
                furnitureStoreDayPrice: { required: helpers.withMessage('هذا الحقل مطلوب.', required) },
                furnitureGitRedOfPrice: { required: helpers.withMessage('هذا الحقل مطلوب.', required) },
                cleaningPrice: { required: helpers.withMessage('هذا الحقل مطلوب.', required) },
                connectingWashingMachinePrice: { required: helpers.withMessage('هذا الحقل مطلوب.', required) },
                furnitureLifterToolPrice: { required: helpers.withMessage('هذا الحقل مطلوب.', required) },
                noParkingPrice: { required: helpers.withMessage('هذا الحقل مطلوب.', required) },
                workerPerDay: { required: helpers.withMessage('هذا الحقل مطلوب.', required) }
            }
        });

        const v$ = useVuelidate(rules, fields)
        return {
            ...toRefs(fields),
            v$
        }
    },
    data() {
        return {
            isloading: false,
        }
    },
    methods: {
        saveRequestData() {
            this.v$.formData.$touch()
            if (this.v$.formData.$invalid) {
                return
            }
            this.sendRequestConfigData();
        },
        getRequestConfigData(){
            axios.get('/api/service-prices')
                .then(res => {
                    if(res.data.isSuccess){
                        this.formData = res.data.data;
                    }
                })
                .catch(err => {
                    console.loog(err)
                    makeAlert(err.response?.data?.message, 'error')
                    if(err.status == 401){
                        this.authStore.logout();
                    }
                })
                .finally(() => {

                })
        },
        sendRequestConfigData(){
            this.isloading = true;
            axios.post('/api/service-price', this.formData)
                .then(res => {
                    if(res.data.isSuccess){
                        makeAlert(this.$t('savedSuccessfully'));
                    }
                })
                .catch(err => {
                    console.loog(err)
                    makeAlert(err.response?.data?.message, 'error')
                })
                .finally(() => {
                    this.isloading = false;
                })
        },
    },
    mounted(){
        this.getRequestConfigData();
    }
}
</script>