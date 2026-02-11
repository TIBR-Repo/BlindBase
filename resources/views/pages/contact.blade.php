<x-layouts.app>
    <!-- Hero Section -->
    <section class="bg-secondary-900 py-16 relative overflow-hidden">
        <div class="absolute inset-0 opacity-5">
            <svg class="w-full h-full" viewBox="0 0 100 100" preserveAspectRatio="none">
                <defs>
                    <pattern id="contact-grid" width="10" height="10" patternUnits="userSpaceOnUse">
                        <path d="M 10 0 L 0 0 0 10" fill="none" stroke="white" stroke-width="0.5"/>
                    </pattern>
                </defs>
                <rect width="100%" height="100%" fill="url(#contact-grid)"/>
            </svg>
        </div>

        <div class="relative max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <nav class="flex items-center gap-2 text-sm text-slate-400 mb-6">
                <a href="{{ route('home') }}" class="hover:text-white transition-colors">Home</a>
                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"/>
                </svg>
                <span class="text-white">Contact</span>
            </nav>

            <div class="max-w-3xl">
                <h1 class="text-4xl lg:text-5xl font-bold text-white mb-4">Get in Touch</h1>
                <p class="text-lg text-slate-300">
                    Have a question or need a quote? We're here to help. Contact our team and we'll get back to you within 24 hours.
                </p>
            </div>
        </div>
    </section>

    <!-- Contact Form & Info -->
    <section class="py-16 lg:py-24 bg-slate-50">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            @if(session('success'))
                <div class="mb-8 p-4 bg-green-50 border border-green-200 rounded-xl">
                    <div class="flex items-center gap-3">
                        <svg class="w-5 h-5 text-green-500" fill="currentColor" viewBox="0 0 20 20">
                            <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd"/>
                        </svg>
                        <span class="text-green-700 font-medium">{{ session('success') }}</span>
                    </div>
                </div>
            @endif

            <div class="flex flex-col lg:flex-row gap-12">
                <!-- Contact Form -->
                <div class="flex-1">
                    <div class="bg-white rounded-2xl border border-slate-200 p-8">
                        <h2 class="text-2xl font-bold text-secondary-900 mb-6">Send us a Message</h2>
                        
                        <form action="{{ route('contact.send') }}" method="POST" class="space-y-6">
                            @csrf
                            
                            <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                                <div>
                                    <label for="name" class="block text-sm font-medium text-secondary-900 mb-2">Full Name *</label>
                                    <input type="text" name="name" id="name" value="{{ old('name') }}" required
                                        class="w-full px-4 py-3 border border-slate-200 rounded-xl focus:ring-2 focus:ring-primary-500 focus:border-primary-500 @error('name') border-red-500 @enderror"
                                        placeholder="John Smith">
                                    @error('name')
                                        <p class="mt-1 text-sm text-red-500">{{ $message }}</p>
                                    @enderror
                                </div>
                                <div>
                                    <label for="email" class="block text-sm font-medium text-secondary-900 mb-2">Email Address *</label>
                                    <input type="email" name="email" id="email" value="{{ old('email') }}" required
                                        class="w-full px-4 py-3 border border-slate-200 rounded-xl focus:ring-2 focus:ring-primary-500 focus:border-primary-500 @error('email') border-red-500 @enderror"
                                        placeholder="john@company.com">
                                    @error('email')
                                        <p class="mt-1 text-sm text-red-500">{{ $message }}</p>
                                    @enderror
                                </div>
                            </div>

                            <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                                <div>
                                    <label for="phone" class="block text-sm font-medium text-secondary-900 mb-2">Phone Number</label>
                                    <input type="tel" name="phone" id="phone" value="{{ old('phone') }}"
                                        class="w-full px-4 py-3 border border-slate-200 rounded-xl focus:ring-2 focus:ring-primary-500 focus:border-primary-500"
                                        placeholder="">
                                </div>
                                <div>
                                    <label for="company" class="block text-sm font-medium text-secondary-900 mb-2">Company Name</label>
                                    <input type="text" name="company" id="company" value="{{ old('company') }}"
                                        class="w-full px-4 py-3 border border-slate-200 rounded-xl focus:ring-2 focus:ring-primary-500 focus:border-primary-500"
                                        placeholder="ABC School">
                                </div>
                            </div>

                            <div>
                                <label for="subject" class="block text-sm font-medium text-secondary-900 mb-2">Subject *</label>
                                <select name="subject" id="subject" required
                                    class="w-full px-4 py-3 border border-slate-200 rounded-xl focus:ring-2 focus:ring-primary-500 focus:border-primary-500 @error('subject') border-red-500 @enderror">
                                    <option value="">Select a subject...</option>
                                    <option value="general" {{ old('subject') === 'general' ? 'selected' : '' }}>General Enquiry</option>
                                    <option value="quote" {{ old('subject') === 'quote' ? 'selected' : '' }}>Request a Quote</option>
                                    <option value="trade" {{ old('subject') === 'trade' ? 'selected' : '' }}>Trade Account Enquiry</option>
                                    <option value="order" {{ old('subject') === 'order' ? 'selected' : '' }}>Existing Order Query</option>
                                    <option value="compliance" {{ old('subject') === 'compliance' ? 'selected' : '' }}>Compliance Documentation</option>
                                    <option value="other" {{ old('subject') === 'other' ? 'selected' : '' }}>Other</option>
                                </select>
                                @error('subject')
                                    <p class="mt-1 text-sm text-red-500">{{ $message }}</p>
                                @enderror
                            </div>

                            <div>
                                <label for="message" class="block text-sm font-medium text-secondary-900 mb-2">Message *</label>
                                <textarea name="message" id="message" rows="5" required
                                    class="w-full px-4 py-3 border border-slate-200 rounded-xl focus:ring-2 focus:ring-primary-500 focus:border-primary-500 @error('message') border-red-500 @enderror"
                                    placeholder="How can we help you?">{{ old('message') }}</textarea>
                                @error('message')
                                    <p class="mt-1 text-sm text-red-500">{{ $message }}</p>
                                @enderror
                            </div>

                            <button type="submit" class="w-full inline-flex items-center justify-center gap-2 px-8 py-4 bg-primary-600 text-white font-semibold rounded-xl hover:bg-primary-700 transition-all hover:shadow-lg hover:shadow-primary-600/25">
                                Send Message
                                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M14 5l7 7m0 0l-7 7m7-7H3"/>
                                </svg>
                            </button>
                        </form>
                    </div>
                </div>

                <!-- Contact Info & Trade CTA -->
                <div class="lg:w-96 space-y-6">
