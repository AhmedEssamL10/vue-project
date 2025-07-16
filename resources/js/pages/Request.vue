<template>
  <section class="py-12 bg-[#f1f1f1]">
    <div class="container relative z-10">
      <div class="max-w-3xl mx-auto">
        <div class="mt-8">
          <dialog v-if="creditionals_modal_shown" ref="creditionals_modal" id="creditionals_modal" class="modal">
            <div class="modal-box bg-[#f1f1f1] text-black">
              <h3 class="text-lg font-bold">
                {{ $t("credntialsPopUpTitle") }}
              </h3>
              <p class="py-4">
                {{ $t("credntialsPopUpMessage") }}
              </p>
              <div>
                <div class="flex flex-col gap-1 mb-2">
                  <label>{{ $t("email_required") }}</label>
                  <div class="relative bg-[#E1E1E1]">
                    <input class="p-3 bg-transparent" :value="credentials?.email || ''" />
                    <span @click="
                      copyToClipboard(
                        credentials?.email || '',
                        false
                      )
                      " :title="$t('copyEmail')">
                      <svg width="25px"
                        class="cursor-pointer hover:opacity-70 hover:scale-110 absolute left-2 top-1/2 -translate-y-1/2"
                        xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor">
                        <path
                          d="M6 4V8H18V4H20.0066C20.5552 4 21 4.44495 21 4.9934V21.0066C21 21.5552 20.5551 22 20.0066 22H3.9934C3.44476 22 3 21.5551 3 21.0066V4.9934C3 4.44476 3.44495 4 3.9934 4H6ZM8 2H16V6H8V2Z">
                        </path>
                      </svg>
                    </span>
                  </div>
                </div>
                <div class="flex flex-col gap-1 mb-2">
                  <label>{{ $t("password") }}</label>
                  <div class="relative bg-[#E1E1E1]">
                    <input class="p-3 bg-transparent" :value="credentials?.password || ''" />
                    <span @click="
                      copyToClipboard(
                        credentials?.password || '',
                        true
                      )
                      " :title="$t('copyPassword')">
                      <svg width="25px"
                        class="cursor-pointer hover:opacity-70 hover:scale-110 absolute left-2 top-1/2 -translate-y-1/2"
                        xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor">
                        <path
                          d="M6 4V8H18V4H20.0066C20.5552 4 21 4.44495 21 4.9934V21.0066C21 21.5552 20.5551 22 20.0066 22H3.9934C3.44476 22 3 21.5551 3 21.0066V4.9934C3 4.44476 3.44495 4 3.9934 4H6ZM8 2H16V6H8V2Z">
                        </path>
                      </svg>
                    </span>
                  </div>
                </div>
              </div>
              <span class="text-sm text-red-500">
                <span class="font-bold">{{ $t("notice") }}:
                </span>
                <span>{{ $t("saveCredentials") }}</span>
              </span>
              <div class="modal-action">
                <button @click="closeCredentialsModal" type="button" class="btn btn-outline">
                  {{ $t("close") }}
                </button>
                <a :href="loginPageUrl" class="btn">{{
                  $t("login")
                }}</a>
              </div>
            </div>
          </dialog>
          <!-- Multi-Step Form Start -->
          <template v-if="resultsReady">
            <div class="form_panel !max-w-3xl">
              <template v-if="servicesCosts.workers_form">
                <div v-if="
                  servicesCosts.workers_cost &&
                  servicesCosts.workers_cost != '0'
                " class="flex justify-between items-center gap-4 border-b borde-black pb-4 mb-4">
                  <span>{{ $t("workersCost") }}</span>
                  <span class="font-bold">{{ servicesCosts.workers_cost }}
                    {{ $t("euro") }}</span>
                </div>
              </template>
              <template v-else>
                <div class="mb-8">
                  <h3 class="text-xl font-bold mb-8">
                    {{ $t("basicServicesCost") }}
                  </h3>
                  <div class="flex flex-col">
                    <div v-if="
                      servicesCosts.boxPrice &&
                      servicesCosts.boxPrice !=
                      '0'
                    " class="flex justify-between items-center gap-4 border-b borde-black pb-4 mb-4">
                      <span>{{
                        $t("boxesCost")
                      }}</span>
                      <span class="font-bold">{{
                        servicesCosts.boxPrice
                      }}
                        {{ $t("euro") }}</span>
                    </div>
                    <div v-if="
                      servicesCosts.distancePrice &&
                      servicesCosts.distancePrice !=
                      '0'
                    " class="flex justify-between items-center gap-4 border-b borde-black pb-4 mb-4">
                      <span>{{
                        $t("gasolineCost")
                      }}</span>
                      <span class="font-bold">{{
                        servicesCosts.distancePrice
                      }}
                        {{ $t("euro") }}</span>
                    </div>
                    <div v-if="
                      servicesCosts.pickupFloorWithoutLifterPrice &&
                      servicesCosts.pickupFloorWithoutLifterPrice !=
                      '0'
                    "
                      class="flex justify-between items-center gap-4 border-b borde-black pb-4 mb-4">
                      <span>{{
                        $t("pickupFloorCostFrom")
                      }}</span>
                      <span class="font-bold">{{
                        servicesCosts.pickupFloorWithoutLifterPrice
                      }}
                        {{ $t("euro") }}</span>
                    </div>
                    <div v-if="
                      servicesCosts.pickupMeterPrice &&
                      servicesCosts.pickupMeterPrice !=
                      '0'
                    "
                      class="flex justify-between items-center gap-4 border-b borde-black pb-4 mb-4">
                      <span>{{
                        $t("pickupMeterCost")
                      }}</span>
                      <span class="font-bold">{{
                        servicesCosts.pickupMeterPrice
                      }}
                        {{ $t("euro") }}</span>
                    </div>
                    <div v-if="
                      servicesCosts.dropOffFloorWithoutLifterPrice &&
                      servicesCosts.dropOffFloorWithoutLifterPrice !=
                      '0'
                    "
                      class="flex justify-between items-center gap-4 border-b borde-black pb-4 mb-4">
                      <span>{{
                        $t("dropOffFloorCostTo")
                      }}</span>
                      <span class="font-bold">{{
                        servicesCosts.dropOffFloorWithoutLifterPrice
                      }}
                        {{ $t("euro") }}</span>
                    </div>
                    <div v-if="
                      servicesCosts.dropOffMeterPrice &&
                      servicesCosts.dropOffMeterPrice !=
                      '0'
                    "
                      class="flex justify-between items-center gap-4 border-b borde-black pb-4 mb-4">
                      <span>{{
                        $t("dropOffMeterCost")
                      }}</span>
                      <span class="font-bold">{{
                        servicesCosts.dropOffMeterPrice
                      }}
                        {{ $t("euro") }}</span>
                    </div>
                    <div v-if="
                      servicesCosts.meterInBasementPrice &&
                      servicesCosts.meterInBasementPrice !=
                      '0'
                    "
                      class="flex justify-between items-center gap-4 border-b borde-black pb-4 mb-4">
                      <span>{{
                        $t("additionalStorageCost")
                      }}</span>
                      <span class="font-bold">{{
                        servicesCosts.meterInBasementPrice
                      }}</span>
                    </div>
                    <div v-if="
                      servicesCosts.squareMeterPrice &&
                      servicesCosts.squareMeterPrice !=
                      '0'
                    "
                      class="flex justify-between items-center gap-4 border-b borde-black pb-4 mb-4">
                      <span>{{
                        $t("homeSpaceCost")
                      }}</span>
                      <span class="font-bold">{{
                        servicesCosts.squareMeterPrice
                      }}
                        {{ $t("euro") }}</span>
                    </div>
                  </div>
                </div>
                <div class="mb-8">
                  <h3 class="text-xl font-bold mb-8">
                    {{ $t("additionalServicesCost") }}
                  </h3>
                  <div class="flex flex-col">
                    <div v-if="
                      servicesCosts.furnitureStoreDayPrice &&
                      servicesCosts.furnitureStoreDayPrice !=
                      '0'
                    "
                      class="flex justify-between items-center gap-4 border-b borde-black pb-4 mb-4">
                      <span>{{
                        $t("furnitureStorage")
                      }}</span>
                      <span class="font-bold">{{
                        servicesCosts.furnitureStoreDayPrice
                      }}
                        {{ $t("euro") }}</span>
                    </div>
                    <div v-if="
                      servicesCosts.cleaningPrice &&
                      servicesCosts.cleaningPrice !=
                      '0'
                    "
                      class="flex justify-between items-center gap-4 border-b borde-black pb-4 mb-4">
                      <span>{{ $t("cleaning") }}</span>
                      <span class="font-bold">{{
                        servicesCosts.cleaningPrice
                      }}
                        {{ $t("euro") }}</span>
                    </div>
                    <div v-if="
                      servicesCosts.furnitureLifterToolPrice &&
                      servicesCosts.furnitureLifterToolPrice !=
                      '0'
                    "
                      class="flex justify-between items-center gap-4 border-b borde-black pb-4 mb-4">
                      <span>{{
                        $t("furnitureLifter")
                      }}</span>
                      <span class="font-bold">{{
                        servicesCosts.furnitureLifterToolPrice
                      }}
                        {{ $t("euro") }}</span>
                    </div>
                    <div v-if="
                      servicesCosts.furnitureCollectingPrice &&
                      servicesCosts.furnitureCollectingPrice !=
                      '0'
                    "
                      class="flex justify-between items-center gap-4 border-b borde-black pb-4 mb-4">
                      <span>{{
                        $t("furnitureCollecting")
                      }}</span>
                      <span class="font-bold">{{
                        servicesCosts.furnitureCollectingPrice
                      }}
                        {{ $t("euro") }}</span>
                    </div>
                    <div v-if="
                      servicesCosts.furnitureGitRedOfPrice &&
                      servicesCosts.furnitureGitRedOfPrice !=
                      '0'
                    "
                      class="flex justify-between items-center gap-4 border-b borde-black pb-4 mb-4">
                      <span>{{
                        $t("furnitureGitRedOf")
                      }}</span>
                      <span class="font-bold">{{
                        servicesCosts.furnitureGitRedOfPrice
                      }}
                        {{ $t("euro") }}</span>
                    </div>
                    <div v-if="
                      servicesCosts.furnitureUncollectingPrice &&
                      servicesCosts.furnitureUncollectingPrice !=
                      '0'
                    "
                      class="flex justify-between items-center gap-4 border-b borde-black pb-4 mb-4">
                      <span>{{
                        $t("furnitureUncollecting")
                      }}</span>
                      <span class="font-bold">{{
                        servicesCosts.furnitureUncollectingPrice
                      }}
                        {{ $t("euro") }}</span>
                    </div>
                    <div v-if="
                      servicesCosts.connectingWashingMachinePrice &&
                      servicesCosts.connectingWashingMachinePrice !=
                      '0'
                    "
                      class="flex justify-between items-center gap-4 border-b borde-black pb-4 mb-4">
                      <span>{{
                        $t("washingMachineConnection")
                      }}</span>
                      <span class="font-bold">{{
                        servicesCosts.connectingWashingMachinePrice
                      }}
                        {{ $t("euro") }}</span>
                    </div>
                    <div v-if="
                      servicesCosts.packingServicePrice &&
                      servicesCosts.packingServicePrice !=
                      '0'
                    "
                      class="flex justify-between items-center gap-4 border-b borde-black pb-4 mb-4">
                      <span>{{
                        $t("packingService")
                      }}</span>
                      <span class="font-bold">{{
                        servicesCosts.packingServicePrice
                      }}
                        {{ $t("euro") }}</span>
                    </div>
                    <div v-if="
                      servicesCosts.unpackingServicePrice &&
                      servicesCosts.unpackingServicePrice !=
                      '0'
                    "
                      class="flex justify-between items-center gap-4 border-b borde-black pb-4 mb-4">
                      <span>{{
                        $t("unpackingService")
                      }}</span>
                      <span class="font-bold">{{
                        servicesCosts.unpackingServicePrice
                      }}
                        {{ $t("euro") }}</span>
                    </div>
                    <div v-if="
                      servicesCosts.KitchenMeterunInstallingPrice &&
                      servicesCosts.KitchenMeterunInstallingPrice !=
                      '0'
                    "
                      class="flex justify-between items-center gap-4 border-b borde-black pb-4 mb-4">
                      <span>{{
                        $t("kitchenUninstall")
                      }}</span>
                      <span class="font-bold">{{
                        servicesCosts.KitchenMeterunInstallingPrice
                      }}
                        {{ $t("euro") }}</span>
                    </div>
                    <div v-if="
                      servicesCosts.KitchenMeterInstallingPrice &&
                      servicesCosts.KitchenMeterInstallingPrice !=
                      '0'
                    "
                      class="flex justify-between items-center gap-4 border-b borde-black pb-4 mb-4">
                      <span>{{
                        $t("kitchenInstall")
                      }}</span>
                      <span class="font-bold">{{
                        servicesCosts.KitchenMeterInstallingPrice
                      }}
                        {{ $t("euro") }}</span>
                    </div>
                    <div v-if="
                      servicesCosts.buyPackingBoxesPrice &&
                      servicesCosts.buyPackingBoxesPrice !=
                      '0'
                    "
                      class="flex justify-between items-center gap-4 border-b borde-black pb-4 mb-4">
                      <span>{{
                        $t("buyPackingBoxes")
                      }}</span>
                      <span class="font-bold">{{
                        servicesCosts.buyPackingBoxesPrice
                      }}
                        {{ $t("euro") }}</span>
                    </div>
                    <div v-if="
                      servicesCosts.rentPackingBoxesPrice &&
                      servicesCosts.rentPackingBoxesPrice !=
                      '0'
                    "
                      class="flex justify-between items-center gap-4 border-b borde-black pb-4 mb-4">
                      <span>{{
                        $t("rentPackingBoxes")
                      }}</span>
                      <span class="font-bold">{{
                        servicesCosts.rentPackingBoxesPrice
                      }}
                        {{ $t("euro") }}</span>
                    </div>
                    <div v-if="
                      servicesCosts.noParkingPrice &&
                      servicesCosts.noParkingPrice !=
                      '0'
                    "
                      class="flex justify-between items-center gap-4 border-b borde-black pb-4 mb-4">
                      <span>{{
                        $t("noParkingZone")
                      }}</span>
                      <span class="font-bold">{{
                        servicesCosts.noParkingPrice
                      }}
                        {{ $t("euro") }}</span>
                    </div>
                  </div>
                </div>
              </template>
              <div class="flex justify-between items-center">
                <span class="font-bold text-xl">{{
                  $t("totalCost")
                }}</span>
                <span class="flex flex-col">
                  <span class="font-bold text-xl">{{ Number(totalCost).toFixed(2) }} {{ $t("euro") }}</span>
                  <span v-if="servicesCosts?.tax">({{ $t("includingTax") }}
                    {{ Number(servicesCosts.tax).toFixed(2) }}
                    {{ $t("euro") }})</span>
                </span>
              </div>
            </div>
            <div class="btn_wrapper flex items-center gap-2">
              <button @click="reloadPage" type="button"
                class="bg-transparent border border-client hover:bg-client-dark transition hover:text-white text-client px-6 py-2 rounded mr-2">
                {{ $t("makeAnotherRequest") }}
              </button>
              <button @click="navigateToHome" type="button"
                class="bg-transparent border border-client hover:bg-client-dark transition hover:text-white text-client px-6 py-2 rounded mr-2">
                {{ $t("goToHome") }}
              </button>
            </div>
          </template>
          <template v-else>
            <!-- Client Type -->
            <template v-if="stepNumber === 0 && companyStepNumber === 0">
              <div class="form_panel">
                <div class="form_step_parent">
                  <!-- Step 1: Pickup Details -->
                  <form class="form-step">
                    <h3 class="text-xl font-bold mb-4">
                      {{ $t("client_type") }}
                    </h3>
                    <div class="flex flex-col gap-4 mb-4">
                      <div class="form_control_wrapper">
                        <div class="flex flex-col gap-3">
                          <label class="label cursor-pointer">
                            <input @change="
                              clientTypeError = false
                              " type="radio" v-model="clientType" value="personal"
                              name="clientType"
                              class="radio border !bg-transparent checked:border-client-dark border-client-dark checked:before:bg-client"
                              :class="clientTypeError
                                  ? 'input-error'
                                  : ''
                                " />
                            <span class="label-text text-[`#1b1718`]">{{
                              $t("personal")
                            }}</span>
                          </label>
                          <label class="label cursor-pointer">
                            <input @change="
                              clientTypeError = false
                              " type="radio" v-model="clientType" value="company"
                              name="clientType"
                              class="radio border !bg-transparent checked:border-client-dark border-client-dark checked:before:bg-client"
                              :class="clientTypeError
                                  ? 'input-error'
                                  : ''
                                " />
                            <span class="label-text text-[`#1b1718`]">{{
                              $t("company")
                            }}</span>
                          </label>
                        </div>
                        <span v-if="clientTypeError" class="error-msg">{{
                          $t(
                            "please_select_client_type"
                          )
                        }}</span>
                      </div>
                    </div>
                  </form>
                </div>
              </div>
              <div class="max-w-xl mx-auto">
                <button type="button" @click="
                  handleNextStepOfCompanyOrPersonal(
                    clientType
                  )
                  "
                  class="bg-client-dark hover:bg-client-dark/80 transition text-white px-6 py-2 rounded nextStepBtn">
                  {{ $t("next") }}
                </button>
              </div>
            </template>

            <template v-if="clientType === 'company'">
              <template v-if="companyStepNumber === 1">
                <div class="form_panel">
                  <div class="form_step_parent">
                    <!-- Step 1: Pickup Details -->
                    <form class="form-step">
                      <h3 class="text-xl font-bold mb-4">
                        {{ $t("what_do_you_need") }}
                      </h3>
                      <div class="flex flex-col gap-4">
                        <div class="form_control_wrapper">
                          <div class="flex flex-col gap-3">
                            <label class="label cursor-pointer">
                              <input @change="
                                companyChooseError = false
                                " type="radio" v-model="companyOption
                                                                  " value="shipping" name="companyOption"
                                class="radio border !bg-transparent checked:border-client-dark border-client-dark checked:before:bg-client"
                                :class="companyChooseError
                                    ? 'input-error'
                                    : ''
                                  " />
                              <span class="label-text text-[#1b1718]">{{
                                $t(
                                  "shipping"
                                )
                              }}</span>
                            </label>
                            <label class="label cursor-pointer">
                              <input @change="
                                companyChooseError = false
                                " type="radio" v-model="companyOption
                                                                  " value="workers" name="companyOption"
                                class="radio border !bg-transparent checked:border-client-dark border-client-dark checked:before:bg-client"
                                :class="companyChooseError
                                    ? 'input-error'
                                    : ''
                                  " />
                              <span class="label-text text-[#1b1718]">{{
                                $t(
                                  "workers_support"
                                )
                              }}</span>
                            </label>
                          </div>
                          <span v-if="
                            companyChooseError
                          " class="error-msg">{{
                                                          $t(
                                                            "please_choose_what_you_want"
                                                          )
                                                        }}</span>
                        </div>
                      </div>
                    </form>
                  </div>
                </div>
                <div class="max-w-xl mx-auto">
                  <div class="btn_wrapper flex items-center gap-2">
                    <button @click="companyStepNumber = 0" type="button"
                      class="bg-transparent border border-client hover:bg-client-dark transition hover:text-white text-client px-6 py-2 rounded mr-2">
                      {{ $t("back") }}
                    </button>
                    <button type="button" @click="
                      handleStepAfterCompanyOptionSelection(
                        companyOption
                      )
                      "
                      class="bg-client-dark hover:bg-client-dark/80 transition text-white px-6 py-2 rounded nextStepBtn">
                      {{ $t("next") }}
                    </button>
                  </div>
                </div>
              </template>
              <template v-if="companyStepNumber === 2">
                <div class="form_panel">
                  <div class="form_step_parent">
                    <!-- Step 1: Pickup Details -->
                    <form class="form-step" id="pickupDetails">
                      <h3 class="text-xl font-bold mb-4">
                        {{ $t("workers_data") }}
                      </h3>
                      <div class="flex flex-col gap-4 mb-4">
                        <div class="form_control_wrapper">
                          <div>
                            <label for="workersCount" class="block text-sm font-medium text-gray-700 mb-1">
                              {{
                                $t(
                                  "workers_count"
                                )
                              }}*
                            </label>
                            <input id="workersCount" type="number" v-model="v2$
                                .workersFormFields
                                .count
                                .$model
                              " :placeholder="$t(
                                                              'workers_count_placeholder'
                                                            )
                                                              "
                              class="w-full px-4 py-3 rounded-lg bg-white transition duration-200 outline-none border border-[#1b1718] text-[#1b1718]"
                              :class="v2$
                                  .workersFormFields
                                  .count
                                  .$error
                                  ? 'input-error'
                                  : ''
                                " />
                          </div>
                          <span v-if="
                            v2$
                              .workersFormFields
                              .count.$error
                          " class="error-msg">
                            {{
                              v2$
                                .workersFormFields
                                .count
                                .$errors[0]
                                .$message
                            }}
                          </span>
                        </div>
                        <div>
                          <div class="form_control_wrapper">
                            <div>
                              <label class="block text-sm font-medium text-gray-700 mb-1">
                                {{
                                  $t(
                                    "workers_duration"
                                  )
                                }}*
                              </label>
                              <!-- <VCalendar /> -->
                              <VDatePicker is-range :min-date="new Date()
                                " v-model="v2$
                                                                    .workersFormFields
                                                                    .date
                                                                    .$model
                                                                  " :masks="masks" :locale="$i18n.locale
                                                                  ">
                                <template #default="{
                                  inputValue,
                                  showPopover,
                                }">
                                  <input :placeholder="$t(
                                    'date_or_period_placeholder'
                                  )
                                    "
                                    class="w-full px-4 py-3 rounded-lg bg-white transition duration-200 outline-none border border-[#1b1718] text-[#1b1718]"
                                    type="text" :value="`${inputValue.start ||
                                        inputValue.end
                                        ? `${inputValue.start ||
                                        ''
                                        } ${inputValue.end
                                          ? ` - ${inputValue.end}`
                                          : ''
                                        }`
                                        : ''
                                      }`" :class="v2$
                                                                            .workersFormFields
                                                                            .date
                                                                            .$error
                                                                            ? 'input-error'
                                                                            : ''
                                                                          " @focus="
                                                                          showPopover
                                                                        " />
                                </template>
                              </VDatePicker>
                            </div>
                            <span class="text-info font-bold text-xs">
                              {{
                                $t(
                                  "workingHoursAccordingtoEuropeanLaw"
                                )
                              }}
                            </span>
                            <span v-if="
                              v2$
                                .workersFormFields
                                .date.$error
                            " class="error-msg">
                              {{
                                v2$
                                  .workersFormFields
                                  .date
                                  .$errors[0]
                                  .$message
                              }}
                            </span>
                          </div>
                        </div>
                      </div>
                    </form>
                  </div>
                </div>
                <div class="max-w-xl mx-auto">
                  <div class="btn_wrapper flex items-center gap-2">
                    <button @click="companyStepNumber = 1" type="button"
                      class="bg-transparent border border-client hover:bg-client-dark transition hover:text-white text-client px-6 py-2 rounded mr-2">
                      {{ $t("back") }}
                    </button>
                    <button type="button" @click="nextStepForCompany()"
                      class="bg-client-dark hover:bg-client-dark/80 transition text-white px-6 py-2 rounded nextStepBtn">
                      {{ $t("next") }}
                    </button>
                  </div>
                </div>
              </template>
              <template v-if="companyStepNumber === 3">
                <div class="form_panel">
                  <div class="form_step_parent">
                    <!-- Step 5: Contact Information -->
                    <div v-if="
                      user && prefilledDataAlertShown
                    " class="alert alert-info mb-4 flex flex-col items-start gap-2">
                      <p>
                        <strong>{{ $t("notice") }}:</strong>
                        {{ $t("prefilledDataNotice") }}
                      </p>
                      <button @click="
                        prefilledDataAlertShown = false
                        " type="button" class="btn btn-outline">
                        {{ $t("close") }}
                      </button>
                    </div>
                    <form class="form-step" id="contactInformation">
                      <div class="mb-4">
                        <h3 class="text-xl font-bold mb-4">
                          {{
                            $t(
                              "contact_information"
                            )
                          }}
                        </h3>
                        <div class="flex flex-col gap-4 mb-4">
                          <div class="form_control_wrapper">
                            <div>
                              <label for="name" class="block text-sm font-medium text-gray-700 mb-1">
                                {{
                                  $t(
                                    "name_required"
                                  )
                                }}*
                              </label>
                              <input id="name" v-model="v2$
                                  .workersFormFields
                                  .clientName
                                  .$model
                                " :placeholder="$t(
                                                                  'name_placeholder'
                                                                )
                                                                  "
                                class="w-full px-4 py-3 rounded-lg bg-white transition duration-200 outline-none border border-[#1b1718] text-[#1b1718]"
                                :class="{
                                  'input-error':
                                    v2$
                                      .workersFormFields
                                      .clientName
                                      .$error,
                                }" />
                            </div>
                            <span class="error-msg" v-if="
                              v2$
                                .workersFormFields
                                .clientName
                                .$error
                            ">
                              {{
                                v2$
                                  .workersFormFields
                                  .clientName
                                  .$errors[0]
                                  .$message
                              }}
                            </span>
                          </div>

                          <div class="form_control_wrapper">
                            <div>
                              <label for="email" class="block text-sm font-medium text-gray-700 mb-1">
                                {{
                                  $t(
                                    "email_required"
                                  )
                                }}*
                              </label>
                              <input id="email" v-model="v2$
                                  .workersFormFields
                                  .clientEmail
                                  .$model
                                " :placeholder="$t(
                                                                  'email_placeholder'
                                                                )
                                                                  "
                                class="w-full px-4 py-3 rounded-lg bg-white transition duration-200 outline-none border border-[#1b1718] text-[#1b1718]"
                                :class="{
                                  'input-error':
                                    v2$
                                      .workersFormFields
                                      .clientEmail
                                      .$error,
                                }" />
                            </div>
                            <span class="error-msg" v-if="
                              v2$
                                .workersFormFields
                                .clientEmail
                                .$error
                            ">
                              {{
                                v2$
                                  .workersFormFields
                                  .clientEmail
                                  .$errors[0]
                                  .$message
                              }}
                            </span>
                          </div>
                          <div class="form_control_wrapper">
                            <div>
                              <label for="phone" class="block text-sm font-medium text-gray-700 mb-1">
                                {{
                                  $t(
                                    "phone_required"
                                  )
                                }}*
                              </label>
                              <input id="phone" v-model="v2$
                                  .workersFormFields
                                  .clientPhone
                                  .$model
                                " :placeholder="$t(
                                                                  'phone_placeholder'
                                                                )
                                                                  "
                                class="w-full px-4 py-3 rounded-lg bg-white transition duration-200 outline-none border border-[#1b1718] text-[#1b1718]"
                                :class="{
                                  'input-error':
                                    v2$
                                      .workersFormFields
                                      .clientPhone
                                      .$error,
                                }" />
                            </div>
                            <span class="error-msg" v-if="
                              v2$
                                .workersFormFields
                                .clientPhone
                                .$error
                            ">
                              {{
                                v2$
                                  .workersFormFields
                                  .clientPhone
                                  .$errors[0]
                                  .$message
                              }}
                            </span>
                          </div>
                        </div>
                      </div>
                    </form>
                  </div>
                </div>
                <div class="max-w-xl mx-auto">
                  <div class="btn_wrapper flex items-center gap-2">
                    <button @click="companyStepNumber = 2" type="button"
                      class="bg-transparent border border-client hover:bg-client-dark transition hover:text-white text-client px-6 py-2 rounded mr-2">
                      {{ $t("back") }}
                    </button>
                    <button @click="nextStepForCompany()" type="button"
                      class="bg-client-dark hover:bg-client-dark/80 transition text-white px-6 py-2 rounded nextStepBtn">
                      {{ $t("next") }}
                    </button>
                  </div>
                </div>
              </template>
              <dialog ref="companySaveDataModal" id="companySaveDataModal" class="modal text-black">
                <form @submit.prevent class="modal-box bg-white saveDataForm">
                  <h3 class="text-lg font-bold">
                    {{ $t("save_data") }}
                  </h3>
                  <p class="py-4">
                    {{ $t("save_data_question") }}
                  </p>
                  <div>
                    <div class="flex flex-col gap-3">
                      <label class="label cursor-pointer">
                        <input type="radio" :value="true" v-model="v2$.workersFormFields
                            .saveData.$model
                          " name="companySaveData"
                          class="radio border !bg-transparent checked:border-client-dark border-client-dark checked:before:bg-client" />
                        <span class="label-text text-[#1b1718]">{{
                          $t("save_data_option")
                        }}</span>
                      </label>
                      <label class="label cursor-pointer">
                        <input checked type="radio" :value="false" v-model="v2$.workersFormFields
                            .saveData.$model
                          " name="companySaveData"
                          class="radio border !bg-transparent checked:border-client-dark border-client-dark checked:before:bg-client" />
                        <span class="label-text text-[#1b1718]">{{
                          $t("cancel_save")
                        }}</span>
                      </label>
                    </div>
                  </div>
                  <div class="modal-action">
                    <button @click="submitCompanyRequestData" :class="isLoading
                        ? 'opacity-50 pointer-events-none'
                        : ''
                      " type="button" class="btn">
                      <template v-if="isLoading">
                        <span class="loading loading-spinner"></span>
                        {{ $t("submit_request") }}
                      </template>
                      <template v-else>
                        {{ $t("submit_request") }}
                      </template>
                    </button>
                  </div>
                </form>
              </dialog>
            </template>

            <template v-if="
              clientType === 'personal' ||
              companyOption === 'shipping'
            ">
              <template v-if="stepNumber === 1">
                <!-- Location PickUp Data -->
                <div class="form_panel">
                  <div class="form_step_parent">
                    <form class="form-step" id="movingFrom">
                      <h3 class="text-xl font-bold mb-4">
                        {{ $t("pickup.title") }}
                      </h3>
                      <div class="flex flex-col gap-4 mb-4">
                        <div class="form_control_wrapper">
                          <div>
                            <label for="postalCode" class="block text-sm font-medium text-gray-700 mb-1">{{
                              $t(
                                "pickup.postalCode"
                              )
                            }}*</label>
                            <input id="postalCode" @change="
                              postalCodeChanged(
                                'pickup',
                                v$.formData
                                  .pickupPostalCode
                                  .$model
                              )
                              " v-model="v$.formData
                                                                .pickupPostalCode
                                                                .$model
                                                              " :placeholder="$t(
                                                              'pickup.postalCodePlaceholder'
                                                            )
                                                              "
                              class="w-full px-4 py-3 rounded-lg bg-white transition duration-200 outline-none border border-[#1b1718] text-[#1b1718]"
                              :class="{
                                'input-error':
                                  v$.formData
                                    .pickupPostalCode
                                    .$error,
                              }" />
                          </div>
                          <span class="error-msg" v-if="
                            v$.formData
                              .pickupPostalCode
                              .$error
                          ">
                            {{
                              v$.formData
                                .pickupPostalCode
                                .$errors[0]
                                .$message
                            }}
                          </span>
                        </div>
                        <div class="form_control_wrapper">
                          <div>
                            <label for="location" class="block text-sm font-medium text-gray-700 mb-1">{{
                              $t(
                                "pickup.city"
                              )
                            }}*</label>
                            <input id="location" readonly v-model="v$.formData
                                .pickupLocation
                                .$model
                              " :placeholder="$t(
                                                              'pickup.cityPlaceholder'
                                                            )
                                                              "
                              class="w-full px-4 py-3 rounded-lg bg-white transition duration-200 outline-none border border-[#1b1718] text-[#1b1718]"
                              :class="{
                                'input-error':
                                  v$.formData
                                    .pickupLocation
                                    .$error,
                              }" />
                          </div>
                          <span class="error-msg" v-if="
                            v$.formData
                              .pickupLocation
                              .$error
                          ">
                            {{
                              v$.formData
                                .pickupLocation
                                .$errors[0]
                                .$message
                            }}
                          </span>
                        </div>
                        <div class="form_control_wrapper">
                          <div class="grid grid-cols-[auto_100px] gap-2">
                            <div>
                              <label for="address" class="block text-sm font-medium text-gray-700 mb-1">{{
                                $t(
                                  "pickup.street"
                                )
                              }}*</label>
                              <select id="address" v-model="v$.formData
                                  .pickupAddress
                                  .$model
                                "
                                class="w-full px-4 py-2 rounded-lg bg-white transition duration-200 outline-none border border-[#1b1718] text-[#1b1718]"
                                :class="{
                                  'input-error':
                                    v$
                                      .formData
                                      .pickupAddress
                                      .$error,
                                }">
                                <option value="">
                                  {{
                                    $t(
                                      "pickup.streetPlaceholder"
                                    )
                                  }}
                                </option>
                                <option v-for="street in pickupStreets" :value="street
                                  ">
                                  {{ street }}
                                </option>
                              </select>
                              <!-- <input id="address" v-model="v$.formData.pickupAddress.$model"
                                :placeholder="$t('pickup.streetPlaceholder')"
                                class="w-full px-4 py-3 rounded-lg bg-white transition duration-200 outline-none border border-[#1b1718] text-[#1b1718]"
                                :class="{ 'input-error': v$.formData.pickupAddress.$error }" /> -->
                            </div>
                            <div>
                              <label for="number" class="block text-sm font-medium text-gray-700 mb-1">{{
                                $t(
                                  "pickup.number"
                                )
                              }}*</label>
                              <input id="number" v-model="v$.formData
                                  .pickupNo
                                  .$model
                                " :placeholder="$t(
                                                                  'pickup.numberPlaceholder'
                                                                )
                                                                  "
                                class="w-full px-4 py-3 rounded-lg bg-white transition duration-200 outline-none border border-[#1b1718] text-[#1b1718]"
                                :class="{
                                  'input-error':
                                    v$
                                      .formData
                                      .pickupNo
                                      .$error,
                                }" type="number" />
                            </div>
                          </div>
                          <span class="error-msg" v-if="
                            v$.formData
                              .pickupAddress
                              .$error
                          ">
                            {{
                              v$.formData
                                .pickupAddress
                                .$errors[0]
                                .$message
                            }}
                          </span>
                          <span class="error-msg" v-if="
                            v$.formData.pickupNo
                              .$error
                          ">
                            {{
                              v$.formData.pickupNo
                                .$errors[0]
                                .$message
                            }}
                          </span>
                        </div>
                      </div>
                    </form>
                  </div>
                </div>

                <!-- Floor, Lifter and Space to the car -->
                <div class="form_panel">
                  <div class="form_step_parent">
                    <form class="form-step" id="whatNeedToShip">
                      <h3 class="text-xl font-bold mb-4">
                        {{ $t("floorAndLift.title") }}
                      </h3>
                      <div class="flex flex-col gap-4 mb-4">
                        <div class="form_control_wrapper">
                          <div>
                            <label for="pickUpDistanceToCar" class="block text-sm font-medium text-gray-700 mb-1">{{
                              $t(
                                "floorAndLift.distanceToCar"
                              )
                            }}*</label>
                            <div class="grid grid-cols-[auto_20px] gap-2 items-center">
                              <input type="number" id="pickUpDistanceToCar" v-model="v$.formData
                                  .pickupDistanceToCar
                                  .$model
                                " :placeholder="$t(
                                                                  'floorAndLift.distanceToCarPlaceholder'
                                                                )
                                                                  "
                                class="w-full px-4 py-3 rounded-lg bg-white transition duration-200 outline-none border border-[#1b1718] text-[#1b1718]"
                                :class="{
                                  'input-error':
                                    v$
                                      .formData
                                      .pickupDistanceToCar
                                      .$error,
                                }" />
                              <span>{{
                                $t(
                                  "floorAndLift.meter"
                                )
                              }}</span>
                            </div>
                            <span class="text-xs">{{
                              $t(
                                "floorAndLift.ifNoDisctanceWriteZero"
                              )
                            }}</span>
                          </div>
                          <span class="error-msg" v-if="
                            v$.formData
                              .pickupDistanceToCar
                              .$error
                          ">
                            {{
                              v$.formData
                                .pickupDistanceToCar
                                .$errors[0]
                                .$message
                            }}
                          </span>
                        </div>
                        <div class="form_control_wrapper">
                          <div>
                            <label for="floorNumber" class="block text-sm font-medium text-gray-700 mb-1">{{
                              $t(
                                "floorAndLift.floorNumber"
                              )
                            }}*</label>
                            <input id="floorNumber" type="number" v-model="v$.formData
                                .pickupFloorNumber
                                .$model
                              " :placeholder="$t(
                                                              'floorAndLift.floorNumberPlaceholder'
                                                            )
                                                              "
                              class="w-full px-4 py-3 rounded-lg bg-white transition duration-200 outline-none border border-[#1b1718] text-[#1b1718]"
                              :class="{
                                'input-error':
                                  v$.formData
                                    .pickupFloorNumber
                                    .$error,
                              }" />
                          </div>
                          <span class="error-msg" v-if="
                            v$.formData
                              .pickupFloorNumber
                              .$error
                          ">
                            {{
                              v$.formData
                                .pickupFloorNumber
                                .$errors[0]
                                .$message
                            }}
                          </span>
                        </div>
                        <div class="form_control_wrapper">
                          <label class="block text-sm font-medium text-gray-700 mb-1">{{
                            $t(
                              "floorAndLift.liftExists"
                            )
                          }}*</label>
                          <div class="flex flex-col gap-3">
                            <label class="label cursor-pointer">
                              <input type="radio" name="lifterExistMoveFrom" :value="1" v-model="v$.formData
                                  .pickupLifterExistance
                                  .$model
                                "
                                class="radio border !bg-transparent checked:border-client-dark border-client-dark checked:before:bg-client"
                                :class="{
                                  'input-error':
                                    v$
                                      .formData
                                      .pickupLifterExistance
                                      .$error,
                                }" />
                              <span class="label-text text-[#1b1718]">{{
                                $t(
                                  "floorAndLift.yes"
                                )
                              }}</span>
                            </label>
                            <label class="label cursor-pointer">
                              <input type="radio" name="lifterExistMoveFrom" :value="0" v-model="v$.formData
                                  .pickupLifterExistance
                                  .$model
                                "
                                class="radio border !bg-transparent checked:border-client-dark border-client-dark checked:before:bg-client"
                                :class="{
                                  'input-error':
                                    v$
                                      .formData
                                      .pickupLifterExistance
                                      .$error,
                                }" />
                              <span class="label-text text-[#1b1718]">{{
                                $t(
                                  "floorAndLift.no"
                                )
                              }}</span>
                            </label>
                          </div>
                          <span class="error-msg" v-if="
                            v$.formData
                              .pickupLifterExistance
                              .$error
                          ">
                            {{
                              v$.formData
                                .pickupLifterExistance
                                .$errors[0]
                                .$message
                            }}
                          </span>
                        </div>
                      </div>
                    </form>
                  </div>
                </div>

                <!-- PickUp Info -->
                <div class="form_panel">
                  <div class="form_step_parent">
                    <form class="form-step" id="homeOutInTypes">
                      <div class="mb-4">
                        <h3 class="text-lg font-semibold mb-4">
                          {{
                            $t(
                              "propertyDetails.title"
                            )
                          }}
                        </h3>
                        <div class="flex flex-col gap-4 mb-4">
                          <div>
                            <div class="form_control_wrapper">
                              <div class="flex flex-col items-start gap-3 mb-3">
                                <label class="custom-option p-3 grid grid-cols-[35px_auto] gap-2">
                                  <input v-model="v$
                                      .formData
                                      .selectedPickUpType
                                      .$model
                                    " type="radio" value="all"
                                    class="opacity-0 radio mt-2" />
                                  <svg width="32" height="32" viewBox="0 0 32 32" fill="none"
                                    xmlns="http://www.w3.org/2000/svg">
                                    <rect width="32" height="32" fill="white" />
                                    <path class="fill-client-dark"
                                      d="M16.0501 30.5403C13.1301 30.5403 10.2001 30.5403 7.28005 30.5403C6.10005 30.5403 5.24005 30.0303 4.73005 28.9803C4.58005 28.6703 4.49005 28.3003 4.49005 27.9503C4.47005 24.0303 4.48005 20.1103 4.48005 16.2003C4.48005 15.5803 4.58005 15.6403 3.90005 15.6003C3.54005 15.5803 3.16005 15.5103 2.83005 15.3603C2.08005 15.0203 1.82005 14.1703 2.23005 13.4603C2.40005 13.1603 2.63005 12.8903 2.88005 12.6603C4.25005 11.3603 5.62005 10.0703 7.01005 8.78028C8.70005 7.21028 10.4001 5.64028 12.1001 4.08028C12.7901 3.44028 13.4801 2.79028 14.1801 2.16028C15.1901 1.25028 16.7601 1.19028 17.8401 2.19028C18.7801 3.06028 19.7401 3.92028 20.6801 4.79028C21.6201 5.66028 22.5601 6.54028 23.5001 7.41028C24.9301 8.74028 26.3601 10.0703 27.7901 11.4003C28.3101 11.8803 28.8401 12.3603 29.3401 12.8703C29.5601 13.0903 29.7601 13.3503 29.8701 13.6403C30.2701 14.6003 29.5401 15.3503 28.8901 15.5303C28.5601 15.6303 28.1901 15.6103 27.8401 15.6303C27.5001 15.6503 27.5001 15.6303 27.5001 15.9803C27.5001 19.9703 27.5001 23.9603 27.5001 27.9603C27.5001 29.1403 26.5701 30.2803 25.4201 30.5203C25.2401 30.5603 25.0401 30.5503 24.8501 30.5503C21.9201 30.5503 18.9901 30.5503 16.0601 30.5503L16.0501 30.5403ZM5.01005 13.5103C5.01005 13.5103 5.04005 13.5503 5.06005 13.5703C5.21005 13.5703 5.35005 13.5703 5.50005 13.5703C6.12005 13.5903 6.50005 13.9703 6.53005 14.5803C6.53005 14.6703 6.53005 14.7603 6.53005 14.8503C6.53005 19.1203 6.53005 23.3803 6.53005 27.6503C6.53005 28.2903 6.70005 28.4703 7.34005 28.4703C8.45005 28.4703 9.56005 28.4703 10.6701 28.4703C11.0501 28.4703 11.0501 28.4703 11.0501 28.0903C11.0501 25.4003 11.0501 22.7103 11.0501 20.0103C11.0501 19.7703 11.0701 19.5303 11.1201 19.3003C11.4001 18.0103 12.4501 17.2003 13.8501 17.1903C15.3001 17.1903 16.7501 17.1903 18.2001 17.1903C18.4901 17.1903 18.8001 17.2403 19.0801 17.3303C20.2201 17.6803 20.9401 18.6603 20.9501 19.8603C20.9501 22.6003 20.9501 25.3403 20.9501 28.0803C20.9501 28.4403 20.9601 28.4503 21.3301 28.4503C22.5201 28.4503 23.7101 28.4303 24.9101 28.4203C25.2601 28.4203 25.4101 28.2603 25.4201 27.9203C25.4301 27.3003 25.4401 26.6803 25.4501 26.0603C25.4501 22.7403 25.4501 19.4203 25.4501 16.1003C25.4501 15.5903 25.4501 15.0703 25.4801 14.5603C25.5001 14.1703 25.6701 13.8403 26.0601 13.7103C26.3401 13.6103 26.6401 13.5803 26.9501 13.5103C26.9401 13.4903 26.9101 13.4103 26.8601 13.3603C25.9601 12.5203 25.0601 11.6803 24.1501 10.8403C23.1801 9.94028 22.2101 9.04028 21.2401 8.14028C19.7001 6.70028 18.1601 5.26028 16.6201 3.81028C16.1901 3.41028 15.9101 3.38028 15.4801 3.77028C14.9301 4.25028 14.4001 4.75028 13.8701 5.24028C12.9401 6.10028 12.0101 6.96028 11.0901 7.83028C9.79005 9.04028 8.50005 10.2503 7.20005 11.4503C6.56005 12.0503 5.90005 12.6203 5.25005 13.2103C5.16005 13.2903 5.11005 13.4003 5.04005 13.5003L5.01005 13.5103ZM13.0901 24.1003C13.0901 25.4303 13.0901 26.7703 13.0901 28.1003C13.0901 28.4703 13.0901 28.4803 13.4601 28.4803C14.4401 28.4803 15.4101 28.4803 16.3901 28.4803C17.1601 28.4803 17.9301 28.4603 18.7001 28.4503C18.8501 28.4503 18.9001 28.3903 18.8901 28.2403C18.8701 28.0103 18.8601 27.7803 18.8601 27.5503C18.8601 26.3803 18.8801 25.2203 18.8801 24.0503C18.8801 22.6703 18.8701 21.2903 18.8601 19.9003C18.8601 19.5403 18.6601 19.3103 18.3301 19.3103C16.7901 19.3103 15.2501 19.3103 13.7101 19.3103C13.3701 19.3103 13.1701 19.4803 13.1201 19.8203C13.1001 19.9403 13.1001 20.0703 13.1001 20.1903C13.1001 21.5003 13.1001 22.8103 13.1001 24.1103L13.0901 24.1003Z"
                                      fill="#2B65D9" />
                                  </svg>
                                  <span class="label-text w-full text-start">
                                    <span class="flex justify-between mb-1">
                                      <span class="text-base">{{
                                        $t(
                                          "propertyDetails.moveTypes.all.title"
                                        )
                                      }}</span>
                                    </span>
                                    <span>{{
                                      $t(
                                        "propertyDetails.moveTypes.all.description"
                                      )
                                    }}</span>
                                  </span>
                                </label>
                                <label class="custom-option p-3 grid grid-cols-[35px_auto] gap-2">
                                  <input v-model="v$
                                      .formData
                                      .selectedPickUpType
                                      .$model
                                    " type="radio" value="part"
                                    class="opacity-0 radio mt-2" />

                                  <svg xmlns="http://www.w3.org/2000/svg" width="30" height="32" viewBox="0 0 30 32"
                                    fill="none">
                                    <path class="fill-client-dark"
                                      d="M14.5137 31.0344C11.5937 31.0344 8.66368 31.0344 5.74367 31.0344C4.56367 31.0344 3.70367 30.5244 3.19367 29.4744C3.04367 29.1644 2.95367 28.7944 2.95367 28.4444C2.93367 24.5244 2.94367 20.6044 2.94367 16.6944C2.94367 16.0744 3.04367 16.1344 2.36367 16.0944C2.00367 16.0744 1.62367 16.0044 1.29367 15.8544C0.543674 15.5144 0.283674 14.6644 0.693674 13.9544C0.863674 13.6544 1.09367 13.3844 1.34367 13.1544C2.71367 11.8544 4.08367 10.5644 5.47367 9.27442C7.16367 7.70442 8.86368 6.13442 10.5637 4.57442C11.2537 3.93442 11.9437 3.28442 12.6437 2.65442C13.6537 1.74442 15.2237 1.68442 16.3037 2.68442C17.2437 3.55442 18.2037 4.41442 19.1437 5.28442C20.0837 6.15442 21.0237 7.03442 21.9637 7.90442C23.3937 9.23442 24.8237 10.5644 26.2537 11.8944C26.7737 12.3744 27.3037 12.8544 27.8037 13.3644C28.0237 13.5844 28.2237 13.8444 28.3337 14.1344C28.7337 15.0944 28.0037 15.8444 27.3537 16.0244C27.0237 16.1244 26.6537 16.1044 26.3037 16.1244C25.9637 16.1444 25.9637 16.1244 25.9637 16.4744C25.9637 20.4644 25.9637 24.4544 25.9637 28.4544C25.9637 29.6344 25.0337 30.7744 23.8837 31.0144C23.7037 31.0544 23.5037 31.0444 23.3137 31.0444C20.3837 31.0444 17.4537 31.0444 14.5237 31.0444L14.5137 31.0344ZM3.47367 14.0044C3.47367 14.0044 3.50367 14.0444 3.52367 14.0644C3.67367 14.0644 3.81367 14.0644 3.96367 14.0644C4.58367 14.0844 4.96367 14.4644 4.99367 15.0744C4.99367 15.1644 4.99367 15.2544 4.99367 15.3444C4.99367 19.6144 4.99367 23.8744 4.99367 28.1444C4.99367 28.7844 5.16367 28.9644 5.80367 28.9644C6.91367 28.9644 8.02367 28.9644 9.13367 28.9644C9.51367 28.9644 9.51367 28.9644 9.51367 28.5844C9.51367 25.8944 9.51367 23.2044 9.51367 20.5044C9.51367 20.2644 9.53367 20.0244 9.58367 19.7944C9.86367 18.5044 10.9137 17.6944 12.3137 17.6844C13.7637 17.6844 15.2137 17.6844 16.6637 17.6844C16.9537 17.6844 17.2637 17.7344 17.5437 17.8244C18.6837 18.1744 19.4037 19.1544 19.4137 20.3544C19.4137 23.0944 19.4137 25.8344 19.4137 28.5744C19.4137 28.9344 19.4237 28.9444 19.7937 28.9444C20.9837 28.9444 22.1737 28.9244 23.3737 28.9144C23.7237 28.9144 23.8737 28.7544 23.8837 28.4144C23.8937 27.7944 23.9037 27.1744 23.9137 26.5544C23.9137 23.2344 23.9137 19.9144 23.9137 16.5944C23.9137 16.0844 23.9137 15.5644 23.9437 15.0544C23.9637 14.6644 24.1337 14.3344 24.5237 14.2044C24.8037 14.1044 25.1037 14.0744 25.4137 14.0044C25.4037 13.9844 25.3737 13.9044 25.3237 13.8544C24.4237 13.0144 23.5237 12.1744 22.6137 11.3344C21.6437 10.4344 20.6737 9.53442 19.7037 8.63442C18.1637 7.19442 16.6237 5.75442 15.0837 4.30442C14.6537 3.90442 14.3737 3.87442 13.9437 4.26442C13.3937 4.74442 12.8637 5.24442 12.3337 5.73442C11.4037 6.59442 10.4737 7.45442 9.55367 8.32442C8.25367 9.53442 6.96367 10.7444 5.66367 11.9444C5.02367 12.5444 4.36367 13.1144 3.71367 13.7044C3.62367 13.7844 3.57367 13.8944 3.50367 13.9944L3.47367 14.0044ZM11.5537 24.5944C11.5537 25.9244 11.5537 27.2644 11.5537 28.5944C11.5537 28.9644 11.5537 28.9744 11.9237 28.9744C12.9037 28.9744 13.8737 28.9744 14.8537 28.9744C15.6237 28.9744 16.3937 28.9544 17.1637 28.9444C17.3137 28.9444 17.3637 28.8844 17.3537 28.7344C17.3337 28.5044 17.3237 28.2744 17.3237 28.0444C17.3237 26.8744 17.3437 25.7144 17.3437 24.5444C17.3437 23.1644 17.3337 21.7844 17.3237 20.3944C17.3237 20.0344 17.1237 19.8044 16.7937 19.8044C15.2537 19.8044 13.7137 19.8044 12.1737 19.8044C11.8337 19.8044 11.6337 19.9744 11.5837 20.3144C11.5637 20.4344 11.5637 20.5644 11.5637 20.6844C11.5637 21.9944 11.5637 23.3044 11.5637 24.6044L11.5537 24.5944Z"
                                      fill="#2B65D9" />
                                    <path opacity="0.75" d="M14.5 30.9531V0.953125H29.5V30.9531H14.5Z" fill="white"
                                      stroke="white" stroke-width="0.5" />
                                    <path d="M15.5 1.95312C15.5 12.4917 15.5 20.4146 15.5 30.9531" stroke="#2B65D9"
                                      stroke-width="1.5" stroke-linecap="round" stroke-dasharray="3 3" />
                                  </svg>
                                  <span class="label-text w-full text-start">
                                    <span class="flex justify-between mb-1">
                                      <span class="text-base">{{
                                        $t(
                                          "propertyDetails.moveTypes.part.title"
                                        )
                                      }}</span>
                                    </span>
                                    <span>{{
                                      $t(
                                        "propertyDetails.moveTypes.part.description"
                                      )
                                    }}</span>
                                  </span>
                                </label>
                                <label class="custom-option p-3 grid grid-cols-[35px_auto] gap-2">
                                  <input v-model="v$
                                      .formData
                                      .selectedPickUpType
                                      .$model
                                    " type="radio" value="boxes"
                                    class="opacity-0 radio mt-2" />
                                  <svg width="32" height="32" viewBox="0 0 32 32" fill="none"
                                    xmlns="http://www.w3.org/2000/svg">
                                    <rect width="32" height="32" fill="white" />
                                    <path class="fill-client-dark"
                                      d="M11.3448 15.3292H9.42586V4.69167H13.2638V7.66667C13.2638 8.03615 13.5616 8.3375 13.931 8.3375H18.069C18.4384 8.3375 18.7362 8.03615 18.7362 7.66667V4.69167H22.5741V15.3292H20.6552H20.5052H16.5172H15.4828H11.4948H11.3448ZM17.4017 6.99583H14.5983V4.69167H17.4017V6.99583ZM8.09138 4.54167V15.3292H6.17241H6.02241H2.03448C1.37939 15.3292 0.85 15.8637 0.85 16.5208V28.5V28.65H1H15.3328H15.4828H16.5172H16.6672H31H31.15V28.5V16.5208C31.15 15.8637 30.6206 15.3292 29.9655 15.3292H25.9776H25.8276H23.9086V4.54167C23.9086 3.88456 23.3792 3.35 22.7241 3.35H18.7362H18.5862H13.4138H13.2638H9.27586C8.62077 3.35 8.09138 3.88456 8.09138 4.54167ZM23.9086 16.6708H24.6431V18.975H21.8397V16.6708H23.7586H23.9086ZM16.6672 16.6708H20.5052V19.6458C20.5052 20.0153 20.803 20.3167 21.1724 20.3167H25.3103C25.6798 20.3167 25.9776 20.0153 25.9776 19.6458V16.6708H29.8155V27.3083H16.6672V16.6708ZM10.1603 16.6708V18.975H7.3569V16.6708H8.09138H8.24138H10.1603ZM15.3328 27.3083H2.18448V16.6708H6.02241V19.6458C6.02241 20.0153 6.3202 20.3167 6.68966 20.3167H10.8276C11.197 20.3167 11.4948 20.0153 11.4948 19.6458V16.6708H15.3328V27.3083Z"
                                      fill="#2B65D9" stroke="#2B65D9" stroke-width="0.3" />
                                  </svg>
                                  <span class="label-text w-full text-start">
                                    <span class="flex justify-between mb-1">
                                      <span class="text-base">{{
                                        $t(
                                          "propertyDetails.moveTypes.boxes.title"
                                        )
                                      }}</span>
                                    </span>
                                    <span>{{
                                      $t(
                                        "propertyDetails.moveTypes.boxes.description"
                                      )
                                    }}</span>
                                  </span>
                                </label>
                              </div>
                              <span class="error-msg" v-if="
                                v$.formData
                                  .selectedPickUpType
                                  .$error
                              ">
                                {{
                                  v$.formData
                                    .selectedPickUpType
                                    .$errors[0]
                                    .$message
                                }}
                              </span>
                            </div>

                            <div v-if="
                              v$.formData
                                .selectedPickUpType
                                .$model ===
                              'boxes'
                            " id="boxesNumber" class="form_control_wrapper mb-3">
                              <div>
                                <label for="boxesNumber" class="block text-sm font-medium text-gray-700 mb-1">
                                  {{
                                    $t(
                                      "propertyDetails.boxesNumber"
                                    )
                                  }}*</label>
                                <input id="boxesNumber" v-model="v$
                                    .formData
                                    .boxesNumber
                                    .$model
                                  " :placeholder="$t(
                                                                      'propertyDetails.boxesNumber'
                                                                    )
                                                                      "
                                  class="w-full px-4 py-3 rounded-lg bg-white transition duration-200 outline-none border border-[#1b1718] text-[#1b1718]"
                                  type="number" :class="{
                                    'input-error':
                                      v$
                                        .formData
                                        .boxesNumber
                                        .$error,
                                  }" />
                              </div>
                              <span class="error-msg" v-if="
                                v$.formData
                                  .boxesNumber
                                  .$error
                              ">
                                {{
                                  v$.formData
                                    .boxesNumber
                                    .$errors[0]
                                    .$message
                                }}
                              </span>
                            </div>

                            <div v-if="
                              v$.formData
                                .selectedPickUpType
                                .$model ===
                              'all' ||
                              v$.formData
                                .selectedPickUpType
                                .$model ===
                              'part'
                            " id="roomsNumber_area" class="mb-3">
                              <div class="grid grid-cols-[50%_40%] gap-4">
                                <div class="form_control_wrapper">
                                  <span class="block text-sm font-medium text-gray-700 mb-1">{{
                                    $t(
                                      "propertyDetails.roomsNumber"
                                    )
                                  }}*</span>
                                  <div class="join">
                                    <input v-model="v$
                                        .formData
                                        .roomsNumber
                                        .$model
                                      "
                                      class="join-item bg-white text-client-dark btn btn-square checked:bg-client-dark checked:text-white"
                                      :class="{
                                        'input-error':
                                          v$
                                            .formData
                                            .roomsNumber
                                            .$error,
                                      }" type="radio" name="roomsCount"
                                      aria-label="1" value="1" />
                                    <input v-model="v$
                                        .formData
                                        .roomsNumber
                                        .$model
                                      "
                                      class="join-item bg-white text-client-dark btn btn-square checked:bg-client-dark checked:text-white"
                                      :class="{
                                        'input-error':
                                          v$
                                            .formData
                                            .roomsNumber
                                            .$error,
                                      }" type="radio" name="roomsCount"
                                      aria-label="2" value="2" />
                                    <input v-model="v$
                                        .formData
                                        .roomsNumber
                                        .$model
                                      "
                                      class="join-item bg-white text-client-dark btn btn-square checked:bg-client-dark checked:text-white"
                                      :class="{
                                        'input-error':
                                          v$
                                            .formData
                                            .roomsNumber
                                            .$error,
                                      }" type="radio" name="roomsCount"
                                      aria-label="3" value="3" />
                                    <input v-model="v$
                                        .formData
                                        .roomsNumber
                                        .$model
                                      "
                                      class="join-item bg-white text-client-dark btn btn-square checked:bg-client-dark checked:text-white"
                                      :class="{
                                        'input-error':
                                          v$
                                            .formData
                                            .roomsNumber
                                            .$error,
                                      }" type="radio" name="roomsCount"
                                      aria-label="4" value="4" />
                                    <input v-model="v$
                                        .formData
                                        .roomsNumber
                                        .$model
                                      "
                                      class="join-item bg-white text-client-dark btn checked:bg-client-dark checked:text-white"
                                      :class="{
                                        'input-error':
                                          v$
                                            .formData
                                            .roomsNumber
                                            .$error,
                                      }" type="radio" name="roomsCount"
                                      :aria-label="`5 ${$t(
                                        'propertyDetails.roomsMore'
                                      )}`" value="5" />
                                  </div>
                                  <span class="error-msg" v-if="
                                    v$
                                      .formData
                                      .roomsNumber
                                      .$error
                                  ">
                                    {{
                                      v$
                                        .formData
                                        .roomsNumber
                                        .$errors[0]
                                        .$message
                                    }}
                                  </span>
                                </div>
                                <div class="form_control_wrapper">
                                  <label for="spaceArea" class="block text-sm font-medium text-gray-700 mb-1">{{
                                    $t(
                                      "propertyDetails.area"
                                    )
                                  }}*</label>
                                  <div class="grid grid-cols-[auto_20px] gap-2 items-center">
                                    <input type="number" id="spaceArea" :class="{
                                      'input-error':
                                        v$
                                          .formData
                                          .spaceArea
                                          .$error,
                                    }" v-model="v$
                                                                                .formData
                                                                                .spaceArea
                                                                                .$model
                                                                              " :placeholder="$t(
                                                                              'propertyDetails.area'
                                                                            )
                                                                              "
                                      class="w-full px-4 py-3 rounded-lg bg-white transition duration-200 outline-none border border-[#1b1718] text-[#1b1718]" />
                                    <span>m<sup>2</sup></span>
                                  </div>
                                  <span class="error-msg" v-if="
                                    v$
                                      .formData
                                      .spaceArea
                                      .$error
                                  ">
                                    {{
                                      v$
                                        .formData
                                        .spaceArea
                                        .$errors[0]
                                        .$message
                                    }}
                                  </span>
                                </div>
                                <div class="form_control_wrapper col-span-full" v-if="
                                  v$
                                    .formData
                                    .selectedPickUpType
                                    .$model ===
                                  'part'
                                ">
                                  <label class="block text-sm font-medium text-gray-700 mb-1">{{
                                    $t(
                                      "propertyDetails.whatToMove"
                                    )
                                  }}*</label>
                                  <div class="grid grid-cols-2 gap-3">
                                    <label class="label cursor-pointer">
                                      <input type="radio" name="whatParts" value="bedRoom" v-model="v$
                                          .formData
                                          .whatParts
                                          .$model
                                        "
                                        class="radio border !bg-transparent checked:border-client-dark border-client-dark checked:before:bg-client"
                                        :class="{
                                          'input-error':
                                            v$
                                              .formData
                                              .whatParts
                                              .$error,
                                        }" />
                                      <span class="label-text text-[#1b1718]">{{
                                        $t(
                                          "propertyDetails.roomTypes.bedRoom"
                                        )
                                      }}</span>
                                    </label>
                                    <label class="label cursor-pointer">
                                      <input type="radio" name="whatParts" value="childrenRoom" v-model="v$
                                          .formData
                                          .whatParts
                                          .$model
                                        "
                                        class="radio border !bg-transparent checked:border-client-dark border-client-dark checked:before:bg-client"
                                        :class="{
                                          'input-error':
                                            v$
                                              .formData
                                              .whatParts
                                              .$error,
                                        }" />
                                      <span class="label-text text-[#1b1718]">{{
                                        $t(
                                          "propertyDetails.roomTypes.childrenRoom"
                                        )
                                      }}</span>
                                    </label>
                                    <label class="label cursor-pointer">
                                      <input type="radio" name="whatParts" value="kitchen" v-model="v$
                                          .formData
                                          .whatParts
                                          .$model
                                        "
                                        class="radio border !bg-transparent checked:border-client-dark border-client-dark checked:before:bg-client"
                                        :class="{
                                          'input-error':
                                            v$
                                              .formData
                                              .whatParts
                                              .$error,
                                        }" />
                                      <span class="label-text text-[#1b1718]">{{
                                        $t(
                                          "propertyDetails.roomTypes.kitchen"
                                        )
                                      }}</span>
                                    </label>
                                    <label class="label cursor-pointer">
                                      <input type="radio" name="whatParts" value="bathroom" v-model="v$
                                          .formData
                                          .whatParts
                                          .$model
                                        "
                                        class="radio border !bg-transparent checked:border-client-dark border-client-dark checked:before:bg-client"
                                        :class="{
                                          'input-error':
                                            v$
                                              .formData
                                              .whatParts
                                              .$error,
                                        }" />
                                      <span class="label-text text-[#1b1718]">{{
                                        $t(
                                          "propertyDetails.roomTypes.bathroom"
                                        )
                                      }}</span>
                                    </label>
                                  </div>
                                  <span class="error-msg" v-if="
                                    v$
                                      .formData
                                      .whatParts
                                      .$error
                                  ">
                                    {{
                                      v$
                                        .formData
                                        .whatParts
                                        .$errors[0]
                                        .$message
                                    }}
                                  </span>
                                </div>
                              </div>
                            </div>

                            <div id="storeArea" class="form_control_wrapper mb-3">
                              <div>
                                <label for="storeArea" class="block text-sm font-medium text-gray-700 mb-1">{{
                                  $t(
                                    "propertyDetails.storeArea"
                                  )
                                }}</label>
                                <input id="storeArea" type="number" v-model="formData.storeArea
                                  " :placeholder="$t(
                                                                      'propertyDetails.storeAreaPlaceholder'
                                                                    )
                                                                      "
                                  class="w-full px-4 py-3 rounded-lg bg-white transition duration-200 outline-none border border-[#1b1718] text-[#1b1718]" />
                              </div>
                            </div>
                          </div>
                        </div>
                      </div>
                    </form>
                  </div>
                </div>

                <!-- Additional Services -->
                <div class="form_panel">
                  <div class="form_step_parent">
                    <form class="form-step" id="whatNeedToShip">
                      <h3 class="text-xl font-bold mb-4">
                        {{
                          $t(
                            "additionalServices.title"
                          )
                        }}
                      </h3>
                      <div class="flex flex-col gap-4 mb-4">
                        <div class="form_control_wrapper">
                          <div class="flex flex-col gap-3">
                            <label class="label cursor-pointer">
                              <input v-model="v$.formData
                                  .packingServices
                                  .$model
                                " type="checkbox"
                                class="checkbox border !bg-transparent checked:border-client-dark border-client-dark checked:before:bg-client" />
                              <span class="label-text text-[#1b1718]">{{
                                $t(
                                  "additionalServices.packingServices"
                                )
                              }}</span>
                            </label>
                            <label class="label cursor-pointer">
                              <input v-model="v$.formData
                                  .dismantingFurniture
                                  .$model
                                " type="checkbox"
                                class="checkbox border !bg-transparent checked:border-client-dark border-client-dark checked:before:bg-client" />
                              <span class="label-text text-[#1b1718]">{{
                                $t(
                                  "additionalServices.dismantingFurniture"
                                )
                              }}</span>
                            </label>
                            <label class="label cursor-pointer">
                              <input :readonly="true" :checked="isKitchenDismantingChecked
                                " @click="
                                                                  handleCheckToggle(
                                                                    $event,
                                                                    'kitchenLong',
                                                                    'kitchenDismanting'
                                                                  )
                                                                  " type="checkbox"
                                class="checkbox border !bg-transparent checked:border-client-dark border-client-dark checked:before:bg-client" />
                              <span @click.prevent="
                                showModal(
                                  'kitchenDismanting',
                                  'kitchenLong'
                                )
                                " class="label-text text-[#1b1718]">{{
                                                                  $t(
                                                                    "additionalServices.kitchenDismanting"
                                                                  )
                                                                }}</span>
                            </label>
                            <label class="label cursor-pointer">
                              <input :readonly="true" :checked="isMovingBoxesChecked
                                " @click="
                                                                  handleCheckToggle(
                                                                    $event,
                                                                    'movingBoxes',
                                                                    'movingBoxes'
                                                                  )
                                                                  " type="checkbox"
                                class="checkbox border !bg-transparent checked:border-client-dark border-client-dark checked:before:bg-client" />
                              <span @click.prevent="
                                showModal(
                                  'movingBoxes',
                                  'movingBoxes'
                                )
                                " class="label-text text-[#1b1718]">{{
                                                                  $t(
                                                                    "additionalServices.movingBoxes"
                                                                  )
                                                                }}</span>
                            </label>
                            <label class="label cursor-pointer">
                              <input :readonly="true" :checked="isFurnitureStoreChecked
                                " @click="
                                                                  handleCheckToggle(
                                                                    $event,
                                                                    'furnitureStoreDays',
                                                                    'furnitureStore'
                                                                  )
                                                                  " type="checkbox"
                                class="checkbox border !bg-transparent checked:border-client-dark border-client-dark checked:before:bg-client" />
                              <span @click.prevent="
                                showModal(
                                  'furnitureStore',
                                  'furnitureStoreDays'
                                )
                                " class="label-text text-[#1b1718]">{{
                                                                  $t(
                                                                    "additionalServices.furnitureStore"
                                                                  )
                                                                }}</span>
                            </label>
                            <label class="label cursor-pointer">
                              <input :readonly="true" :checked="isFurnitureQuantityChecked
                                " @click="
                                                                  handleCheckToggle(
                                                                    $event,
                                                                    'furnitureQuantity',
                                                                    'furnitureQuantity'
                                                                  )
                                                                  " type="checkbox"
                                class="checkbox border !bg-transparent checked:border-client-dark border-client-dark checked:before:bg-client" />
                              <span @click.prevent="
                                showModal(
                                  'furnitureQuantity',
                                  'furnitureQuantity'
                                )
                                " class="label-text text-[#1b1718]">{{
                                                                  $t(
                                                                    "additionalServices.furnitureQuantity"
                                                                  )
                                                                }}</span>
                            </label>
                            <label class="label cursor-pointer">
                              <input v-model="v$.formData
                                  .finalCleaning
                                  .$model
                                " type="checkbox"
                                class="checkbox border !bg-transparent checked:border-client-dark border-client-dark checked:before:bg-client" />
                              <span class="label-text text-[#1b1718]">{{
                                $t(
                                  "additionalServices.finalCleaning"
                                )
                              }}</span>
                            </label>
                            <label class="label cursor-pointer">
                              <input v-model="v$.formData
                                  .furnitureLifter
                                  .$model
                                " type="checkbox"
                                class="checkbox border !bg-transparent checked:border-client-dark border-client-dark checked:before:bg-client" />
                              <span class="label-text text-[#1b1718]">{{
                                $t(
                                  "additionalServices.furnitureLifter"
                                )
                              }}</span>
                            </label>
                            <label class="label cursor-pointer">
                              <input v-model="v$.formData
                                  .noParking
                                  .$model
                                " type="checkbox"
                                class="checkbox border !bg-transparent checked:border-client-dark border-client-dark checked:before:bg-client" />
                              <span class="label-text text-[#1b1718]">{{
                                $t(
                                  "additionalServices.noParking"
                                )
                              }}</span>
                            </label>
                          </div>
                        </div>
                      </div>
                    </form>
                  </div>
                </div>

                <div class="max-w-xl mx-auto">
                  <div class="btn_wrapper flex items-center gap-2">
                    <button @click="stepNumber = 0" type="button"
                      class="bg-transparent border border-client hover:bg-client-dark transition hover:text-white text-client px-6 py-2 rounded mr-2">
                      {{ $t("back") }}
                    </button>
                    <button @click="nextStep()" type="button"
                      class="bg-client-dark hover:bg-client-dark/80 transition text-white px-6 py-2 rounded">
                      {{ $t("next") }}
                    </button>
                  </div>
                </div>
              </template>

              <!-- Step 2 Moving to Data -->
              <template v-if="stepNumber === 2">
                <!-- Location Dropoff Data -->
                <div class="form_panel">
                  <div class="form_step_parent">
                    <form class="form-step" id="movingFrom">
                      <h3 class="text-xl font-bold mb-4">
                        {{ $t("dropoff_location") }}
                      </h3>
                      <div class="flex flex-col gap-4 mb-4">
                        <div class="form_control_wrapper">
                          <div>
                            <label for="postalCode" class="block text-sm font-medium text-gray-700 mb-1">{{
                              $t(
                                "postal_code"
                              )
                            }}*</label>
                            <input id="postalCode" @change="
                              postalCodeChanged(
                                'dropOff',
                                v$.formData
                                  .dropOffPostalCode
                                  .$model
                              )
                              " v-model="v$.formData
                                                                .dropOffPostalCode
                                                                .$model
                                                              " :placeholder="$t(
                                                              'postal_code_placeholder'
                                                            )
                                                              "
                              class="w-full px-4 py-3 rounded-lg bg-white transition duration-200 outline-none border border-[#1b1718] text-[#1b1718]"
                              :class="{
                                'input-error':
                                  v$.formData
                                    .dropOffPostalCode
                                    .$error,
                              }" />
                          </div>
                          <span class="error-msg" v-if="
                            v$.formData
                              .dropOffPostalCode
                              .$error
                          ">
                            {{
                              v$.formData
                                .dropOffPostalCode
                                .$errors[0]
                                .$message
                            }}
                          </span>
                        </div>
                        <div class="form_control_wrapper">
                          <div>
                            <label for="location" class="block text-sm font-medium text-gray-700 mb-1">{{
                              $t("city")
                            }}*</label>
                            <input id="location" readonly v-model="v$.formData
                                .dropOffLocation
                                .$model
                              " :placeholder="$t(
                                                              'city_placeholder'
                                                            )
                                                              "
                              class="w-full px-4 py-3 rounded-lg bg-white transition duration-200 outline-none border border-[#1b1718] text-[#1b1718]"
                              :class="{
                                'input-error':
                                  v$.formData
                                    .dropOffLocation
                                    .$error,
                              }" />
                          </div>
                          <span class="error-msg" v-if="
                            v$.formData
                              .dropOffLocation
                              .$error
                          ">
                            {{
                              v$.formData
                                .dropOffLocation
                                .$errors[0]
                                .$message
                            }}
                          </span>
                        </div>
                        <div class="form_control_wrapper">
                          <div class="grid grid-cols-[auto_100px] gap-2">
                            <div>
                              <label for="address" class="block text-sm font-medium text-gray-700 mb-1">{{
                                $t(
                                  "street"
                                )
                              }}*</label>
                              <select id="address" v-model="v$.formData
                                  .dropOffAddress
                                  .$model
                                "
                                class="w-full px-4 py-2 rounded-lg bg-white transition duration-200 outline-none border border-[#1b1718] text-[#1b1718]"
                                :class="{
                                  'input-error':
                                    v$
                                      .formData
                                      .pickupAddress
                                      .$error,
                                }">
                                <option value="">
                                  {{
                                    $t(
                                      "pickup.streetPlaceholder"
                                    )
                                  }}
                                </option>
                                <option v-for="street in dropOffStreets" :value="street
                                  ">
                                  {{ street }}
                                </option>
                              </select>
                              <!-- <input
                                                                id="address"
                                                                v-model="
                                                                    v$.formData
                                                                        .dropOffAddress
                                                                        .$model
                                                                "
                                                                :placeholder="
                                                                    $t(
                                                                        'street_placeholder'
                                                                    )
                                                                "
                                                                class="w-full px-4 py-3 rounded-lg bg-white transition duration-200 outline-none border border-[#1b1718] text-[#1b1718]"
                                                                :class="{
                                                                    'input-error':
                                                                        v$
                                                                            .formData
                                                                            .dropOffAddress
                                                                            .$error,
                                                                }"
                                                            /> -->
                            </div>
                            <div>
                              <label for="number" class="block text-sm font-medium text-gray-700 mb-1">{{
                                $t(
                                  "number"
                                )
                              }}*</label>
                              <input id="number" v-model="v$.formData
                                  .dropOffNo
                                  .$model
                                " :placeholder="$t(
                                                                  'number_placeholder'
                                                                )
                                                                  "
                                class="w-full px-4 py-3 rounded-lg bg-white transition duration-200 outline-none border border-[#1b1718] text-[#1b1718]"
                                :class="{
                                  'input-error':
                                    v$
                                      .formData
                                      .dropOffNo
                                      .$error,
                                }" type="number" />
                            </div>
                          </div>
                          <span class="error-msg" v-if="
                            v$.formData
                              .dropOffAddress
                              .$error
                          ">
                            {{
                              v$.formData
                                .dropOffAddress
                                .$errors[0]
                                .$message
                            }}
                          </span>
                          <span class="error-msg" v-if="
                            v$.formData
                              .dropOffNo
                              .$error
                          ">
                            {{
                              v$.formData
                                .dropOffNo
                                .$errors[0]
                                .$message
                            }}
                          </span>
                        </div>
                      </div>
                    </form>
                  </div>
                </div>

                <!-- Floor, Lifter and Space to the car -->
                <div class="form_panel">
                  <div class="form_step_parent">
                    <form class="form-step" id="whatNeedToShip">
                      <h3 class="text-xl font-bold mb-4">
                        {{
                          $t("floor_lifter_distance")
                        }}
                      </h3>
                      <div class="flex flex-col gap-4 mb-4">
                        <div class="form_control_wrapper">
                          <div>
                            <label for="distanceToCar" class="block text-sm font-medium text-gray-700 mb-1">{{
                              $t(
                                "distance_to_car"
                              )
                            }}*</label>
                            <div class="grid grid-cols-[auto_20px] gap-2 items-center">
                              <input type="number" id="distanceToCar" v-model="v$.formData
                                  .dropOffDistanceToCar
                                  .$model
                                " :placeholder="$t(
                                                                  'distance_to_car_placeholder'
                                                                )
                                                                  "
                                class="w-full px-4 py-3 rounded-lg bg-white transition duration-200 outline-none border border-[#1b1718] text-[#1b1718]"
                                :class="{
                                  'input-error':
                                    v$
                                      .formData
                                      .dropOffDistanceToCar
                                      .$error,
                                }" />
                              <span>m</span>
                            </div>
                            <span class="text-xs">{{
                              $t(
                                "floorAndLift.ifNoDisctanceWriteZero"
                              )
                            }}</span>
                          </div>
                          <span class="error-msg" v-if="
                            v$.formData
                              .dropOffDistanceToCar
                              .$error
                          ">
                            {{
                              v$.formData
                                .dropOffDistanceToCar
                                .$errors[0]
                                .$message
                            }}
                          </span>
                        </div>
                        <div class="form_control_wrapper">
                          <div>
                            <label for="floor" class="block text-sm font-medium text-gray-700 mb-1">{{
                              $t(
                                "floor_number"
                              )
                            }}*</label>
                            <input id="floor" v-model="v$.formData
                                .dropOffFloorNumber
                                .$model
                              " :placeholder="$t(
                                                              'floor_number_placeholder'
                                                            )
                                                              "
                              class="w-full px-4 py-3 rounded-lg bg-white transition duration-200 outline-none border border-[#1b1718] text-[#1b1718]"
                              :class="{
                                'input-error':
                                  v$.formData
                                    .dropOffFloorNumber
                                    .$error,
                              }" type="number" />
                          </div>
                          <span class="error-msg" v-if="
                            v$.formData
                              .dropOffFloorNumber
                              .$error
                          ">
                            {{
                              v$.formData
                                .dropOffFloorNumber
                                .$errors[0]
                                .$message
                            }}
                          </span>
                        </div>
                        <div class="form_control_wrapper">
                          <label class="block text-sm font-medium text-gray-700 mb-1">{{
                            $t(
                              "lifter_existence"
                            )
                          }}*</label>
                          <div class="flex flex-col gap-3">
                            <label class="label cursor-pointer">
                              <input type="radio" name="lifterExistMoveTo" :value="1" v-model="v$.formData
                                  .dropOfflifterExistance
                                  .$model
                                "
                                class="radio border !bg-transparent checked:border-client-dark border-client-dark checked:before:bg-client"
                                :class="{
                                  'input-error':
                                    v$
                                      .formData
                                      .dropOfflifterExistance
                                      .$error,
                                }" />
                              <span class="label-text text-[#1b1718]">{{
                                $t("yes")
                              }}</span>
                            </label>
                            <label class="label cursor-pointer">
                              <input type="radio" name="lifterExistMoveTo" :value="0" v-model="v$.formData
                                  .dropOfflifterExistance
                                  .$model
                                "
                                class="radio border !bg-transparent checked:border-client-dark border-client-dark checked:before:bg-client"
                                :class="{
                                  'input-error':
                                    v$
                                      .formData
                                      .dropOfflifterExistance
                                      .$error,
                                }" />
                              <span class="label-text text-[#1b1718]">{{
                                $t("no")
                              }}</span>
                            </label>
                          </div>
                          <span class="error-msg" v-if="
                            v$.formData
                              .dropOfflifterExistance
                              .$error
                          ">
                            {{
                              v$.formData
                                .dropOfflifterExistance
                                .$errors[0]
                                .$message
                            }}
                          </span>
                        </div>
                      </div>
                    </form>
                  </div>
                </div>

                <!-- Additional Services -->
                <div class="form_panel">
                  <div class="form_step_parent">
                    <form class="form-step" id="whatNeedToShip">
                      <h3 class="text-xl font-bold mb-4">
                        {{ $t("additional_services") }}
                      </h3>
                      <div class="flex flex-col gap-4 mb-4">
                        <div class="form_control_wrapper">
                          <div class="flex flex-col gap-3">
                            <label class="label cursor-pointer">
                              <input v-model="v$.formData
                                  .unpackingServices
                                  .$model
                                " type="checkbox"
                                class="checkbox border !bg-transparent checked:border-client-dark border-client-dark checked:before:bg-client" />
                              <span class="label-text text-[#1b1718]">{{
                                $t(
                                  "unpacking_service"
                                )
                              }}</span>
                            </label>

                            <label class="label cursor-pointer">
                              <input :readonly="true" :checked="isKitchenConstructionChecked
                                " @click="
                                                                  handleCheckToggle(
                                                                    $event,
                                                                    'kitchenLongMoveOut',
                                                                    'kitchenConstruction'
                                                                  )
                                                                  " type="checkbox"
                                class="checkbox border !bg-transparent checked:border-client-dark border-client-dark checked:before:bg-client !cursor-pointer !opacity-100" />
                              <span @click.prevent="
                                showModal(
                                  'kitchenConstruction',
                                  'kitchenLongMoveOut'
                                )
                                " class="label-text text-[#1b1718]">{{
                                                                  $t(
                                                                    "kitchen_assembly"
                                                                  )
                                                                }}</span>
                            </label>

                            <label class="label cursor-pointer">
                              <input v-model="v$.formData
                                  .connectWashingMachine
                                  .$model
                                " type="checkbox"
                                class="checkbox border !bg-transparent checked:border-client-dark border-client-dark checked:before:bg-client" />
                              <span class="label-text text-[#1b1718]">{{
                                $t(
                                  "washing_machine_connection"
                                )
                              }}</span>
                            </label>
                            <label class="label cursor-pointer">
                              <input v-model="v$.formData
                                  .furnitureAssembly
                                  .$model
                                " type="checkbox"
                                class="checkbox border !bg-transparent checked:border-client-dark border-client-dark checked:before:bg-client" />
                              <span class="label-text text-[#1b1718]">{{
                                $t(
                                  "furniture_assembly"
                                )
                              }}</span>
                            </label>
                          </div>
                        </div>
                      </div>
                    </form>
                  </div>
                </div>

                <div class="max-w-xl mx-auto">
                  <div class="btn_wrapper flex items-center gap-2">
                    <button @click="stepNumber = 1" type="button"
                      class="bg-transparent border border-client hover:bg-client-dark transition hover:text-white text-client px-6 py-2 rounded mr-2">
                      {{ $t("back") }}
                    </button>
                    <button @click="nextStep()" type="button"
                      class="bg-client-dark hover:bg-client-dark/80 transition text-white px-6 py-2 rounded">
                      {{ $t("next") }}
                    </button>
                  </div>
                </div>
              </template>

              <!-- Step 3 Time -->
              <template v-if="stepNumber === 3">
                <div class="form_panel">
                  <div class="form_step_parent">
                    <!-- Step 4: When do you want to Ship ? -->
                    <form class="form-step">
                      <div class="mb-4">
                        <h3 class="text-xl font-bold mb-4">
                          {{
                            $t(
                              "shippingStep.question"
                            )
                          }}
                        </h3>
                        <div class="flex flex-col gap-4 mb-4">
                          <div>
                            <div class="form_control_wrapper">
                              <div class="flex flex-col gap-3">
                                <label class="label cursor-pointer">
                                  <input type="radio" v-model="v$
                                      .formData
                                      .timeType
                                      .$model
                                    " value="specific"
                                    class="radio border !bg-transparent checked:border-client-dark border-client-dark checked:before:bg-client"
                                    :class="{
                                      'input-error':
                                        v$
                                          .formData
                                          .timeType
                                          .$error,
                                    }" />
                                  <span class="label-text text-[#1b1718]">{{
                                    $t(
                                      "shippingStep.specificDate"
                                    )
                                  }}</span>
                                </label>
                                <label class="label cursor-pointer">
                                  <input type="radio" v-model="v$
                                      .formData
                                      .timeType
                                      .$model
                                    " value="range"
                                    class="radio border !bg-transparent checked:border-client-dark border-client-dark checked:before:bg-client"
                                    :class="{
                                      'input-error':
                                        v$
                                          .formData
                                          .timeType
                                          .$error,
                                    }" />
                                  <span class="label-text text-[#1b1718]">{{
                                    $t(
                                      "shippingStep.flexibleDate"
                                    )
                                  }}</span>
                                </label>
                              </div>
                              <span class="error-msg" v-if="
                                v$.formData
                                  .timeType
                                  .$error
                              ">
                                {{
                                  v$.formData
                                    .timeType
                                    .$errors[0]
                                    .$message
                                }}
                              </span>
                            </div>
                          </div>
                          <div id="specificDatepickerWrapper" v-if="
                            v$.formData.timeType
                              .$model ===
                            'specific'
                          " class="specificDatepicker">
                            <div class="form_control_wrapper">
                              <div>
                                <label for="specificDatepicker" class="block text-sm font-medium text-gray-700 mb-1">{{
                                  $t(
                                    "shippingStep.date"
                                  )
                                }}*</label>
                                <!-- <VCalendar /> -->
                                <VDatePicker :min-date="new Date()
                                  " v-model="v$
                                                                        .formData
                                                                        .specificDate
                                                                        .$model
                                                                      " :masks="masks
                                                                      " :locale="$i18n.locale
                                                                      ">
                                  <template #default="{
                                    inputValue,
                                    showPopover,
                                    hidePopover,
                                  }">
                                    <input
                                      class="w-full px-4 py-3 rounded-lg bg-white transition duration-200 outline-none border border-[#1b1718] text-[#1b1718]"
                                      :class="{
                                        'input-error':
                                          v$
                                            .formData
                                            .specificDate
                                            .$error,
                                      }" type="text" :value="inputValue
                                                                              " @focus="
                                                                              showPopover
                                                                            " />
                                  </template>
                                </VDatePicker>
                              </div>
                              <span class="error-msg" v-if="
                                v$.formData
                                  .specificDate
                                  .$error
                              ">
                                {{
                                  v$.formData
                                    .specificDate
                                    .$errors[0]
                                    .$message
                                }}
                              </span>
                            </div>
                          </div>
                          <div id="dateRangeWrapper" v-if="
                            v$.formData.timeType
                              .$model ===
                            'range'
                          " class="dateRange">
                            <div class="form_control_wrapper">
                              <div>
                                <label for="dateRange" class="block text-sm font-medium text-gray-700 mb-1">{{
                                  $t(
                                    "shippingStep.period"
                                  )
                                }}*</label>
                                <VDatePicker :min-date="new Date()
                                  " is-range v-model="v$
                                                                        .formData
                                                                        .rangeDate
                                                                        .$model
                                                                      " :masks="masks
                                                                      " :locale="'ge'">
                                  <template #default="{
                                    inputValue,
                                    showPopover,
                                    hidePopover,
                                  }">
                                    <input
                                      class="w-full px-4 py-3 rounded-lg bg-white transition duration-200 outline-none border border-[#1b1718] text-[#1b1718]"
                                      type="text" :class="{
                                        'input-error':
                                          v$
                                            .formData
                                            .rangeDate
                                            .$error,
                                      }" :value="`${inputValue.start ||
                                                                              ''
                                                                              } ${inputValue.start ||
                                                                                inputValue.end
                                                                                ? ' - '
                                                                                : ''
                                                                              } ${inputValue.end ||
                                                                              ''
                                                                              }`" @focus="
                                                                              showPopover
                                                                            " />
                                  </template>
                                </VDatePicker>
                              </div>
                              <span class="error-msg" v-if="
                                v$.formData
                                  .rangeDate
                                  .$error
                              ">
                                {{
                                  v$.formData
                                    .rangeDate
                                    .$errors[0]
                                    .$message
                                }}
                              </span>
                            </div>
                          </div>
                        </div>
                      </div>
                    </form>
                  </div>
                </div>

                <div class="max-w-xl mx-auto">
                  <div class="btn_wrapper flex items-center gap-2">
                    <button @click="stepNumber = 2" type="button"
                      class="bg-transparent border border-client hover:bg-client-dark transition hover:text-white text-client px-6 py-2 rounded mr-2">
                      {{ $t("buttons.back") }}
                    </button>
                    <button @click="nextStep()" type="button"
                      class="bg-client-dark hover:bg-client-dark/80 transition text-white px-6 py-2 rounded nextStepBtn">
                      {{ $t("buttons.next") }}
                    </button>
                  </div>
                </div>
              </template>

              <!-- Step 4 Contact and Personal Info -->
              <template v-if="stepNumber === 4">
                <div v-if="user && prefilledDataAlertShown"
                  class="alert alert-info mb-4 flex flex-col items-start gap-2">
                  <p>
                    <strong>{{ $t("notice") }}:</strong>
                    {{ $t("prefilledDataNotice") }}
                  </p>
                  <button @click="prefilledDataAlertShown = false" type="button" class="btn btn-outline">
                    {{ $t("close") }}
                  </button>
                </div>
                <div class="form_panel">
                  <div class="form_step_parent">
                    <!-- Step 5: Contact Information -->
                    <form class="form-step" id="contactInformation">
                      <div class="mb-4">
                        <h3 class="text-xl font-bold mb-4">
                          {{
                            $t(
                              "contact_information"
                            )
                          }}
                        </h3>
                        <div class="flex flex-col gap-4 mb-4">
                          <div class="form_control_wrapper">
                            <div>
                              <label for="name" class="block text-sm font-medium text-gray-700 mb-1">{{
                                $t(
                                  "name_required"
                                )
                              }}*</label>
                              <input id="name" v-model="v$.formData
                                  .clientName
                                  .$model
                                " :placeholder="$t(
                                                                  'name_required'
                                                                )
                                                                  "
                                class="w-full px-4 py-3 rounded-lg bg-white transition duration-200 outline-none border border-[#1b1718] text-[#1b1718]"
                                :class="{
                                  'input-error':
                                    v$
                                      .formData
                                      .clientName
                                      .$error,
                                }" />
                            </div>
                            <span class="error-msg" v-if="
                              v$.formData
                                .clientName
                                .$error
                            ">
                              {{
                                v$.formData
                                  .clientName
                                  .$errors[0]
                                  .$message
                              }}
                            </span>
                          </div>

                          <div class="form_control_wrapper">
                            <div>
                              <label for="email" class="block text-sm font-medium text-gray-700 mb-1">{{
                                $t(
                                  "email_required"
                                )
                              }}*</label>
                              <input id="email" v-model="v$.formData
                                  .clientEmail
                                  .$model
                                " :placeholder="$t(
                                                                  'email_required'
                                                                )
                                                                  "
                                class="w-full px-4 py-3 rounded-lg bg-white transition duration-200 outline-none border border-[#1b1718] text-[#1b1718]"
                                :class="{
                                  'input-error':
                                    v$
                                      .formData
                                      .clientEmail
                                      .$error,
                                }" />
                            </div>
                            <span class="error-msg" v-if="
                              v$.formData
                                .clientEmail
                                .$error
                            ">
                              {{
                                v$.formData
                                  .clientEmail
                                  .$errors[0]
                                  .$message
                              }}
                            </span>
                          </div>

                          <div class="form_control_wrapper">
                            <div>
                              <label for="phone" class="block text-sm font-medium text-gray-700 mb-1">{{
                                $t(
                                  "phone_required"
                                )
                              }}*</label>
                              <input id="phone" v-model="v$.formData
                                  .clientPhone
                                  .$model
                                " :placeholder="$t(
                                                                  'phone_required'
                                                                )
                                                                  "
                                class="w-full px-4 py-3 rounded-lg bg-white transition duration-200 outline-none border border-[#1b1718] text-[#1b1718]"
                                :class="{
                                  'input-error':
                                    v$
                                      .formData
                                      .clientPhone
                                      .$error,
                                }" />
                            </div>
                            <span class="error-msg" v-if="
                              v$.formData
                                .clientPhone
                                .$error
                            ">
                              {{
                                v$.formData
                                  .clientPhone
                                  .$errors[0]
                                  .$message
                              }}
                            </span>
                          </div>

                          <div class="form_control_wrapper">
                            <label class="block text-sm font-medium text-gray-700 mb-1">{{
                              $t(
                                "contactInformation.whoWillPay"
                              )
                            }}*</label>
                            <div class="flex flex-col gap-3">
                              <label class="label cursor-pointer">
                                <input type="radio" value="private" v-model="v$
                                    .formData
                                    .whoWillPay
                                    .$model
                                  "
                                  class="radio border !bg-transparent checked:border-client-dark border-client-dark checked:before:bg-client"
                                  :class="{
                                    'input-error':
                                      v$
                                        .formData
                                        .whoWillPay
                                        .$error,
                                  }" />
                                <span class="label-text text-[#1b1718]">{{
                                  $t(
                                    "contactInformation.client"
                                  )
                                }}</span>
                              </label>
                              <label class="label cursor-pointer">
                                <input type="radio" value="manager" v-model="v$
                                    .formData
                                    .whoWillPay
                                    .$model
                                  "
                                  class="radio border !bg-transparent checked:border-client-dark border-client-dark checked:before:bg-client"
                                  :class="{
                                    'input-error':
                                      v$
                                        .formData
                                        .whoWillPay
                                        .$error,
                                  }" />
                                <span class="label-text text-[#1b1718]">{{
                                  $t(
                                    "contactInformation.manager"
                                  )
                                }}</span>
                              </label>
                              <label class="label cursor-pointer">
                                <input type="radio" value="government" v-model="v$
                                    .formData
                                    .whoWillPay
                                    .$model
                                  "
                                  class="radio border !bg-transparent checked:border-client-dark border-client-dark checked:before:bg-client"
                                  :class="{
                                    'input-error':
                                      v$
                                        .formData
                                        .whoWillPay
                                        .$error,
                                  }" />
                                <span class="label-text text-[#1b1718]">{{
                                  $t(
                                    "contactInformation.government"
                                  )
                                }}</span>
                              </label>
                            </div>
                            <span class="error-msg" v-if="
                              v$.formData
                                .whoWillPay
                                .$error
                            ">
                              {{
                                v$.formData
                                  .whoWillPay
                                  .$errors[0]
                                  .$message
                              }}
                            </span>
                          </div>
                        </div>
                      </div>
                    </form>
                  </div>
                </div>
                <div class="max-w-xl mx-auto">
                  <div class="btn_wrapper flex items-center gap-2">
                    <button @click="stepNumber = 3" type="button"
                      class="bg-transparent border border-client hover:bg-client-dark transition hover:text-white text-client px-6 py-2 rounded mr-2">
                      {{ $t("buttons.back") }}
                    </button>
                    <button @click="nextStep()" type="button"
                      class="bg-client-dark hover:bg-client-dark/80 transition text-white px-6 py-2 rounded nextStepBtn">
                      {{ $t("buttons.next") }}
                    </button>
                  </div>
                </div>
              </template>

              <dialog id="saveDataModal" class="modal text-black">
                <form @submit.prevent class="modal-box bg-white saveDataForm">
                  <template v-if="currentPopupType === 'saveData'">
                    <h3 class="text-lg font-bold">
                      {{ $t("saveData.title") }}
                    </h3>
                    <p class="py-4">
                      {{ $t("saveData.message") }}
                    </p>
                    <div>
                      <div class="flex flex-col gap-3">
                        <label class="label cursor-pointer">
                          <input type="radio" value="true" v-model="v$.formData.saveData
                              .$model
                            " name="saveData"
                            class="radio border !bg-transparent checked:border-client-dark border-client-dark checked:before:bg-client" />
                          <span class="label-text text-[#1b1718]">{{
                            $t("saveData.save")
                          }}</span>
                        </label>
                        <label class="label cursor-pointer">
                          <input checked type="radio" value="false" v-model="v$.formData.saveData
                              .$model
                            " name="saveData"
                            class="radio border !bg-transparent checked:border-client-dark border-client-dark checked:before:bg-client" />
                          <span class="label-text text-[#1b1718]">{{
                            $t(
                              "saveData.cancel"
                            )
                          }}</span>
                        </label>
                      </div>
                    </div>
                    <div class="modal-action">
                      <button @click="submitRequestData" :class="isLoading
                          ? 'opacity-50 pointer-events-none'
                          : ''
                        " type="button" class="btn">
                        <template v-if="isLoading">
                          <span class="loading loading-spinner"></span>
                          {{ $t("saveData.submit") }}
                        </template>
                        <template v-else>
                          {{ $t("saveData.submit") }}
                        </template>
                      </button>
                    </div>
                  </template>
                  <template v-else>
                    <template v-if="
                      currentPopupType ===
                      'kitchenDismanting'
                    ">
                      <div class="flex justify-between items-center mb-6">
                        <h3 class="text-lg font-bold">
                          {{
                            $t(
                              "kitchenDismantlingModal.title"
                            )
                          }}
                        </h3>
                        <button @click="
                          closeModal({
                            modelValue:
                              'kitchenLong',
                            checkboxValue:
                              'kitchenDismanting',
                          })
                          " type="button" class="btn btn-sm btn-circle btn-ghost text-xl">
                          ✕
                        </button>
                      </div>
                      <h3 class="text-lg font-semibold mb-2">
                        {{
                          $t(
                            "kitchenDismantlingModal.question"
                          )
                        }}
                      </h3>
                      <div class="grid grid-cols-[auto_20px] gap-2 items-center">
                        <input type="number" v-model="tempFormData.kitchenLong
                          " :placeholder="$t(
                                                      'kitchenDismantlingModal.placeholder'
                                                    )
                                                      "
                          class="w-full px-4 py-3 rounded-lg bg-white transition duration-200 outline-none border border-[#1b1718] text-[#1b1718]" />
                        <span>m</span>
                      </div>
                      <div class="modal-action">
                        <button @click="
                          saveData(
                            'kitchenLong',
                            'kitchenDismanting'
                          )
                          " type="button" class="btn">
                          {{ $t("common.save") }}
                        </button>
                      </div>
                    </template>

                    <template v-if="
                      currentPopupType ===
                      'kitchenConstruction'
                    ">
                      <div class="flex justify-between items-center mb-6">
                        <h3 class="text-lg font-bold">
                          {{
                            $t(
                              "kitchenConstructionModal.title"
                            )
                          }}
                        </h3>
                        <button @click="
                          closeModal({
                            modelValue:
                              'kitchenLongMoveOut',
                            checkboxValue:
                              'kitchenConstructionModal',
                          })
                          " type="button" class="btn btn-sm btn-circle btn-ghost text-xl">
                          ✕
                        </button>
                      </div>
                      <h3 class="text-lg font-semibold mb-2">
                        {{
                          $t(
                            "kitchenConstructionModal.question"
                          )
                        }}
                      </h3>
                      <div class="grid grid-cols-[auto_20px] gap-2 items-center">
                        <input v-model="tempFormData.kitchenLongMoveOut
                          " :placeholder="$t(
                                                      'kitchenConstructionModal.placeholder'
                                                    )
                                                      "
                          class="w-full px-4 py-3 rounded-lg bg-white transition duration-200 outline-none border border-[#1b1718] text-[#1b1718]" />
                        <span>m</span>
                      </div>
                      <div class="modal-action">
                        <button @click="
                          saveData(
                            'kitchenLongMoveOut',
                            'kitchenConstruction'
                          )
                          " type="button" class="btn">
                          {{ $t("common.save") }}
                        </button>
                      </div>
                    </template>

                    <template v-if="
                      currentPopupType ===
                      'movingBoxes'
                    ">
                      <div class="flex justify-between items-center mb-6">
                        <h3 class="text-lg font-bold">
                          {{
                            $t(
                              "movingBoxesModal.title"
                            )
                          }}
                        </h3>
                        <button @click="
                          closeModal({
                            modelValue:
                              'movingBoxes',
                            checkboxValue:
                              'movingBoxes',
                          })
                          " type="button" class="btn btn-sm btn-circle btn-ghost text-xl">
                          ✕
                        </button>
                      </div>
                      <h3 class="text-lg font-semibold mb-2">
                        {{
                          $t(
                            "movingBoxesModal.question"
                          )
                        }}
                      </h3>
                      <div class="flex flex-col gap-4">
                        <div class="form_control_wrapper">
                          <div>
                            <label for="name" class="block text-sm font-medium text-gray-700 mb-1">{{
                              $t(
                                "movingBoxesModal.label"
                              )
                            }}</label>
                            <input type="number" id="name" v-model="v$.formData
                                .noOfBoxes
                                .$model
                              " :placeholder="$t(
                                                              'movingBoxesModal.placeholder'
                                                            )
                                                              "
                              class="w-full px-4 py-3 rounded-lg bg-white transition duration-200 outline-none border border-[#1b1718] text-[#1b1718]"
                              :class="{
                                'input-error':
                                  v$.formData
                                    .noOfBoxes
                                    .$error,
                              }" />
                          </div>
                          <span class="error-msg" v-if="noOfBoxesError">
                            {{
                              $t(
                                "movingBoxesModal.error"
                              )
                            }}
                          </span>
                        </div>
                        <div class="form_control_wrapper">
                          <div class="flex flex-col gap-3">
                            <label class="label cursor-pointer">
                              <input type="radio" name="movingBoxesType" v-model="tempFormData.movingBoxes
                                " value="rent"
                                class="radio border !bg-transparent checked:border-client-dark border-client-dark checked:before:bg-client" />
                              <span class="label-text text-[#1b1718]">{{
                                $t(
                                  "movingBoxesModal.rent"
                                )
                              }}</span>
                            </label>
                            <label class="label cursor-pointer">
                              <input type="radio" name="movingBoxesType" v-model="tempFormData.movingBoxes
                                " value="buy"
                                class="radio border !bg-transparent checked:border-client-dark border-client-dark checked:before:bg-client" />
                              <span class="label-text text-[#1b1718]">{{
                                $t(
                                  "movingBoxesModal.buy"
                                )
                              }}</span>
                            </label>
                          </div>
                        </div>
                      </div>
                      <div class="modal-action">
                        <button @click="
                          saveData(
                            'movingBoxes',
                            'movingBoxes'
                          )
                          " type="button" class="btn">
                          {{ $t("common.save") }}
                        </button>
                      </div>
                    </template>

                    <template v-if="
                      currentPopupType ===
                      'furnitureStore'
                    ">
                      <div class="flex justify-between items-center mb-6">
                        <h3 class="text-lg font-bold">
                          {{
                            $t(
                              "furnitureStoreModal.title"
                            )
                          }}
                        </h3>
                        <button @click="
                          closeModal({
                            modelValue:
                              'furnitureStoreDays',
                            checkboxValue:
                              'furnitureStore',
                          })
                          " type="button" class="btn btn-sm btn-circle btn-ghost text-xl">
                          ✕
                        </button>
                      </div>
                      <h3 class="text-lg font-semibold mb-2">
                        {{
                          $t(
                            "furnitureStoreModal.question"
                          )
                        }}
                      </h3>
                      <div class="grid grid-cols-[auto_20px] gap-2 items-center">
                        <input type="number" v-model="tempFormData.furnitureStoreDays
                          " :placeholder="$t(
                                                      'furnitureStoreModal.placeholder'
                                                    )
                                                      "
                          class="w-full px-4 py-3 rounded-lg bg-white transition duration-200 outline-none border border-[#1b1718] text-[#1b1718]" />
                        <span>{{
                          $t(
                            "furnitureStoreModal.unit"
                          )
                        }}</span>
                      </div>
                      <div class="modal-action">
                        <button @click="
                          saveData(
                            'furnitureStoreDays',
                            'furnitureStore'
                          )
                          " type="button" class="btn">
                          {{ $t("common.save") }}
                        </button>
                      </div>
                    </template>

                    <template v-if="
                      currentPopupType ===
                      'furnitureQuantity'
                    ">
                      <div class="flex justify-between items-center mb-6">
                        <h3 class="text-lg font-bold">
                          {{
                            $t(
                              "furnitureQuantityModal.title"
                            )
                          }}
                        </h3>
                        <button @click="
                          closeModal({
                            modelValue:
                              'furnitureQuantity',
                            checkboxValue:
                              'furnitureQuantity',
                          })
                          " type="button" class="btn btn-sm btn-circle btn-ghost text-xl">
                          ✕
                        </button>
                      </div>
                      <h3 class="text-lg font-semibold mb-2">
                        {{
                          $t(
                            "furnitureQuantityModal.question"
                          )
                        }}
                      </h3>
                      <input v-model="tempFormData.furnitureQuantity
                        " :placeholder="$t(
                                                  'furnitureQuantityModal.placeholder'
                                                )
                                                  "
                        class="w-full px-4 py-3 rounded-lg bg-white transition duration-200 outline-none border border-[#1b1718] text-[#1b1718]" />
                      <div class="modal-action">
                        <button @click="
                          saveData(
                            'furnitureQuantity',
                            'furnitureQuantity'
                          )
                          " type="button" class="btn">
                          {{ $t("common.save") }}
                        </button>
                      </div>
                    </template>
                  </template>
                </form>
              </dialog>
            </template>
            <!-- Multi-Step Form End -->
          </template>
        </div>
      </div>
    </div>
  </section>
</template>

<script>
import { required, requiredIf, email, helpers } from "@vuelidate/validators";
import useVuelidate from "@vuelidate/core";
import { reactive, toRefs, inject } from "vue";
import axios from "axios";
import { useUiStore } from "../stores/uiStore";
import { useI18n } from "vue-i18n";

export default {
  name: "Request",
  setup() {
    const user = inject("user");
    const loginPageUrl = inject("loginPageUrl");
    const germanPostalCode = helpers.regex(/^\d{5}$/);
    const { t } = useI18n();
    const fields = reactive({
      formData: {
        pickupPostalCode: "",
        pickupLocation: "",
        pickupAddress: "",
        pickupNo: "",
        firstLat: "",
        firstLong: "",
        secLat: "",
        secLong: "",
        pickupLifterExistance: null,
        pickupDistanceToCar: "",
        pickupFloorNumber: "",
        selectedPickUpType: "",
        spaceArea: "",
        roomsNumber: "",
        boxesNumber: "",
        storeArea: "",
        dropOffPostalCode: "",
        dropOffLocation: "",
        dropOffAddress: "",
        dropOffNo: "",
        dropOffDistanceToCar: "",
        dropOffFloorNumber: "",
        dropOfflifterExistance: "",
        timeType: "",
        specificDate: "",
        rangeDate: null,
        rangeDateFrom: "",
        rangeDateTo: "",
        clientName: "",
        clientEmail: "",
        clientPhone: "",
        whoWillPay: "",

        kitchenLong: "",
        movingBoxes: null,
        furnitureStoreDays: "",
        furnitureQuantity: "",
        noOfBoxes: "",

        packingServices: false,
        dismantingFurniture: false,
        finalCleaning: false,
        furnitureLifter: false,
        noParking: false,

        unpackingServices: false,
        furnitureAssembly: false,
        connectWashingMachine: false,
        furnitureLifterMoveTo: false,
        noParkingMoveTo: false,
        kitchenLongMoveOut: "",
        whatParts: "",

        saveData: false,
      },
    });

    const rules = {
      formData: {
        pickupPostalCode: {
          required: helpers.withMessage(
            t("request.shippingRequest.pickupPostalCodeRequired"),
            required
          ),
          germanPostalCode: helpers.withMessage(
            t("request.shippingRequest.pickupPostalCodeInvalid"),
            germanPostalCode
          ),
        },
        pickupLocation: {
          required: helpers.withMessage(
            t("request.shippingRequest.pickupLocationRequired"),
            required
          ),
        },
        pickupAddress: {
          required: helpers.withMessage(
            t("request.shippingRequest.pickupAddressRequired"),
            required
          ),
        },
        pickupNo: {
          required: helpers.withMessage(
            t("request.shippingRequest.pickupNoRequired"),
            required
          ),
        },
        pickupLifterExistance: {
          required: helpers.withMessage(
            t(
              "request.shippingRequest.pickupLifterExistanceRequired"
            ),
            required
          ),
        },
        pickupDistanceToCar: {
          required: helpers.withMessage(
            t(
              "request.shippingRequest.pickupDistanceToCarRequired"
            ),
            required
          ),
        },
        pickupFloorNumber: {
          required: helpers.withMessage(
            t("request.shippingRequest.pickupFloorNumberRequired"),
            required
          ),
        },
        selectedPickUpType: {
          required: helpers.withMessage(
            t("request.shippingRequest.selectedPickUpTypeRequired"),
            required
          ),
        },
        spaceArea: {
          required: helpers.withMessage(
            t("request.shippingRequest.spaceAreaRequired"),
            requiredIf(
              (value, siblings) =>
                siblings.selectedPickUpType === "all" ||
                siblings.selectedPickUpType === "part"
            )
          ),
        },
        roomsNumber: {
          required: helpers.withMessage(
            t("request.shippingRequest.roomsNumberRequired"),
            requiredIf(
              (value, siblings) =>
                siblings.selectedPickUpType === "all" ||
                siblings.selectedPickUpType === "part"
            )
          ),
        },
        boxesNumber: {
          required: helpers.withMessage(
            t("request.shippingRequest.boxesNumberRequired"),
            requiredIf(
              (value, siblings) =>
                siblings.selectedPickUpType === "boxes"
            )
          ),
        },
        dropOffPostalCode: {
          required: helpers.withMessage(
            t("request.shippingRequest.dropOffPostalCodeRequired"),
            required
          ),
          germanPostalCode: helpers.withMessage(
            t("request.shippingRequest.dropOffPostalCodeInvalid"),
            germanPostalCode
          ),
        },
        dropOffLocation: {
          required: helpers.withMessage(
            t("request.shippingRequest.dropOffLocationRequired"),
            required
          ),
        },
        dropOffAddress: {
          required: helpers.withMessage(
            t("request.shippingRequest.dropOffAddressRequired"),
            required
          ),
        },
        dropOffNo: {
          required: helpers.withMessage(
            t("request.shippingRequest.dropOffNoRequired"),
            required
          ),
        },
        dropOffDistanceToCar: {
          required: helpers.withMessage(
            t(
              "request.shippingRequest.dropOffDistanceToCarRequired"
            ),
            required
          ),
        },
        dropOffFloorNumber: {
          required: helpers.withMessage(
            t("request.shippingRequest.dropOffFloorNumberRequired"),
            required
          ),
        },
        dropOfflifterExistance: {
          required: helpers.withMessage(
            t(
              "request.shippingRequest.dropOfflifterExistanceRequired"
            ),
            required
          ),
        },
        firstLat: {},
        firstLong: {},
        secLat: {},
        secLong: {},
        timeType: {
          required: helpers.withMessage(
            t("request.shippingRequest.timeTypeRequired"),
            required
          ),
        },
        specificDate: {
          required: helpers.withMessage(
            t("request.shippingRequest.specificDateRequired"),
            requiredIf(
              (value, siblings) =>
                siblings.timeType === "specific"
            )
          ),
        },
        rangeDate: {
          required: helpers.withMessage(
            t("request.shippingRequest.rangeDateRequired"),
            requiredIf(
              (value, siblings) => siblings.timeType === "range"
            )
          ),
        },
        rangeDateFrom: {},
        rangeDateTo: {},
        clientName: {
          required: helpers.withMessage(
            t("request.shippingRequest.clientNameRequired"),
            required
          ),
        },
        clientEmail: {
          required: helpers.withMessage(
            t("request.shippingRequest.clientEmailRequired"),
            required
          ),
          email: helpers.withMessage(
            t("request.shippingRequest.clientEmailValid"),
            email
          ),
        },
        clientPhone: {
          required: helpers.withMessage(
            t("request.shippingRequest.clientPhoneRequired"),
            required
          ),
        },
        noOfBoxes: {},
        saveData: {},
        packingServices: {},
        dismantingFurniture: {},
        finalCleaning: {},
        furnitureLifter: {},
        noParking: {},
        kitchenLong: {},
        movingBoxes: {},
        furnitureStoreDays: {},
        furnitureQuantity: {},
        unpackingServices: {},
        furnitureAssembly: {},
        connectWashingMachine: {},
        furnitureLifterMoveTo: {},
        noParkingMoveTo: {},
        kitchenLongMoveOut: {},
        whatParts: {
          required: helpers.withMessage(
            t("request.shippingRequest.whatPartsRequired"),
            requiredIf(
              (value, siblings) =>
                siblings.selectedPickUpType === "part"
            )
          ),
        },
        whoWillPay: {
          required: helpers.withMessage(
            t("request.shippingRequest.whoWillPayRequired"),
            required
          ),
        },
      },
    };

    const v$ = useVuelidate(rules, fields);

    const workersFields = reactive({
      workersFormFields: {
        count: "",
        date: "",
        date_from: "",
        date_to: "",
        clientName: "",
        clientEmail: "",
        clientPhone: "",
        saveData: false,
      },
    });

    const workersFormRules = {
      workersFormFields: {
        count: {
          required: helpers.withMessage(
            t("request.companyRequest.countRequired"),
            required
          ),
        },
        date: {
          required: helpers.withMessage(
            t("request.companyRequest.dateRequired"),
            required
          ),
        },
        clientName: {
          required: helpers.withMessage(
            t("request.companyRequest.clientNameRequired"),
            required
          ),
        },
        clientEmail: {
          required: helpers.withMessage(
            t("request.companyRequest.clientEmailRequired"),
            required
          ),
          email: helpers.withMessage(
            t("request.companyRequest.clientEmailValid"),
            email
          ),
        },
        clientPhone: {
          required: helpers.withMessage(
            t("request.companyRequest.clientPhoneRequired"),
            required
          ),
        },
        saveData: {},
        date_from: {},
        date_to: {},
      },
    };

    const v2$ = useVuelidate(workersFormRules, workersFields);

    const uiStore = useUiStore();

    return {
      ...toRefs(fields),
      ...toRefs(workersFields),
      v$,
      v2$,
      uiStore,
      user,
      loginPageUrl,
      // resetForm,
    };
  },
  data() {
    return {
      stepNumber: 0,
      companyStepNumber: 0,
      creditionals_modal_shown: true,
      isLoading: false,
      prefilledDataAlertShown: false,
      resultsReady: false,
      noOfBoxesError: false,
      clientType: "",
      companyOption: "",
      masks: {
        input: "YYYY-MM-DD",
      },
      formData: {
        // Step 1
        // PickUp Panel 1
        pickupPostalCode: "",
        pickupLocation: "",
        pickupAddress: "",
        pickupNo: "",

        // PickUp Panel 2
        pickupLifterExistance: null,
        pickupDistanceToCar: "",
        pickupFloorNumber: "",

        // PickUp Panel 3
        selectedPickUpType: "",
        spaceArea: "",
        roomsNumber: "",
        boxesNumber: "",
        storeArea: "",

        // Step 2
        // dropoff Panel 1
        dropOffPostalCode: "",
        dropOffLocation: "",
        dropOffAddress: "",
        dropOffNo: "",

        // dropoff Panel 2
        dropOffDistanceToCar: "",
        dropOffFloorNumber: "",
        dropOfflifterExistance: "",

        // dropoff Panel 3
        timeType: "",
        specificDate: "",
        rangeDate: null,
        rangeDateFrom: "",
        rangeDateTo: "",

        packingServices: false,
        dismantingFurniture: false,
        finalCleaning: false,
        furnitureLifter: false,
        noParking: false,

        kitchenLong: "",
        movingBoxes: null,
        furnitureStoreDays: "",
        furnitureQuantity: "",

        unpackingServices: false,
        furnitureAssembly: false,
        connectWashingMachine: false,
        furnitureLifterMoveTo: false,
        noParkingMoveTo: false,

        kitchenLongMoveOut: "",

        // Contact Information
        clientName: "",
        clientEmail: "",
        clientPhone: "",
        whoWillPay: "",
        saveData: false,
      },
      tempFormData: {
        kitchenLong: "",
        movingBoxes: null,
        furnitureStoreDays: "",
        furnitureQuantity: "",
        kitchenLongMoveOut: "",
      },
      currentPopupType: null,

      furnitureQuantity: false,
      furnitureStore: false,
      movingBoxes: null,
      kitchenDismanting: false,
      kitchenConstruction: false,
      workersFormData: {
        count: null,
        date: null,
      },
      companyChooseError: false,
      clientTypeError: false,
      servicesCosts: null,
      totalCost: null,
      pickupStreets: [],
      dropOffStreets: [],
    };
  },
  methods: {
    showModal(type, modelValue) {
      this.currentPopupType = type;

      if (this.v$.formData[modelValue].$model) {
        this.tempFormData[modelValue] =
          this.v$.formData[modelValue].$model;
      } else {
        this.tempFormData[modelValue] = "";
      }

      if (saveDataModal) {
        saveDataModal.showModal();
      }
    },
    handleCheckToggle(e, modelValue, modalType) {
      if (this.v$.formData[modelValue].$model) {
        this.v$.formData[modelValue].$model = "";
        this.v$.formData.noOfBoxes.$model = "";
        this.tempFormData[modelValue] = "";
      } else {
        e.preventDefault();
        this.showModal(modalType, modelValue);
      }
    },
    closeModal(modelValue) {
      if (this.v$.formData[modelValue.modelValue].$model) {
        this.tempFormData[modelValue.modelValue] =
          this.v$.formData[modelValue.modelValue].$model;
      } else {
        this.tempFormData[modelValue.modelValue] = null;

        if (modelValue !== "movingBoxes") {
          this.v$.formData.noOfBoxes.$model = "";
        }
      }

      if (saveDataModal) {
        saveDataModal.close();
      }
    },
    saveData(modelValue, checkboxModelValue) {
      if (
        modelValue == "movingBoxes" &&
        !this.v$.formData.noOfBoxes.$model
      ) {
        this.noOfBoxesError = true;
        return;
      } else {
        this.noOfBoxesError = false;
        if (this.tempFormData[modelValue]) {
          this.v$.formData[modelValue].$model =
            this.tempFormData[modelValue];
          this[checkboxModelValue] = true;
          this.tempFormData[modelValue] = null;
        } else {
          this[checkboxModelValue] = false;
        }

        if (saveDataModal) {
          saveDataModal.close();
        }
      }
    },
    handleNextStepOfCompanyOrPersonal(clientType) {
      if (!clientType.trim()) {
        this.clientTypeError = true;
      } else {
        this.clientTypeError = false;
      }

      if (clientType === "company") {
        this.companyStepNumber = 1;
      }

      if (clientType === "personal") {
        this.stepNumber = 1;
      }
    },
    handleStepAfterCompanyOptionSelection(companyOption) {
      if (!companyOption) {
        this.companyChooseError = true;
        return;
      } else {
        this.companyChooseError = false;
      }

      if (companyOption === "shipping") {
        this.stepNumber = 1;
        this.companyStepNumber = 0;
      }

      if (companyOption === "workers") {
        this.companyStepNumber++;
      }
    },
    getStepFields(stepNumber) {
      const steps = {
        1: [
          "pickupPostalCode",
          "pickupLocation",
          "pickupAddress",
          "pickupNo",
          "pickupLifterExistance",
          "pickupDistanceToCar",
          "pickupFloorNumber",
          "selectedPickUpType",
          "spaceArea",
          "roomsNumber",
          "boxesNumber",
          "whatParts",
          "storeArea",
        ],
        2: [
          "dropOffPostalCode",
          "dropOffLocation",
          "dropOffAddress",
          "dropOffNo",
          "dropOffDistanceToCar",
          "dropOffFloorNumber",
          "dropOfflifterExistance",
        ],
        3: ["timeType", "specificDate", "rangeDate"],
        4: ["clientName", "clientEmail", "clientPhone", "whoWillPay"],
        // You can add step 3 here later
      };

      return steps[stepNumber] || [];
    },
    async nextStep() {
      const stepFields = this.getStepFields(this.stepNumber);
      stepFields.forEach((f) => {
        const input = f;
        this.v$.formData[input]?.$touch();
      });

      const isValid = stepFields.every((f) => {
        const input = f;
        return !this.v$.formData[input]?.$error;
      });

      const isLast = this.stepNumber === 4;
      window.scrollTo({
        top: 0,
        behavior: "smooth", // optional for smooth animation
      });

      if (isValid) {
        if (isLast) {
          this.currentPopupType = "saveData";
          if (saveDataModal) {
            saveDataModal.showModal();
          }
        } else {
          this.stepNumber++;
        }
      } else {
        console.warn(
          "Validation failed. Fix inputs before proceeding."
        );
      }
    },
    nextStepForCompany() {
      const steps = {
        2: ["count", "date"],
        3: ["clientName", "clientEmail", "clientPhone"],
      };

      const stepFields = steps[this.companyStepNumber];
      stepFields.forEach((f) => {
        const input = f;
        this.v2$.workersFormFields[input]?.$touch();
      });

      const isValid = stepFields.every((f) => {
        const input = f;
        return !this.v2$.workersFormFields[input]?.$error;
      });

      const isLast = this.companyStepNumber === 3;

      if (isValid) {
        if (isLast) {
          if (this.$refs.companySaveDataModal) {
            this.$refs.companySaveDataModal.showModal();
          }
        } else {
          this.companyStepNumber++;
        }
      } else {
        console.warn(
          "Validation failed. Fix inputs before proceeding."
        );
      }
    },
    submitCompanyRequestData() {
      if (!this.isLoading) {
        let formData = this.workersFormFields;
        formData.userType = this.clientType;
        this.isLoading = true;
        delete formData.date;
        axios
          .post("/api/factor-request", formData)
          .then((res) => {
            console.log("res");
            console.log(res);

            if (res.data.isSuccess) {
              if (res.data.services) {
                this.resultsReady = true;
                this.servicesCosts = res.data.services;
                this.totalCost = res.data.total_price;
              }

              if (res.data.user_created) {
                this.credentials = { ...res.data.credentials };
                this.creditionals_modal_shown = true;
                sessionStorage.setItem(
                  "tempCredentials",
                  JSON.stringify(this.credentials)
                );
                setTimeout(() => {
                  if (this.$refs?.creditionals_modal) {
                    this.$refs.creditionals_modal.showModal();
                  }
                }, 500);
              }

              this.resetCompanyForm();

              this.uiStore.setToaster({
                type: "success",
                duration: 5000,
                message: this.$t("requestSentSuccessfully"),
              });
            } else {
              this.uiStore.setToaster({
                type: "error",
                duration: 5000,
                message: this.$t("somethingWentWrong"),
              });
            }
          })
          .catch((err) => {
            console.log("err");
            console.log(err);
            this.uiStore.setToaster({
              type: "error",
              duration: 5000,
              message:
                err.response?.message ||
                this.$t("somethingWentWrong"),
            });
          })
          .finally(() => {
            this.isLoading = false;
            if (this.$refs.companySaveDataModal) {
              this.$refs.companySaveDataModal.close();
            }
          });
      }
    },
    submitRequestData() {
      if (!this.isLoading) {
        this.isLoading = true;
        // const data = this.v$.formData ;
        this.formData.userType = this.clientType;
        Object.keys(this.formData).forEach((key) => {
          if (this.v$.formData[key]) {
            this.formData[key] = this.v$.formData[key].$model;
          }
        });

        axios
          .post("/api/ship-request", this.formData)
          .then((res) => {
            if (res.data.isSuccess) {
              if (res.data.services) {
                this.resultsReady = true;
                this.servicesCosts = res.data.services;
                this.totalCost = res.data.total_price;
              }

              if (res.data.user_created) {
                this.credentials = { ...res.data.credentials };
                this.creditionals_modal_shown = true;
                setTimeout(() => {
                  if (this.$refs?.creditionals_modal) {
                    this.$refs.creditionals_modal.showModal();
                  }
                }, 500);
              }

              this.resetShippingForm();

              this.uiStore.setToaster({
                type: "success",
                duration: 5000,
                message: this.$t("requestSentSuccessfully"),
              });
            } else {
              this.uiStore.setToaster({
                type: "error",
                duration: 5000,
                message: this.$t("somethingWentWrong"),
              });
            }
          })
          .catch((err) => {
            console.log("err");
            console.log(err);
            this.uiStore.setToaster({
              type: "error",
              duration: 5000,
              message:
                err.response?.message ||
                this.$t("somethingWentWrong"),
            });
          })
          .finally(() => {
            this.isLoading = false;
            if (saveDataModal) {
              saveDataModal.close();
            }
          });
      }
    },
    resetCompanyForm() {
      this.workersFormFields = {
        name: "",
        email: "",
        phone: "",
        selectedPickUpType: "",
        spaceArea: "",
        selectedDate: null,
      };

      this.companyStepNumber = 1;

      // Reset validation
      this.v2$.$reset();
    },
    resetShippingForm() {
      this.formData = {
        pickupPostalCode: "",
        pickupLocation: "",
        pickupAddress: "",
        pickupNo: "",
        pickupLifterExistance: null,
        pickupDistanceToCar: "",
        pickupFloorNumber: "",
        selectedPickUpType: "",
        spaceArea: "",
        roomsNumber: "",
        boxesNumber: "",
        storeArea: "",
        dropOffPostalCode: "",
        dropOffLocation: "",
        dropOffAddress: "",
        dropOffNo: "",
        dropOffDistanceToCar: "",
        dropOffFloorNumber: "",
        dropOfflifterExistance: "",
        timeType: "",
        specificDate: "",
        rangeDate: null,
        rangeDateFrom: "",
        rangeDateTo: "",
        clientName: "",
        clientEmail: "",
        clientPhone: "",
        whoWillPay: "",

        kitchenLong: "",
        movingBoxes: null,
        furnitureStoreDays: "",
        furnitureQuantity: "",
        noOfBoxes: "",

        packingServices: false,
        dismantingFurniture: false,
        finalCleaning: false,
        furnitureLifter: false,
        noParking: false,

        unpackingServices: false,
        furnitureAssembly: false,
        connectWashingMachine: false,
        furnitureLifterMoveTo: false,
        noParkingMoveTo: false,
        kitchenLongMoveOut: "",
        whatParts: "",

        saveData: false,
      };

      this.stepNumber = 1;

      // Reset validation
      this.v$.$reset();
    },
    navigateToHome() {
      window.location.href = "/";
    },
    reloadPage() {
      window.location.reload();
    },
    copyToClipboard(value, isPassword) {
      navigator.clipboard.writeText(value);
      this.uiStore.setToaster({
        type: "success",
        duration: 5000,
        message: isPassword
          ? this.$t("copiedPasswordSuccessfully")
          : this.$t("copiedEmailSuccessfully"),
      });
    },
    closeCredentialsModal() {
      this.$refs.creditionals_modal.close();
    },
    postalCodeChanged(type, value) {
      if (
        type === "pickup" &&
        !this.v$.formData.pickupPostalCode.$error
      ) {
        this.getCitiesByPostalCode(value, type);
        this.getStreetsByPostalCode(value, type);
      } else if (
        type === "dropOff" &&
        !this.v$.formData.dropOffPostalCode.$error
      ) {
        this.getCitiesByPostalCode(value, type);
        this.getStreetsByPostalCode(value, type);
      } else {
        return;
      }
    },
    getCitiesByPostalCode(postalCode, type) {
      axios
        .get(
          `https://openplzapi.org/de/Localities?postalCode=${postalCode}`
        )
        .then((res) => {
          if (type == "pickup") {
            this.v$.formData.pickupLocation.$model = res.data
              ? res.data[0]?.name?.replace(".", "")
              : "";
          } else if (type == "dropOff") {
            this.v$.formData.dropOffLocation.$model = res.data
              ? res.data[0]?.name?.replace(".", "")
              : "";
          }
        });
    },
    getStreetsByPostalCode(postalCode, type) {
      axios
        .get(
          `https://openplzapi.org/de/Streets?postalCode=${postalCode}`
        )
        .then((res) => {
          console.log("res");
          console.log(res);
          if (type == "pickup") {
            this.pickupStreets = res.data
              ? res.data.map((item) => item.name?.replace(".", ""))
              : [];
          } else if (type == "dropOff") {
            this.dropOffStreets = res.data
              ? res.data.map((item) => item.name?.replace(".", ""))
              : [];
          }
          // if(type == 'pickup'){
          //   this.v$.formData.pickupLocation.$model = res.data ? res.data[0]?.name : '';
          // }else if (type == 'dropOff'){
          //   this.v$.formData.dropOffLocation.$model = res.data ? res.data[0]?.name : '';
          // }
        });
    },
    getLatNLongByStreetNCity(street, city, type) {
      axios
        .get(
          `https://nominatim.openstreetmap.org/search?street=${encodeURIComponent(
            street
          )}&city=${encodeURIComponent(
            city
          )}&country=Germany&format=json&limit=1`
        )
        .then((res) => {
          if (type == "pickup") {
            this.v$.formData.firstLat.$model = res.data[0]?.lat;
            this.v$.formData.firstLong.$model = res.data[0]?.lon;
          } else if (type == "dropOff") {
            this.v$.formData.secLat.$model = res.data[0]?.lat;
            this.v$.formData.secLong.$model = res.data[0]?.lon;
          }
        });
    },
  },
  computed: {
    isKitchenConstructionChecked() {
      return !!this.formData.kitchenLongMoveOut;
    },
    isKitchenDismantingChecked() {
      return !!this.formData.kitchenLong;
    },
    isMovingBoxesChecked() {
      return !!(
        this.formData.movingBoxes == "buy" ||
        this.formData.movingBoxes == "rent"
      );
    },
    isFurnitureStoreChecked() {
      return !!this.formData.furnitureStoreDays;
    },
    isFurnitureQuantityChecked() {
      return !!this.formData.furnitureQuantity;
    },
  },
  watch: {
    "v$.formData.rangeDate.$model": function (newVal) {
      if (newVal && newVal.start && newVal.end) {
        const start = newVal.start.toISOString().split("T")[0];
        const end = newVal.end.toISOString().split("T")[0];
        this.v$.formData.rangeDateFrom.$model = start;
        this.v$.formData.rangeDateTo.$model = end;
      }
    },
    "v2$.workersFormFields.date.$model": function (newVal) {
      if (newVal && newVal.start && newVal.end) {
        const start = newVal.start.toISOString().split("T")[0];
        const end = newVal.end.toISOString().split("T")[0];
        this.v2$.workersFormFields.date_from.$model = start;
        this.v2$.workersFormFields.date_to.$model = end;
      }
    },
    "v$.formData.noOfBoxes.$model": function (newVal) {
      this.noOfBoxesError = !newVal;
    },
    "v$.formData.pickupAddress.$model": function (newVal) {
      if(newVal){
        this.getLatNLongByStreetNCity(
          newVal,
          this.v$.formData.pickupLocation.$model,
          "pickup"
        );
      }
    },
    "v$.formData.dropOffAddress.$model": function (newVal) {
      if(newVal){
        this.getLatNLongByStreetNCity(
          newVal,
          this.v$.formData.dropOffLocation.$model,
          "dropOff"
        );
      }
    },
    user: {
      handler(val) {
        if (val) {
          this.workersFormFields.clientName = val.name;
          this.workersFormFields.clientEmail = val.email;
          this.workersFormFields.clientPhone = val.phone;
          this.formData.clientName = val.name;
          this.formData.clientEmail = val.email;
          this.formData.clientPhone = val.phone;
          this.prefilledDataAlertShown = true;
        }
      },
      immediate: true,
      deep: true,
    },
  },
};
</script>

<style scoped></style>
