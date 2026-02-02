<x-layouts.app>
    <!-- Hero Section -->
    <section class="bg-secondary-900 py-16 lg:py-24 relative overflow-hidden">
        <!-- Background Pattern -->
        <div class="absolute inset-0 opacity-5">
            <svg class="w-full h-full" viewBox="0 0 100 100" preserveAspectRatio="none">
                <defs>
                    <pattern id="compliance-grid" width="10" height="10" patternUnits="userSpaceOnUse">
                        <path d="M 10 0 L 0 0 0 10" fill="none" stroke="white" stroke-width="0.5"/>
                    </pattern>
                </defs>
                <rect width="100%" height="100%" fill="url(#compliance-grid)"/>
            </svg>
        </div>

        <div class="relative max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <nav class="flex items-center gap-2 text-sm text-slate-400 mb-6">
                <a href="{{ route('home') }}" class="hover:text-white transition-colors">Home</a>
                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1" d="M9 5l7 7-7 7"/>
                </svg>
                <span class="text-white">Compliance</span>
            </nav>

            <div class="max-w-3xl">
                <h1 class="text-4xl lg:text-5xl font-bold text-white mb-6">Compliance & Certifications</h1>
                <p class="text-lg text-slate-300 leading-relaxed">
                    All BlindBase products meet the highest standards for safety and compliance in regulated environments. Download our certification documents and technical specifications below.
                </p>
            </div>
        </div>
    </section>

    <!-- Certification Cards -->
    <section class="py-16 lg:py-24 bg-slate-50">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
                <!-- Fire Certification -->
                <div class="bg-white rounded-2xl border border-slate-200 overflow-hidden hover:shadow-lg transition-shadow">
                    <div class="p-6 border-b border-slate-100 relative overflow-hidden">
                        <div class="absolute -right-10 -top-10 w-40 h-40 text-slate-200 opacity-10 pointer-events-none select-none">
                            <svg class="w-full h-full" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1" d="M17.657 18.657A8 8 0 016.343 7.343S7 9 9 10c0-2 .5-5 2.986-7C14 5 16.09 5.777 17.656 7.343A7.975 7.975 0 0120 13a7.975 7.975 0 01-2.343 5.657z"/>
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1" d="M9.879 16.121A3 3 0 1012.015 11L11 14H9c0 .768.293 1.536.879 2.121z"/>
                            </svg>
                        </div>
                        <h2 class="text-xl font-bold text-secondary-900 mb-2">Fire Certification</h2>
                        <p class="text-slate-600 text-sm leading-relaxed">
                            All our blinds are tested and certified to BS 5867-2:2008 Type B for flame retardancy, making them suitable for use in schools, care homes, and commercial buildings.
                        </p>
                    </div>
                    <div class="p-6 bg-slate-50">
                        <h3 class="text-sm font-semibold text-secondary-900 mb-3">Available Documents</h3>
                        <ul class="space-y-2">
                            <li>
                                <a href="#" class="flex items-center gap-2 text-sm text-primary-600 hover:text-primary-700 font-medium">
                                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1" d="M12 10v6m0 0l-3-3m3 3l3-3m2 8H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z"/>
                                    </svg>
                                    BS 5867 Fire Certificate
                                </a>
                            </li>
                            <li>
                                <a href="#" class="flex items-center gap-2 text-sm text-primary-600 hover:text-primary-700 font-medium">
                                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1" d="M12 10v6m0 0l-3-3m3 3l3-3m2 8H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z"/>
                                    </svg>
                                    Fire Test Report
                                </a>
                            </li>
                            <li>
                                <a href="#" class="flex items-center gap-2 text-sm text-primary-600 hover:text-primary-700 font-medium">
                                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1" d="M12 10v6m0 0l-3-3m3 3l3-3m2 8H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z"/>
                                    </svg>
                                    Compliance Statement
                                </a>
                            </li>
                        </ul>
                    </div>
                </div>

                <!-- Antimicrobial Treatment -->
                <div class="bg-white rounded-2xl border border-slate-200 overflow-hidden hover:shadow-lg transition-shadow">
                    <div class="p-6 border-b border-slate-100 relative overflow-hidden">
                        <div class="absolute -right-10 -top-10 w-40 h-40 text-slate-200 opacity-10 pointer-events-none select-none">
                            <svg class="w-full h-full" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1" d="M9 12l2 2 4-4m5.618-4.016A11.955 11.955 0 0112 2.944a11.955 11.955 0 01-8.618 3.04A12.02 12.02 0 003 9c0 5.591 3.824 10.29 9 11.622 5.176-1.332 9-6.03 9-11.622 0-1.042-.133-2.052-.382-3.016z"/>
                            </svg>
                        </div>
                        <h2 class="text-xl font-bold text-secondary-900 mb-2">Antimicrobial Treatment</h2>
                        <p class="text-slate-600 text-sm leading-relaxed">
                            Our antimicrobial fabric treatments inhibit the growth of bacteria, mould, and mildew, providing an additional layer of hygiene protection for healthcare and educational settings.
                        </p>
                    </div>
                    <div class="p-6 bg-slate-50">
                        <h3 class="text-sm font-semibold text-secondary-900 mb-3">Available Documents</h3>
                        <ul class="space-y-2">
                            <li>
                                <a href="#" class="flex items-center gap-2 text-sm text-primary-600 hover:text-primary-700 font-medium">
                                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1" d="M12 10v6m0 0l-3-3m3 3l3-3m2 8H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z"/>
                                    </svg>
                                    Antimicrobial Certificate
                                </a>
                            </li>
                            <li>
                                <a href="#" class="flex items-center gap-2 text-sm text-primary-600 hover:text-primary-700 font-medium">
                                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1" d="M12 10v6m0 0l-3-3m3 3l3-3m2 8H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z"/>
                                    </svg>
                                    Lab Test Results
                                </a>
                            </li>
                            <li>
                                <a href="#" class="flex items-center gap-2 text-sm text-primary-600 hover:text-primary-700 font-medium">
                                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1" d="M12 10v6m0 0l-3-3m3 3l3-3m2 8H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z"/>
                                    </svg>
                                    Hygiene Guidelines
                                </a>
                            </li>
                        </ul>
                    </div>
                </div>

                <!-- Material Specifications -->
                <div class="bg-white rounded-2xl border border-slate-200 overflow-hidden hover:shadow-lg transition-shadow">
                    <div class="p-6 border-b border-slate-100 relative overflow-hidden">
                        <div class="absolute -right-10 -top-10 w-40 h-40 text-slate-200 opacity-10 pointer-events-none select-none">
                            <svg class="w-full h-full" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1" d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z"/>
                            </svg>
                        </div>
                        <h2 class="text-xl font-bold text-secondary-900 mb-2">Material Specifications</h2>
                        <p class="text-slate-600 text-sm leading-relaxed">
                            Detailed technical specifications for all our fabric types, including composition, weight, light transmission, and thermal properties for specification purposes.
                        </p>
                    </div>
                    <div class="p-6 bg-slate-50">
                        <h3 class="text-sm font-semibold text-secondary-900 mb-3">Available Documents</h3>
                        <ul class="space-y-2">
                            <li>
                                <a href="#" class="flex items-center gap-2 text-sm text-primary-600 hover:text-primary-700 font-medium">
                                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1" d="M12 10v6m0 0l-3-3m3 3l3-3m2 8H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z"/>
                                    </svg>
                                    Technical Data Sheets
                                </a>
                            </li>
                            <li>
                                <a href="#" class="flex items-center gap-2 text-sm text-primary-600 hover:text-primary-700 font-medium">
                                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1" d="M12 10v6m0 0l-3-3m3 3l3-3m2 8H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z"/>
                                    </svg>
                                    Fabric Composition
                                </a>
                            </li>
                            <li>
                                <a href="#" class="flex items-center gap-2 text-sm text-primary-600 hover:text-primary-700 font-medium">
                                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1" d="M12 10v6m0 0l-3-3m3 3l3-3m2 8H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z"/>
                                    </svg>
                                    Colour Reference Guide
                                </a>
                            </li>
                        </ul>
                    </div>
                </div>

                <!-- Child Safety -->
                <div class="bg-white rounded-2xl border border-slate-200 overflow-hidden hover:shadow-lg transition-shadow">
                    <div class="p-6 border-b border-slate-100 relative overflow-hidden">
                        <div class="absolute -right-10 -top-10 w-40 h-40 text-slate-200 opacity-10 pointer-events-none select-none">
                            <svg class="w-full h-full" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1" d="M12 4.354a4 4 0 110 5.292M15 21H3v-1a6 6 0 0112 0v1zm0 0h6v-1a6 6 0 00-9-5.197M13 7a4 4 0 11-8 0 4 4 0 018 0z"/>
                            </svg>
                        </div>
                        <h2 class="text-xl font-bold text-secondary-900 mb-2">Child Safety</h2>
                        <p class="text-slate-600 text-sm leading-relaxed">
                            Our blinds comply with EN 13120 child safety regulations. All chain mechanisms feature safety devices to prevent entanglement and strangulation hazards.
                        </p>
                    </div>
                    <div class="p-6 bg-slate-50">
                        <h3 class="text-sm font-semibold text-secondary-900 mb-3">Available Documents</h3>
                        <ul class="space-y-2">
                            <li>
                                <a href="#" class="flex items-center gap-2 text-sm text-primary-600 hover:text-primary-700 font-medium">
                                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1" d="M12 10v6m0 0l-3-3m3 3l3-3m2 8H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z"/>
                                    </svg>
                                    EN 13120 Certificate
                                </a>
                            </li>
                            <li>
                                <a href="#" class="flex items-center gap-2 text-sm text-primary-600 hover:text-primary-700 font-medium">
                                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1" d="M12 10v6m0 0l-3-3m3 3l3-3m2 8H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z"/>
                                    </svg>
                                    Safety Device Guide
                                </a>
                            </li>
                            <li>
                                <a href="#" class="flex items-center gap-2 text-sm text-primary-600 hover:text-primary-700 font-medium">
                                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1" d="M12 10v6m0 0l-3-3m3 3l3-3m2 8H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z"/>
                                    </svg>
                                    Risk Assessment Template
                                </a>
                            </li>
                        </ul>
                    </div>
                </div>

                <!-- Fitting & Installation -->
                <div class="bg-white rounded-2xl border border-slate-200 overflow-hidden hover:shadow-lg transition-shadow">
                    <div class="p-6 border-b border-slate-100 relative overflow-hidden">
                        <div class="absolute -right-10 -top-10 w-40 h-40 text-slate-200 opacity-10 pointer-events-none select-none">
                            <svg class="w-full h-full" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1" d="M10.325 4.317c.426-1.756 2.924-1.756 3.35 0a1.724 1.724 0 002.573 1.066c1.543-.94 3.31.826 2.37 2.37a1.724 1.724 0 001.065 2.572c1.756.426 1.756 2.924 0 3.35a1.724 1.724 0 00-1.066 2.573c.94 1.543-.826 3.31-2.37 2.37a1.724 1.724 0 00-2.572 1.065c-.426 1.756-2.924 1.756-3.35 0a1.724 1.724 0 00-2.573-1.066c-1.543.94-3.31-.826-2.37-2.37a1.724 1.724 0 00-1.065-2.572c-1.756-.426-1.756-2.924 0-3.35a1.724 1.724 0 001.066-2.573c-.94-1.543.826-3.31 2.37-2.37.996.608 2.296.07 2.572-1.065z"/>
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"/>
                            </svg>
                        </div>
                        <h2 class="text-xl font-bold text-secondary-900 mb-2">Fitting & Installation</h2>
                        <p class="text-slate-600 text-sm leading-relaxed">
                            Comprehensive installation guides and fitting instructions for all our products. Suitable for professional installers and competent DIY fitting.
                        </p>
                    </div>
                    <div class="p-6 bg-slate-50">
                        <h3 class="text-sm font-semibold text-secondary-900 mb-3">Available Documents</h3>
                        <ul class="space-y-2">
                            <li>
                                <a href="#" class="flex items-center gap-2 text-sm text-primary-600 hover:text-primary-700 font-medium">
                                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1" d="M12 10v6m0 0l-3-3m3 3l3-3m2 8H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z"/>
                                    </svg>
                                    Fitting Instructions
                                </a>
                            </li>
                            <li>
                                <a href="#" class="flex items-center gap-2 text-sm text-primary-600 hover:text-primary-700 font-medium">
                                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1" d="M12 10v6m0 0l-3-3m3 3l3-3m2 8H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z"/>
                                    </svg>
                                    Measuring Guide
                                </a>
                            </li>
                            <li>
                                <a href="#" class="flex items-center gap-2 text-sm text-primary-600 hover:text-primary-700 font-medium">
                                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1" d="M12 10v6m0 0l-3-3m3 3l3-3m2 8H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z"/>
                                    </svg>
                                    Installation Video Guide
                                </a>
                            </li>
                        </ul>
                    </div>
                </div>

                <!-- Care & Maintenance -->
                <div class="bg-white rounded-2xl border border-slate-200 overflow-hidden hover:shadow-lg transition-shadow">
                    <div class="p-6 border-b border-slate-100 relative overflow-hidden">
                        <div class="absolute -right-10 -top-10 w-40 h-40 text-slate-200 opacity-10 pointer-events-none select-none">
                            <svg class="w-full h-full" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1" d="M4.318 6.318a4.5 4.5 0 000 6.364L12 20.364l7.682-7.682a4.5 4.5 0 00-6.364-6.364L12 7.636l-1.318-1.318a4.5 4.5 0 00-6.364 0z"/>
                            </svg>
                        </div>
                        <h2 class="text-xl font-bold text-secondary-900 mb-2">Care & Maintenance</h2>
                        <p class="text-slate-600 text-sm leading-relaxed">
                            Guidelines for cleaning, maintaining, and extending the life of your blinds. Includes approved cleaning products and maintenance schedules for commercial settings.
                        </p>
                    </div>
                    <div class="p-6 bg-slate-50">
                        <h3 class="text-sm font-semibold text-secondary-900 mb-3">Available Documents</h3>
                        <ul class="space-y-2">
                            <li>
                                <a href="#" class="flex items-center gap-2 text-sm text-primary-600 hover:text-primary-700 font-medium">
                                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1" d="M12 10v6m0 0l-3-3m3 3l3-3m2 8H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z"/>
                                    </svg>
                                    Care Instructions
                                </a>
                            </li>
                            <li>
                                <a href="#" class="flex items-center gap-2 text-sm text-primary-600 hover:text-primary-700 font-medium">
                                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1" d="M12 10v6m0 0l-3-3m3 3l3-3m2 8H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z"/>
                                    </svg>
                                    Cleaning Products Guide
                                </a>
                            </li>
                            <li>
                                <a href="#" class="flex items-center gap-2 text-sm text-primary-600 hover:text-primary-700 font-medium">
                                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1" d="M12 10v6m0 0l-3-3m3 3l3-3m2 8H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z"/>
                                    </svg>
                                    Maintenance Schedule
                                </a>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Custom Documentation CTA -->
    <section class="py-16 lg:py-24 bg-gradient-to-br from-primary-600 to-primary-800 relative overflow-hidden">
        <div class="absolute inset-0 opacity-10">
            <svg class="w-full h-full" viewBox="0 0 100 100" preserveAspectRatio="none">
                <defs>
                    <pattern id="cta-dots" width="20" height="20" patternUnits="userSpaceOnUse">
                        <circle cx="1" cy="1" r="1" fill="white"/>
                    </pattern>
                </defs>
                <rect width="100%" height="100%" fill="url(#cta-dots)"/>
            </svg>
        </div>

        <div class="relative max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="max-w-3xl mx-auto text-center">
                <h2 class="text-3xl lg:text-4xl font-bold text-white mb-4">Need Custom Documentation?</h2>
                <p class="text-lg text-primary-100 mb-8">
                    We can provide bespoke compliance documentation, project-specific certificates, and custom specification sheets for tenders and contracts.
                </p>
                <div class="flex flex-col sm:flex-row gap-4 justify-center">
                    <a href="{{ route('contact') }}" class="inline-flex items-center justify-center gap-2 px-8 py-4 bg-white text-primary-600 font-semibold rounded-xl hover:bg-primary-50 transition-all shadow-lg hover:shadow-xl">
                        Request Documentation
                        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1" d="M17 8l4 4m0 0l-4 4m4-4H3"/>
                        </svg>
                    </a>
</div>
            </div>
        </div>
    </section>
</x-layouts.app>
