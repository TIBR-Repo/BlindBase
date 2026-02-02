<x-layouts.app>
    <section class="min-h-[80vh] bg-slate-50 py-16 lg:py-24 flex items-center">
        <div class="max-w-md mx-auto px-4 sm:px-6 lg:px-8 w-full">
            <!-- Logo/Header -->
            <div class="text-center mb-8">
                <a href="{{ route('home') }}" class="inline-block mb-4">
                    <span class="text-2xl font-bold">
                        <span class="text-secondary-900">BLIND</span><span class="text-primary-600">BASE</span>
                    </span>
                </a>
                <h1 class="text-2xl font-bold text-secondary-900">Trade Account Login</h1>
                <p class="text-slate-600 mt-2">Access your trade account for exclusive pricing</p>
            </div>

            @if(session('success'))
                <div class="mb-6 p-4 bg-green-50 border border-green-200 rounded-xl">
                    <div class="flex items-center gap-3">
                        <svg class="w-5 h-5 text-green-500" fill="currentColor" viewBox="0 0 20 20">
                            <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd"/>
                        </svg>
                        <span class="text-green-700 font-medium">{{ session('success') }}</span>
                    </div>
                </div>
            @endif

            <!-- Login Card -->
            <div class="bg-white rounded-2xl border border-slate-200 p-8 shadow-sm">
                <form action="{{ route('trade.login') }}" method="POST" class="space-y-6">
                    @csrf

                    <div>
                        <label for="email" class="block text-sm font-medium text-secondary-900 mb-2">Email Address</label>
                        <input type="email" name="email" id="email" value="{{ old('email') }}" required autofocus
                            class="w-full px-4 py-3 border border-slate-200 rounded-xl focus:ring-2 focus:ring-primary-500 focus:border-primary-500 @error('email') border-red-500 @enderror"
                            placeholder="you@company.com">
                        @error('email')
                            <p class="mt-2 text-sm text-red-500">{{ $message }}</p>
                        @enderror
                    </div>

                    <div>
                        <label for="password" class="block text-sm font-medium text-secondary-900 mb-2">Password</label>
                        <input type="password" name="password" id="password" required
                            class="w-full px-4 py-3 border border-slate-200 rounded-xl focus:ring-2 focus:ring-primary-500 focus:border-primary-500"
                            placeholder="Enter your password">
                    </div>

                    <div class="flex items-center justify-between">
                        <label class="flex items-center gap-2 cursor-pointer">
                            <input type="checkbox" name="remember" value="1"
                                class="w-4 h-4 text-primary-600 border-slate-300 rounded focus:ring-primary-500">
                            <span class="text-sm text-slate-600">Remember me</span>
                        </label>

                        <a href="#" class="text-sm text-primary-600 hover:underline">Forgot password?</a>
                    </div>

                    <button type="submit" class="w-full inline-flex items-center justify-center gap-2 px-8 py-4 bg-primary-600 text-white font-semibold rounded-xl hover:bg-primary-700 transition-all hover:shadow-lg hover:shadow-primary-600/25">
                        Log In
                        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 16l-4-4m0 0l4-4m-4 4h14m-5 4v1a3 3 0 01-3 3H6a3 3 0 01-3-3V7a3 3 0 013-3h7a3 3 0 013 3v1"/>
                        </svg>
                    </button>
                </form>
            </div>

            <!-- Register Link -->
            <div class="mt-8 text-center">
                <p class="text-slate-600">
                    Don't have a trade account?
                </p>
                <a href="{{ route('trade.register') }}" class="inline-flex items-center gap-2 mt-2 text-primary-600 hover:underline font-medium">
                    Apply for a Trade Account
                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 8l4 4m0 0l-4 4m4-4H3"/>
                    </svg>
                </a>
            </div>

            <!-- Benefits Reminder -->
            <div class="mt-8 p-6 bg-secondary-900 rounded-xl text-white">
                <h3 class="font-bold mb-3">Trade Account Benefits</h3>
                <ul class="space-y-2 text-sm text-slate-300">
                    <li class="flex items-center gap-2">
                        <svg class="w-4 h-4 text-primary-400" fill="currentColor" viewBox="0 0 20 20">
                            <path fill-rule="evenodd" d="M16.707 5.293a1 1 0 010 1.414l-8 8a1 1 0 01-1.414 0l-4-4a1 1 0 011.414-1.414L8 12.586l7.293-7.293a1 1 0 011.414 0z" clip-rule="evenodd"/>
                        </svg>
                        15% off all orders
                    </li>
                    <li class="flex items-center gap-2">
                        <svg class="w-4 h-4 text-primary-400" fill="currentColor" viewBox="0 0 20 20">
                            <path fill-rule="evenodd" d="M16.707 5.293a1 1 0 010 1.414l-8 8a1 1 0 01-1.414 0l-4-4a1 1 0 011.414-1.414L8 12.586l7.293-7.293a1 1 0 011.414 0z" clip-rule="evenodd"/>
                        </svg>
                        30-day payment terms
                    </li>
                    <li class="flex items-center gap-2">
                        <svg class="w-4 h-4 text-primary-400" fill="currentColor" viewBox="0 0 20 20">
                            <path fill-rule="evenodd" d="M16.707 5.293a1 1 0 010 1.414l-8 8a1 1 0 01-1.414 0l-4-4a1 1 0 011.414-1.414L8 12.586l7.293-7.293a1 1 0 011.414 0z" clip-rule="evenodd"/>
                        </svg>
                        VAT invoices & statements
                    </li>
                    <li class="flex items-center gap-2">
                        <svg class="w-4 h-4 text-primary-400" fill="currentColor" viewBox="0 0 20 20">
                            <path fill-rule="evenodd" d="M16.707 5.293a1 1 0 010 1.414l-8 8a1 1 0 01-1.414 0l-4-4a1 1 0 011.414-1.414L8 12.586l7.293-7.293a1 1 0 011.414 0z" clip-rule="evenodd"/>
                        </svg>
                        Dedicated account manager
                    </li>
                </ul>
            </div>
        </div>
    </section>
</x-layouts.app>
