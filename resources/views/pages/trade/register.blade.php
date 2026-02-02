<x-layouts.app>
    <!-- Hero Section -->
    <section class="bg-gradient-to-br from-secondary-900 via-secondary-800 to-secondary-900 py-16 lg:py-20 relative overflow-hidden">
        <!-- Background Pattern -->
        <div class="absolute inset-0 opacity-5">
            <svg class="w-full h-full" viewBox="0 0 100 100" preserveAspectRatio="none">
                <defs>
                    <pattern id="trade-grid" width="10" height="10" patternUnits="userSpaceOnUse">
                        <path d="M 10 0 L 0 0 0 10" fill="none" stroke="white" stroke-width="0.5"/>
                    </pattern>
                </defs>
                <rect width="100%" height="100%" fill="url(#trade-grid)"/>
            </svg>
        </div>

        <div class="relative max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="text-center max-w-3xl mx-auto mb-12">
                <h1 class="text-4xl lg:text-5xl font-bold text-white mb-4">Apply for a Trade Account</h1>
                <p class="text-lg text-slate-300">
                    Join hundreds of contractors, installers and businesses who trust BlindBase for compliant blinds.
                </p>
            </div>

            <!-- Benefits Grid -->
            <div class="grid grid-cols-2 lg:grid-cols-4 gap-4 lg:gap-6">
                <!-- Benefit 1 -->
                <div class="bg-white/10 backdrop-blur-sm rounded-xl p-5 border border-white/10">
                    <div class="w-12 h-12 bg-primary-600 rounded-lg flex items-center justify-center mb-4">
                        <svg class="w-6 h-6 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8c-1.657 0-3 .895-3 2s1.343 2 3 2 3 .895 3 2-1.343 2-3 2m0-8c1.11 0 2.08.402 2.599 1M12 8V7m0 1v8m0 0v1m0-1c-1.11 0-2.08-.402-2.599-1M21 12a9 9 0 11-18 0 9 9 0 0118 0z"/>
                        </svg>
                    </div>
                    <h3 class="font-bold text-white mb-1">15% Discount</h3>
                    <p class="text-sm text-slate-300">Minimum 15% off all orders, with volume discounts available</p>
                </div>

                <!-- Benefit 2 -->
                <div class="bg-white/10 backdrop-blur-sm rounded-xl p-5 border border-white/10">
                    <div class="w-12 h-12 bg-primary-600 rounded-lg flex items-center justify-center mb-4">
                        <svg class="w-6 h-6 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 4v5h.582m15.356 2A8.001 8.001 0 004.582 9m0 0H9m11 11v-5h-.581m0 0a8.003 8.003 0 01-15.357-2m15.357 2H15"/>
                        </svg>
                    </div>
                    <h3 class="font-bold text-white mb-1">Quick Reorder</h3>
                    <p class="text-sm text-slate-300">Easily reorder previous items from your order history</p>
                </div>

                <!-- Benefit 3 -->
                <div class="bg-white/10 backdrop-blur-sm rounded-xl p-5 border border-white/10">
                    <div class="w-12 h-12 bg-primary-600 rounded-lg flex items-center justify-center mb-4">
                        <svg class="w-6 h-6 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z"/>
                        </svg>
                    </div>
                    <h3 class="font-bold text-white mb-1">VAT Invoices</h3>
                    <p class="text-sm text-slate-300">Automatic VAT invoices and statements for your records</p>
                </div>

                <!-- Benefit 4 -->
                <div class="bg-white/10 backdrop-blur-sm rounded-xl p-5 border border-white/10">
                    <div class="w-12 h-12 bg-primary-600 rounded-lg flex items-center justify-center mb-4">
                        <svg class="w-6 h-6 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z"/>
                        </svg>
                    </div>
                    <h3 class="font-bold text-white mb-1">30-Day Terms</h3>
                    <p class="text-sm text-slate-300">Flexible payment terms for approved accounts</p>
                </div>
            </div>
        </div>
    </section>

    <!-- Registration Form -->
    <section class="py-16 lg:py-24 bg-slate-50">
        <div class="max-w-3xl mx-auto px-4 sm:px-6 lg:px-8">
            @if ($errors->any())
                <div class="mb-8 p-4 bg-red-50 border border-red-200 rounded-xl">
                    <div class="flex items-start gap-3">
                        <svg class="w-5 h-5 text-red-500 mt-0.5" fill="currentColor" viewBox="0 0 20 20">
                            <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zM8.707 7.293a1 1 0 00-1.414 1.414L8.586 10l-1.293 1.293a1 1 0 101.414 1.414L10 11.414l1.293 1.293a1 1 0 001.414-1.414L11.414 10l1.293-1.293a1 1 0 00-1.414-1.414L10 8.586 8.707 7.293z" clip-rule="evenodd"/>
                        </svg>
                        <div>
                            <h3 class="font-medium text-red-800">Please correct the following errors:</h3>
                            <ul class="mt-2 text-sm text-red-700 list-disc list-inside">
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    </div>
                </div>
            @endif

            <form action="{{ route('trade.register') }}" method="POST" class="space-y-8">
                @csrf

                <!-- Company Details -->
                <div class="bg-white rounded-2xl border border-slate-200 p-6 lg:p-8">
                    <h2 class="text-xl font-bold text-secondary-900 mb-6 flex items-center gap-2">
                        <span class="w-8 h-8 bg-primary-100 text-primary-600 rounded-full flex items-center justify-center text-sm font-bold">1</span>
                        Company Details
                    </h2>

                    <div class="space-y-6">
                        <div>
                            <label for="company_name" class="block text-sm font-medium text-secondary-900 mb-2">Company Name *</label>
                            <input type="text" name="company_name" id="company_name" value="{{ old('company_name') }}" required
                                class="w-full px-4 py-3 border border-slate-200 rounded-xl focus:ring-2 focus:ring-primary-500 focus:border-primary-500 @error('company_name') border-red-500 @enderror"
                                placeholder="ABC Schools Ltd">
                        </div>

                        <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                            <div>
                                <label for="company_reg_number" class="block text-sm font-medium text-secondary-900 mb-2">Company Registration Number</label>
                                <input type="text" name="company_reg_number" id="company_reg_number" value="{{ old('company_reg_number') }}"
                                    class="w-full px-4 py-3 border border-slate-200 rounded-xl focus:ring-2 focus:ring-primary-500 focus:border-primary-500"
                                    placeholder="12345678">
                            </div>
                            <div>
                                <label for="vat_number" class="block text-sm font-medium text-secondary-900 mb-2">VAT Number</label>
                                <input type="text" name="vat_number" id="vat_number" value="{{ old('vat_number') }}"
                                    class="w-full px-4 py-3 border border-slate-200 rounded-xl focus:ring-2 focus:ring-primary-500 focus:border-primary-500"
                                    placeholder="GB123456789">
                            </div>
                        </div>

                        <div>
                            <label for="sector" class="block text-sm font-medium text-secondary-900 mb-2">Business Sector *</label>
                            <select name="sector" id="sector" required
                                class="w-full px-4 py-3 border border-slate-200 rounded-xl focus:ring-2 focus:ring-primary-500 focus:border-primary-500 @error('sector') border-red-500 @enderror">
                                <option value="">Select your sector...</option>
                                <option value="education" {{ old('sector') === 'education' ? 'selected' : '' }}>Education (Schools, Universities)</option>
                                <option value="healthcare" {{ old('sector') === 'healthcare' ? 'selected' : '' }}>Healthcare (NHS, Hospitals, Clinics)</option>
                                <option value="care-home" {{ old('sector') === 'care-home' ? 'selected' : '' }}>Care Homes & Assisted Living</option>
                                <option value="hospitality" {{ old('sector') === 'hospitality' ? 'selected' : '' }}>Hospitality (Hotels, Restaurants)</option>
                                <option value="commercial" {{ old('sector') === 'commercial' ? 'selected' : '' }}>Commercial (Offices, Retail)</option>
                                <option value="government" {{ old('sector') === 'government' ? 'selected' : '' }}>Government & Public Sector</option>
                                <option value="other" {{ old('sector') === 'other' ? 'selected' : '' }}>Other</option>
                            </select>
                        </div>
                    </div>
                </div>

                <!-- Contact Details -->
                <div class="bg-white rounded-2xl border border-slate-200 p-6 lg:p-8">
                    <h2 class="text-xl font-bold text-secondary-900 mb-6 flex items-center gap-2">
                        <span class="w-8 h-8 bg-primary-100 text-primary-600 rounded-full flex items-center justify-center text-sm font-bold">2</span>
                        Contact Details
                    </h2>

                    <div class="space-y-6">
                        <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                            <div>
                                <label for="contact_name" class="block text-sm font-medium text-secondary-900 mb-2">Full Name *</label>
                                <input type="text" name="contact_name" id="contact_name" value="{{ old('contact_name') }}" required
                                    class="w-full px-4 py-3 border border-slate-200 rounded-xl focus:ring-2 focus:ring-primary-500 focus:border-primary-500 @error('contact_name') border-red-500 @enderror"
                                    placeholder="John Smith">
                            </div>
                            <div>
                                <label for="job_title" class="block text-sm font-medium text-secondary-900 mb-2">Job Title</label>
                                <input type="text" name="job_title" id="job_title" value="{{ old('job_title') }}"
                                    class="w-full px-4 py-3 border border-slate-200 rounded-xl focus:ring-2 focus:ring-primary-500 focus:border-primary-500"
                                    placeholder="Facilities Manager">
                            </div>
                        </div>

                        <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                            <div>
                                <label for="email" class="block text-sm font-medium text-secondary-900 mb-2">Email Address *</label>
                                <input type="email" name="email" id="email" value="{{ old('email') }}" required
                                    class="w-full px-4 py-3 border border-slate-200 rounded-xl focus:ring-2 focus:ring-primary-500 focus:border-primary-500 @error('email') border-red-500 @enderror"
                                    placeholder="john@company.com">
                            </div>
                            <div>
                                <label for="phone" class="block text-sm font-medium text-secondary-900 mb-2">Phone Number *</label>
                                <input type="tel" name="phone" id="phone" value="{{ old('phone') }}" required
                                    class="w-full px-4 py-3 border border-slate-200 rounded-xl focus:ring-2 focus:ring-primary-500 focus:border-primary-500 @error('phone') border-red-500 @enderror"
                                    placeholder="">
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Delivery Address -->
                <div class="bg-white rounded-2xl border border-slate-200 p-6 lg:p-8">
                    <h2 class="text-xl font-bold text-secondary-900 mb-6 flex items-center gap-2">
                        <span class="w-8 h-8 bg-primary-100 text-primary-600 rounded-full flex items-center justify-center text-sm font-bold">3</span>
                        Delivery Address
                    </h2>

                    <div class="space-y-6">
                        <div>
                            <label for="delivery_address" class="block text-sm font-medium text-secondary-900 mb-2">Street Address *</label>
                            <input type="text" name="delivery_address" id="delivery_address" value="{{ old('delivery_address') }}" required
                                class="w-full px-4 py-3 border border-slate-200 rounded-xl focus:ring-2 focus:ring-primary-500 focus:border-primary-500 @error('delivery_address') border-red-500 @enderror"
                                placeholder="">
                        </div>

                        <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                            <div>
                                <label for="delivery_city" class="block text-sm font-medium text-secondary-900 mb-2">City/Town *</label>
                                <input type="text" name="delivery_city" id="delivery_city" value="{{ old('delivery_city') }}" required
                                    class="w-full px-4 py-3 border border-slate-200 rounded-xl focus:ring-2 focus:ring-primary-500 focus:border-primary-500 @error('delivery_city') border-red-500 @enderror"
                                    placeholder="">
                            </div>
                            <div>
                                <label for="delivery_postcode" class="block text-sm font-medium text-secondary-900 mb-2">Postcode *</label>
                                <input type="text" name="delivery_postcode" id="delivery_postcode" value="{{ old('delivery_postcode') }}" required
                                    class="w-full px-4 py-3 border border-slate-200 rounded-xl focus:ring-2 focus:ring-primary-500 focus:border-primary-500 @error('delivery_postcode') border-red-500 @enderror"
                                    placeholder="">
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Account Setup -->
                <div class="bg-white rounded-2xl border border-slate-200 p-6 lg:p-8">
                    <h2 class="text-xl font-bold text-secondary-900 mb-6 flex items-center gap-2">
                        <span class="w-8 h-8 bg-primary-100 text-primary-600 rounded-full flex items-center justify-center text-sm font-bold">4</span>
                        Account Setup
                    </h2>

                    <div class="space-y-6">
                        <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                            <div>
                                <label for="password" class="block text-sm font-medium text-secondary-900 mb-2">Password *</label>
                                <input type="password" name="password" id="password" required
                                    class="w-full px-4 py-3 border border-slate-200 rounded-xl focus:ring-2 focus:ring-primary-500 focus:border-primary-500 @error('password') border-red-500 @enderror"
                                    placeholder="Minimum 8 characters">
                            </div>
                            <div>
                                <label for="password_confirmation" class="block text-sm font-medium text-secondary-900 mb-2">Confirm Password *</label>
                                <input type="password" name="password_confirmation" id="password_confirmation" required
                                    class="w-full px-4 py-3 border border-slate-200 rounded-xl focus:ring-2 focus:ring-primary-500 focus:border-primary-500"
                                    placeholder="Confirm your password">
                            </div>
                        </div>

                        <div>
                            <label for="estimated_volume" class="block text-sm font-medium text-secondary-900 mb-2">Estimated Monthly Volume *</label>
                            <select name="estimated_volume" id="estimated_volume" required
                                class="w-full px-4 py-3 border border-slate-200 rounded-xl focus:ring-2 focus:ring-primary-500 focus:border-primary-500 @error('estimated_volume') border-red-500 @enderror">
                                <option value="">Select estimated volume...</option>
                                <option value="1-10" {{ old('estimated_volume') === '1-10' ? 'selected' : '' }}>1-10 blinds per month</option>
                                <option value="11-50" {{ old('estimated_volume') === '11-50' ? 'selected' : '' }}>11-50 blinds per month</option>
                                <option value="51-100" {{ old('estimated_volume') === '51-100' ? 'selected' : '' }}>51-100 blinds per month</option>
                                <option value="100+" {{ old('estimated_volume') === '100+' ? 'selected' : '' }}>100+ blinds per month</option>
                            </select>
                        </div>
                    </div>
                </div>

                <!-- Terms & Submit -->
                <div class="bg-white rounded-2xl border border-slate-200 p-6 lg:p-8">
                    <div class="space-y-4">
                        <label class="flex items-start gap-3 cursor-pointer">
                            <input type="checkbox" name="terms" value="1" required
                                class="w-5 h-5 mt-0.5 text-primary-600 border-slate-300 rounded focus:ring-primary-500 @error('terms') border-red-500 @enderror">
                            <span class="text-sm text-slate-600">
                                I agree to the <a href="#" class="text-primary-600 hover:underline">Terms & Conditions</a> and <a href="#" class="text-primary-600 hover:underline">Privacy Policy</a>. *
                            </span>
                        </label>

                        <label class="flex items-start gap-3 cursor-pointer">
                            <input type="checkbox" name="marketing" value="1"
                                class="w-5 h-5 mt-0.5 text-primary-600 border-slate-300 rounded focus:ring-primary-500">
                            <span class="text-sm text-slate-600">
                                I'd like to receive news, offers, and updates from BlindBase by email.
                            </span>
                        </label>
                    </div>

                    <button type="submit" class="w-full mt-8 inline-flex items-center justify-center gap-2 px-8 py-4 bg-primary-600 text-white font-semibold rounded-xl hover:bg-primary-700 transition-all hover:shadow-lg hover:shadow-primary-600/25">
                        Submit Application
                        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M14 5l7 7m0 0l-7 7m7-7H3"/>
                        </svg>
                    </button>

                    <p class="mt-6 text-center text-sm text-slate-500">
                        Already have an account? <a href="{{ route('trade.login') }}" class="text-primary-600 hover:underline font-medium">Log in here</a>
                    </p>
                </div>
            </form>
        </div>
    </section>
</x-layouts.app>
