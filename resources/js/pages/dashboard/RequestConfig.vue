<template>
    <section class="py-12 bg-[#f1f1f1]">
        <div class="container">
            <div class="max-w-3xl mx-auto">
                <div class="max-w-xl mx-auto">
                    <h1 class="text-black font-bold text-2xl">{{ $t('requestPrices.title') }}</h1>
                </div>
                <div class="form_panel">
                    <div class="form_step_parent">
                        <div class="form-step">
                            <h3 class="text-xl font-bold mb-4">{{ $t('basicServicesPrices.title') }}</h3>
                            <div class="flex flex-col gap-4 mb-4">

                                <div class="form_control_wrapper">
                                    <div>
                                        <label class="block text-sm font-medium text-gray-700 mb-1">{{
                                            $t('basicServicesPrices.kiloMeterPriceLabel') }}*</label>
                                        <input v-model="v$.formData.kiloMeterPrice.$model"
                                            :class="v$.formData.kiloMeterPrice.$error ? 'input-error' : ''"
                                            type="number"
                                            :placeholder="$t('basicServicesPrices.kiloMeterPricePlaceholder')"
                                            class="w-full px-4 py-3 rounded-lg bg-white transition duration-200 outline-none border border-[#1b1718] text-[#1b1718]" />
                                    </div>
                                    <span class="error-msg" v-if="v$.formData.kiloMeterPrice.$error">
                                        {{ v$.formData.kiloMeterPrice.$errors[0].$message }}
                                    </span>
                                </div>

                                <div class="form_control_wrapper">
                                    <div>
                                        <label class="block text-sm font-medium text-gray-700 mb-1">{{
                                            $t('basicServicesPrices.meterPriceLabel') }}*</label>
                                        <input v-model="v$.formData.meterPrice.$model"
                                            :class="v$.formData.meterPrice.$error ? 'input-error' : ''" type="number"
                                            :placeholder="$t('basicServicesPrices.meterPricePlaceholder')"
                                            class="w-full px-4 py-3 rounded-lg bg-white transition duration-200 outline-none border border-[#1b1718] text-[#1b1718]" />
                                    </div>
                                    <span class="error-msg" v-if="v$.formData.meterPrice.$error">
                                        {{ v$.formData.meterPrice.$errors[0].$message }}
                                    </span>
                                </div>

                                <div class="form_control_wrapper">
                                    <div>
                                        <label class="block text-sm font-medium text-gray-700 mb-1">{{
                                            $t('basicServicesPrices.floorWithoutLifterLabel') }}*</label>
                                        <input v-model="v$.formData.floorWithoutLifterPrice.$model"
                                            :class="v$.formData.floorWithoutLifterPrice.$error ? 'input-error' : ''"
                                            type="number"
                                            :placeholder="$t('basicServicesPrices.floorWithoutLifterPlaceholder')"
                                            class="w-full px-4 py-3 rounded-lg bg-white transition duration-200 outline-none border border-[#1b1718] text-[#1b1718]" />
                                    </div>
                                    <span class="error-msg" v-if="v$.formData.floorWithoutLifterPrice.$error">
                                        {{ v$.formData.floorWithoutLifterPrice.$errors[0].$message }}
                                    </span>
                                </div>

                                <div class="form_control_wrapper">
                                    <div>
                                        <label class="block text-sm font-medium text-gray-700 mb-1">{{
                                            $t('basicServicesPrices.floorWithLifterLabel') }}*</label>
                                        <input v-model="v$.formData.floorWithLifterPrice.$model"
                                            :class="v$.formData.floorWithLifterPrice.$error ? 'input-error' : ''"
                                            type="number"
                                            :placeholder="$t('basicServicesPrices.floorWithLifterPlaceholder')"
                                            class="w-full px-4 py-3 rounded-lg bg-white transition duration-200 outline-none border border-[#1b1718] text-[#1b1718]" />
                                    </div>
                                    <span class="error-msg" v-if="v$.formData.floorWithLifterPrice.$error">
                                        {{ v$.formData.floorWithLifterPrice.$errors[0].$message }}
                                    </span>
                                </div>

                                <div class="form_control_wrapper">
                                    <div>
                                        <label class="block text-sm font-medium text-gray-700 mb-1">{{
                                            $t('basicServicesPrices.boxPriceLabel') }}*</label>
                                        <input v-model="v$.formData.boxPrice.$model"
                                            :class="v$.formData.boxPrice.$error ? 'input-error' : ''" type="number"
                                            :placeholder="$t('basicServicesPrices.boxPricePlaceholder')"
                                            class="w-full px-4 py-3 rounded-lg bg-white transition duration-200 outline-none border border-[#1b1718] text-[#1b1718]" />
                                    </div>
                                    <span class="error-msg" v-if="v$.formData.boxPrice.$error">
                                        {{ v$.formData.boxPrice.$errors[0].$message }}
                                    </span>
                                </div>

                                <div class="form_control_wrapper">
                                    <div>
                                        <label class="block text-sm font-medium text-gray-700 mb-1">{{
                                            $t('basicServicesPrices.meterInBasementLabel') }}*</label>
                                        <input v-model="v$.formData.meterInBasementPrice.$model"
                                            :class="v$.formData.meterInBasementPrice.$error ? 'input-error' : ''"
                                            type="number"
                                            :placeholder="$t('basicServicesPrices.meterInBasementPlaceholder')"
                                            class="w-full px-4 py-3 rounded-lg bg-white transition duration-200 outline-none border border-[#1b1718] text-[#1b1718]" />
                                    </div>
                                    <span class="error-msg" v-if="v$.formData.meterInBasementPrice.$error">
                                        {{ v$.formData.meterInBasementPrice.$errors[0].$message }}
                                    </span>
                                </div>

                                <div class="form_control_wrapper">
                                    <div>
                                        <label class="block text-sm font-medium text-gray-700 mb-1">{{
                                            $t('basicServicesPrices.roomPriceLabel') }}*</label>
                                        <input v-model="v$.formData.roomPrice.$model"
                                            :class="v$.formData.roomPrice.$error ? 'input-error' : ''" type="number"
                                            :placeholder="$t('basicServicesPrices.roomPricePlaceholder')"
                                            class="w-full px-4 py-3 rounded-lg bg-white transition duration-200 outline-none border border-[#1b1718] text-[#1b1718]" />
                                    </div>
                                    <span class="error-msg" v-if="v$.formData.roomPrice.$error">
                                        {{ v$.formData.roomPrice.$errors[0].$message }}
                                    </span>
                                </div>

                                <div class="form_control_wrapper">
                                    <div>
                                        <label class="block text-sm font-medium text-gray-700 mb-1">{{
                                            $t('basicServicesPrices.squareMeterPriceLabel') }}*</label>
                                        <input v-model="v$.formData.squareMeterPrice.$model"
                                            :class="v$.formData.squareMeterPrice.$error ? 'input-error' : ''"
                                            type="number"
                                            :placeholder="$t('basicServicesPrices.squareMeterPricePlaceholder')"
                                            class="w-full px-4 py-3 rounded-lg bg-white transition duration-200 outline-none border border-[#1b1718] text-[#1b1718]" />
                                    </div>
                                    <span class="error-msg" v-if="v$.formData.squareMeterPrice.$error">
                                        {{ v$.formData.squareMeterPrice.$errors[0].$message }}
                                    </span>
                                </div>

                            </div>
                        </div>
                    </div>
                </div>

                <div class="form_panel">
                    <div class="form_step_parent">
                        <div class="form-step">
                            <h3 class="text-xl font-bold mb-4">{{ $t('requestPrices.additionalServicesTitle') }}</h3>
                            <div class="flex flex-col gap-4 mb-4">

                                <div class="form_control_wrapper">
                                    <div>
                                        <label class="block text-sm font-medium text-gray-700 mb-1">
                                            {{ $t('requestPrices.packingServicePriceLabel') }}*</label>
                                        <input v-model="v$.formData.packingServicePrice.$model"
                                            :class="v$.formData.packingServicePrice.$error ? 'input-error' : ''"
                                            type="number" :placeholder="$t('requestPrices.packingServicePriceLabel')"
                                            class="w-full px-4 py-3 rounded-lg bg-white transition duration-200 outline-none border border-[#1b1718] text-[#1b1718]" />
                                    </div>
                                    <span class="error-msg" v-if="v$.formData.packingServicePrice.$error">
                                        {{ v$.formData.packingServicePrice.$errors[0].$message }}
                                    </span>
                                </div>
                                <div class="form_control_wrapper">
                                    <div>
                                        <label
                                            class="block text-sm font-medium text-gray-700 mb-1">{{ $t('requestPrices.unpackingServicePriceLabel') }}*</label>
                                        <input v-model="v$.formData.unpackingServicePrice.$model"
                                            :class="v$.formData.unpackingServicePrice.$error ? 'input-error' : ''"
                                            type="number" :placeholder="$t('requestPrices.unpackingServicePriceLabel')"
                                            class="w-full px-4 py-3 rounded-lg bg-white transition duration-200 outline-none border border-[#1b1718] text-[#1b1718]" />
                                    </div>
                                    <span class="error-msg" v-if="v$.formData.unpackingServicePrice.$error">
                                        {{ v$.formData.unpackingServicePrice.$errors[0].$message }}
                                    </span>
                                </div>
                                <div class="form_control_wrapper">
                                    <div>
                                        <label
                                            class="block text-sm font-medium text-gray-700 mb-1">{{ $t('requestPrices.furnitureUncollectingPriceLabel') }}*</label>
                                        <input v-model="v$.formData.furnitureUncollectingPrice.$model"
                                            :class="v$.formData.furnitureUncollectingPrice.$error ? 'input-error' : ''"
                                            type="number"
                                            :placeholder="$t('requestPrices.furnitureUncollectingPriceLabel')"
                                            class="w-full px-4 py-3 rounded-lg bg-white transition duration-200 outline-none border border-[#1b1718] text-[#1b1718]" />
                                    </div>
                                    <span class="error-msg" v-if="v$.formData.furnitureUncollectingPrice.$error">
                                        {{ v$.formData.furnitureUncollectingPrice.$errors[0].$message }}
                                    </span>
                                </div>
                                <div class="form_control_wrapper">
                                    <div>
                                        <label
                                            class="block text-sm font-medium text-gray-700 mb-1">{{ $t('requestPrices.furnitureCollectingPriceLabel') }}*</label>
                                        <input v-model="v$.formData.furnitureCollectingPrice.$model"
                                            :class="v$.formData.furnitureCollectingPrice.$error ? 'input-error' : ''"
                                            type="number"
                                            :placeholder="$t('requestPrices.furnitureCollectingPriceLabel')"
                                            class="w-full px-4 py-3 rounded-lg bg-white transition duration-200 outline-none border border-[#1b1718] text-[#1b1718]" />
                                    </div>
                                    <span class="error-msg" v-if="v$.formData.furnitureCollectingPrice.$error">
                                        {{ v$.formData.furnitureCollectingPrice.$errors[0].$message }}
                                    </span>
                                </div>
                                <div class="form_control_wrapper">
                                    <div>
                                        <label
                                            class="block text-sm font-medium text-gray-700 mb-1">{{ $t('requestPrices.KitchenMeterunInstallingPriceLabel') }}*</label>
                                        <input v-model="v$.formData.KitchenMeterunInstallingPrice.$model"
                                            :class="v$.formData.KitchenMeterunInstallingPrice.$error ? 'input-error' : ''"
                                            type="number"
                                            :placeholder="$t('requestPrices.KitchenMeterunInstallingPriceLabel')"
                                            class="w-full px-4 py-3 rounded-lg bg-white transition duration-200 outline-none border border-[#1b1718] text-[#1b1718]" />
                                    </div>
                                    <span class="error-msg" v-if="v$.formData.KitchenMeterunInstallingPrice.$error">
                                        {{ v$.formData.KitchenMeterunInstallingPrice.$errors[0].$message }}
                                    </span>
                                </div>
                                <div class="form_control_wrapper">
                                    <div>
                                        <label
                                            class="block text-sm font-medium text-gray-700 mb-1">{{ $t('requestPrices.KitchenMeterInstallingPriceLabel') }}*</label>
                                        <input v-model="v$.formData.KitchenMeterInstallingPrice.$model"
                                            :class="v$.formData.KitchenMeterInstallingPrice.$error ? 'input-error' : ''"
                                            type="number"
                                            :placeholder="$t('requestPrices.KitchenMeterInstallingPriceLabel')"
                                            class="w-full px-4 py-3 rounded-lg bg-white transition duration-200 outline-none border border-[#1b1718] text-[#1b1718]" />
                                    </div>
                                    <span class="error-msg" v-if="v$.formData.KitchenMeterInstallingPrice.$error">
                                        {{ v$.formData.KitchenMeterInstallingPrice.$errors[0].$message }}
                                    </span>
                                </div>
                                <div class="form_control_wrapper">
                                    <div>
                                        <label
                                            class="block text-sm font-medium text-gray-700 mb-1">{{ $t('requestPrices.rentPackingBoxesPriceLabel') }}*</label>
                                        <input v-model="v$.formData.rentPackingBoxesPrice.$model"
                                            :class="v$.formData.rentPackingBoxesPrice.$error ? 'input-error' : ''"
                                            type="number" :placeholder="$t('requestPrices.rentPackingBoxesPriceLabel')"
                                            class="w-full px-4 py-3 rounded-lg bg-white transition duration-200 outline-none border border-[#1b1718] text-[#1b1718]" />
                                    </div>
                                    <span class="error-msg" v-if="v$.formData.rentPackingBoxesPrice.$error">
                                        {{ v$.formData.rentPackingBoxesPrice.$errors[0].$message }}
                                    </span>
                                </div>
                                <div class="form_control_wrapper">
                                    <div>
                                        <label
                                            class="block text-sm font-medium text-gray-700 mb-1">{{ $t('requestPrices.buyPackingBoxesPriceLabel') }}*</label>
                                        <input v-model="v$.formData.buyPackingBoxesPrice.$model"
                                            :class="v$.formData.buyPackingBoxesPrice.$error ? 'input-error' : ''"
                                            type="number" :placeholder="$t('requestPrices.buyPackingBoxesPriceLabel')"
                                            class="w-full px-4 py-3 rounded-lg bg-white transition duration-200 outline-none border border-[#1b1718] text-[#1b1718]" />
                                    </div>
                                    <span class="error-msg" v-if="v$.formData.buyPackingBoxesPrice.$error">
                                        {{ v$.formData.buyPackingBoxesPrice.$errors[0].$message }}
                                    </span>
                                </div>
                                <div class="form_control_wrapper">
                                    <div>
                                        <label
                                            class="block text-sm font-medium text-gray-700 mb-1">{{ $t('requestPrices.furnitureStoreDayPriceLabel') }}*</label>
                                        <input v-model="v$.formData.furnitureStoreDayPrice.$model"
                                            :class="v$.formData.furnitureStoreDayPrice.$error ? 'input-error' : ''"
                                            type="number" :placeholder="$t('requestPrices.furnitureStoreDayPriceLabel')"
                                            class="w-full px-4 py-3 rounded-lg bg-white transition duration-200 outline-none border border-[#1b1718] text-[#1b1718]" />
                                    </div>
                                    <span class="error-msg" v-if="v$.formData.furnitureStoreDayPrice.$error">
                                        {{ v$.formData.furnitureStoreDayPrice.$errors[0].$message }}
                                    </span>
                                </div>
                                <div class="form_control_wrapper">
                                    <div>
                                        <label class="block text-sm font-medium text-gray-700 mb-1">{{
                                            $t('requestPrices.furnitureGitRedOfPriceLabel') }}*</label>
                                        <input v-model="v$.formData.furnitureGitRedOfPrice.$model"
                                            :class="v$.formData.furnitureGitRedOfPrice.$error ? 'input-error' : ''"
                                            type="number" :placeholder="$t('requestPrices.furnitureGitRedOfPriceLabel')"
                                            class="w-full px-4 py-3 rounded-lg bg-white transition duration-200 outline-none border border-[#1b1718] text-[#1b1718]" />
                                    </div>
                                    <span class="error-msg" v-if="v$.formData.furnitureGitRedOfPrice.$error">
                                        {{ v$.formData.furnitureGitRedOfPrice.$errors[0].$message }}
                                    </span>
                                </div>
                                <div class="form_control_wrapper">
                                    <div>
                                        <label class="block text-sm font-medium text-gray-700 mb-1">{{
                                            $t('requestPrices.cleaningPriceLabel') }}*</label>
                                        <input v-model="v$.formData.cleaningPrice.$model"
                                            :class="v$.formData.cleaningPrice.$error ? 'input-error' : ''" type="number"
                                            :placeholder="$t('requestPrices.cleaningPriceLabel')"
                                            class="w-full px-4 py-3 rounded-lg bg-white transition duration-200 outline-none border border-[#1b1718] text-[#1b1718]" />
                                    </div>
                                    <span class="error-msg" v-if="v$.formData.cleaningPrice.$error">
                                        {{ v$.formData.cleaningPrice.$errors[0].$message }}
                                    </span>
                                </div>
                                <div class="form_control_wrapper">
                                    <div>
                                        <label
                                            class="block text-sm font-medium text-gray-700 mb-1">{{ $t('requestPrices.connectingWashingMachinePriceLabel') }}*</label>
                                        <input v-model="v$.formData.connectingWashingMachinePrice.$model"
                                            :class="v$.formData.connectingWashingMachinePrice.$error ? 'input-error' : ''"
                                            type="number"
                                            :placeholder="$t('requestPrices.connectingWashingMachinePriceLabel')"
                                            class="w-full px-4 py-3 rounded-lg bg-white transition duration-200 outline-none border border-[#1b1718] text-[#1b1718]" />
                                    </div>
                                    <span class="error-msg" v-if="v$.formData.connectingWashingMachinePrice.$error">
                                        {{ v$.formData.connectingWashingMachinePrice.$errors[0].$message }}
                                    </span>
                                </div>
                                <div class="form_control_wrapper">
                                    <div>
                                        <label
                                            class="block text-sm font-medium text-gray-700 mb-1">{{ $t('requestPrices.furnitureLifterToolPriceLabel') }}*</label>
                                        <input v-model="v$.formData.furnitureLifterToolPrice.$model"
                                            :class="v$.formData.furnitureLifterToolPrice.$error ? 'input-error' : ''"
                                            type="number"
                                            :placeholder="$t('requestPrices.furnitureLifterToolPriceLabel')"
                                            class="w-full px-4 py-3 rounded-lg bg-white transition duration-200 outline-none border border-[#1b1718] text-[#1b1718]" />
                                    </div>
                                    <span class="error-msg" v-if="v$.formData.furnitureLifterToolPrice.$error">
                                        {{ v$.formData.furnitureLifterToolPrice.$errors[0].$message }}
                                    </span>
                                </div>
                                <div class="form_control_wrapper">
                                    <div>
                                        <label
                                            class="block text-sm font-medium text-gray-700 mb-1">{{ $t('requestPrices.noParkingPriceLabel') }}*</label>
                                        <input v-model="v$.formData.noParkingPrice.$model"
                                            :class="v$.formData.noParkingPrice.$error ? 'input-error' : ''"
                                            type="number" :placeholder="$t('requestPrices.noParkingPriceLabel')"
                                            class="w-full px-4 py-3 rounded-lg bg-white transition duration-200 outline-none border border-[#1b1718] text-[#1b1718]" />
                                    </div>
                                    <span class="error-msg" v-if="v$.formData.noParkingPrice.$error">
                                        {{ v$.formData.noParkingPrice.$errors[0].$message }}
                                    </span>
                                </div>

                            </div>
                        </div>
                    </div>
                </div>

                <div class="form_panel">
                    <div class="form_step_parent">
                        <div class="form-step">
                            <h3 class="text-xl font-bold mb-4">{{ $t('workerServicesPrices.title') }}</h3>
                            <div class="flex flex-col gap-4 mb-4">
                                <div class="form_control_wrapper">
                                    <div>
                                        <label class="block text-sm font-medium text-gray-700 mb-1">{{
                                            $t('workerServicesPrices.workerPriceLabel') }}*</label>
                                        <input v-model="v$.formData.workerPerDay.$model"
                                            :class="v$.formData.workerPerDay.$error ? 'input-error' : ''" type="number"
                                            :placeholder="$t('workerServicesPrices.workerPricePlaceholder')"
                                            class="w-full px-4 py-3 rounded-lg bg-white transition duration-200 outline-none border border-[#1b1718] text-[#1b1718]" />
                                    </div>
                                    <span class="error-msg" v-if="v$.formData.workerPerDay.$error">
                                        {{ v$.formData.workerPerDay.$errors[0].$message }}
                                    </span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="max-w-xl mx-auto">
                    <div class="btn_wrapper flex items-center gap-2">
                        <button @click="saveRequestData()" :class="isloading ? 'isloading' : ''" type="button"
                            class="bg-client-dark hover:bg-client-dark/80 transition text-white px-6 py-2 rounded">
                            <span v-if="isloading" class="loading loading-spinner"></span>
                            <span>{{ $t('requestPrices.saveData') }}</span>
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
import { useAuthStore } from '../../stores/auth';

