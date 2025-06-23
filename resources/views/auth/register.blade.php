   @extends('layouts.main')
    @php
        $userType = request()->get('user-type') ?? 'client';
    @endphp
   @section('content')
        <div class="flex items-center justify-center gap-4 bg-[#f2f2f2] py-6">
            <a href="javascript:;"
                data-target="clientTab" class="{{$userType === 'client' ? 'active' : ''}} tabBtnClient tabBtn cursor-pointer border border-client-dark text-client-dark font-medium px-12 py-2 text-lg rounded-lg transition-transform hover:scale-105 shadow-lg text-center">
                {{ __('client') }}
            </a>
            <a href="javascript:;"
                data-target="workerTab" class="{{$userType === 'worker' ? 'active' : ''}} tabBtnWorker tabBtn cursor-pointer border border-worker-dark text-worker-dark font-medium px-12 py-2 text-lg rounded-lg transition-transform hover:scale-105 shadow-lg text-center">
                {{ __('worker') }}
            </a>
        </div>
        <div id="workerTab" class="tabContent {{$userType === 'client' ? 'hidden' : ''}}">
            <form class="authForm" method="POST" action="{{ route('register') }}">
                @csrf
                <input type="hidden" name="user_type" value="worker">
        
                <div class="bg-[#f2f2f2] py-8 relative">
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
                                {{ __('RegisterWorker') }}
                            </h1>
        
                            <div class="flex flex-col gap-8 login_form">
                                <div>
                                    <label for="first_name" class="block text-sm font-medium text-gray-700 mb-1">
                                        {{ __('First Name') }}*
                                    </label>
                                    <input id="first_name" name="name" placeholder="{{ __('First Name') }}"
                                        class="w-full px-4 py-3 rounded-lg bg-white transition duration-200 outline-none text-[#1b1718]" />
                                </div>
                                <div>
                                    <label for="last_name" class="block text-sm font-medium text-gray-700 mb-1">
                                        {{ __('Last Name') }}*
                                    </label>
                                    <input id="last_name" name="last_name" placeholder="{{ __('Last Name') }}"
                                        class="w-full px-4 py-3 rounded-lg bg-white transition duration-200 outline-none text-[#1b1718]" />
                                </div>
                                <div>
                                    <label for="birthDay" class="block text-sm font-medium text-gray-700 mb-1">
                                        {{ __('Birth Day') }}*
                                    </label>
                                    <input type="date" id="birthDay" name="birthDay" placeholder="{{ __('Birth Day') }}"
                                        class="w-full px-4 py-3 rounded-lg bg-white transition duration-200 outline-none text-[#1b1718]" />
                                </div>
                                <div>
                                    <label for="email" class="block text-sm font-medium text-gray-700 mb-1">
                                        {{ __('Email') }}*
                                    </label>
                                    <input type="email" id="email" name="email" placeholder="{{ __('Email') }}"
                                        class="w-full px-4 py-3 rounded-lg bg-white transition duration-200 outline-none text-[#1b1718]" />
                                </div>
                                <div>
                                    <label for="phone" class="block text-sm font-medium text-gray-700 mb-1">
                                        {{ __('phone') }}*
                                    </label>
                                    <input type="text" id="phone" name="phone" placeholder="{{ __('phone') }}"
                                        class="w-full px-4 py-3 rounded-lg bg-white transition duration-200 outline-none text-[#1b1718]" />
                                </div>
                                <div>
                                    <label for="address" class="block text-sm font-medium text-gray-700 mb-1">
                                        {{ __('address') }}*
                                    </label>
                                    <input type="text" id="address" name="address" placeholder="{{ __('address') }}"
                                        class="w-full px-4 py-3 rounded-lg bg-white transition duration-200 outline-none text-[#1b1718]" />
                                </div>
                                <div>
                                    <label for="whenToStart" class="block text-sm font-medium text-gray-700 mb-1">
                                        {{ __('whenToStart') }}*
                                    </label>
                                    <input type="date" id="whenToStart" name="whenToStart" placeholder="{{ __('whenToStart') }}"
                                        class="w-full px-4 py-3 rounded-lg bg-white transition duration-200 outline-none text-[#1b1718]" />
                                </div>
                                <div>
                                    <label for="job" class="block text-sm font-medium text-gray-700 mb-1">
                                        {{ __('selectJob') }}*
                                    </label>
                                    <select id="job" name="job"
                                        class="w-full text-[#9ca3af] px-4 py-3 rounded-lg bg-white transition duration-200 outline-none">
                                        <option disabled selected>{{ __('selectJob') }}</option>
                                        <option value="shipping_worker">{{ __('shippingWorker') }}</option>
                                        <option value="driver">{{ __('driver') }}</option>
                                        <option value="fitting_worker">{{ __('fittingWorker') }}</option>
                                    </select>
                                </div>
                                <div>
                                    <label for="hasExperience" class="block text-sm font-medium text-gray-700 mb-1">
                                        {{ __('hasExperience') }}*
                                    </label>
                                    <select id="hasExperience" name="hasExperience"
                                        class="w-full text-[#9ca3af] px-4 py-3 rounded-lg bg-white transition duration-200 outline-none">
                                        <option disabled selected>{{ __('hasExperience') }}</option>
                                        <option>{{ __('yes') }}</option>
                                        <option>{{ __('no') }}</option>
                                    </select>
                                </div>
                                <div>
                                    <label for="ability_teamWork" class="block text-sm font-medium text-gray-700 mb-1">
                                        {{ __('abilityTeamWork') }}*
                                    </label>
                                    <select id="ability_teamWork" name="ability_teamWork"
                                        class="w-full text-[#9ca3af] px-4 py-3 rounded-lg bg-white transition duration-200 outline-none">
                                        <option disabled selected>{{ __('abilityTeamWork') }}</option>
                                        <option value="true">{{ __('yes') }}</option>
                                        <option value="false">{{ __('no') }}</option>
                                    </select>
                                </div>
                                <div>
                                    <label for="drivingLicense" class="block text-sm font-medium text-gray-700 mb-1">
                                        {{ __('drivingLicense') }}*
                                    </label>
                                    <select id="drivingLicense" name="drivingLicense"
                                        class="w-full text-[#9ca3af] px-4 py-3 rounded-lg bg-white transition duration-200 outline-none">
                                        <option disabled selected>{{ __('drivingLicense') }}</option>
                                        <option value="false">{{ __('no') }}</option>
                                        <option value="classB">{{ __('licenseClassB') }}</option>
                                        <option value="classC_C1">{{ __('licenseClassC_C1') }}</option>
                                    </select>
                                </div>
                                <div>
                                    <label for="whyWorkWithUs" class="block text-sm font-medium text-gray-700 mb-1">
                                        {{ __('whyWorkWithUs') }}
                                    </label>
                                    <textarea id="whyWorkWithUs" name="whyWorkWithUs" placeholder="{{ __('whyWorkWithUs') }}"
                                        class="w-full px-4 py-3 rounded-lg bg-white transition duration-200 outline-none text-[#1b1718]"></textarea>
                                </div>
                                <div>
                                    <label for="applicantMessage" class="block text-sm font-medium text-gray-700 mb-1">
                                        {{ __('applicantMessage') }}
                                    </label>
                                    <textarea id="applicantMessage" name="applicantMessage" placeholder="{{ __('applicantMessage') }}"
                                        class="w-full px-4 py-3 rounded-lg bg-white transition duration-200 outline-none text-[#1b1718]"></textarea>
                                </div>
                                <div>
                                    <label for="cv" class="block text-sm font-medium text-gray-700 mb-1">
                                        {{ __('cv') }}*
                                    </label>
                                    <input id="cv" name="cv" type="file" accept=".doc,.docx,.pdf"
                                        class="file-input file-input-bordered w-full rounded-lg bg-white transition duration-200 outline-none text-[#1b1718]" />
                                </div>
                                <div>
                                    <label for="otherDocs" class="block text-sm font-medium text-gray-700 mb-1">
                                        {{ __('otherDocs') }}
                                    </label>
                                    <input id="otherDocs" name="otherDocs[]" accept=".doc,.docx,.pdf" multiple type="file"
                                        class="file-input file-input-bordered w-full rounded-lg bg-white transition duration-200 outline-none text-[#1b1718]" />
                                </div>
                                <div>
                                    <div class="flex justify-between items-center mb-1">
                                        <label for="password" class="block text-sm font-medium text-gray-700">
                                            {{ __('Password') }}*
                                        </label>
                                    </div>
                                    <input type="password" id="password" name="password" placeholder="{{ __('Password') }}"
                                        class="w-full px-4 py-3 rounded-lg bg-white transition duration-200 outline-none text-[#1b1718]" />
                                </div>
                                <div>
                                    <div class="flex justify-between items-center mb-1">
                                        <label for="password_confirm" class="block text-sm font-medium text-gray-700">
                                            {{ __('Confirm Password') }}*
                                        </label>
                                    </div>
                                    <input type="password" id="password_confirm" name="password_confirmation"
                                        placeholder="{{ __('Confirm Password') }}"
                                        class="w-full px-4 py-3 rounded-lg bg-white transition duration-200 outline-none text-[#1b1718]" />
                                </div>
                                <div>
                                    <div class="flex items-center mb-1">
                                        <input name="remember" type="checkbox" id="remember"
                                            class="w-[20px] h-[20px] mx-2 px-4 py-3 rounded-lg bg-white transition duration-200 outline-none text-[#1b1718]" />
                                        <label for="remember" class="block text-sm font-medium text-gray-700">
                                            {{ __('agreeDataStorage') }}
                                        </label>
                                    </div>
                                </div>
                                <button type="submit" class="submitBtn">
                                    <span class="loading loading-spinner"></span>
                                    <span>{{ __('RegisterWorker') }}</span>
                                </button>
                            </div>
        
                            <div class="mt-6 text-center">
                                <p class="text-sm text-gray-600">
                                    {{ __('Already have an account?') }}
                                    <a href="{{ route('auth.login', app()->getLocale()) }}"
                                        class="font-medium link-hover text-orange-500 hover:text-purple-600 transition duration-200">{{ __('Login') }}
                                    </a>
                                </p>
                            </div>
                        </div>
                    </div>
                </div>
            </form>
        </div>
        <div id="clientTab" class="tabContent {{$userType === 'worker' ? 'hidden' : ''}}">
            <form class="authForm" method="POST" action="{{ route('register') }}">
                @csrf
                 <input type="hidden" name="user_type" value="client">
                 <div class="bg-[#f2f2f2] py-8 relative">
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
                                {{ __('RegisterClient') }}
                            </h1>
     
                            <div class="flex flex-col gap-8 login_form">
                                <div>
                                    <label for="first_name" class="block text-sm font-medium text-gray-700 mb-1">
                                        {{ __('First Name') }}* </label>
                                    <input id="first_name" name="name" placeholder=" {{ __('First Name') }}"
                                        class="w-full px-4 py-3 rounded-lg bg-white transition duration-200 outline-none text-[#1b1718]" />
                                </div>
                                <!-- Email Input -->
                                <div>
                                    <label for="email" class="block text-sm font-medium text-gray-700 mb-1">
                                        {{ __('Email') }}*</label>
                                    <input type="email" id="email" name="email" placeholder=" {{ __('Email') }}"
                                        class="w-full px-4 py-3 rounded-lg bg-white transition duration-200 outline-none text-[#1b1718]" />
                                </div>
                                <div>
                                    <label for="phone" class="block text-sm font-medium text-gray-700 mb-1">
                                        {{ __('phone') }}*</label>
                                    <input type="text" id="phone" name="phone" placeholder=" {{ __('phone') }}"
                                        class="w-full px-4 py-3 rounded-lg bg-white transition duration-200 outline-none text-[#1b1718]" />
                                </div>
     
                                <!-- Password Input -->
                                <div>
                                    <div class="flex justify-between items-center mb-1">
                                        <label for="password" class="block text-sm font-medium text-gray-700">
                                            {{ __('Password') }}*</label>
                                    </div>
                                    <input type="password" id="password" name="password" placeholder=" {{ __('Password') }}"
                                        class="w-full px-4 py-3 rounded-lg bg-white transition duration-200 outline-none text-[#1b1718]" />
                                </div>
     
                                <div>
                                    <div class="flex justify-between items-center mb-1">
                                        <label for="password_confirm" class="block text-sm font-medium text-gray-700">
                                            {{ __('Confirm Password') }}*</label>
                                    </div>
                                    <input type="password" id="password_confirm" name="password_confirmation"
                                        placeholder=" {{ __('Confirm Password') }} "
                                        class="w-full px-4 py-3 rounded-lg bg-white transition duration-200 outline-none text-[#1b1718]" />
                                </div>
     
                                <div class="company_form_input">
                                    <div class="flex justify-between items-center mb-1">
                                        <label for="password_confirm" class="block text-sm font-medium text-gray-700">
                                            {{ __('Client Type') }}* </label>
                                    </div>
                                    <div class="form-control flex gap-8">
                                        <label class="label cursor-pointer">
                                            <input type="radio" name="type" value="individual"
                                                class="radio border !bg-transparent checked:border-client-dark border-client-dark checked:before:bg-client" />
                                            <span class="label-text text-[#1b1718]">{{ __('Individual') }}</span>
                                        </label>
                                        <label class="label cursor-pointer">
                                            <input type="radio" name="type" value="company"
                                                class="radio border !bg-transparent checked:border-client-dark border-client-dark checked:before:bg-client" />
                                            <span class="label-text text-[#1b1718]">{{ __('Company') }}</span>
                                        </label>
                                    </div>
                                </div>
     
     
     
                                <!-- Login Button -->
                                <button type="submit" class="submitBtn">
                                    <span class="loading loading-spinner"></span>
                                    <span>{{ __('RegisterClient') }}</span>
                                </button>
                            </div>
     
                            <!-- Registration Link -->
                            <div class="mt-6 text-center">
                                <p class="text-sm text-gray-600">
                                    {{ __('Already have an account?') }}
                                    <a href="{{ route('auth.login', app()->getLocale()) }}"
                                        class="font-medium link-hover text-orange-500 hover:text-purple-600 transition duration-200">{{ __('Login') }}
                                    </a>
                                </p>
                            </div>
                        </div>
                    </div>
                </div>
            </form>
        </div>
   @endsection
