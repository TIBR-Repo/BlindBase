<x-layouts.app>
    <section class="min-h-[80vh] bg-slate-50 py-16 lg:py-24 flex items-center">
        <div class="max-w-lg mx-auto px-4 sm:px-6 lg:px-8 w-full text-center">
            <!-- Icon -->
            <div class="w-20 h-20 bg-amber-100 rounded-full flex items-center justify-center mx-auto mb-6">
                <svg class="w-10 h-10 text-amber-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z"/>
                </svg>
            </div>

            <h1 class="text-3xl font-bold text-secondary-900 mb-4">Application Pending</h1>
            <p class="text-lg text-slate-600 mb-8">
                Your trade account application is currently being reviewed by our team. We typically process applications within 24-48 hours.
            </p>

            <!-- Status Card -->
            <div class="bg-white rounded-2xl border border-slate-200 p-6 mb-8 text-left">
                <h2 class="font-semibold text-secondary-900 mb-4">What happens next?</h2>
                <ul class="space-y-4">
                    <li class="flex items-start gap-3">
                        <div class="w-6 h-6 bg-green-100 rounded-full flex items-center justify-center flex-shrink-0 mt-0.5">
                            <svg class="w-4 h-4 text-green-600" fill="currentColor" viewBox="0 0 20 20">
                                <path fill-rule="evenodd" d="M16.707 5.293a1 1 0 010 1.414l-8 8a1 1 0 01-1.414 0l-4-4a1 1 0 011.414-1.414L8 12.586l7.293-7.293a1 1 0 011.414 0z" clip-rule="evenodd"/>
                            </svg>
                        </div>
                        <div>
                            <p class="font-medium text-secondary-900">Application Submitted</p>
                            <p class="text-sm text-slate-500">Your application has been received</p>
                        </div>
                    </li>
                    <li class="flex items-start gap-3">
                        <div class="w-6 h-6 bg-amber-100 rounded-full flex items-center justify-center flex-shrink-0 mt-0.5">
                            <div class="w-2 h-2 bg-amber-500 rounded-full animate-pulse"></div>
                        </div>
                        <div>
                            <p class="font-medium text-secondary-900">Under Review</p>
                            <p class="text-sm text-slate-500">Our team is reviewing your details</p>
                        </div>
                    </li>
                    <li class="flex items-start gap-3">
                        <div class="w-6 h-6 bg-slate-100 rounded-full flex items-center justify-center flex-shrink-0 mt-0.5">
                            <span class="text-xs text-slate-400 font-bold">3</span>
                        </div>
                        <div>
                            <p class="font-medium text-slate-400">Approval</p>
                            <p class="text-sm text-slate-400">You'll receive an email once approved</p>
                        </div>
                    </li>
                </ul>
            </div>

            <!-- Contact Info -->
            <div class="bg-slate-100 rounded-xl p-4 mb-8">
                <p class="text-sm text-slate-600">
                    Need help? <a href="{{ route('contact') }}" class="text-primary-600 font-medium">Contact us</a>
                </p>
            </div>

            <!-- Actions -->
            <div class="flex flex-col sm:flex-row gap-4 justify-center">
                <a href="{{ route('home') }}" class="inline-flex items-center justify-center gap-2 px-6 py-3 bg-primary-600 text-white font-semibold rounded-xl hover:bg-primary-700 transition-all">
                    Continue Shopping
                </a>
                <a href="{{ route('contact') }}" class="inline-flex items-center justify-center gap-2 px-6 py-3 bg-white text-secondary-900 font-semibold rounded-xl border border-slate-200 hover:bg-slate-50 transition-all">
                    Contact Us
                </a>
            </div>
        </div>
    </section>
</x-layouts.app>
