@extends('layouts.main')
@section('content')
    <form id="authForm" method="POST" action="{{ route('profile.change-password.post') }} ">
        @csrf
        <div class="bg-[#f2f2f2] py-12 lg:py-20 relative">
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
                        {{ __('change_password') }}
                    </h1>

                    <div class="flex flex-col gap-6">
                        <!-- Password Input -->
                        <div>
                            <div class="flex justify-between items-center mb-1">
                                <label for="current_password" class="block text-sm font-medium text-gray-700">
                                    {{ __('current_password') }} </label>
                            </div>
                            <input type="password" id="current_password" name="current_password"
                                placeholder=" {{ __('current_password') }} "
                                class="w-full px-4 py-3 rounded-lg bg-white transition duration-200 outline-none text-[#1b1718]" />
                        </div>


                        <div>
                            <div class="flex justify-between items-center mb-1">
                                <label for="new_password" class="block text-sm font-medium text-gray-700">
                                    {{ __('new_password') }} </label>
                            </div>
                            <input type="password" id="new_password" name="new_password"
                                placeholder=" {{ __('new_password') }} "
                                class="w-full px-4 py-3 rounded-lg bg-white transition duration-200 outline-none text-[#1b1718]" />
                        </div>


                        <div>
                            <div class="flex justify-between items-center mb-1">
                                <label for="new_password_confirmation" class="block text-sm font-medium text-gray-700">
                                    {{ __('new_password_confirmation') }} </label>
                            </div>
                            <input type="password" id="new_password_confirmation" name="new_password_confirmation"
                                placeholder=" {{ __('new_password_confirmation') }} "
                                class="w-full px-4 py-3 rounded-lg bg-white transition duration-200 outline-none text-[#1b1718]" />
                        </div>

                        <!-- Login Button -->
                        <button type="submit" class="submitBtn">
                            <span class="loading loading-spinner"></span>
                            <span>{{ __('Login') }}</span>
                        </button>
                    </div>

                </div>
            </div>
        </div>
    </form>
@endsection