export default {
    name: "RequestConfig",
    setup() {
        const fields = reactive({
            formData: {
                kiloMeterPrice: '',
                // movementPrice: '',
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
                // movementPrice: { required: helpers.withMessage('هذا الحقل مطلوب.', required) },
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

        const authStore = useAuthStore()


        return {
            ...toRefs(fields),
            v$,
            authStore
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
        getRequestConfigData() {
            $axios.get('/service-prices', {
                headers: {
                    Authorization: `Bearer ${this.authStore.token}`
                }
            })
                .then(res => {
                    if (res.data.isSuccess) {
                        this.formData = res.data.data;
                    }
                })
                .catch(err => {
                    console.log(err)
                    makeAlert(err.response?.data?.message, 'error')
                    if (err.status == 401) {
                        this.authStore.logout();
                    }
                })
                .finally(() => {
                })
        },
        sendRequestConfigData() {
            this.isloading = true;
            $axios.post('/service-price', {...this.formData}, {
                headers: {
                    Authorization: `Bearer ${this.authStore.token}`
                }
            })
                .then(res => {
                    if (res.data.isSuccess) {
                        makeAlert(this.$t('savedSuccessfully'));
                    }
                })
                .catch(err => {
                    console.log(err)
                    console.log(err.status)
                    makeAlert(err.response?.data?.message, 'error')
                    if (err.status == 401) {
                        this.authStore.logout();
                    }
                })
                .finally(() => {
                    this.isloading = false;
                })
        },
    },
    mounted() {
        this.getRequestConfigData();
    }
}
</script>