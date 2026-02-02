<x-layouts.app>
    <!-- Page Header -->
    <section class="bg-secondary-900 py-8">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <nav class="flex items-center gap-2 text-sm text-slate-400 mb-4">
                <a href="{{ route('home') }}" class="hover:text-white transition-colors">Home</a>
                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"/>
                </svg>
                <a href="{{ route('cart.index') }}" class="hover:text-white transition-colors">Cart</a>
                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"/>
                </svg>
                <span class="text-white">Checkout</span>
            </nav>
            <h1 class="text-3xl font-bold text-white">Checkout</h1>
        </div>
    </section>

    <section class="py-8 lg:py-12 bg-slate-50">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            @if(session('error'))
                <div class="mb-6 p-4 bg-red-50 border border-red-200 rounded-xl">
                    <div class="flex items-center gap-3">
                        <svg class="w-5 h-5 text-red-500" fill="currentColor" viewBox="0 0 20 20">
                            <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zM8.707 7.293a1 1 0 00-1.414 1.414L8.586 10l-1.293 1.293a1 1 0 101.414 1.414L10 11.414l1.293 1.293a1 1 0 001.414-1.414L11.414 10l1.293-1.293a1 1 0 00-1.414-1.414L10 8.586 8.707 7.293z" clip-rule="evenodd"/>
                        </svg>
                        <span class="text-red-700 font-medium">{{ session('error') }}</span>
                    </div>
                </div>
            @endif

            <form action="{{ route('checkout.process') }}" method="POST">
                @csrf
                
                <div class="flex flex-col lg:flex-row gap-8">
                    <!-- Checkout Form -->
                    <div class="flex-1 space-y-6">
                        <!-- Contact Details -->
                        <div class="bg-white rounded-2xl border border-slate-200 p-6">
                            <h2 class="text-lg font-bold text-secondary-900 mb-4 flex items-center gap-2">
                                <span class="w-8 h-8 bg-primary-600 text-white rounded-full flex items-center justify-center text-sm font-bold">1</span>
                                Contact Details
                            </h2>
                            <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                                <div>
                                    <label for="customer_email" class="block text-sm font-medium text-secondary-900 mb-1">Email Address *</label>
                                    <input type="email" name="customer_email" id="customer_email" 
                                        value="{{ old('customer_email', $tradeAccount?->email) }}" 
                                        required
                                        class="w-full px-4 py-3 border border-slate-200 rounded-xl focus:ring-2 focus:ring-primary-500 focus:border-primary-500 @error('customer_email') border-red-500 @enderror">
                                    @error('customer_email')
                                        <p class="mt-1 text-sm text-red-500">{{ $message }}</p>
                                    @enderror
                                </div>
                                <div>
                                    <label for="customer_phone" class="block text-sm font-medium text-secondary-900 mb-1">Phone Number</label>
                                    <input type="tel" name="customer_phone" id="customer_phone" 
                                        value="{{ old('customer_phone', $tradeAccount?->phone) }}"
                                        class="w-full px-4 py-3 border border-slate-200 rounded-xl focus:ring-2 focus:ring-primary-500 focus:border-primary-500">
                                </div>
                            </div>
                        </div>

                        <!-- Delivery Address -->
                        <div class="bg-white rounded-2xl border border-slate-200 p-6">
                            <h2 class="text-lg font-bold text-secondary-900 mb-4 flex items-center gap-2">
                                <span class="w-8 h-8 bg-primary-600 text-white rounded-full flex items-center justify-center text-sm font-bold">2</span>
                                Delivery Address
                            </h2>
                            <div class="space-y-4">
                                <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                                    <div>
                                        <label for="customer_name" class="block text-sm font-medium text-secondary-900 mb-1">Full Name *</label>
                                        <input type="text" name="customer_name" id="customer_name" 
                                            value="{{ old('customer_name', $tradeAccount?->contact_name) }}" 
                                            required
                                            class="w-full px-4 py-3 border border-slate-200 rounded-xl focus:ring-2 focus:ring-primary-500 focus:border-primary-500 @error('customer_name') border-red-500 @enderror">
                                        @error('customer_name')
                                            <p class="mt-1 text-sm text-red-500">{{ $message }}</p>
                                        @enderror
                                    </div>
                                    <div>
                                        <label for="company_name" class="block text-sm font-medium text-secondary-900 mb-1">Company Name</label>
                                        <input type="text" name="company_name" id="company_name" 
                                            value="{{ old('company_name', $tradeAccount?->company_name) }}"
                                            class="w-full px-4 py-3 border border-slate-200 rounded-xl focus:ring-2 focus:ring-primary-500 focus:border-primary-500">
                                    </div>
                                </div>
                                <div>
                                    <label for="delivery_address" class="block text-sm font-medium text-secondary-900 mb-1">Address *</label>
                                    <input type="text" name="delivery_address" id="delivery_address" 
                                        value="{{ old('delivery_address', $tradeAccount?->delivery_address) }}" 
                                        required
                                        class="w-full px-4 py-3 border border-slate-200 rounded-xl focus:ring-2 focus:ring-primary-500 focus:border-primary-500 @error('delivery_address') border-red-500 @enderror">
                                    @error('delivery_address')
                                        <p class="mt-1 text-sm text-red-500">{{ $message }}</p>
                                    @enderror
                                </div>
                                <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                                    <div>
                                        <label for="delivery_city" class="block text-sm font-medium text-secondary-900 mb-1">City *</label>
                                        <input type="text" name="delivery_city" id="delivery_city" 
                                            value="{{ old('delivery_city', $tradeAccount?->delivery_city) }}" 
                                            required
                                            class="w-full px-4 py-3 border border-slate-200 rounded-xl focus:ring-2 focus:ring-primary-500 focus:border-primary-500 @error('delivery_city') border-red-500 @enderror">
                                        @error('delivery_city')
                                            <p class="mt-1 text-sm text-red-500">{{ $message }}</p>
                                        @enderror
                                    </div>
                                    <div>
                                        <label for="delivery_postcode" class="block text-sm font-medium text-secondary-900 mb-1">Postcode *</label>
                                        <input type="text" name="delivery_postcode" id="delivery_postcode" 
                                            value="{{ old('delivery_postcode', $tradeAccount?->delivery_postcode) }}" 
                                            required
                                            class="w-full px-4 py-3 border border-slate-200 rounded-xl focus:ring-2 focus:ring-primary-500 focus:border-primary-500 @error('delivery_postcode') border-red-500 @enderror">
                                        @error('delivery_postcode')
                                            <p class="mt-1 text-sm text-red-500">{{ $message }}</p>
                                        @enderror
                                    </div>
                                </div>
                                <div>
                                    <label for="delivery_instructions" class="block text-sm font-medium text-secondary-900 mb-1">Delivery Instructions</label>
                                    <textarea name="delivery_instructions" id="delivery_instructions" rows="2" 
                                        placeholder="e.g., Leave at reception, call on arrival..."
                                        class="w-full px-4 py-3 border border-slate-200 rounded-xl focus:ring-2 focus:ring-primary-500 focus:border-primary-500">{{ old('delivery_instructions') }}</textarea>
                                </div>
                            </div>
                        </div>

                        <!-- Billing Address -->
                        <div class="bg-white rounded-2xl border border-slate-200 p-6">
                            <h2 class="text-lg font-bold text-secondary-900 mb-4 flex items-center gap-2">
                                <span class="w-8 h-8 bg-primary-600 text-white rounded-full flex items-center justify-center text-sm font-bold">3</span>
                                Billing Address
                            </h2>
                            
                            <label class="flex items-center gap-3 cursor-pointer mb-4">
                                <input type="checkbox" name="same_as_delivery" id="same_as_delivery" value="1" 
                                    {{ old('same_as_delivery', true) ? 'checked' : '' }}
                                    class="w-5 h-5 rounded border-slate-300 text-primary-600 focus:ring-primary-500">
                                <span class="text-sm text-secondary-700">Same as delivery address</span>
                            </label>

                            <div id="billing-fields" class="space-y-4 {{ old('same_as_delivery', true) ? 'hidden' : '' }}">
                                <div>
                                    <label for="billing_address" class="block text-sm font-medium text-secondary-900 mb-1">Address</label>
                                    <input type="text" name="billing_address" id="billing_address" 
                                        value="{{ old('billing_address') }}"
                                        class="w-full px-4 py-3 border border-slate-200 rounded-xl focus:ring-2 focus:ring-primary-500 focus:border-primary-500">
                                </div>
                                <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                                    <div>
                                        <label for="billing_city" class="block text-sm font-medium text-secondary-900 mb-1">City</label>
                                        <input type="text" name="billing_city" id="billing_city" 
                                            value="{{ old('billing_city') }}"
                                            class="w-full px-4 py-3 border border-slate-200 rounded-xl focus:ring-2 focus:ring-primary-500 focus:border-primary-500">
                                    </div>
                                    <div>
                                        <label for="billing_postcode" class="block text-sm font-medium text-secondary-900 mb-1">Postcode</label>
                                        <input type="text" name="billing_postcode" id="billing_postcode" 
                                            value="{{ old('billing_postcode') }}"
                                            class="w-full px-4 py-3 border border-slate-200 rounded-xl focus:ring-2 focus:ring-primary-500 focus:border-primary-500">
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- Payment -->
                        <div class="bg-white rounded-2xl border border-slate-200 p-6">
                            <h2 class="text-lg font-bold text-secondary-900 mb-4 flex items-center gap-2">
                                <span class="w-8 h-8 bg-primary-600 text-white rounded-full flex items-center justify-center text-sm font-bold">4</span>
                                Payment
                            </h2>
                            
                            <div class="bg-slate-50 rounded-xl p-4">
                                <div class="flex items-center gap-4 mb-3">
                                    <svg class="w-10 h-10" viewBox="0 0 60 25" fill="none" xmlns="http://www.w3.org/2000/svg">
                                        <path d="M59.64 14.28C59.64 17.14 57.31 18.65 54.07 18.65C51.72 18.65 49.74 17.93 48.45 17.05V13.7C49.85 14.78 51.8 15.69 54.07 15.69C55.43 15.69 56.43 15.28 56.43 14.28C56.43 12.89 54.55 12.55 52.64 11.99C50.03 11.23 47.89 10.24 47.89 7.37C47.89 4.15 50.52 2.85 53.66 2.85C55.82 2.85 57.67 3.44 58.99 4.18V7.53C57.49 6.57 55.72 5.83 53.66 5.83C52.17 5.83 51.22 6.24 51.22 7.17C51.22 8.37 52.78 8.71 54.53 9.24C57.41 10.1 59.64 11.16 59.64 14.28Z" fill="#635BFF"/>
                                        <path d="M45.08 18.42H41.75V3.08H45.08V18.42Z" fill="#635BFF"/>
                                        <path d="M38.78 10.75C38.78 6.5 36.17 2.85 31.3 2.85C26.37 2.85 23.24 6.57 23.24 10.82C23.24 15.9 26.93 18.65 31.5 18.65C33.76 18.65 35.88 18.13 37.51 17.19V14.16C35.95 15.04 34.05 15.56 31.78 15.56C29.46 15.56 27.55 14.71 27.21 12.28H38.71C38.75 11.96 38.78 11.31 38.78 10.75ZM27.14 9.6C27.38 7.64 28.79 6.04 31.23 6.04C33.56 6.04 34.97 7.57 35.14 9.6H27.14Z" fill="#635BFF"/>
                                        <path d="M19.79 6.5V3.08H17.7C15.14 3.08 13.94 4.24 13.94 6.09V6.7H11.58V9.67H13.94V18.42H17.27V9.67H19.79V6.7H17.27V6.36C17.27 5.67 17.67 5.24 18.36 5.24C18.73 5.24 19.16 5.31 19.79 5.47V6.5Z" fill="#635BFF"/>
                                        <path d="M8.99 18.42H5.66V3.08H8.99V18.42Z" fill="#635BFF"/>
                                        <path d="M4.45 6.5V3.08H2.36C-0.2 3.08 -1.4 4.24 -1.4 6.09V6.7H-3.76V9.67H-1.4V18.42H1.93V9.67H4.45V6.7H1.93V6.36C1.93 5.67 2.33 5.24 3.02 5.24C3.39 5.24 3.82 5.31 4.45 5.47V6.5Z" fill="#635BFF"/>
                                    </svg>
                                    <div>
                                        <span class="font-semibold text-secondary-900 block">Secure Payment</span>
                                        <span class="text-sm text-slate-500">Powered by Stripe</span>
                                    </div>
                                </div>
                                <p class="text-sm text-slate-600">
                                    You'll be redirected to Stripe's secure payment page to complete your purchase. We accept all major credit and debit cards.
                                </p>
                            </div>

                            <div class="flex items-center gap-4 mt-4">
                                <img src="https://upload.wikimedia.org/wikipedia/commons/thumb/5/5e/Visa_Inc._logo.svg/100px-Visa_Inc._logo.svg.png" alt="Visa" class="h-6">
                                <img src="https://upload.wikimedia.org/wikipedia/commons/thumb/a/a4/Mastercard_2019_logo.svg/100px-Mastercard_2019_logo.svg.png" alt="Mastercard" class="h-6">
                                <img src="https://upload.wikimedia.org/wikipedia/commons/thumb/f/fa/American_Express_logo_%282018%29.svg/100px-American_Express_logo_%282018%29.svg.png" alt="American Express" class="h-6">
                            </div>
                        </div>
                    </div>

                    <!-- Order Summary -->
                    <div class="lg:w-96">
                        <div class="bg-white rounded-2xl border border-slate-200 overflow-hidden sticky top-28">
                            <div class="p-6 border-b border-slate-200">
                                <h2 class="text-lg font-bold text-secondary-900">Order Summary</h2>
                            </div>

                            <!-- Items -->
                            <div class="max-h-64 overflow-y-auto">
                                @foreach($cartItems as $item)
                                    <div class="flex gap-4 p-4 border-b border-slate-100">
                                        <div class="w-16 h-16 bg-gradient-to-br from-slate-100 to-slate-200 rounded-lg overflow-hidden flex-shrink-0">
                                            @if($item['product']->image)
                                                <img src="{{ $item['product']->image }}" alt="{{ $item['product']->name }}" class="w-full h-full object-cover">
                                            @else
                                                <div class="w-full h-full flex items-center justify-center">
                                                    <svg class="w-6 h-6 text-slate-300" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1" d="M4 5a1 1 0 011-1h14a1 1 0 011 1v2a1 1 0 01-1 1H5a1 1 0 01-1-1V5z"/>
                                                    </svg>
                                                </div>
                                            @endif
                                        </div>
                                        <div class="flex-1 min-w-0">
                                            <p class="text-sm font-medium text-secondary-900 truncate">{{ $item['product']->name }}</p>
                                            <p class="text-xs text-slate-500 mt-1">
                                                @if($item['size']){{ $item['size'] }}@endif
                                                @if($item['size'] && $item['colour']) / @endif
                                                @if($item['colour']){{ $item['colour'] }}@endif
                                            </p>
                                            <p class="text-xs text-slate-500">Qty: {{ $item['quantity'] }}</p>
                                        </div>
                                        <span class="text-sm font-semibold text-secondary-900">£{{ number_format($item['line_total'], 2) }}</span>
                                    </div>
                                @endforeach
                            </div>

                            <!-- Totals -->
                            <div class="p-6 space-y-3">
                                <div class="flex justify-between text-sm">
                                    <span class="text-slate-600">Subtotal (ex VAT)</span>
                                    <span class="font-medium text-secondary-900">£{{ number_format($totals['subtotal'], 2) }}</span>
                                </div>
                                <div class="flex justify-between text-sm">
                                    <span class="text-slate-600">Delivery</span>
                                    @if($totals['shipping'] == 0)
                                        <span class="font-medium text-green-600">FREE</span>
                                    @else
                                        <span class="font-medium text-secondary-900">£{{ number_format($totals['shipping'], 2) }}</span>
                                    @endif
                                </div>
                                <div class="flex justify-between text-sm">
                                    <span class="text-slate-600">VAT (20%)</span>
                                    <span class="font-medium text-secondary-900">£{{ number_format($totals['vat'], 2) }}</span>
                                </div>
                                <div class="flex justify-between pt-3 border-t border-slate-200">
                                    <span class="font-bold text-secondary-900">Total</span>
                                    <span class="font-bold text-2xl text-secondary-900">£{{ number_format($totals['total'], 2) }}</span>
                                </div>
                            </div>

                            <!-- Submit Button -->
                            <div class="p-6 pt-0">
                                <button type="submit" class="w-full inline-flex items-center justify-center gap-2 px-6 py-4 bg-primary-600 text-white font-semibold rounded-xl hover:bg-primary-700 transition-all hover:shadow-lg hover:shadow-primary-600/25">
                                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 15v2m-6 4h12a2 2 0 002-2v-6a2 2 0 00-2-2H6a2 2 0 00-2 2v6a2 2 0 002 2zm10-10V7a4 4 0 00-8 0v4h8z"/>
                                    </svg>
                                    Pay £{{ number_format($totals['total'], 2) }}
                                </button>
                            </div>

                            <!-- Back Link -->
                            <div class="px-6 pb-6">
                                <a href="{{ route('cart.index') }}" class="flex items-center justify-center gap-2 text-sm text-slate-500 hover:text-primary-600 transition-colors">
                                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 19l-7-7m0 0l7-7m-7 7h18"/>
                                    </svg>
                                    Back to Cart
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </section>

    <script>
        // Toggle billing address fields
        document.getElementById('same_as_delivery').addEventListener('change', function() {
            document.getElementById('billing-fields').classList.toggle('hidden', this.checked);
        });
    </script>
</x-layouts.app>
