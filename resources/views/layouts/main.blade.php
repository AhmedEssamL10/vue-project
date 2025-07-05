<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>@yield('title', __('home_title'))</title>
    <meta name="google-site-verification" content="W9sNWwbAi7s5HFzC32suun2EWpahencqeIEuwPydA0s" />
    <!-- SEO Meta Tags -->
    <meta name="description" content="@yield('description', __('about_description'))">
    <meta name="keywords" content="@yield('home_title', __('home_title'))">

    <!-- Open Graph Meta Tags -->
    <meta property="og:title" content=" {{ __('home_title') }}">
    <meta property="og:description" content=" {{ __('about_description') }}">
    {{-- <meta property="og:image" content="@yield('og_image', asset('images/default-og-image.jpg'))"> --}}
    <meta property="og:url" content="{{ url()->current() }}">
    <meta property="og:type" content="website">

    <!-- Twitter Card Meta Tags -->
    <meta name="twitter:card" content="summary_large_image">
    <meta name="twitter:title" content=" {{ __('home_title') }}">
    <meta name="twitter:description" content=" {{ __('about_description') }}">
    {{-- <meta name="twitter:image" content="@yield('twitter_image', '@yield('og_image')')"> --}}

    <!-- Canonical URL -->
    <link rel="canonical" href="{{ url()->current() }}">
    <link rel="icon" href="https://3m-services-v44.netlify.app/assets/Pur-Z7YkYTxg.png" type="image/x-icon">
    <style>
        @font-face {
            font-family: Cairo;
            src: url("{{ asset('assets/fonts/Cairo-Regular.ttf') }}") format("truetype");
            font-weight: 400;
        }

        @font-face {
            font-family: Cairo;
            src: url("{{ asset('assets/fonts/Cairo-Medium.ttf') }}") format("truetype");
            font-weight: 500;
        }

        @font-face {
            font-family: Cairo;
            src: url("{{ asset('assets/fonts/Cairo-SemiBold.ttf') }}") format("truetype");
            font-weight: 600;
        }

        @font-face {
            font-family: Cairo;
            src: url("{{ asset('assets/fonts/Cairo-Bold.ttf') }}") format("truetype");
            font-weight: 700;
        }

        @font-face {
            font-family: Inter;
            src: url("{{ asset('assets/fonts/Inter-Regular.ttf') }}") format("truetype");
            font-weight: 400;
        }

        @font-face {
            font-family: Inter;
            src: url("{{ asset('assets/fonts/Inter-Medium.ttf') }}") format("truetype");
            font-weight: 500;
        }

        @font-face {
            font-family: Inter;
            src: url("{{ asset('assets/fonts/Inter-SemiBold.ttf') }}") format("truetype");
            font-weight: 600;
        }

        @font-face {
            font-family: Inter;
            src: url("{{ asset('assets/fonts/Inter-Bold.ttf') }}") format("truetype");
            font-weight: 700;
        }
    </style>
    @vite(['resources/js/main.js'])
</head>

<body dir="{{ app()->getLocale() === 'ar' ? 'rtl' : 'ltr' }}" data-locale="{{ app()->getLocale() }}">
    @include('layouts.header')
    <dialog id="cookiesModal" class="modal">

        <div class="modal-box bg-[#f1f1f1] text-black">
            <svg class="mb-4 fill-client" width="100px" xmlns="http://www.w3.org/2000/svg" viewBox="0 -960 960 960"
                fill="#e3e3e3">
                <path
                    d="M480-80q-83 0-156-31.5T197-197q-54-54-85.5-127T80-480q0-75 29-147t81-128.5q52-56.5 125-91T475-881q21 0 43 2t45 7q-9 45 6 85t45 66.5q30 26.5 71.5 36.5t85.5-5q-26 59 7.5 113t99.5 56q1 11 1.5 20.5t.5 20.5q0 82-31.5 154.5t-85.5 127q-54 54.5-127 86T480-80Zm-60-480q25 0 42.5-17.5T480-620q0-25-17.5-42.5T420-680q-25 0-42.5 17.5T360-620q0 25 17.5 42.5T420-560Zm-80 200q25 0 42.5-17.5T400-420q0-25-17.5-42.5T340-480q-25 0-42.5 17.5T280-420q0 25 17.5 42.5T340-360Zm260 40q17 0 28.5-11.5T640-360q0-17-11.5-28.5T600-400q-17 0-28.5 11.5T560-360q0 17 11.5 28.5T600-320ZM480-160q122 0 216.5-84T800-458q-50-22-78.5-60T683-603q-77-11-132-66t-68-132q-80-2-140.5 29t-101 79.5Q201-644 180.5-587T160-480q0 133 93.5 226.5T480-160Zm0-324Z" />
            </svg>
            <h3 class="text-xl font-bold">{{ __('cookiesTitle') }}</h3>
            <p class="py-4">{{ __('cookiesContent') }}</p>
            <div class="modal-action">
                <form method="dialog">
                    <!-- if there is a button in form, it will close the modal -->
                    <button class="btn">{{ __('cookiesAccept') }}</button>
                </form>
            </div>
        </div>
    </dialog>
    <main>
        @yield('content')
    </main>

    @include('layouts.footer')
</body>

</html>
