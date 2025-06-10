<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>ثرى إم للخدمات - الصفحة الرئيسية</title>
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

<body dir="{{ app()->getLocale() === 'ar' ? 'rtl' : 'ltr' }}">
    @include('layouts.header')

    <main>
        @yield('content')
    </main>

    @include('layouts.footer')
</body>

</html>
