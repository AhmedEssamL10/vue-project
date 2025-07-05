@extends('layouts.main')

@section('title', __('login_title'))
@section('description', __('login_description'))
@section('keywords', __('login_keywords'))
@section('og_title', __('login_title'))
@section('og_description', __('login_description'))
@section('og_type', 'website')
@section('twitter_title', __('login_title'))
@section('twitter_description', __('login_description'))
@section('robots', 'noindex, nofollow')

@section('additional_meta')
<!-- Structured Data for Login Page -->
<script type="application/ld+json">
{
  "@context": "https://schema.org",
  "@type": "WebPage",
  "name": "{{ __('login_title') }}",
  "description": "{{ __('login_description') }}",
  "url": "{{ url()->current() }}",
  "breadcrumb": {
    "@type": "BreadcrumbList",
    "itemListElement": [
      {
        "@type": "ListItem",
        "position": 1,
        "name": "{{ __('home') }}",
        "item": "{{ url('/') }}"
      },
      {
        "@type": "ListItem",
        "position": 2,
        "name": "{{ __('Login') }}",
        "item": "{{ url()->current() }}"
      }
    ]
  }
}
</script>
@endsection

@section('content')
    <form class="authForm" method="POST" action="{{ route('user.login') }} ">
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
                        {{ __('Login') }}
                    </h1>

                    <div class="flex flex-col gap-6">
                        <!-- Email Input -->
                        <div>
                            <label for="email" class="block text-sm font-medium text-gray-700 mb-1">
                                {{ __('Email') }}</label>
                            <input autocomplete="off" type="email" id="email" name="email"
                                placeholder=" {{ __('Email') }}"
                                class="w-full px-4 py-3 rounded-lg bg-white transition duration-200 outline-none text-[#1b1718]" />
                        </div>

                        <!-- Password Input -->
                        <div>
                            <div class="flex justify-between items-center mb-1">
                                <label for="password" class="block text-sm font-medium text-gray-700">
                                    {{ __('Password') }} </label>
                            </div>
                            <div class="relative password_wrapper passwordHidden">
                                <input autocomplete="off" type="password" id="password" name="password"
                                    placeholder=" {{ __('Password') }} "
                                    class="w-full px-4 py-3 rounded-lg bg-white transition duration-200 outline-none text-[#1b1718]" />
                                <span
                                    class="toggle-password absolute ltr:right-2 rtl:left-2 top-1/2 -translate-y-1/2 cursor-pointer"
                                    data-target="password_confirm">
                                    <svg class="showPasswordIcon" width="20px" xmlns="http://www.w3.org/2000/svg"
                                        viewBox="0 0 24 24" fill="black">
                                        <path
                                            d="M1.18164 12C2.12215 6.87976 6.60812 3 12.0003 3C17.3924 3 21.8784 6.87976 22.8189 12C21.8784 17.1202 17.3924 21 12.0003 21C6.60812 21 2.12215 17.1202 1.18164 12ZM12.0003 17C14.7617 17 17.0003 14.7614 17.0003 12C17.0003 9.23858 14.7617 7 12.0003 7C9.23884 7 7.00026 9.23858 7.00026 12C7.00026 14.7614 9.23884 17 12.0003 17ZM12.0003 15C10.3434 15 9.00026 13.6569 9.00026 12C9.00026 10.3431 10.3434 9 12.0003 9C13.6571 9 15.0003 10.3431 15.0003 12C15.0003 13.6569 13.6571 15 12.0003 15Z">
                                        </path>
                                    </svg>
                                    <svg class="hidePasswordIcon" width="20px" xmlns="http://www.w3.org/2000/svg"
                                        viewBox="0 0 24 24" fill="black">
                                        <path
                                            d="M4.52047 5.93457L1.39366 2.80777L2.80788 1.39355L22.6069 21.1925L21.1927 22.6068L17.8827 19.2968C16.1814 20.3755 14.1638 21.0002 12.0003 21.0002C6.60812 21.0002 2.12215 17.1204 1.18164 12.0002C1.61832 9.62282 2.81932 7.5129 4.52047 5.93457ZM14.7577 16.1718L13.2937 14.7078C12.902 14.8952 12.4634 15.0002 12.0003 15.0002C10.3434 15.0002 9.00026 13.657 9.00026 12.0002C9.00026 11.537 9.10522 11.0984 9.29263 10.7067L7.82866 9.24277C7.30514 10.0332 7.00026 10.9811 7.00026 12.0002C7.00026 14.7616 9.23884 17.0002 12.0003 17.0002C13.0193 17.0002 13.9672 16.6953 14.7577 16.1718ZM7.97446 3.76015C9.22127 3.26959 10.5793 3.00016 12.0003 3.00016C17.3924 3.00016 21.8784 6.87992 22.8189 12.0002C22.5067 13.6998 21.8038 15.2628 20.8068 16.5925L16.947 12.7327C16.9821 12.4936 17.0003 12.249 17.0003 12.0002C17.0003 9.23873 14.7617 7.00016 12.0003 7.00016C11.7514 7.00016 11.5068 7.01833 11.2677 7.05343L7.97446 3.76015Z">
                                        </path>
                                    </svg>
                                </span>
                            </div>
                        </div>

                        <div>
                            <div class="flex items-center mb-1 gap-2">
                                <input type="checkbox" id="checkbox" name="remember"
                                    class="w-[20px] h-[20px] rounded-lg bg-white transition duration-200 outline-none text-[#1b1718]" />
                                <label for="checkbox" class="block text-sm font-medium text-gray-700">
                                    {{ __('Remember me') }}
                                </label>
                            </div>
                        </div>

                        <!-- Login Button -->
                        <button type="submit" class="submitBtn">
                            <span class="loading loading-spinner"></span>
                            <span>{{ __('Login') }}</span>
                        </button>
                    </div>

                    <!-- Registration Link -->
                    <div class="mt-6 text-center">
                        <p class="text-sm text-gray-600">
                            {{ __('Don\'t have an account?') }}
                            <a href="{{ route('auth.register', app()->getLocale()) }}"
                                class="font-medium link-hover text-orange-500 hover:text-purple-600 transition duration-200">
                                {{ __('Register') }} </a>
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </form>
@endsection

<script>
    window.addEventListener('load', () => {
        const tempCredentials = sessionStorage.getItem('tempCredentials');
        const emailInput = document.getElementById('email');
        const passwordInput = document.getElementById('password');
        if (tempCredentials) {
            const credentials = JSON.parse(tempCredentials);
            setTimeout(() => {
                emailInput.value = credentials.email;
                passwordInput.value = credentials.password;
            }, 100);
            sessionStorage.removeItem('tempCredentials');
        }
    });
</script>