<!-- Email -->
                    <div class="bg-white rounded-2xl border border-slate-200 p-6">
                        <div class="flex items-start gap-4">
                            <div class="w-12 h-12 bg-primary-100 rounded-xl flex items-center justify-center flex-shrink-0">
                                <svg class="w-6 h-6 text-primary-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z"/>
                                </svg>
                            </div>
                            <div>
                                <h3 class="font-semibold text-secondary-900 mb-1">Email</h3>
                                <a href="mailto:sales@blindpoint.co.uk" class="text-primary-600 hover:text-primary-700 font-medium">sales@blindpoint.co.uk</a>
                                <p class="text-sm text-slate-500 mt-1">We reply within 24 hours</p>
                            </div>
                        </div>
                    </div>
<!-- Trade Account CTA -->
                    <div class="relative overflow-hidden rounded-2xl bg-secondary-900 p-6 text-white shadow-xl shadow-secondary-900/20 ring-1 ring-white/10">
                        <!-- Subtle background fade (intentional) -->
                        <div class="absolute inset-0 bg-gradient-to-br from-white/10 via-transparent to-transparent pointer-events-none"></div>
                        <div class="absolute -right-20 -bottom-20 w-80 h-80 rounded-full bg-primary-600/20 blur-3xl pointer-events-none"></div>

                        <div class="relative">
                            <div class="w-12 h-12 bg-white/10 rounded-xl flex items-center justify-center mb-4">
                                <svg class="w-6 h-6 text-white/90" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M19 21V5a2 2 0 00-2-2H7a2 2 0 00-2 2v16m14 0h2m-2 0h-5m-9 0H3m2 0h5M9 7h1m-1 4h1m4-4h1m-1 4h1m-5 10v-5a1 1 0 011-1h2a1 1 0 011 1v5m-4 0h4"/>
                                </svg>
                            </div>
                            <h3 class="font-bold text-lg mb-2">Trade Account</h3>
                            <p class="text-white/75 text-sm mb-4">
                                Get 15% off all orders, 30-day payment terms, and dedicated support.
                            </p>
                            <a href="{{ route('trade.register') }}" class="inline-flex items-center gap-2 text-sm font-semibold text-primary-300 hover:text-primary-200 transition-colors">
                                Apply Now
                                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 8l4 4m0 0l-4 4m4-4H3"/>
                                </svg>
                            </a>
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </section>

    <!-- FAQ Section -->
    <section class="py-16 lg:py-24 bg-white">
        <div class="max-w-3xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="text-center mb-12">
                <h2 class="text-3xl font-bold text-secondary-900 mb-4">Frequently Asked Questions</h2>
                <p class="text-slate-600">Quick answers to common questions about our products and services.</p>
            </div>

            <div class="space-y-4">
                <!-- FAQ 1 -->
                <div class="bg-slate-50 rounded-2xl border border-slate-200 overflow-hidden">
                    <button type="button" class="faq-trigger w-full flex items-center justify-between p-6 text-left" data-target="faq-1">
                        <span class="font-semibold text-secondary-900">What fire rating do your blinds have?</span>
                        <svg class="faq-icon w-5 h-5 text-slate-500 transition-transform flex-shrink-0 ml-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"/>
                        </svg>
                    </button>
                    <div id="faq-1" class="faq-content hidden px-6 pb-6">
                        <p class="text-slate-600">
                            All our roller blinds are certified to BS 5867-2:2008 Type B, which is the standard required for blinds in schools, care homes, hospitals, and commercial buildings. Fire certificates are available for download on each product page and in our compliance section.
                        </p>
                    </div>
                </div>

                <!-- FAQ 2 -->
                <div class="bg-slate-50 rounded-2xl border border-slate-200 overflow-hidden">
                    <button type="button" class="faq-trigger w-full flex items-center justify-between p-6 text-left" data-target="faq-2">
                        <span class="font-semibold text-secondary-900">Do you offer trade discounts?</span>
                        <svg class="faq-icon w-5 h-5 text-slate-500 transition-transform flex-shrink-0 ml-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"/>
                        </svg>
                    </button>
                    <div id="faq-2" class="faq-content hidden px-6 pb-6">
                        <p class="text-slate-600">
                            Yes! Trade accounts receive 15% off all orders as standard, with higher discounts available for volume purchases. Trade accounts also benefit from 30-day payment terms and a dedicated account manager. Apply for a trade account online and we'll review your application within 24 hours.
                        </p>
                    </div>
                </div>

                <!-- FAQ 3 -->
                <div class="bg-slate-50 rounded-2xl border border-slate-200 overflow-hidden">
                    <button type="button" class="faq-trigger w-full flex items-center justify-between p-6 text-left" data-target="faq-3">
                        <span class="font-semibold text-secondary-900">What's your delivery time?</span>
                        <svg class="faq-icon w-5 h-5 text-slate-500 transition-transform flex-shrink-0 ml-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"/>
                        </svg>
                    </button>
                    <div id="faq-3" class="faq-content hidden px-6 pb-6">
                        <p class="text-slate-600">
                            Orders placed before 2pm are dispatched the same day. Standard delivery takes 2-3 working days. We offer free delivery on orders over £150. Express next-day delivery is available for an additional charge. You'll receive tracking information by email once your order is dispatched.
                        </p>
                    </div>
                </div>

                <!-- FAQ 4 -->
                <div class="bg-slate-50 rounded-2xl border border-slate-200 overflow-hidden">
                    <button type="button" class="faq-trigger w-full flex items-center justify-between p-6 text-left" data-target="faq-4">
                        <span class="font-semibold text-secondary-900">Are your blinds child-safe?</span>
                        <svg class="faq-icon w-5 h-5 text-slate-500 transition-transform flex-shrink-0 ml-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"/>
                        </svg>
                    </button>
                    <div id="faq-4" class="faq-content hidden px-6 pb-6">
                        <p class="text-slate-600">
                            Yes, all our blinds comply with EN 13120 child safety regulations. Chain-operated blinds include safety devices such as chain tensioners and breakaway connectors to prevent entanglement. We also offer motorised options for environments where cord-free operation is required.
                        </p>
                    </div>
                </div>

                <!-- FAQ 5 -->
                <div class="bg-slate-50 rounded-2xl border border-slate-200 overflow-hidden">
                    <button type="button" class="faq-trigger w-full flex items-center justify-between p-6 text-left" data-target="faq-5">
                        <span class="font-semibold text-secondary-900">Can you provide documentation for tenders?</span>
                        <svg class="faq-icon w-5 h-5 text-slate-500 transition-transform flex-shrink-0 ml-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"/>
                        </svg>
                    </button>
                    <div id="faq-5" class="faq-content hidden px-6 pb-6">
                        <p class="text-slate-600">
                            Absolutely. We can provide comprehensive tender documentation including fire certificates, material specifications, child safety compliance, method statements, and COSHH data sheets. Contact our trade team with your specific requirements and we'll prepare a documentation pack for your tender.
                        </p>
                    </div>
                </div>

                <!-- FAQ 6 -->
                <div class="bg-slate-50 rounded-2xl border border-slate-200 overflow-hidden">
                    <button type="button" class="faq-trigger w-full flex items-center justify-between p-6 text-left" data-target="faq-6">
                        <span class="font-semibold text-secondary-900">Do you offer installation services?</span>
                        <svg class="faq-icon w-5 h-5 text-slate-500 transition-transform flex-shrink-0 ml-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"/>
                        </svg>
                    </button>
                    <div id="faq-6" class="faq-content hidden px-6 pb-6">
                        <p class="text-slate-600">
                            While we don't provide direct installation services, our blinds are designed for easy fitting by competent installers. We provide detailed fitting instructions with every order, and our team is available by phone to assist with any installation queries. We can also recommend approved installers in your area.
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <script>
        // FAQ accordion functionality
        document.querySelectorAll('.faq-trigger').forEach(trigger => {
            trigger.addEventListener('click', function() {
                const targetId = this.getAttribute('data-target');
                const content = document.getElementById(targetId);
                const icon = this.querySelector('.faq-icon');
                
                // Close all other FAQs
                document.querySelectorAll('.faq-content').forEach(el => {
                    if (el.id !== targetId) {
                        el.classList.add('hidden');
                    }
                });
                document.querySelectorAll('.faq-icon').forEach(el => {
                    if (el !== icon) {
                        el.classList.remove('rotate-180');
                    }
                });
                
                // Toggle current FAQ
                content.classList.toggle('hidden');
                icon.classList.toggle('rotate-180');
            });
        });
    </script>
</x-layouts.app>
