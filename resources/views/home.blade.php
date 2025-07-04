@extends('layouts.main')
@section('title', __('home_title'))

@section('content')
    <!-- Hero Section -->
    <section class="pt-28 pb-20 bg-white relative overflow-hidden">
        <div class="absolute inset-0 z-0 opacity-10">
            <div class="absolute top-20 left-10 w-40 h-40 rounded-full bg-client animate-float"></div>
            <div class="absolute bottom-20 right-10 w-32 h-32 rounded-full bg-worker animate-float"
                style="animation-delay: 1s"></div>
            <div class="absolute top-40 right-40 w-24 h-24 rounded-full bg-client-light animate-float"
                style="animation-delay: 1.5s"></div>
            <div class="absolute bottom-40 left-20 w-36 h-36 rounded-full bg-worker-light animate-float"
                style="animation-delay: 2s"></div>
        </div>

        <div class="container relative z-10">
            <div class="max-w-3xl mx-auto">

                <div class="flex flex-col sm:flex-row justify-center gap-4 sm:gap-6">
                    <a href="{{ route('vue-request', app()->getLocale()) }}"
                        class="cursor-pointer bg-client hover:bg-client-dark text-white font-medium px-8 py-3 text-lg rounded-lg transition-transform hover:scale-105 shadow-lg text-center">
                        {{ __('client') }}
                    </a>
                    <a href="{{ route('auth.register', app()->getLocale()) }}?user-type=worker"
                        class="cursor-pointer bg-worker hover:bg-worker-dark text-white font-medium px-8 py-3 text-lg rounded-lg transition-transform hover:scale-105 shadow-lg text-center">
                        {{ __('worker') }}
                    </a>
                </div>

                <div class="mt-8">
                    <div id="workerTab" class="tabContent hidden">
                        <p class="text-lg text-gray-700">
                            {{ __('worker_description') }}
                        </p>
                    </div>
                </div>

            </div>
        </div>
    </section>

    <!-- Offers -->
    @if(isSet($items) && $items->count())
    <section class="pb-4 pt-8 bg-[#f1f1f1]">
        <div class="container">
            <h2 class="text-3xl md:text-4xl font-bold text-center lg:text-start mb-4 text-client-dark">
                {{ __('latest_offers') }}
            </h2>
            <div class="swiper swiper-container !py-4 dynamicSwiper" data-loop="true" data-direction="horizontal"
                data-effect="slide" data-grab-cursor="true" data-space-between="20" data-slides-per-view-default="1.5"
                data-autoplay='{"delay": 3000}'
                data-breakpoints='{"640": {"slidesPerView": 1.5}, "768": {"slidesPerView": 2}, "1024": {"slidesPerView": 3}, "1200": {"slidesPerView": 4}}'>
                <div class="swiper-wrapper">
                    @foreach ($items as $item)
                        <div class="swiper-slide group">
                            <img src="{{ asset('storage/app/public/' . $item->image) }}"
                                class="w-full group-hover:scale-125 transition duration-500"
                                alt="{{ $item->title }}" />
                        </div>
                    @endforeach

                </div>
            </div>
        </div>
    </section>
    @endif
    <!-- About Us -->
    <section class="bg-white {{ (isSet($items) && $items->count()) ? 'py-16' : '' }} px-4 sm:px-6 lg:px-8">
        <div class="container">
            <div class="grid md:grid-cols-2 gap-10 items-center">

                <!-- Image -->
                <div class="relative">
                    <img src="{{ asset('assets/images/about.jpg') }}" alt="نقل الأثاث"
                        class="rounded-xl shadow-lg w-full max-h-[80vh]">
                </div>

                <!-- Content -->
                <div>
                    <h2 class="text-3xl md:text-4xl font-bold text-gray-900 mb-4">{{ __('about_us') }}</h2>
                    <p class="text-gray-600 text-lg mb-6">
                        <span class="font-semibold text-client-dark">{{ __('three_m_services') }}
                        </span>،{{ __('about_description') }}
                    </p>
                    <ul class="flex flex-col gap-3">
                        <li class="flex items-start">
                            <svg class="w-6 h-6 text-client me-1.5" fill="none" stroke="currentColor" stroke-width="2"
                                viewBox="0 0 24 24">
                                <path d="M5 13l4 4L19 7" />
                            </svg>
                            <span class="text-gray-600">{{ __('feature_1') }} </span>
                        </li>
                        <li class="flex items-start">
                            <svg class="w-6 h-6 text-client me-1.5" fill="none" stroke="currentColor" stroke-width="2"
                                viewBox="0 0 24 24">
                                <path d="M5 13l4 4L19 7" />
                            </svg>
                            <span class="text-gray-600">{{ __('feature_2') }} </span>
                        </li>
                        <li class="flex items-start">
                            <svg class="w-6 h-6 text-client me-1.5" fill="none" stroke="currentColor" stroke-width="2"
                                viewBox="0 0 24 24">
                                <path d="M5 13l4 4L19 7" />
                            </svg>
                            <span class="text-gray-600">{{ __('feature_3') }} </span>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </section>

    <!-- Client Workflow -->
    <section class="py-20 bg-gray-50">
        <div class="container">
            <div class="text-center mb-16">
                <h2 class="text-3xl md:text-4xl font-bold mb-4 text-[#1b1718] ">
                    {{ __('transfer_steps_title') }} <span class="text-client">{{ __('three_steps') }}</span>
                </h2>
                <div class="w-20 h-1 bg-client mx-auto"></div>
            </div>

            <div class="grid grid-cols-1 md:grid-cols-3 gap-8">
                <!-- Step 1 -->
                <div
                    class="bg-white p-8 rounded-lg shadow-md transition-transform duration-300 hover:-translate-y-2 border-t-4 border-client">
                    <div class="mb-6 flex justify-center">
                        <!-- SVG Icon -->
                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"
                            fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                            stroke-linejoin="round" class="lucide lucide-user-plus w-12 h-12 text-client">
                            <path d="M16 21v-2a4 4 0 0 0-4-4H6a4 4 0 0 0-4 4v2"></path>
                            <circle cx="9" cy="7" r="4"></circle>
                            <line x1="19" x2="19" y1="8" y2="14"></line>
                            <line x1="22" x2="16" y1="11" y2="11"></line>
                        </svg>
                    </div>
                    <div class="text-center">
                        <h3 class="text-xl font-bold mb-3 text-[#1b1718] ">
                            {{ __('transfer_step1_title') }}
                        </h3>
                        <p class="text-gray-600 ">
                            {{ __('transfer_step1_description') }}
                        </p>
                    </div>
                </div>

                <!-- Step 2 -->
                <div
                    class="bg-white p-8 rounded-lg shadow-md transition-transform duration-300 hover:-translate-y-2 border-t-4 border-client">
                    <div class="mb-6 flex justify-center">
                        <!-- SVG Icon -->
                        <svg xmlns="http://www.w3.org/2000/svg" class="w-12 h-12 text-client" fill="none"
                            viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M3 3h18v18H3V3zm4 6h10M7 12h10M7 15h10" />
                        </svg>
                    </div>
                    <div class="text-center">
                        <h3 class="text-xl font-bold mb-3 text-[#1b1718] ">
                            {{ __('transfer_step2_title') }}
                        </h3>
                        <p class="text-gray-600 ">
                            {{ __('transfer_step2_description') }}
                        </p>
                    </div>
                </div>

                <!-- Step 3 -->
                <div
                    class="bg-white p-8 rounded-lg shadow-md transition-transform duration-300 hover:-translate-y-2 border-t-4 border-client">
                    <div class="mb-6 flex justify-center">
                        <!-- SVG Icon -->
                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"
                            fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                            stroke-linejoin="round" class="lucide lucide-circle-check-big w-12 h-12 text-client">
                            <path d="M21.801 10A10 10 0 1 1 17 3.335"></path>
                            <path d="m9 11 3 3L22 4"></path>
                        </svg>
                    </div>
                    <div class="text-center">
                        <h3 class="text-xl font-bold mb-3 text-[#1b1718] ">
                            {{ __('transfer_step3_title') }}
                        </h3>
                        <p class="text-gray-600 ">
                            {{ __('transfer_step3_description') }}
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Worker Workflow -->
    <section class="py-20 bg-white">
        <div class="container">
            <div class="text-center mb-16">
                <h2 class="text-3xl md:text-4xl font-bold mb-4 text-[#1b1718] ">
                    {{ __('worker_steps_title') }}<span class="text-worker">{{ __('three_steps') }} </span>
                </h2>
                <div class="w-20 h-1 bg-worker mx-auto"></div>
            </div>

            <div class="grid grid-cols-1 md:grid-cols-3 gap-8">
                <!-- Step 1 -->
                <div
                    class="bg-gray-50 p-8 rounded-lg shadow-md transition-transform duration-300 hover:-translate-y-2 border-t-4 border-worker">
                    <div class="mb-6 flex justify-center">
                        <!-- SVG Icon -->
                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"
                            fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                            stroke-linejoin="round" class="lucide lucide-user-plus w-12 h-12 text-worker">
                            <path d="M16 21v-2a4 4 0 0 0-4-4H6a4 4 0 0 0-4 4v2"></path>
                            <circle cx="9" cy="7" r="4"></circle>
                            <line x1="19" x2="19" y1="8" y2="14"></line>
                            <line x1="22" x2="16" y1="11" y2="11"></line>
                        </svg>
                    </div>
                    <div class="text-center">
                        <h3 class="text-xl font-bold mb-3 text-[#1b1718] ">
                            {{ __('worker_step1_title') }}
                        </h3>
                        <p class="text-gray-600 ">
                            {{ __('worker_step1_description') }}
                        </p>
                    </div>
                </div>

                <!-- Step 2 -->
                <div
                    class="bg-gray-50 p-8 rounded-lg shadow-md transition-transform duration-300 hover:-translate-y-2 border-t-4 border-worker">
                    <div class="mb-6 flex justify-center">
                        <!-- SVG Icon -->
                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"
                            fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                            stroke-linejoin="round" class="lucide lucide-bell w-12 h-12 text-worker">
                            <path d="M6 8a6 6 0 0 1 12 0c0 7 3 9 3 9H3s3-2 3-9"></path>
                            <path d="M10.3 21a1.94 1.94 0 0 0 3.4 0"></path>
                        </svg>
                    </div>
                    <div class="text-center">
                        <h3 class="text-xl font-bold mb-3 text-[#1b1718] ">
                            {{ __('worker_step2_title') }}
                        </h3>
                        <p class="text-gray-600 ">
                            {{ __('worker_step2_description') }}
                        </p>
                    </div>
                </div>

                <!-- Step 3 -->
                <div
                    class="bg-gray-50 p-8 rounded-lg shadow-md transition-transform duration-300 hover:-translate-y-2 border-t-4 border-worker">
                    <div class="mb-6 flex justify-center">
                        <!-- SVG Icon -->
                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"
                            fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                            stroke-linejoin="round" class="lucide lucide-dollar-sign w-12 h-12 text-worker">
                            <line x1="12" x2="12" y1="2" y2="22"></line>
                            <path d="M17 5H9.5a3.5 3.5 0 0 0 0 7h5a3.5 3.5 0 0 1 0 7H6"></path>
                        </svg>
                    </div>
                    <div class="text-center">
                        <h3 class="text-xl font-bold mb-3 text-[#1b1718] ">
                            {{ __('worker_step3_title') }}
                        </h3>
                        <p class="text-gray-600 ">
                            {{ __('worker_step3_description') }}
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Everyone Benefits -->
    <section class="py-20 bg-gray-50">
        <div class="container">
            <div class="text-center mb-16">
                <h2 class="text-3xl md:text-4xl font-bold text-[#1b1718] ">
                    {{ __('everyone_benefits_title') }}
                </h2>
                <div class="w-20 h-1 bg-gradient-to-r from-client to-worker mx-auto mt-4"></div>
            </div>

            <div class="grid grid-cols-1 lg:grid-cols-2 gap-10">
                <!-- فوائد العملاء -->
                <div class="bg-white p-8 rounded-lg shadow-md">
                    <h3 class="text-2xl font-bold mb-6 text-center text-client ">
                        {{ __('client_benefits_title') }}
                    </h3>
                    <div class="flex flex-col gap-8">
                        <!-- خدمة سريعة -->
                        <div class="flex gap-4">
                            <div class="flex-shrink-0 mt-1">
                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                    viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"
                                    stroke-linecap="round" stroke-linejoin="round"
                                    class="lucide lucide-zap w-10 h-10 text-client">
                                    <path
                                        d="M4 14a1 1 0 0 1-.78-1.63l9.9-10.2a.5.5 0 0 1 .86.46l-1.92 6.02A1 1 0 0 0 13 10h7a1 1 0 0 1 .78 1.63l-9.9 10.2a.5.5 0 0 1-.86-.46l1.92-6.02A1 1 0 0 0 11 14z" />
                                </svg>
                            </div>
                            <div>
                                <h4 class="text-lg font-semibold mb-2 text-[#1b1718] ">
                                    {{ __('client_benefit1_title') }}
                                </h4>
                                <p class="text-gray-600 ">
                                    {{ __('client_benefit1_description') }}
                                </p>
                            </div>
                        </div>
                        <!-- عمال موثوقون -->
                        <div class="flex gap-4">
                            <div class="flex-shrink-0 mt-1">
                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                    viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"
                                    stroke-linecap="round" stroke-linejoin="round"
                                    class="lucide lucide-shield w-10 h-10 text-client">
                                    <path
                                        d="M20 13c0 5-3.5 7.5-7.66 8.95a1 1 0 0 1-.67-.01C7.5 20.5 4 18 4 13V6a1 1 0 0 1 1-1c2 0 4.5-1.2 6.24-2.72a1.17 1.17 0 0 1 1.52 0C14.51 3.81 17 5 19 5a1 1 0 0 1 1 1z" />
                                </svg>
                            </div>
                            <div>
                                <h4 class="text-lg font-semibold mb-2 text-[#1b1718] ">
                                    {{ __('client_benefit2_title') }}
                                </h4>
                                <p class="text-gray-600 ">
                                    {{ __('client_benefit2_description') }}
                                </p>
                            </div>
                        </div>
                        <!-- عملية طلب سهلة -->
                        <div class="flex gap-4">
                            <div class="flex-shrink-0 mt-1">
                                <svg class="w-10 h-10 fill-client" xmlns="http://www.w3.org/2000/svg" height="24px"
                                    viewBox="0 -960 960 960" width="24px" fill="none">
                                    <path
                                        d="M419-80q-28 0-52.5-12T325-126L107-403l19-20q20-21 48-25t52 11l74 45v-328q0-17 11.5-28.5T340-760q17 0 29 11.5t12 28.5v472l-97-60 104 133q6 7 14 11t17 4h221q33 0 56.5-23.5T720-240v-160q0-17-11.5-28.5T680-440H461v-80h219q50 0 85 35t35 85v160q0 66-47 113T640-80H419ZM167-620q-13-22-20-47.5t-7-52.5q0-83 58.5-141.5T340-920q83 0 141.5 58.5T540-720q0 27-7 52.5T513-620l-69-40q8-14 12-28.5t4-31.5q0-50-35-85t-85-35q-50 0-85 35t-35 85q0 17 4 31.5t12 28.5l-69 40Zm335 280Z" />
                                </svg>
                            </div>
                            <div>
                                <h4 class="text-lg font-semibold mb-2 text-[#1b1718] ">
                                    {{ __('client_benefit3_title') }}
                                </h4>
                                <p class="text-gray-600 ">
                                    {{ __('client_benefit3_description') }}
                                </p>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- فوائد العاملين -->
                <div class="bg-white p-8 rounded-lg shadow-md">
                    <h3 class="text-2xl font-bold mb-6 text-center text-worker ">
                        {{ __('worker_benefits_title') }}
                    </h3>
                    <div class="flex flex-col gap-8">
                        <!-- عمل مرن -->
                        <div class="flex gap-4">
                            <div class="flex-shrink-0 mt-1">
                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                    viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"
                                    stroke-linecap="round" stroke-linejoin="round"
                                    class="lucide lucide-clock w-10 h-10 text-worker">
                                    <circle cx="12" cy="12" r="10"></circle>
                                    <polyline points="12 6 12 12 16 14"></polyline>
                                </svg>
                            </div>
                            <div>
                                <h4 class="text-lg font-semibold mb-2 text-[#1b1718] ">
                                    {{ __('worker_benefit1_title') }}
                                </h4>
                                <p class="text-gray-600 ">
                                    {{ __('worker_benefit1_description') }}
                                </p>
                            </div>
                        </div>
                        <!-- مدفوعات مضمونة -->
                        <div class="flex gap-4">
                            <div class="flex-shrink-0 mt-1">
                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                    viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"
                                    stroke-linecap="round" stroke-linejoin="round"
                                    class="lucide lucide-dollar-sign w-10 h-10 text-worker">
                                    <line x1="12" x2="12" y1="2" y2="22"></line>
                                    <path d="M17 5H9.5a3.5 3.5 0 0 0 0 7h5a3.5 3.5 0 0 1 0 7H6"></path>
                                </svg>
                            </div>
                            <div>
                                <h4 class="text-lg font-semibold mb-2 text-[#1b1718] ">
                                    {{ __('worker_benefit2_title') }}
                                </h4>
                                <p class="text-gray-600 ">
                                    {{ __('worker_benefit2_description') }}
                                </p>
                            </div>
                        </div>
                        <!-- إعداد سهل -->
                        <div class="flex gap-4">
                            <div class="flex-shrink-0 mt-1">
                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                    viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"
                                    stroke-linecap="round" stroke-linejoin="round"
                                    class="lucide lucide-layers w-10 h-10 text-worker">
                                    <path
                                        d="m12.83 2.18a2 2 0 0 0-1.66 0L2.6 6.08a1 1 0 0 0 0 1.83l8.58 3.91a2 2 0 0 0 1.66 0l8.58-3.9a1 1 0 0 0 0-1.83Z">
                                    </path>
                                    <path d="m22 17.65-9.17 4.16a2 2 0 0 1-1.66 0L2 17.65"></path>
                                    <path d="m22 12.65-9.17 4.16a2 2 0 0 1-1.66 0L2 12.65"></path>
                                </svg>
                            </div>
                            <div>
                                <h4 class="text-lg font-semibold mb-2 text-[#1b1718] ">
                                    {{ __('worker_benefit3_title') }}
                                </h4>
                                <p class="text-gray-600 ">
                                    {{ __('worker_benefit3_description') }}
                                </p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
