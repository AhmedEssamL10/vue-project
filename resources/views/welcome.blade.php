<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>ثرى إم للخدمات - الصفحة الرئيسية</title>
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
</head>

<body id="app" dir="rtl">

    <header class="w-full bg-white shadow-sm py-4 fixed top-0 left-0 right-0 z-20">
        <div class="container flex justify-between items-center">
            <div class="flex items-center">
                <a href="/">
                    <img class="w-[150px]" src="./src/assets/images/Pur.svg" alt="Logo" />
                </a>
            </div>

            <!-- Desktop Navigation -->
            <nav class="hidden md:flex items-center gap-8">
                <a href="/" class="nav-link active">الرئيسية</a>
                <a href="/login" class="nav-link">تسجيل دخول</a>
                <a href="/register" class="nav-link">تسجيل حساب</a>
                <a class="flex items-center gap-[2px] transition-all duration-500 hover:opacity-80" href="#">
                    <img width="25px" src="./src/assets/images/germany.png" alt="">
                    <!-- <img width="25px" src="./src/assets/images/arabic.webp" alt=""> -->
                    <span class="font-semibold text-[#1a2947] uppercase text-xs lg:text-sm">GR</span>
                </a>
            </nav>

            <!-- Mobile Menu Button -->
            <button id="menu-toggle" class="showMobMenu md:hidden focus:outline-none">
                <svg id="menu-icon" xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 stroke-client-dark" fill="none"
                    viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16" />
                </svg>
            </button>
        </div>
    </header>

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
                <!-- <h1
            class="text-4xl lg:text-5xl font-bold mb-6 text-[#1b1718] !leading-relaxed "
          >
            قم بنقل أي شيء، في أي مكان — <br class="hidden sm:block" />
            <span
              class="bg-gradient-to-r from-client to-worker bg-clip-text text-transparent"
              >بسهولة وبسرعة !</span
            >
          </h1> -->

                <!-- <p class="text-lg md:text-xl text-gray-700 mb-10 ">
            ابحث عن عمال موثوق بهم لنقل الأغراض الخاصة بك، أو اكسب المال عن طريق
            نقلها!
          </p> -->

                <div class="flex flex-col sm:flex-row justify-center gap-4 sm:gap-6">
                    <a href="request.html"
                        class="cursor-pointer bg-client hover:bg-client-dark text-white font-medium px-8 py-3 text-lg rounded-lg transition-transform hover:scale-105 shadow-lg text-center">
                        أنا عميل
                    </a>
                    <span data-target="workerTab"
                        class="tabBtn cursor-pointer bg-worker hover:bg-worker-dark text-white font-medium px-8 py-3 text-lg rounded-lg transition-transform hover:scale-105 shadow-lg text-center">
                        أنا عامل
                    </span>
                </div>

                <div class="mt-8">
                    <div id="workerTab" class="tabContent hidden">
                        <p class="text-lg text-gray-700">
                            انضم إلى شبكة من العمال الموثوقين وابدأ في كسب المال من خلال
                            تقديم خدمات النقل.
                        </p>
                    </div>
                </div>

            </div>
        </div>
    </section>

    <!-- Offers -->
    <section class="pb-4 pt-8 bg-[#f1f1f1]">
        <div class="container">
            <h2 class="text-3xl md:text-4xl font-bold text-center lg:text-start mb-4 text-client-dark">
                أجدد العروض
            </h2>
            <div class="swiper swiper-container !py-4 dynamicSwiper" data-loop="true" data-direction="horizontal"
                data-effect="slide" data-grab-cursor="true" data-space-between="20" data-slides-per-view-default="1.5"
                data-autoplay='{"delay": 3000}'
                data-breakpoints='{"640": {"slidesPerView": 1.5}, "768": {"slidesPerView": 2}, "1024": {"slidesPerView": 3}, "1200": {"slidesPerView": 4}}'>
                <div class="swiper-wrapper">
                    <div class="swiper-slide group">
                        <a href="#">
                            <img src="https://media.istockphoto.com/id/598820096/vector/twenty-percents-sale.jpg?s=612x612&w=0&k=20&c=nGIUSXRYbzRyL7T8r5Rexyemmu8-jIlflQ4RI3wIKEw="
                                class="w-full group-hover:scale-125 transition duration-500" alt="sss" />
                        </a>
                    </div>
                    <div class="swiper-slide group">
                        <a href="#">
                            <img src="https://media.istockphoto.com/id/598820096/vector/twenty-percents-sale.jpg?s=612x612&w=0&k=20&c=nGIUSXRYbzRyL7T8r5Rexyemmu8-jIlflQ4RI3wIKEw="
                                class="w-full group-hover:scale-125 transition duration-500" alt="sss" />
                        </a>
                    </div>
                    <div class="swiper-slide group">
                        <a href="#">
                            <img src="https://media.istockphoto.com/id/598820096/vector/twenty-percents-sale.jpg?s=612x612&w=0&k=20&c=nGIUSXRYbzRyL7T8r5Rexyemmu8-jIlflQ4RI3wIKEw="
                                class="w-full group-hover:scale-125 transition duration-500" alt="sss" />
                        </a>
                    </div>
                    <div class="swiper-slide group">
                        <a href="#">
                            <img src="https://media.istockphoto.com/id/598820096/vector/twenty-percents-sale.jpg?s=612x612&w=0&k=20&c=nGIUSXRYbzRyL7T8r5Rexyemmu8-jIlflQ4RI3wIKEw="
                                class="w-full group-hover:scale-125 transition duration-500" alt="sss" />
                        </a>
                    </div>
                    <div class="swiper-slide group">
                        <a href="#">
                            <img src="https://media.istockphoto.com/id/598820096/vector/twenty-percents-sale.jpg?s=612x612&w=0&k=20&c=nGIUSXRYbzRyL7T8r5Rexyemmu8-jIlflQ4RI3wIKEw="
                                class="w-full group-hover:scale-125 transition duration-500" alt="sss" />
                        </a>
                    </div>
                    <div class="swiper-slide group">
                        <a href="#">
                            <img src="https://media.istockphoto.com/id/598820096/vector/twenty-percents-sale.jpg?s=612x612&w=0&k=20&c=nGIUSXRYbzRyL7T8r5Rexyemmu8-jIlflQ4RI3wIKEw="
                                class="w-full group-hover:scale-125 transition duration-500" alt="sss" />
                        </a>
                    </div>
                    <div class="swiper-slide group">
                        <a href="#">
                            <img src="https://media.istockphoto.com/id/598820096/vector/twenty-percents-sale.jpg?s=612x612&w=0&k=20&c=nGIUSXRYbzRyL7T8r5Rexyemmu8-jIlflQ4RI3wIKEw="
                                class="w-full group-hover:scale-125 transition duration-500" alt="sss" />
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- About Us -->
    <section class="bg-white py-16 px-4 sm:px-6 lg:px-8">
        <div class="container">
            <div class="grid md:grid-cols-2 gap-10 items-center">

                <!-- Image -->
                <div class="relative">
                    <img src="./src/assets/images/about.jpg" alt="نقل الأثاث"
                        class="rounded-xl shadow-lg w-full object-cover max-h-[80vh]">
                </div>

                <!-- Content -->
                <div>
                    <h2 class="text-3xl md:text-4xl font-bold text-gray-900 mb-4">من نحن ؟</h2>
                    <p class="text-gray-600 text-lg mb-6">
                        في <span class="font-semibold text-client-dark">ثرى إم للخدمات </span>، نحن متخصصون في نقل
                        الأثاث والممتلكات المنزلية الحساسة بكل عناية واحترافية. بفضل خبرتنا الطويلة وفريقنا المؤهل
                        والمعدات الحديثة، نضمن وصول أغراضك بأمان وفي الوقت المحدد.
                    </p>
                    <ul class="flex flex-col gap-3">
                        <li class="flex items-start">
                            <svg class="w-6 h-6 text-client me-1.5" fill="none" stroke="currentColor"
                                stroke-width="2" viewBox="0 0 24 24">
                                <path d="M5 13l4 4L19 7" />
                            </svg>
                            <span class="text-gray-600">فريق نقل ذو خبرة وتدريب عالي</span>
                        </li>
                        <li class="flex items-start">
                            <svg class="w-6 h-6 text-client me-1.5" fill="none" stroke="currentColor"
                                stroke-width="2" viewBox="0 0 24 24">
                                <path d="M5 13l4 4L19 7" />
                            </svg>
                            <span class="text-gray-600">نقل مؤمن بالكامل وآمن</span>
                        </li>
                        <li class="flex items-start">
                            <svg class="w-6 h-6 text-client me-1.5" fill="none" stroke="currentColor"
                                stroke-width="2" viewBox="0 0 24 24">
                                <path d="M5 13l4 4L19 7" />
                            </svg>
                            <span class="text-gray-600">ضمان التوصيل في الموعد المحدد</span>
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
                    انقل أغراضك في <span class="text-client">3 خطوات</span>
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
                            التسجيل
                        </h3>
                        <p class="text-gray-600 ">
                            أنشئ حسابك في بضع خطوات بسيطة لتبدأ باستخدام خدماتنا.
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
                            أنشئ طلب
                        </h3>
                        <p class="text-gray-600 ">
                            صف ما تريد نقله، متى وأين. حدد ميزانيتك.
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
                            استلم أغراضك
                        </h3>
                        <p class="text-gray-600 ">
                            تتبع أغراضك واستلمها في الموقع المحدد. قيّم الخدمة.
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
                    اربح المال في <span class="text-worker">3 خطوات</span>
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
                            التسجيل
                        </h3>
                        <p class="text-gray-600 ">
                            سجّل كعامل، وقم بتوثيق هويتك وحدد مواعيد توفرّك للعمل.
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
                            استلام الطلبات
                        </h3>
                        <p class="text-gray-600 ">
                            تصلك إشعارات بالطلبات القريبة التي تناسب مهاراتك.
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
                            احصل على المال
                        </h3>
                        <p class="text-gray-600 ">
                            أتمم عمليات التوصيل واحصل على أرباحك بأمان عبر منصتنا.
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
                    ميزات للجميع
                </h2>
                <div class="w-20 h-1 bg-gradient-to-r from-client to-worker mx-auto mt-4"></div>
            </div>

            <div class="grid grid-cols-1 lg:grid-cols-2 gap-10">
                <!-- فوائد العملاء -->
                <div class="bg-white p-8 rounded-lg shadow-md">
                    <h3 class="text-2xl font-bold mb-6 text-center text-client ">
                        للعملاء
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
                                    خدمة سريعة
                                </h4>
                                <p class="text-gray-600 ">
                                    استلم أغراضك بسرعة من خلال شبكة موثوقة من الناقلين.
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
                                    عمال موثوقون
                                </h4>
                                <p class="text-gray-600 ">
                                    جميع العمال موثقون ويتم تقييمهم لضمان جودة الخدمة.
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
                                    عملية طلب سهلة
                                </h4>
                                <p class="text-gray-600 ">
                                    قدّم طلبك للنقل بسهولة خلال بضع نقرات فقط — دون تعقيد.
                                </p>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- فوائد العاملين -->
                <div class="bg-white p-8 rounded-lg shadow-md">
                    <h3 class="text-2xl font-bold mb-6 text-center text-worker ">
                        للعاملين
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
                                    عمل مرن
                                </h4>
                                <p class="text-gray-600 ">
                                    اختر وقت ومكان عملك بما يناسب جدولك اليومي.
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
                                    مدفوعات مضمونة
                                </h4>
                                <p class="text-gray-600 ">
                                    تحصل على مستحقاتك فوراً بعد إتمام التوصيلات — بدون استثناء.
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
                                    إعداد سهل
                                </h4>
                                <p class="text-gray-600 ">
                                    ابدأ العمل بسرعة من خلال عملية تسجيل مبسطة.
                                </p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- <footer class="bg-[#1A1F2C] text-white"> -->
    <!-- Footer -->
    <footer class="bg-gray-800 text-white pt-12 pb-8">
        <div class="container">
            <div class="grid grid-cols-1 md:grid-cols-3 gap-8">
                <div>
                    <div class="flex items-center mb-4">
                        <img class="max-w-[150px] whiteImgFilter" src="./src/assets/images/pur.svg" alt="Logo" />
                    </div>
                    <p class="text-gray-400 mb-4">
                        جعل النقل بسيطًا وموثوقًا به وسهل الوصول إليه للجميع.
                    </p>
                    <div class="flex gap-4">
                        <a href="https://www.facebook.com/3MServices/"
                            class="text-gray-400 hover:text-white transition">
                            <svg class="h-6 w-6" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24"
                                fill="currentColor">
                                <path
                                    d="M14 13.5H16.5L17.5 9.5H14V7.5C14 6.47062 14 5.5 16 5.5H17.5V2.1401C17.1743 2.09685 15.943 2 14.6429 2C11.9284 2 10 3.65686 10 6.69971V9.5H7V13.5H10V22H14V13.5Z">
                                </path>
                            </svg>
                        </a>
                        <a href="https://www.tiktok.com/@3mservice" class="text-gray-400 hover:text-white transition">
                            <svg class="h-6 w-6" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24"
                                fill="currentColor">
                                <path
                                    d="M16 8.24537V15.5C16 19.0899 13.0899 22 9.5 22C5.91015 22 3 19.0899 3 15.5C3 11.9101 5.91015 9 9.5 9C10.0163 9 10.5185 9.06019 11 9.17393V12.3368C10.5454 12.1208 10.0368 12 9.5 12C7.567 12 6 13.567 6 15.5C6 17.433 7.567 19 9.5 19C11.433 19 13 17.433 13 15.5V2H16C16 4.76142 18.2386 7 21 7V10C19.1081 10 17.3696 9.34328 16 8.24537Z">
                                </path>
                            </svg>
                        </a>
                        <a href="https://x.com/3MService" class="text-gray-400 hover:text-white transition">
                            <svg class="h-6 w-6" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24"
                                fill="currentColor">
                                <path
                                    d="M17.6874 3.0625L12.6907 8.77425L8.37045 3.0625H2.11328L9.58961 12.8387L2.50378 20.9375H5.53795L11.0068 14.6886L15.7863 20.9375H21.8885L14.095 10.6342L20.7198 3.0625H17.6874ZM16.6232 19.1225L5.65436 4.78217H7.45745L18.3034 19.1225H16.6232Z">
                                </path>
                            </svg>
                        </a>
                        <a href="https://www.instagram.com/3mservice.de"
                            class="text-gray-400 hover:text-white transition">
                            <svg class="h-6 w-6" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24"
                                fill="currentColor">
                                <path
                                    d="M13.0281 2.00073C14.1535 2.00259 14.7238 2.00855 15.2166 2.02322L15.4107 2.02956C15.6349 2.03753 15.8561 2.04753 16.1228 2.06003C17.1869 2.1092 17.9128 2.27753 18.5503 2.52503C19.2094 2.7792 19.7661 3.12253 20.3219 3.67837C20.8769 4.2342 21.2203 4.79253 21.4753 5.45003C21.7219 6.0867 21.8903 6.81337 21.9403 7.87753C21.9522 8.1442 21.9618 8.3654 21.9697 8.58964L21.976 8.78373C21.9906 9.27647 21.9973 9.84686 21.9994 10.9723L22.0002 11.7179C22.0003 11.809 22.0003 11.903 22.0003 12L22.0002 12.2821L21.9996 13.0278C21.9977 14.1532 21.9918 14.7236 21.9771 15.2163L21.9707 15.4104C21.9628 15.6347 21.9528 15.8559 21.9403 16.1225C21.8911 17.1867 21.7219 17.9125 21.4753 18.55C21.2211 19.2092 20.8769 19.7659 20.3219 20.3217C19.7661 20.8767 19.2069 21.22 18.5503 21.475C17.9128 21.7217 17.1869 21.89 16.1228 21.94C15.8561 21.9519 15.6349 21.9616 15.4107 21.9694L15.2166 21.9757C14.7238 21.9904 14.1535 21.997 13.0281 21.9992L12.2824 22C12.1913 22 12.0973 22 12.0003 22L11.7182 22L10.9725 21.9993C9.8471 21.9975 9.27672 21.9915 8.78397 21.9768L8.58989 21.9705C8.36564 21.9625 8.14444 21.9525 7.87778 21.94C6.81361 21.8909 6.08861 21.7217 5.45028 21.475C4.79194 21.2209 4.23444 20.8767 3.67861 20.3217C3.12278 19.7659 2.78028 19.2067 2.52528 18.55C2.27778 17.9125 2.11028 17.1867 2.06028 16.1225C2.0484 15.8559 2.03871 15.6347 2.03086 15.4104L2.02457 15.2163C2.00994 14.7236 2.00327 14.1532 2.00111 13.0278L2.00098 10.9723C2.00284 9.84686 2.00879 9.27647 2.02346 8.78373L2.02981 8.58964C2.03778 8.3654 2.04778 8.1442 2.06028 7.87753C2.10944 6.81253 2.27778 6.08753 2.52528 5.45003C2.77944 4.7917 3.12278 4.2342 3.67861 3.67837C4.23444 3.12253 4.79278 2.78003 5.45028 2.52503C6.08778 2.27753 6.81278 2.11003 7.87778 2.06003C8.14444 2.04816 8.36564 2.03847 8.58989 2.03062L8.78397 2.02433C9.27672 2.00969 9.8471 2.00302 10.9725 2.00086L13.0281 2.00073ZM12.0003 7.00003C9.23738 7.00003 7.00028 9.23956 7.00028 12C7.00028 14.7629 9.23981 17 12.0003 17C14.7632 17 17.0003 14.7605 17.0003 12C17.0003 9.23713 14.7607 7.00003 12.0003 7.00003ZM12.0003 9.00003C13.6572 9.00003 15.0003 10.3427 15.0003 12C15.0003 13.6569 13.6576 15 12.0003 15C10.3434 15 9.00028 13.6574 9.00028 12C9.00028 10.3431 10.3429 9.00003 12.0003 9.00003ZM17.2503 5.50003C16.561 5.50003 16.0003 6.05994 16.0003 6.74918C16.0003 7.43843 16.5602 7.9992 17.2503 7.9992C17.9395 7.9992 18.5003 7.4393 18.5003 6.74918C18.5003 6.05994 17.9386 5.49917 17.2503 5.50003Z">
                                </path>
                            </svg>
                        </a>
                    </div>
                </div>
                <div>
                    <h3 class="text-lg font-semibold mb-4">روابط سريعة</h3>
                    <ul class="flex flex-col gap-2">
                        <li>
                            <a href="index.html" class="footer-link active-footer-link">الرئيسية</a>
                        </li>
                        <li><a href="login.html" class="footer-link">تسجيل دخول</a></li>
                        <li>
                            <a href="register.html" class="footer-link">تسجيل حساب</a>
                        </li>
                    </ul>
                </div>
                <div>
                    <h3 class="text-lg font-semibold mb-4">تواصل معنا</h3>
                    <ul class="flex flex-col gap-2">
                        <li>
                            <a class="flex items-start group" href="tel:+4915660233302">
                                <svg xmlns="http://www.w3.org/2000/svg"
                                    class="h-5 w-5 text-gray-400 transition group-hover:text-white me-2 mt-1"
                                    fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M3 5a2 2 0 012-2h3.28a1 1 0 01.948.684l1.498 4.493a1 1 0 01-.502 1.21l-2.257 1.13a11.042 11.042 0 005.516 5.516l1.13-2.257a1 1 0 011.21-.502l4.493 1.498a1 1 0 01.684.949V19a2 2 0 01-2 2h-1C9.716 21 3 14.284 3 6V5z" />
                                </svg>
                                <span class="text-gray-400 transition group-hover:text-white">4915660233302</span>
                            </a>
                        </li>
                        <li>
                            <a class="flex items-start group" href="mailto:contact@3mserv.com">
                                <svg xmlns="http://www.w3.org/2000/svg"
                                    class="h-5 w-5 text-gray-400 transition group-hover:text-white me-2 mt-1"
                                    fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z" />
                                </svg>
                                <span class="text-gray-400 transition group-hover:text-white">contact@3mserv.com</span>
                            </a>
                        </li>
                        <li class="flex items-start">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 text-gray-400 me-2 mt-1"
                                fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z" />
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M15 11a3 3 0 11-6 0 3 3 0 016 0z" />
                            </svg>
                            <span class="text-gray-400">Laaker Straße 67, 47137 Duisburg</span>
                        </li>
                    </ul>
                </div>
            </div>
            <div class="border-t border-gray-700 mt-8 pt-8 text-center text-gray-400">
                <p>&copy; جميع الحقوق محفوظة. 3 إم للخدمات</p>
            </div>
        </div>
    </footer>

    <div class="mobMenu p-4 w-screen h-screen bg-white fixed inset-0 z-50 transition-all duration-300 mobMenuHidden">
        <!-- Close Button -->
        <div class="flex justify-end mb-4">
            <span class="closeMobMenu cursor-pointer transition-all duration-300 hover:opacity-60">
                <svg xmlns="http://www.w3.org/2000/svg" width="25" height="25"
                    class="bi bi-x-lg fill-client-dark" viewBox="0 0 16 16">
                    <path
                        d="M2.146 2.854a.5.5 0 1 1 .708-.708L8 7.293l5.146-5.147a.5.5 0 0 1 .708.708L8.707 8l5.147 5.146a.5.5 0 0 1-.708.708L7.293 8z" />
                </svg>
            </span>
        </div>

        <!-- Menu Content -->
        <div class="max-h-[80vh] overflow-auto">
            <div>
                <!-- Home -->
                <a class="block nav_link text-base mb-2 active" href="index.html">
                    الرئيسية
                </a>

                <!-- Login -->
                <a class="block nav_link text-base mb-2" href="login.html">
                    تسجيل دخول
                </a>

                <!-- About -->
                <a class="block nav_link text-base mb-2" href="register.html">
                    تسجيل حساب
                </a>
            </div>
        </div>
    </div>
    <!-- <script type="module" src="{{ asset('assets/js/main.js') }}"></script> -->
    @vite(['resources/js/main.js'])
</body>

</html>
