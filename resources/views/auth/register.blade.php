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
                                            {{ __('Password') }}*</label>
                                    </div>
                                    <div class="relative password_wrapper passwordHidden">
                                        <input type="password" id="password" name="password" placeholder=" {{ __('Password') }}"
                                            class="w-full px-4 py-3 rounded-lg bg-white transition duration-200 outline-none text-[#1b1718]" />
                                            <span class="toggle-password absolute ltr:right-2 rtl:left-2 top-1/2 -translate-y-1/2 cursor-pointer" data-target="password_confirm">
                                                <svg class="showPasswordIcon" width="20px" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="black"><path d="M1.18164 12C2.12215 6.87976 6.60812 3 12.0003 3C17.3924 3 21.8784 6.87976 22.8189 12C21.8784 17.1202 17.3924 21 12.0003 21C6.60812 21 2.12215 17.1202 1.18164 12ZM12.0003 17C14.7617 17 17.0003 14.7614 17.0003 12C17.0003 9.23858 14.7617 7 12.0003 7C9.23884 7 7.00026 9.23858 7.00026 12C7.00026 14.7614 9.23884 17 12.0003 17ZM12.0003 15C10.3434 15 9.00026 13.6569 9.00026 12C9.00026 10.3431 10.3434 9 12.0003 9C13.6571 9 15.0003 10.3431 15.0003 12C15.0003 13.6569 13.6571 15 12.0003 15Z"></path></svg>
                                                <svg class="hidePasswordIcon" width="20px" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="black"><path d="M4.52047 5.93457L1.39366 2.80777L2.80788 1.39355L22.6069 21.1925L21.1927 22.6068L17.8827 19.2968C16.1814 20.3755 14.1638 21.0002 12.0003 21.0002C6.60812 21.0002 2.12215 17.1204 1.18164 12.0002C1.61832 9.62282 2.81932 7.5129 4.52047 5.93457ZM14.7577 16.1718L13.2937 14.7078C12.902 14.8952 12.4634 15.0002 12.0003 15.0002C10.3434 15.0002 9.00026 13.657 9.00026 12.0002C9.00026 11.537 9.10522 11.0984 9.29263 10.7067L7.82866 9.24277C7.30514 10.0332 7.00026 10.9811 7.00026 12.0002C7.00026 14.7616 9.23884 17.0002 12.0003 17.0002C13.0193 17.0002 13.9672 16.6953 14.7577 16.1718ZM7.97446 3.76015C9.22127 3.26959 10.5793 3.00016 12.0003 3.00016C17.3924 3.00016 21.8784 6.87992 22.8189 12.0002C22.5067 13.6998 21.8038 15.2628 20.8068 16.5925L16.947 12.7327C16.9821 12.4936 17.0003 12.249 17.0003 12.0002C17.0003 9.23873 14.7617 7.00016 12.0003 7.00016C11.7514 7.00016 11.5068 7.01833 11.2677 7.05343L7.97446 3.76015Z"></path></svg>
                                            </span>
                                    </div>
                                </div>
     
                                <div>
                                    <div class="flex justify-between items-center mb-1">
                                        <label for="password_confirm" class="block text-sm font-medium text-gray-700">
                                            {{ __('Confirm Password') }}*</label>
                                    </div>
                                    <div class="relative password_wrapper passwordHidden">
                                        <input type="password" id="password_confirm" name="password_confirmation"
                                            placeholder=" {{ __('Confirm Password') }} "
                                            class="w-full px-4 py-3 rounded-lg bg-white transition duration-200 outline-none text-[#1b1718]" />
                                            <span class="toggle-password absolute ltr:right-2 rtl:left-2 top-1/2 -translate-y-1/2 cursor-pointer" data-target="password_confirm">
                                                <svg class="showPasswordIcon" width="20px" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="black"><path d="M1.18164 12C2.12215 6.87976 6.60812 3 12.0003 3C17.3924 3 21.8784 6.87976 22.8189 12C21.8784 17.1202 17.3924 21 12.0003 21C6.60812 21 2.12215 17.1202 1.18164 12ZM12.0003 17C14.7617 17 17.0003 14.7614 17.0003 12C17.0003 9.23858 14.7617 7 12.0003 7C9.23884 7 7.00026 9.23858 7.00026 12C7.00026 14.7614 9.23884 17 12.0003 17ZM12.0003 15C10.3434 15 9.00026 13.6569 9.00026 12C9.00026 10.3431 10.3434 9 12.0003 9C13.6571 9 15.0003 10.3431 15.0003 12C15.0003 13.6569 13.6571 15 12.0003 15Z"></path></svg>
                                                <svg class="hidePasswordIcon" width="20px" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="black"><path d="M4.52047 5.93457L1.39366 2.80777L2.80788 1.39355L22.6069 21.1925L21.1927 22.6068L17.8827 19.2968C16.1814 20.3755 14.1638 21.0002 12.0003 21.0002C6.60812 21.0002 2.12215 17.1204 1.18164 12.0002C1.61832 9.62282 2.81932 7.5129 4.52047 5.93457ZM14.7577 16.1718L13.2937 14.7078C12.902 14.8952 12.4634 15.0002 12.0003 15.0002C10.3434 15.0002 9.00026 13.657 9.00026 12.0002C9.00026 11.537 9.10522 11.0984 9.29263 10.7067L7.82866 9.24277C7.30514 10.0332 7.00026 10.9811 7.00026 12.0002C7.00026 14.7616 9.23884 17.0002 12.0003 17.0002C13.0193 17.0002 13.9672 16.6953 14.7577 16.1718ZM7.97446 3.76015C9.22127 3.26959 10.5793 3.00016 12.0003 3.00016C17.3924 3.00016 21.8784 6.87992 22.8189 12.0002C22.5067 13.6998 21.8038 15.2628 20.8068 16.5925L16.947 12.7327C16.9821 12.4936 17.0003 12.249 17.0003 12.0002C17.0003 9.23873 14.7617 7.00016 12.0003 7.00016C11.7514 7.00016 11.5068 7.01833 11.2677 7.05343L7.97446 3.76015Z"></path></svg>
                                            </span>
                                    </div>
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
                                    <div class="relative password_wrapper passwordHidden">
                                        <input type="password" id="password" name="password" placeholder=" {{ __('Password') }}"
                                            class="w-full px-4 py-3 rounded-lg bg-white transition duration-200 outline-none text-[#1b1718]" />
                                            <span class="toggle-password absolute ltr:right-2 rtl:left-2 top-1/2 -translate-y-1/2 cursor-pointer" data-target="password_confirm">
                                                <svg class="showPasswordIcon" width="20px" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="black"><path d="M1.18164 12C2.12215 6.87976 6.60812 3 12.0003 3C17.3924 3 21.8784 6.87976 22.8189 12C21.8784 17.1202 17.3924 21 12.0003 21C6.60812 21 2.12215 17.1202 1.18164 12ZM12.0003 17C14.7617 17 17.0003 14.7614 17.0003 12C17.0003 9.23858 14.7617 7 12.0003 7C9.23884 7 7.00026 9.23858 7.00026 12C7.00026 14.7614 9.23884 17 12.0003 17ZM12.0003 15C10.3434 15 9.00026 13.6569 9.00026 12C9.00026 10.3431 10.3434 9 12.0003 9C13.6571 9 15.0003 10.3431 15.0003 12C15.0003 13.6569 13.6571 15 12.0003 15Z"></path></svg>
                                                <svg class="hidePasswordIcon" width="20px" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="black"><path d="M4.52047 5.93457L1.39366 2.80777L2.80788 1.39355L22.6069 21.1925L21.1927 22.6068L17.8827 19.2968C16.1814 20.3755 14.1638 21.0002 12.0003 21.0002C6.60812 21.0002 2.12215 17.1204 1.18164 12.0002C1.61832 9.62282 2.81932 7.5129 4.52047 5.93457ZM14.7577 16.1718L13.2937 14.7078C12.902 14.8952 12.4634 15.0002 12.0003 15.0002C10.3434 15.0002 9.00026 13.657 9.00026 12.0002C9.00026 11.537 9.10522 11.0984 9.29263 10.7067L7.82866 9.24277C7.30514 10.0332 7.00026 10.9811 7.00026 12.0002C7.00026 14.7616 9.23884 17.0002 12.0003 17.0002C13.0193 17.0002 13.9672 16.6953 14.7577 16.1718ZM7.97446 3.76015C9.22127 3.26959 10.5793 3.00016 12.0003 3.00016C17.3924 3.00016 21.8784 6.87992 22.8189 12.0002C22.5067 13.6998 21.8038 15.2628 20.8068 16.5925L16.947 12.7327C16.9821 12.4936 17.0003 12.249 17.0003 12.0002C17.0003 9.23873 14.7617 7.00016 12.0003 7.00016C11.7514 7.00016 11.5068 7.01833 11.2677 7.05343L7.97446 3.76015Z"></path></svg>
                                            </span>
                                    </div>
                                </div>
     
                                <div>
                                    <div class="flex justify-between items-center mb-1">
                                        <label for="password_confirm" class="block text-sm font-medium text-gray-700">
                                            {{ __('Confirm Password') }}*</label>
                                    </div>
                                    <div class="relative password_wrapper passwordHidden">
                                        <input type="password" id="password_confirm" name="password_confirmation"
                                            placeholder=" {{ __('Confirm Password') }} "
                                            class="w-full px-4 py-3 rounded-lg bg-white transition duration-200 outline-none text-[#1b1718]" />
                                            <span class="toggle-password absolute ltr:right-2 rtl:left-2 top-1/2 -translate-y-1/2 cursor-pointer" data-target="password_confirm">
                                                <svg class="showPasswordIcon" width="20px" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="black"><path d="M1.18164 12C2.12215 6.87976 6.60812 3 12.0003 3C17.3924 3 21.8784 6.87976 22.8189 12C21.8784 17.1202 17.3924 21 12.0003 21C6.60812 21 2.12215 17.1202 1.18164 12ZM12.0003 17C14.7617 17 17.0003 14.7614 17.0003 12C17.0003 9.23858 14.7617 7 12.0003 7C9.23884 7 7.00026 9.23858 7.00026 12C7.00026 14.7614 9.23884 17 12.0003 17ZM12.0003 15C10.3434 15 9.00026 13.6569 9.00026 12C9.00026 10.3431 10.3434 9 12.0003 9C13.6571 9 15.0003 10.3431 15.0003 12C15.0003 13.6569 13.6571 15 12.0003 15Z"></path></svg>
                                                <svg class="hidePasswordIcon" width="20px" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="black"><path d="M4.52047 5.93457L1.39366 2.80777L2.80788 1.39355L22.6069 21.1925L21.1927 22.6068L17.8827 19.2968C16.1814 20.3755 14.1638 21.0002 12.0003 21.0002C6.60812 21.0002 2.12215 17.1204 1.18164 12.0002C1.61832 9.62282 2.81932 7.5129 4.52047 5.93457ZM14.7577 16.1718L13.2937 14.7078C12.902 14.8952 12.4634 15.0002 12.0003 15.0002C10.3434 15.0002 9.00026 13.657 9.00026 12.0002C9.00026 11.537 9.10522 11.0984 9.29263 10.7067L7.82866 9.24277C7.30514 10.0332 7.00026 10.9811 7.00026 12.0002C7.00026 14.7616 9.23884 17.0002 12.0003 17.0002C13.0193 17.0002 13.9672 16.6953 14.7577 16.1718ZM7.97446 3.76015C9.22127 3.26959 10.5793 3.00016 12.0003 3.00016C17.3924 3.00016 21.8784 6.87992 22.8189 12.0002C22.5067 13.6998 21.8038 15.2628 20.8068 16.5925L16.947 12.7327C16.9821 12.4936 17.0003 12.249 17.0003 12.0002C17.0003 9.23873 14.7617 7.00016 12.0003 7.00016C11.7514 7.00016 11.5068 7.01833 11.2677 7.05343L7.97446 3.76015Z"></path></svg>
                                            </span>
                                    </div>
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