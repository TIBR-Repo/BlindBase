<x-layouts.app>
    <!-- Hero Section -->
    <section class="relative bg-secondary-900 overflow-hidden">
        <!-- Background Pattern -->
        <div class="absolute inset-0 opacity-5">
            <svg class="w-full h-full" viewBox="0 0 100 100" preserveAspectRatio="none">
                <defs>
                    <pattern id="grid" width="10" height="10" patternUnits="userSpaceOnUse">
                        <path d="M 10 0 L 0 0 0 10" fill="none" stroke="white" stroke-width="0.5"/>
                    </pattern>
                </defs>
                <rect width="100%" height="100%" fill="url(#grid)"/>
            </svg>
        </div>
        
        <!-- Gradient Overlay -->
        <div class="absolute inset-0 bg-gradient-to-br from-secondary-900 via-secondary-900 to-primary-900/30"></div>
        
        <div class="relative max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-20 lg:py-32">
            <div class="max-w-3xl">
                <h1 class="text-4xl sm:text-5xl lg:text-6xl font-extrabold text-white leading-tight animate-fade-in-up">
                    Compliant Blinds for 
                    <span class="text-primary-400">Schools</span>, 
                    <span class="text-primary-400">Care Homes</span> & 
                    <span class="text-primary-400">Commercial Spaces</span>
                </h1>
                
                <p class="mt-6 text-lg text-slate-300 max-w-2xl animate-fade-in-up delay-100" style="opacity: 0;">
                    Fire-rated, antimicrobial, and child-safe blinds that meet the strictest compliance requirements. Trusted by institutions across the UK.
                </p>
                
                <!-- Feature Badges -->
                <div class="mt-10 grid grid-cols-2 sm:grid-cols-4 gap-4 animate-fade-in-up delay-200" style="opacity: 0;">
                    <div class="flex items-center gap-3 bg-white/10 backdrop-blur-sm rounded-xl px-4 py-3">
                        <div class="w-10 h-10 bg-orange-500/20 rounded-lg flex items-center justify-center flex-shrink-0">
                            <svg class="w-6 h-6 text-orange-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17.657 18.657A8 8 0 016.343 7.343S7 9 9 10c0-2 .5-5 2.986-7C14 5 16.09 5.777 17.656 7.343A7.975 7.975 0 0120 13a7.975 7.975 0 01-2.343 5.657z"/>
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9.879 16.121A3 3 0 1012.015 11L11 14H9c0 .768.293 1.536.879 2.121z"/>
                            </svg>
                        </div>
                        <span class="text-sm font-semibold text-white">Fire Rated</span>
                    </div>
                    
                    <div class="flex items-center gap-3 bg-white/10 backdrop-blur-sm rounded-xl px-4 py-3">
                        <div class="w-10 h-10 bg-green-500/20 rounded-lg flex items-center justify-center flex-shrink-0">
                            <svg class="w-6 h-6 text-green-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m5.618-4.016A11.955 11.955 0 0112 2.944a11.955 11.955 0 01-8.618 3.04A12.02 12.02 0 003 9c0 5.591 3.824 10.29 9 11.622 5.176-1.332 9-6.03 9-11.622 0-1.042-.133-2.052-.382-3.016z"/>
                            </svg>
                        </div>
                        <span class="text-sm font-semibold text-white">Antimicrobial</span>
                    </div>
                    
                    <div class="flex items-center gap-3 bg-white/10 backdrop-blur-sm rounded-xl px-4 py-3">
                        <div class="w-10 h-10 bg-blue-500/20 rounded-lg flex items-center justify-center flex-shrink-0">
                            <svg class="w-6 h-6 text-blue-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M7 21a4 4 0 01-4-4V5a2 2 0 012-2h4a2 2 0 012 2v12a4 4 0 01-4 4zm0 0h12a2 2 0 002-2v-4a2 2 0 00-2-2h-2.343M11 7.343l1.657-1.657a2 2 0 012.828 0l2.829 2.829a2 2 0 010 2.828l-8.486 8.485M7 17h.01"/>
                            </svg>
                        </div>
                        <span class="text-sm font-semibold text-white">Wipe Clean</span>
                    </div>
                    
                    <div class="flex items-center gap-3 bg-white/10 backdrop-blur-sm rounded-xl px-4 py-3">
                        <div class="w-10 h-10 bg-purple-500/20 rounded-lg flex items-center justify-center flex-shrink-0">
                            <svg class="w-6 h-6 text-purple-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4.354a4 4 0 110 5.292M15 21H3v-1a6 6 0 0112 0v1zm0 0h6v-1a6 6 0 00-9-5.197M13 7a4 4 0 11-8 0 4 4 0 018 0z"/>
                            </svg>
                        </div>
                        <span class="text-sm font-semibold text-white">Child Safe</span>
                    </div>
                </div>
                
                <!-- CTA Buttons -->
                <div class="mt-10 flex flex-col sm:flex-row gap-4 animate-fade-in-up delay-300" style="opacity: 0;">
                    <a href="{{ route('shop.index') }}" class="inline-flex items-center justify-center gap-2 px-8 py-4 bg-primary-600 text-white font-semibold rounded-xl hover:bg-primary-700 transition-all hover:shadow-lg hover:shadow-primary-600/25">
                        Shop Now
                        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 8l4 4m0 0l-4 4m4-4H3"/>
                        </svg>
                    </a>
                    <a href="{{ route('trade.register') }}" class="inline-flex items-center justify-center gap-2 px-8 py-4 bg-white/10 backdrop-blur-sm text-white font-semibold rounded-xl border border-white/20 hover:bg-white/20 transition-all">
                        Open Trade Account
                        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 21V5a2 2 0 00-2-2H7a2 2 0 00-2 2v16m14 0h2m-2 0h-5m-9 0H3m2 0h5M9 7h1m-1 4h1m4-4h1m-1 4h1m-5 10v-5a1 1 0 011-1h2a1 1 0 011 1v5m-4 0h4"/>
                        </svg>
                    </a>
                </div>
            </div>
        </div>
    </section>

    <!-- Trust Badges Strip -->
    <section class="bg-white border-b border-slate-200">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-6">
            <div class="flex flex-wrap items-center justify-center gap-8 lg:gap-16">
                <div class="flex items-center gap-3 text-slate-600">
                    <svg class="w-8 h-8 text-primary-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M9 12l2 2 4-4m5.618-4.016A11.955 11.955 0 0112 2.944a11.955 11.955 0 01-8.618 3.04A12.02 12.02 0 003 9c0 5.591 3.824 10.29 9 11.622 5.176-1.332 9-6.03 9-11.622 0-1.042-.133-2.052-.382-3.016z"/>
                    </svg>
                    <span class="font-semibold">BS5867-B Certified</span>
                </div>
                <div class="flex items-center gap-3 text-slate-600">
                    <svg class="w-8 h-8 text-primary-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M5 8h14M5 8a2 2 0 110-4h14a2 2 0 110 4M5 8v10a2 2 0 002 2h10a2 2 0 002-2V8m-9 4h4"/>
                    </svg>
                    <span class="font-semibold">Free Delivery £150+</span>
                </div>
                <div class="flex items-center gap-3 text-slate-600">
                    <svg class="w-8 h-8 text-primary-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z"/>
                    </svg>
                    <span class="font-semibold">Same Day Dispatch</span>
                </div>
                <div class="flex items-center gap-3 text-slate-600">
                    <svg class="w-8 h-8 text-primary-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M3 10h18M7 15h1m4 0h1m-7 4h12a3 3 0 003-3V8a3 3 0 00-3-3H6a3 3 0 00-3 3v8a3 3 0 003 3z"/>
                    </svg>
                    <span class="font-semibold">Trade Discounts</span>
                </div>
            </div>
        </div>
    </section>

    <!-- Product Categories -->
    <section class="py-16 lg:py-24 bg-slate-50">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="text-center mb-12">
                <h2 class="text-3xl lg:text-4xl font-bold text-secondary-900">Shop by Category</h2>
                <p class="mt-4 text-lg text-slate-600 max-w-2xl mx-auto">Everything you need for compliant window coverings, from complete blinds to replacement parts.</p>
            </div>
            
            <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-6">
                <!-- Roller Blinds -->
                <a href="{{ route('shop.category', 'roller-blinds') }}" class="group relative bg-white rounded-2xl overflow-hidden shadow-sm hover:shadow-xl transition-all duration-300 border border-slate-200">
                    <div class="aspect-square bg-gradient-to-br from-slate-100 to-slate-200 flex items-center justify-center">
                        <div class="w-24 h-24 bg-white rounded-2xl shadow-lg flex items-center justify-center group-hover:scale-110 transition-transform duration-300">
                            <svg class="w-12 h-12 text-primary-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M4 5a1 1 0 011-1h14a1 1 0 011 1v2a1 1 0 01-1 1H5a1 1 0 01-1-1V5zM4 13a1 1 0 011-1h6a1 1 0 011 1v6a1 1 0 01-1 1H5a1 1 0 01-1-1v-6z"/>
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M16 13h2m-1-1v8"/>
                            </svg>
                        </div>
                    </div>
                    <div class="p-6">
                        <h3 class="text-lg font-bold text-secondary-900 group-hover:text-primary-600 transition-colors">Roller Blinds</h3>
                        <p class="mt-2 text-sm text-slate-600">Fire-rated & child-safe options for every environment</p>
                        <span class="mt-4 inline-flex items-center text-sm font-semibold text-primary-600">
                            Shop now
                            <svg class="w-4 h-4 ml-1 group-hover:translate-x-1 transition-transform" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"/>
                            </svg>
                        </span>
                    </div>
                </a>

                <!-- Components -->
                <a href="{{ route('shop.category', 'components') }}" class="group relative bg-white rounded-2xl overflow-hidden shadow-sm hover:shadow-xl transition-all duration-300 border border-slate-200">
                    <div class="aspect-square bg-gradient-to-br from-slate-100 to-slate-200 flex items-center justify-center">
                        <div class="w-24 h-24 bg-white rounded-2xl shadow-lg flex items-center justify-center group-hover:scale-110 transition-transform duration-300">
                            <svg class="w-12 h-12 text-primary-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M10.325 4.317c.426-1.756 2.924-1.756 3.35 0a1.724 1.724 0 002.573 1.066c1.543-.94 3.31.826 2.37 2.37a1.724 1.724 0 001.065 2.572c1.756.426 1.756 2.924 0 3.35a1.724 1.724 0 00-1.066 2.573c.94 1.543-.826 3.31-2.37 2.37a1.724 1.724 0 00-2.572 1.065c-.426 1.756-2.924 1.756-3.35 0a1.724 1.724 0 00-2.573-1.066c-1.543.94-3.31-.826-2.37-2.37a1.724 1.724 0 00-1.065-2.572c-1.756-.426-1.756-2.924 0-3.35a1.724 1.724 0 001.066-2.573c-.94-1.543.826-3.31 2.37-2.37.996.608 2.296.07 2.572-1.065z"/>
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"/>
                            </svg>
                        </div>
                    </div>
                    <div class="p-6">
                        <h3 class="text-lg font-bold text-secondary-900 group-hover:text-primary-600 transition-colors">Components</h3>
                        <p class="mt-2 text-sm text-slate-600">Brackets, chains, bottom bars & spare parts</p>
                        <span class="mt-4 inline-flex items-center text-sm font-semibold text-primary-600">
                            Shop now
                            <svg class="w-4 h-4 ml-1 group-hover:translate-x-1 transition-transform" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"/>
                            </svg>
                        </span>
                    </div>
                </a>

                <!-- Window Films -->
                <a href="{{ route('shop.category', 'window-films') }}" class="group relative bg-white rounded-2xl overflow-hidden shadow-sm hover:shadow-xl transition-all duration-300 border border-slate-200">
                    <div class="aspect-square bg-gradient-to-br from-slate-100 to-slate-200 flex items-center justify-center">
                        <div class="w-24 h-24 bg-white rounded-2xl shadow-lg flex items-center justify-center group-hover:scale-110 transition-transform duration-300">
                            <svg class="w-12 h-12 text-primary-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M9 17V7m0 10a2 2 0 01-2 2H5a2 2 0 01-2-2V7a2 2 0 012-2h2a2 2 0 012 2m0 10a2 2 0 002 2h2a2 2 0 002-2M9 7a2 2 0 012-2h2a2 2 0 012 2m0 10V7m0 10a2 2 0 002 2h2a2 2 0 002-2V7a2 2 0 00-2-2h-2a2 2 0 00-2 2"/>
                            </svg>
                        </div>
                    </div>
                    <div class="p-6">
                        <h3 class="text-lg font-bold text-secondary-900 group-hover:text-primary-600 transition-colors">Window Films</h3>
                        <p class="mt-2 text-sm text-slate-600">Privacy, solar control & safety films</p>
                        <span class="mt-4 inline-flex items-center text-sm font-semibold text-primary-600">
                            Shop now
                            <svg class="w-4 h-4 ml-1 group-hover:translate-x-1 transition-transform" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"/>
                            </svg>
                        </span>
                    </div>
                </a>

                <!-- Maintenance Kits -->
                <a href="{{ route('shop.category', 'maintenance-kits') }}" class="group relative bg-white rounded-2xl overflow-hidden shadow-sm hover:shadow-xl transition-all duration-300 border border-slate-200">
                    <div class="aspect-square bg-gradient-to-br from-slate-100 to-slate-200 flex items-center justify-center">
                        <div class="w-24 h-24 bg-white rounded-2xl shadow-lg flex items-center justify-center group-hover:scale-110 transition-transform duration-300">
                            <svg class="w-12 h-12 text-primary-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M19.428 15.428a2 2 0 00-1.022-.547l-2.387-.477a6 6 0 00-3.86.517l-.318.158a6 6 0 01-3.86.517L6.05 15.21a2 2 0 00-1.806.547M8 4h8l-1 1v5.172a2 2 0 00.586 1.414l5 5c1.26 1.26.367 3.414-1.415 3.414H4.828c-1.782 0-2.674-2.154-1.414-3.414l5-5A2 2 0 009 10.172V5L8 4z"/>
                            </svg>
                        </div>
                    </div>
                    <div class="p-6">
                        <h3 class="text-lg font-bold text-secondary-900 group-hover:text-primary-600 transition-colors">Maintenance Kits</h3>
                        <p class="mt-2 text-sm text-slate-600">Keep your blinds in perfect condition</p>
                        <span class="mt-4 inline-flex items-center text-sm font-semibold text-primary-600">
                            Shop now
                            <svg class="w-4 h-4 ml-1 group-hover:translate-x-1 transition-transform" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"/>
                            </svg>
                        </span>
                    </div>
                </a>
            </div>
        </div>
    </section>

    <!-- Trusted by Regulated Environments -->
    <section class="py-16 lg:py-24 bg-white">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="text-center mb-12">
                <h2 class="text-3xl lg:text-4xl font-bold text-secondary-900">Trusted by Regulated Environments</h2>
                <p class="mt-4 text-lg text-slate-600 max-w-2xl mx-auto">Our blinds meet the strictest compliance requirements for safety-critical environments.</p>
            </div>
            
            <div class="grid grid-cols-2 md:grid-cols-3 lg:grid-cols-6 gap-4 lg:gap-6">
                <!-- Schools -->
                <div class="group bg-slate-50 rounded-2xl p-6 text-center hover:bg-primary-600 transition-all duration-300 cursor-pointer">
                    <div class="w-16 h-16 mx-auto bg-white rounded-xl shadow-sm flex items-center justify-center mb-4 group-hover:bg-primary-500 transition-colors">
                        <svg class="w-8 h-8 text-primary-600 group-hover:text-white transition-colors" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M12 14l9-5-9-5-9 5 9 5z"/>
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M12 14l6.16-3.422a12.083 12.083 0 01.665 6.479A11.952 11.952 0 0012 20.055a11.952 11.952 0 00-6.824-2.998 12.078 12.078 0 01.665-6.479L12 14z"/>
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M12 14l9-5-9-5-9 5 9 5zm0 0l6.16-3.422a12.083 12.083 0 01.665 6.479A11.952 11.952 0 0012 20.055a11.952 11.952 0 00-6.824-2.998 12.078 12.078 0 01.665-6.479L12 14zm-4 6v-7.5l4-2.222"/>
                        </svg>
                    </div>
                    <h3 class="font-bold text-secondary-900 group-hover:text-white transition-colors">Schools</h3>
                </div>

                <!-- Nurseries -->
                <div class="group bg-slate-50 rounded-2xl p-6 text-center hover:bg-primary-600 transition-all duration-300 cursor-pointer">
                    <div class="w-16 h-16 mx-auto bg-white rounded-xl shadow-sm flex items-center justify-center mb-4 group-hover:bg-primary-500 transition-colors">
                        <svg class="w-8 h-8 text-primary-600 group-hover:text-white transition-colors" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M14.828 14.828a4 4 0 01-5.656 0M9 10h.01M15 10h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"/>
                        </svg>
                    </div>
                    <h3 class="font-bold text-secondary-900 group-hover:text-white transition-colors">Nurseries</h3>
                </div>

                <!-- Care Homes -->
                <div class="group bg-slate-50 rounded-2xl p-6 text-center hover:bg-primary-600 transition-all duration-300 cursor-pointer">
                    <div class="w-16 h-16 mx-auto bg-white rounded-xl shadow-sm flex items-center justify-center mb-4 group-hover:bg-primary-500 transition-colors">
                        <svg class="w-8 h-8 text-primary-600 group-hover:text-white transition-colors" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M4.318 6.318a4.5 4.5 0 000 6.364L12 20.364l7.682-7.682a4.5 4.5 0 00-6.364-6.364L12 7.636l-1.318-1.318a4.5 4.5 0 00-6.364 0z"/>
                        </svg>
                    </div>
                    <h3 class="font-bold text-secondary-900 group-hover:text-white transition-colors">Care Homes</h3>
                </div>

                <!-- Clinics -->
                <div class="group bg-slate-50 rounded-2xl p-6 text-center hover:bg-primary-600 transition-all duration-300 cursor-pointer">
                    <div class="w-16 h-16 mx-auto bg-white rounded-xl shadow-sm flex items-center justify-center mb-4 group-hover:bg-primary-500 transition-colors">
                        <svg class="w-8 h-8 text-primary-600 group-hover:text-white transition-colors" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M19 21V5a2 2 0 00-2-2H7a2 2 0 00-2 2v16m14 0h2m-2 0h-5m-9 0H3m2 0h5M9 7h1m-1 4h1m4-4h1m-1 4h1m-5 10v-5a1 1 0 011-1h2a1 1 0 011 1v5m-4 0h4"/>
                        </svg>
                    </div>
                    <h3 class="font-bold text-secondary-900 group-hover:text-white transition-colors">Clinics</h3>
                </div>

                <!-- Commercial -->
                <div class="group bg-slate-50 rounded-2xl p-6 text-center hover:bg-primary-600 transition-all duration-300 cursor-pointer">
                    <div class="w-16 h-16 mx-auto bg-white rounded-xl shadow-sm flex items-center justify-center mb-4 group-hover:bg-primary-500 transition-colors">
                        <svg class="w-8 h-8 text-primary-600 group-hover:text-white transition-colors" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M21 13.255A23.931 23.931 0 0112 15c-3.183 0-6.22-.62-9-1.745M16 6V4a2 2 0 00-2-2h-4a2 2 0 00-2 2v2m4 6h.01M5 20h14a2 2 0 002-2V8a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z"/>
                        </svg>
                    </div>
                    <h3 class="font-bold text-secondary-900 group-hover:text-white transition-colors">Commercial</h3>
                </div>

                <!-- Letting Agents -->
                <div class="group bg-slate-50 rounded-2xl p-6 text-center hover:bg-primary-600 transition-all duration-300 cursor-pointer">
                    <div class="w-16 h-16 mx-auto bg-white rounded-xl shadow-sm flex items-center justify-center mb-4 group-hover:bg-primary-500 transition-colors">
                        <svg class="w-8 h-8 text-primary-600 group-hover:text-white transition-colors" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M3 12l2-2m0 0l7-7 7 7M5 10v10a1 1 0 001 1h3m10-11l2 2m-2-2v10a1 1 0 01-1 1h-3m-6 0a1 1 0 001-1v-4a1 1 0 011-1h2a1 1 0 011 1v4a1 1 0 001 1m-6 0h6"/>
                        </svg>
                    </div>
                    <h3 class="font-bold text-secondary-900 group-hover:text-white transition-colors">Letting Agents</h3>
                </div>
            </div>
        </div>
    </section>

    <!-- How It Works -->
    <section class="py-16 lg:py-24 bg-slate-50">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="text-center mb-12">
                <h2 class="text-3xl lg:text-4xl font-bold text-secondary-900">How It Works</h2>
                <p class="mt-4 text-lg text-slate-600 max-w-2xl mx-auto">Getting compliant blinds for your facility is simple.</p>
            </div>
            
            <div class="grid grid-cols-1 md:grid-cols-3 gap-8 lg:gap-12">
                <!-- Step 1 -->
                <div class="relative">
                    <div class="flex items-center justify-center w-16 h-16 bg-primary-600 text-white text-2xl font-bold rounded-2xl mb-6 mx-auto md:mx-0">
                        1
                    </div>
                    <div class="hidden md:block absolute top-8 left-20 w-[calc(100%-5rem)] h-0.5 bg-gradient-to-r from-primary-600 to-primary-200"></div>
                    <h3 class="text-xl font-bold text-secondary-900 mb-3 text-center md:text-left">Browse & Select</h3>
                    <p class="text-slate-600 text-center md:text-left">Choose from our range of compliant blinds, components, and accessories. Filter by fire rating, size, or colour.</p>
                </div>

                <!-- Step 2 -->
                <div class="relative">
                    <div class="flex items-center justify-center w-16 h-16 bg-primary-600 text-white text-2xl font-bold rounded-2xl mb-6 mx-auto md:mx-0">
                        2
                    </div>
                    <div class="hidden md:block absolute top-8 left-20 w-[calc(100%-5rem)] h-0.5 bg-gradient-to-r from-primary-600 to-primary-200"></div>
                    <h3 class="text-xl font-bold text-secondary-900 mb-3 text-center md:text-left">Order & Pay</h3>
                    <p class="text-slate-600 text-center md:text-left">Secure checkout with instant order confirmation. Trade accounts enjoy 15% off and 30-day payment terms.</p>
                </div>

                <!-- Step 3 -->
                <div class="relative">
                    <div class="flex items-center justify-center w-16 h-16 bg-primary-600 text-white text-2xl font-bold rounded-2xl mb-6 mx-auto md:mx-0">
                        3
                    </div>
                    <h3 class="text-xl font-bold text-secondary-900 mb-3 text-center md:text-left">Fast Delivery</h3>
                    <p class="text-slate-600 text-center md:text-left">Same-day dispatch on orders before 2pm. Free delivery on orders over £150. Compliance certificates included.</p>
                </div>
            </div>
        </div>
    </section>

    <!-- Trade Account CTA -->
    <section class="py-16 lg:py-24 bg-gradient-to-br from-primary-600 to-primary-800 relative overflow-hidden">
        <!-- Background Pattern -->
        <div class="absolute inset-0 opacity-10">
            <svg class="w-full h-full" viewBox="0 0 100 100" preserveAspectRatio="none">
                <defs>
                    <pattern id="trade-grid" width="20" height="20" patternUnits="userSpaceOnUse">
                        <circle cx="1" cy="1" r="1" fill="white"/>
                    </pattern>
                </defs>
                <rect width="100%" height="100%" fill="url(#trade-grid)"/>
            </svg>
        </div>
        
        <div class="relative max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="flex flex-col lg:flex-row items-center justify-between gap-8">
                <div class="max-w-2xl text-center lg:text-left">
                    <h2 class="text-3xl lg:text-4xl font-bold text-white">Open a Trade Account Today</h2>
                    <p class="mt-4 text-lg text-primary-100">Get 15% off all orders, 30-day payment terms, and access to exclusive trade pricing. Perfect for schools, contractors, and facilities managers.</p>
                    <ul class="mt-6 space-y-3">
                        <li class="flex items-center gap-3 text-white justify-center lg:justify-start">
                            <svg class="w-5 h-5 text-primary-200 flex-shrink-0" fill="currentColor" viewBox="0 0 20 20">
                                <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd"/>
                            </svg>
                            <span>15% discount on all products</span>
                        </li>
                        <li class="flex items-center gap-3 text-white justify-center lg:justify-start">
                            <svg class="w-5 h-5 text-primary-200 flex-shrink-0" fill="currentColor" viewBox="0 0 20 20">
                                <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd"/>
                            </svg>
                            <span>30-day payment terms</span>
                        </li>
                        <li class="flex items-center gap-3 text-white justify-center lg:justify-start">
                            <svg class="w-5 h-5 text-primary-200 flex-shrink-0" fill="currentColor" viewBox="0 0 20 20">
                                <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd"/>
                            </svg>
                            <span>Dedicated account manager</span>
                        </li>
                    </ul>
                </div>
                <div class="flex flex-col sm:flex-row gap-4">
                    <a href="{{ route('trade.register') }}" class="inline-flex items-center justify-center gap-2 px-8 py-4 bg-white text-primary-600 font-semibold rounded-xl hover:bg-primary-50 transition-all shadow-lg hover:shadow-xl">
                        Apply Now
                        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 8l4 4m0 0l-4 4m4-4H3"/>
                        </svg>
                    </a>
                    <a href="{{ route('trade.login') }}" class="inline-flex items-center justify-center gap-2 px-8 py-4 bg-transparent text-white font-semibold rounded-xl border-2 border-white/30 hover:bg-white/10 transition-all">
                        Sign In
                    </a>
                </div>
            </div>
        </div>
    </section>
</x-layouts.app>
