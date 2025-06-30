<header class="w-full bg-white shadow-sm py-4 {{ Request::is('/') ? 'fixed top-0 left-0 right-0' : '' }} z-20">
    <div class="container flex justify-between items-center">
        <div class="flex items-center">
            <a href="{{ route('homepage', app()->getLocale()) }}">
                <img class="w-[150px]" src="{{ asset('assets/images/Pur.png') }}" alt="Logo" />
            </a>
        </div>
        @php
            $currentLocale = app()->getLocale();
            $newLocale = $currentLocale === 'de' ? 'ar' : 'de';
            $currentPath = request()->path();
            $segments = request()->segments();
            $segments[0] = $newLocale;
            $switchUrl = url(implode('/', $segments));

            if (request()->getQueryString()) {
                $switchUrl .= '?' . request()->getQueryString();
            }
        @endphp
        <!-- Desktop Navigation -->
        <nav class="hidden md:flex items-center gap-8">
            <a href="{{ route('homepage', app()->getLocale()) }}"
                class="nav-link {{ Route::currentRouteName() === 'homepage' ? 'active' : '' }}">
                {{ __('home') }}
            </a>

            @if (!Auth::check())
                <a href="{{ route('auth.login', app()->getLocale()) }}"
                    class="nav-link {{ Route::currentRouteName() === 'auth.login' ? 'active' : '' }}">
                    {{ __('Login') }}
                </a>

                <a href="{{ route('auth.register', app()->getLocale()) }}"
                    class="nav-link {{ Route::currentRouteName() === 'auth.register' ? 'active' : '' }}">
                    {{ __('Register') }}
                </a>
            @else
                <div class="dropdown dropdown-hover dropdown-bottom dropdown-end">
                    <span tabindex="0" role="button" class="nav-link"> {{ __('Profile') }}</span>
                    <ul tabindex="0" class="dropdown-content menu bg-base-100 rounded-box z-[1] w-52 p-2 shadow">
                        <li>
                            <a href="{{ route('profile.edit', app()->getLocale()) }}">
                                {{ __('My Profile Page') }}
                            </a>
                        </li>
                        <li data-logout-url="{{ route('logout') }}" class="handleLogout">
                            <span>{{ __('Logout') }} </span>
                        </li>
                    </ul>
                </div>
            @endif

            <a class="flex items-center gap-[2px] transition-all duration-500 hover:opacity-80"
                href="{{ $switchUrl }}">
                @if (app()->getLocale() === 'de')
                    <img width="25px" src="{{ asset('assets/images/arabic.png') }}" alt="">
                @else
                    <img width="25px"
                        src="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAACgAAAAYAAgMAAADHmvk/AAAABGdBTUEAALGPC/xhBQAAACBjSFJNAAB6JgAAgIQAAPoAAACA6AAAdTAAAOpgAAA6mAAAF3CculE8AAAADFBMVEUAAADdAAD/zgD///9i/kqcAAAAAWJLR0QDEQxM8gAAAAd0SU1FB+gGDQYNMNwTLGEAAAhfSURBVHja7dIxEQAACMQwTGISlewY4IdEQq9VAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAR8MjA2JADAgGxIBgQAwIBsSAYEAMCAbEgGBADAgGxIBgQAwIBsSAYEAMCAbEgGBADAgGxIBgQAwIBsSAGBAMiAHBgBgQDIgBwYAYEAyIAcGAGBAMiAHBgBgQDIgBwYAYEAyIAcGAGBAMiAHBgBgQDIgBwYAYEAOCATEgGBADggExIBgQA4IBMSAYEAOCATEgGBADggExIBgQA4IBMSAYEAOCATEgGBADggExIAaUAANiQDAgBgQDYkAwIAYEA2JAMCAGBANiQDAgBgQDYkAwIAYEA2JAMCAGBANiQDAgBgQDYkAwIAbEgGBADAgGxIBgQAwIBsSAYEAMCAbEgGBADAgGxIBgQAwIBsSAYEAMCAbEgGBADAgGxIBgQAwIBsSAGBAMiAHBgBgQDIgBwYAYEAyIAcGAGBAMiAHBgBgQDIgBwYAYEAyIAcGAGBAMiAHBgBgQDIgBMSAYEAOCATEgGBADggExIBgQA4IBMSAYEAOCATEgGBADggExIBgQA4IBMSAYEAOCATEgGBADggExIAYEA2JAMCAGBANiQDAgBgQDYkAwIAYEA2JAMCAGBANiQDAgBgQDYkAwIAYEA2JAMCAGBANiQDAgBsSAYEAMCAbEgGBADAgGxIBgQAwIBsSAYEAMCAbEgGBADAgGxIBgQAwIBsSAYEAMCAbEgGBADIgBwYAYEAyIAcGAGBAMiAHBgBgQDIgBwYAYEAyIAcGAGBAMiAHBgBgQDIgBwYAYEAyIAcGAGBAMiAExIBgQA4IBMSAYEAOCATEgGBADggExIBgQA4IBMSAYEAOCATEgGBADggExIBgQA4IBMSAYEANiQAkwIAYEA2JAMCAGBANiQDAgBgQDYkAwIAYEA2JAMCAGBANiQDAgBgQDYkAwIAYEA2JAMCAGBANiQAwIBsSAYEAMCAbEgGBADAgGxIBgQAwIBsSAYEAMCAbEgGBADAgGxIBgQAwIBsSAYEAMCAbEgGBADIgBwYAYEAyIAcGAGBAMiAHBgBgQDIgBwYAYEAyIAcGAGBAMiAHBgBgQDIgBwYAYEAyIAcGAGBADggExIBgQA4IBMSAYEAOCATEgGBADggExIBgQA4IBMSAYEAOCATEgGBADggExIBgQA4IBMSAYEANiQDAgBgQDYkAwIAYEA2JAMCAGBANiQDAgBgQDYkAwIAYEA2JAMCAGBANiQDAgmQMOPDIgBsSAYEAMCAbEgGBADAgGxIBgQAwIBsSAYEAMCAbEgGBADAgGxIBgQAwIBsSAYEAMCAbEgGBADIgBwYAYEAyIAcGAGBAMiAHBgBgQDIgBwYAYEAyIAcGAGBAMiAHBgBgQDIgBwYAYEAyIAcGAGBAMiAExIBgQA4IBMSAYEAOCATEgGBADggExIBgQA4IBMSAYEAOCATEgGBADggExIBgQA4IBMSAYEANiQAkwIAYEA2JAMCAGBANiQDAgBgQDYkAwIAYEA2JAMCAGBANiQDAgBgQDYkAwIAYEA2JAMCAGBANiQAwIBsSAYEAMCAbEgGBADAgGxIBgQAwIBsSAYEAMCAbEgGBADAgGxIBgQAwIBsSAYEAMCAbEgGBADIgBwYAYEAyIAcGAGBAMiAHBgBgQDIgBwYAYEAyIAcGAGBAMiAHBgBgQDIgBwYAYEAyIAcGAGBADggExIBgQA4IBMSAYEAOCATEgGBADggExIBgQA4IBMSAYEAOCATEgGBADggExIBgQA4IBMSAYEANiQDAgBgQDYkAwIAYEA2JAMCAGBANiQDAgBgQDYkAwIAYEA2JAMCAGBANiQDAgBgQDYkAwIAYEA2JADAgGxIBgQAwIBsSAYEAMCAbEgGBADAgGxIBgQAwIBsSAYEAMCAbEgGBADAgGxIBgQAwIBsSAGBAMiAHBgBgQDIgBwYAYEAyIAcGAGBAMiAHBgBgQDIgBwYAYEAyIAcGAGBAMiAHBgBgQDIgBwYAYEAOCATEgGBADggExIBgQA4IBMSAYEAOCATEgGBADggExIBgQA4IBMSAYEAOCATEgGBADggExIAaUAANiQDAgBgQDYkAwIAYEA2JAMCAGBANiQDAgBgQDYkAwIAYEA2JAMCAGBANiQDAgBgQDYkAwIAbEgGBADAgGxIBgQAwIBsSAYEAMCAbEgGBADAgGxIBgQAwIBsSAYEAMCAbEgGBADAgGxIBgQAwIBsSAGBAMiAHBgBgQDIgBwYAYEAyIAcGAGBAMiAHBgBgQDIgBwYAYEAyIAcGAGBAMiAHBgBgQDIgBMSAYEAOCATEgGBADggExIBgQA4IBMSAYEAOCATEgGBADggExIBgQA4IBMSAYEAOCATEgGBADggExIAYEA2JAMCAGBANiQDAgBgQDYkAwIAYEA2JAMCAGBANiQDAgBgQDYkAwIAYEAxJpAU9rSraQ9DJvAAAAJXRFWHRkYXRlOmNyZWF0ZQAyMDI0LTA2LTEzVDA2OjEzOjQ4KzAwOjAwXnZ60wAAACV0RVh0ZGF0ZTptb2RpZnkAMjAyNC0wNi0xM1QwNjoxMzo0OCswMDowMC8rwm8AAAAASUVORK5CYII="
                        alt="">
                @endif
                <span class="font-semibold text-[#1a2947] uppercase text-xs lg:text-sm">
                    {{ strtoupper($newLocale) }}</span>
            </a>
        </nav>

        <div class="md:hidden flex items-center gap-2">
            <a class="flex items-center gap-[2px] transition-all duration-500 hover:opacity-80"
                href="{{ $switchUrl }}">
                @if (app()->getLocale() === 'de')
                    <img width="25px" src="{{ asset('assets/images/arabic.png') }}" alt="">
                @else
                    <img width="25px"
                        src="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAACgAAAAYAAgMAAADHmvk/AAAABGdBTUEAALGPC/xhBQAAACBjSFJNAAB6JgAAgIQAAPoAAACA6AAAdTAAAOpgAAA6mAAAF3CculE8AAAADFBMVEUAAADdAAD/zgD///9i/kqcAAAAAWJLR0QDEQxM8gAAAAd0SU1FB+gGDQYNMNwTLGEAAAhfSURBVHja7dIxEQAACMQwTGISlewY4IdEQq9VAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAR8MjA2JADAgGxIBgQAwIBsSAYEAMCAbEgGBADAgGxIBgQAwIBsSAYEAMCAbEgGBADAgGxIBgQAwIBsSAGBAMiAHBgBgQDIgBwYAYEAyIAcGAGBAMiAHBgBgQDIgBwYAYEAyIAcGAGBAMiAHBgBgQDIgBwYAYEAOCATEgGBADggExIBgQA4IBMSAYEAOCATEgGBADggExIBgQA4IBMSAYEAOCATEgGBADggExIAaUAANiQDAgBgQDYkAwIAYEA2JAMCAGBANiQDAgBgQDYkAwIAYEA2JAMCAGBANiQDAgBgQDYkAwIAbEgGBADAgGxIBgQAwIBsSAYEAMCAbEgGBADAgGxIBgQAwIBsSAYEAMCAbEgGBADAgGxIBgQAwIBsSAGBAMiAHBgBgQDIgBwYAYEAyIAcGAGBAMiAHBgBgQDIgBwYAYEAyIAcGAGBAMiAHBgBgQDIgBMSAYEAOCATEgGBADggExIBgQA4IBMSAYEAOCATEgGBADggExIBgQA4IBMSAYEAOCATEgGBADggExIAYEA2JAMCAGBANiQDAgBgQDYkAwIAYEA2JAMCAGBANiQDAgBgQDYkAwIAYEA2JAMCAGBANiQDAgBsSAYEAMCAbEgGBADAgGxIBgQAwIBsSAYEAMCAbEgGBADAgGxIBgQAwIBsSAYEAMCAbEgGBADIgBwYAYEAyIAcGAGBAMiAHBgBgQDIgBwYAYEAyIAcGAGBAMiAHBgBgQDIgBwYAYEAyIAcGAGBAMiAExIBgQA4IBMSAYEAOCATEgGBADggExIBgQA4IBMSAYEAOCATEgGBADggExIBgQA4IBMSAYEANiQAkwIAYEA2JAMCAGBANiQDAgBgQDYkAwIAYEA2JAMCAGBANiQDAgBgQDYkAwIAYEA2JAMCAGBANiQAwIBsSAYEAMCAbEgGBADAgGxIBgQAwIBsSAYEAMCAbEgGBADAgGxIBgQAwIBsSAYEAMCAbEgGBADIgBwYAYEAyIAcGAGBAMiAHBgBgQDIgBwYAYEAyIAcGAGBAMiAHBgBgQDIgBwYAYEAyIAcGAGBADggExIBgQA4IBMSAYEAOCATEgGBADggExIBgQA4IBMSAYEAOCATEgGBADggExIBgQA4IBMSAYEANiQDAgBgQDYkAwIAYEA2JAMCAGBANiQDAgBgQDYkAwIAYEA2JAMCAGBANiQDAgmQMOPDIgBsSAYEAMCAbEgGBADAgGxIBgQAwIBsSAYEAMCAbEgGBADAgGxIBgQAwIBsSAYEAMCAbEgGBADIgBwYAYEAyIAcGAGBAMiAHBgBgQDIgBwYAYEAyIAcGAGBAMiAHBgBgQDIgBwYAYEAyIAcGAGBAMiAExIBgQA4IBMSAYEAOCATEgGBADggExIBgQA4IBMSAYEAOCATEgGBADggExIBgQA4IBMSAYEANiQAkwIAYEA2JAMCAGBANiQDAgBgQDYkAwIAYEA2JAMCAGBANiQDAgBgQDYkAwIAYEA2JAMCAGBANiQAwIBsSAYEAMCAbEgGBADAgGxIBgQAwIBsSAYEAMCAbEgGBADAgGxIBgQAwIBsSAYEAMCAbEgGBADIgBwYAYEAyIAcGAGBAMiAHBgBgQDIgBwYAYEAyIAcGAGBAMiAHBgBgQDIgBwYAYEAyIAcGAGBADggExIBgQA4IBMSAYEAOCATEgGBADggExIBgQA4IBMSAYEAOCATEgGBADggExIBgQA4IBMSAYEANiQDAgBgQDYkAwIAYEA2JAMCAGBANiQDAgBgQDYkAwIAYEA2JAMCAGBANiQDAgBgQDYkAwIAYEA2JADAgGxIBgQAwIBsSAYEAMCAbEgGBADAgGxIBgQAwIBsSAYEAMCAbEgGBADAgGxIBgQAwIBsSAGBAMiAHBgBgQDIgBwYAYEAyIAcGAGBAMiAHBgBgQDIgBwYAYEAyIAcGAGBAMiAHBgBgQDIgBwYAYEAOCATEgGBADggExIBgQA4IBMSAYEAOCATEgGBADggExIBgQA4IBMSAYEAOCATEgGBADggExIAaUAANiQDAgBgQDYkAwIAYEA2JAMCAGBANiQDAgBgQDYkAwIAYEA2JAMCAGBANiQDAgBgQDYkAwIAbEgGBADAgGxIBgQAwIBsSAYEAMCAbEgGBADAgGxIBgQAwIBsSAYEAMCAbEgGBADAgGxIBgQAwIBsSAGBAMiAHBgBgQDIgBwYAYEAyIAcGAGBAMiAHBgBgQDIgBwYAYEAyIAcGAGBAMiAHBgBgQDIgBMSAYEAOCATEgGBADggExIBgQA4IBMSAYEAOCATEgGBADggExIBgQA4IBMSAYEAOCATEgGBADggExIAYEA2JAMCAGBANiQDAgBgQDYkAwIAYEA2JAMCAGBANiQDAgBgQDYkAwIAYEAxJpAU9rSraQ9DJvAAAAJXRFWHRkYXRlOmNyZWF0ZQAyMDI0LTA2LTEzVDA2OjEzOjQ4KzAwOjAwXnZ60wAAACV0RVh0ZGF0ZTptb2RpZnkAMjAyNC0wNi0xM1QwNjoxMzo0OCswMDowMC8rwm8AAAAASUVORK5CYII="
                        alt="">
                @endif
                <span class="font-semibold text-[#1a2947] uppercase text-xs lg:text-sm">
                    {{ strtoupper($newLocale) }}</span>
            </a>
            <!-- Mobile Menu Button -->
            <button id="menu-toggle" class="showMobMenu focus:outline-none">
                <svg id="menu-icon" xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 stroke-client-dark" fill="none"
                    viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16" />
                </svg>
            </button>
        </div>
    </div>
