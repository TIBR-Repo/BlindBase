<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <!-- SEO Meta Tags -->
    <title>{{ $title ?? 'BlindPoint Supply - Compliant Blinds for Schools, Care Homes & Commercial Spaces' }}</title>
    <meta name="description" content="{{ $description ?? 'Fire-rated, antimicrobial, and child-safe blinds for schools, care homes, and commercial environments. Trade accounts available.' }}">
    <meta name="keywords" content="fire rated blinds, antimicrobial blinds, child safe blinds, school blinds, care home blinds, commercial blinds, roller blinds UK">
    <meta name="author" content="BlindPoint Supply">
    <meta name="robots" content="index, follow">
    <link rel="canonical" href="{{ url()->current() }}">

    <!-- Open Graph / Facebook -->
    <meta property="og:type" content="website">
    <meta property="og:url" content="{{ url()->current() }}">
    <meta property="og:title" content="{{ $title ?? 'BlindPoint Supply - Compliant Blinds for Schools, Care Homes & Commercial Spaces' }}">
    <meta property="og:description" content="{{ $description ?? 'Fire-rated, antimicrobial, and child-safe blinds for schools, care homes, and commercial environments. Trade accounts available.' }}">
    <meta property="og:image" content="{{ asset('images/og-image.jpg') }}">
    <meta property="og:site_name" content="BlindPoint Supply">
    <meta property="og:locale" content="en_GB">

    <!-- Twitter -->
    <meta name="twitter:card" content="summary_large_image">
    <meta name="twitter:url" content="{{ url()->current() }}">
    <meta name="twitter:title" content="{{ $title ?? 'BlindPoint Supply - Compliant Blinds' }}">
    <meta name="twitter:description" content="{{ $description ?? 'Fire-rated, antimicrobial, and child-safe blinds for schools, care homes, and commercial environments.' }}">
    <meta name="twitter:image" content="{{ asset('images/og-image.jpg') }}">

    <!-- Favicon -->
    <link rel="icon" type="image/x-icon" href="{{ asset('favicon.ico') }}">

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=plus-jakarta-sans:400,500,600,700,800" rel="stylesheet" />

    <!-- Alpine.js -->
    <script defer src="https://cdn.jsdelivr.net/npm/alpinejs@3.x.x/dist/cdn.min.js"></script>

    <!-- Scripts -->
    @vite(['resources/css/app.css', 'resources/js/app.js'])

    @stack('head')
