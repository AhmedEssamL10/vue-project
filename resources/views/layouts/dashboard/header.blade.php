
<header class="w-full bg-white shadow-sm py-4 {{ Request::is('/') ? 'fixed top-0 left-0 right-0' : '' }} z-20">
        <div class="container flex justify-between items-center">
            <div class="flex items-center">
                <a href="/">
                    <img class="w-[150px]" src="https://3m-services-v4.netlify.app/assets/Pur-CWmmJo9F.svg" alt="Logo" />
                </a>
            </div>

            <!-- Desktop Navigation -->
            <nav class="hidden md:flex items-center gap-8">
                <a href="/" class="nav-link active">الرئيسية</a>
                <a href="/login" class="nav-link">تسجيل دخول</a>
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