</header>

<div class="mobMenu p-4 w-screen h-screen bg-white fixed inset-0 z-50 transition-all duration-300 mobMenuHidden">
    <!-- Close Button -->
    <div class="flex justify-end mb-4">
        <span class="closeMobMenu cursor-pointer transition-all duration-300 hover:opacity-60">
            <svg xmlns="http://www.w3.org/2000/svg" width="25" height="25" class="bi bi-x-lg fill-client-dark"
                viewBox="0 0 16 16">
                <path
                    d="M2.146 2.854a.5.5 0 1 1 .708-.708L8 7.293l5.146-5.147a.5.5 0 0 1 .708.708L8.707 8l5.147 5.146a.5.5 0 0 1-.708.708L7.293 8z" />
            </svg>
        </span>
    </div>

    <!-- Menu Content -->
    <div class="max-h-[80vh] overflow-auto">
        <div>
            <!-- Home -->
            <a class="block nav_link text-base mb-2 active" href="{{ route('homepage', app()->getLocale()) }}">
                {{ __('home') }}
            </a>
            @if (!Auth::check())
                <!-- Login -->
                <a class="block nav_link text-base mb-2" href="{{ route('auth.login', app()->getLocale()) }}">
                    {{ __('Login') }}
                </a>
                <a class="block nav_link text-base mb-2" href="{{ route('auth.register', app()->getLocale()) }}">
                    {{ __('Register') }}
                </a>
            @else
                <a class="block nav_link text-base mb-2" href="{{ route('profile.edit', app()->getLocale()) }}">
                    {{ __('My Profile Page') }}
                </a>
                <a data-logout-url="{{ route('logout') }}" class="handleLogout block nav_link text-base mb-2"
                    href="javascript:;">
                    {{ __('Logout') }}
                </a>
            @endif
        </div>
    </div>
</div>