</head>
<body class="font-sans antialiased bg-slate-50 text-secondary-900">
    <!-- Flash Messages -->
    <x-flash-messages />
    <!-- Top Bar -->
    <div class="bg-secondary-900 text-white text-sm">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="flex items-center justify-between h-10">
                <p class="hidden sm:block">
                    <svg class="inline-block w-4 h-4 mr-1 -mt-0.5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 8h14M5 8a2 2 0 110-4h14a2 2 0 110 4M5 8v10a2 2 0 002 2h10a2 2 0 002-2V8m-9 4h4"/>
                    </svg>
                    <span class="text-primary-400 font-semibold">Free delivery</span> on orders over £150
                </p>
                <div class="flex items-center gap-6 ml-auto">
                    <a href="{{ route('trade.login') }}" class="flex items-center gap-1.5 hover:text-primary-400 transition-colors">
                        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 21V5a2 2 0 00-2-2H7a2 2 0 00-2 2v16m14 0h2m-2 0h-5m-9 0H3m2 0h5M9 7h1m-1 4h1m4-4h1m-1 4h1m-5 10v-5a1 1 0 011-1h2a1 1 0 011 1v5m-4 0h4"/>
                        </svg>
                        Trade Account
                    </a>
                </div>
            </div>
        </div>
    </div>

    <!-- Main Header -->
    <header class="bg-white border-b border-slate-200 sticky top-0 z-50">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="flex items-center justify-between h-16 lg:h-20">
                <!-- Logo -->
                <a href="{{ route('home') }}" class="flex items-center flex-shrink-0">
                    <span class="text-2xl lg:text-3xl font-extrabold tracking-tight">
                        <span class="text-secondary-900">BLIND</span><span class="text-primary-600">POINT</span>
                    </span>
                </a>

                <!-- Desktop Navigation -->
                <nav class="hidden lg:flex items-center gap-8">
                    <a href="{{ route('shop.index') }}" class="text-secondary-700 hover:text-primary-600 font-medium transition-colors">
                        Shop
                    </a>
                    <a href="{{ route('shop.category', 'roller-blinds') }}" class="text-secondary-700 hover:text-primary-600 font-medium transition-colors">
                        Roller Blinds
                    </a>
                    <a href="{{ route('shop.category', 'components') }}" class="text-secondary-700 hover:text-primary-600 font-medium transition-colors">
                        Components
                    </a>
                    <a href="{{ route('compliance') }}" class="text-secondary-700 hover:text-primary-600 font-medium transition-colors">
                        Compliance
                    </a>
                    <a href="{{ route('contact') }}" class="text-secondary-700 hover:text-primary-600 font-medium transition-colors">
                        Contact
                    </a>
                </nav>

                <!-- Right Actions -->
                <div class="flex items-center gap-4">
                    <!-- Trade Login Button -->
                    <a href="{{ route('trade.login') }}" class="hidden sm:inline-flex items-center gap-2 px-4 py-2 bg-secondary-900 text-white text-sm font-semibold rounded-lg hover:bg-secondary-800 transition-colors">
                        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z"/>
                        </svg>
                        Trade Login
                    </a>

                    <!-- Cart -->
                    <a href="{{ route('cart.index') }}" class="relative p-2 text-secondary-700 hover:text-primary-600 transition-colors">
                        <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 3h2l.4 2M7 13h10l4-8H5.4M7 13L5.4 5M7 13l-2.293 2.293c-.63.63-.184 1.707.707 1.707H17m0 0a2 2 0 100 4 2 2 0 000-4zm-8 2a2 2 0 11-4 0 2 2 0 014 0z"/>
                        </svg>
                        @if(($cartCount ?? 0) > 0)
                            <span class="absolute -top-1 -right-1 w-5 h-5 bg-primary-600 text-white text-xs font-bold rounded-full flex items-center justify-center">
                                {{ $cartCount }}
                            </span>
                        @endif
                    </a>

                    <!-- Mobile Menu Button -->
                    <button type="button" id="mobile-menu-button" class="lg:hidden p-2 text-secondary-700 hover:text-primary-600 transition-colors">
                        <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16"/>
                        </svg>
                    </button>
                </div>
            </div>
        </div>

        <!-- Mobile Navigation -->
        <div id="mobile-menu" class="hidden lg:hidden border-t border-slate-200 bg-white">
            <div class="px-4 py-4 space-y-3">
                <a href="{{ route('shop.index') }}" class="block px-3 py-2 text-secondary-700 hover:bg-slate-50 rounded-lg font-medium">Shop</a>
                <a href="{{ route('shop.category', 'roller-blinds') }}" class="block px-3 py-2 text-secondary-700 hover:bg-slate-50 rounded-lg font-medium">Roller Blinds</a>
                <a href="{{ route('shop.category', 'components') }}" class="block px-3 py-2 text-secondary-700 hover:bg-slate-50 rounded-lg font-medium">Components</a>
                <a href="{{ route('compliance') }}" class="block px-3 py-2 text-secondary-700 hover:bg-slate-50 rounded-lg font-medium">Compliance</a>
                <a href="{{ route('contact') }}" class="block px-3 py-2 text-secondary-700 hover:bg-slate-50 rounded-lg font-medium">Contact</a>
                <div class="pt-3 border-t border-slate-200">
                    <a href="{{ route('trade.login') }}" class="flex items-center gap-2 px-3 py-2 bg-secondary-900 text-white rounded-lg font-semibold">
                        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z"/>
                        </svg>
                        Trade Login
                    </a>
                </div>
            </div>
        </div>
    </header>

    <!-- Main Content -->
    <main>
        {{ $slot }}
    </main>

    <!-- Footer -->
    <footer class="bg-secondary-900 text-white">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-12 lg:py-16">
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-5 gap-8 lg:gap-12">
                <!-- Logo & Description -->
                <div class="lg:col-span-2">
                    <a href="{{ route('home') }}" class="inline-block mb-4">
                        <span class="text-2xl font-extrabold tracking-tight">
                            <span class="text-white">BLIND</span><span class="text-primary-400">POINT</span>
                        </span>
                    </a>
                    <p class="text-slate-400 text-sm leading-relaxed mb-6 max-w-sm">
                        Supplying compliant, high-quality blinds to schools, care homes, and commercial spaces across the UK. Fire-rated, antimicrobial, and child-safe options available.
                    </p>
                    <div class="flex items-center gap-4">
                        <a href="#" class="w-10 h-10 bg-secondary-800 rounded-lg flex items-center justify-center hover:bg-primary-600 transition-colors">
                            <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 24 24"><path d="M24 4.557c-.883.392-1.832.656-2.828.775 1.017-.609 1.798-1.574 2.165-2.724-.951.564-2.005.974-3.127 1.195-.897-.957-2.178-1.555-3.594-1.555-3.179 0-5.515 2.966-4.797 6.045-4.091-.205-7.719-2.165-10.148-5.144-1.29 2.213-.669 5.108 1.523 6.574-.806-.026-1.566-.247-2.229-.616-.054 2.281 1.581 4.415 3.949 4.89-.693.188-1.452.232-2.224.084.626 1.956 2.444 3.379 4.6 3.419-2.07 1.623-4.678 2.348-7.29 2.04 2.179 1.397 4.768 2.212 7.548 2.212 9.142 0 14.307-7.721 13.995-14.646.962-.695 1.797-1.562 2.457-2.549z"/></svg>
                        </a>
                        <a href="#" class="w-10 h-10 bg-secondary-800 rounded-lg flex items-center justify-center hover:bg-primary-600 transition-colors">
                            <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 24 24"><path d="M19 0h-14c-2.761 0-5 2.239-5 5v14c0 2.761 2.239 5 5 5h14c2.762 0 5-2.239 5-5v-14c0-2.761-2.238-5-5-5zm-11 19h-3v-11h3v11zm-1.5-12.268c-.966 0-1.75-.79-1.75-1.764s.784-1.764 1.75-1.764 1.75.79 1.75 1.764-.783 1.764-1.75 1.764zm13.5 12.268h-3v-5.604c0-3.368-4-3.113-4 0v5.604h-3v-11h3v1.765c1.396-2.586 7-2.777 7 2.476v6.759z"/></svg>
                        </a>
                    </div>
                </div>

                <!-- Shop Links -->
                <div>
                    <h4 class="text-sm font-semibold uppercase tracking-wider mb-4">Shop</h4>
                    <ul class="space-y-3">
                        <li><a href="{{ route('shop.category', 'roller-blinds') }}" class="text-slate-400 hover:text-white text-sm transition-colors">Roller Blinds</a></li>
                        <li><a href="{{ route('shop.category', 'components') }}" class="text-slate-400 hover:text-white text-sm transition-colors">Components</a></li>
                        <li><a href="{{ route('shop.category', 'window-films') }}" class="text-slate-400 hover:text-white text-sm transition-colors">Window Films</a></li>
                        <li><a href="{{ route('shop.category', 'maintenance-kits') }}" class="text-slate-400 hover:text-white text-sm transition-colors">Maintenance Kits</a></li>
                    </ul>
                </div>

                <!-- Information Links -->
                <div>
                    <h4 class="text-sm font-semibold uppercase tracking-wider mb-4">Information</h4>
                    <ul class="space-y-3">
                        <li><a href="{{ route('compliance') }}" class="text-slate-400 hover:text-white text-sm transition-colors">Compliance</a></li>
                        <li><a href="{{ route('trade.register') }}" class="text-slate-400 hover:text-white text-sm transition-colors">Trade Accounts</a></li>
                        <li><a href="#" class="text-slate-400 hover:text-white text-sm transition-colors">Delivery Info</a></li>
                        <li><a href="#" class="text-slate-400 hover:text-white text-sm transition-colors">Returns Policy</a></li>
                        <li><a href="#" class="text-slate-400 hover:text-white text-sm transition-colors">Privacy Policy</a></li>
                    </ul>
                </div>

                <!-- Contact -->
                <div>
                    <h4 class="text-sm font-semibold uppercase tracking-wider mb-4">Contact</h4>
                    <ul class="space-y-3 text-sm text-slate-400">
                        <li class="flex items-start gap-2">
                            <svg class="w-5 h-5 mt-0.5 flex-shrink-0 text-primary-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z"/>
                            </svg>
                            <span>sales@blindpoint.co.uk</span>
                        </li>
                    </ul>
                </div>
            </div>

            <!-- Bottom Bar -->
            <div class="mt-12 pt-8 border-t border-secondary-800 flex flex-col md:flex-row items-center justify-between gap-4">
                <p class="text-slate-500 text-sm">
                    © {{ date('Y') }} BlindPoint Supply. All rights reserved.
                </p>
                <div class="flex items-center gap-6">
                    <img src="https://upload.wikimedia.org/wikipedia/commons/thumb/5/5e/Visa_Inc._logo.svg/100px-Visa_Inc._logo.svg.png" alt="Visa" class="h-6 opacity-60">
                    <img src="https://upload.wikimedia.org/wikipedia/commons/thumb/a/a4/Mastercard_2019_logo.svg/100px-Mastercard_2019_logo.svg.png" alt="Mastercard" class="h-6 opacity-60">
                    <img src="https://upload.wikimedia.org/wikipedia/commons/thumb/b/b5/PayPal.svg/100px-PayPal.svg.png" alt="PayPal" class="h-6 opacity-60">
                </div>
            </div>
        </div>
    </footer>

    <script>
        // Mobile menu toggle
        document.getElementById('mobile-menu-button').addEventListener('click', function() {
            document.getElementById('mobile-menu').classList.toggle('hidden');
        });
    </script>
</body>
</html>
