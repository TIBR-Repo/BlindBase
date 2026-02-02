<x-layouts.app>
    <!-- Page Header -->
    <section class="bg-secondary-900 py-12">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <nav class="flex items-center gap-2 text-sm text-slate-400 mb-4">
                <a href="{{ route('home') }}" class="hover:text-white transition-colors">Home</a>
                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"/>
                </svg>
                <span class="text-white">Shopping Cart</span>
            </nav>
            <h1 class="text-3xl lg:text-4xl font-bold text-white">Shopping Cart</h1>
        </div>
    </section>

    <section class="py-8 lg:py-12 bg-slate-50">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
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

            @if(count($cartItems) > 0)
                @if(auth('trade')->check() && auth('trade')->user()->isApproved())
                    <div class="mb-6 p-4 bg-green-50 border border-green-200 rounded-xl">
                        <div class="flex items-center gap-3">
                            <svg class="w-5 h-5 text-green-500" fill="currentColor" viewBox="0 0 20 20">
                                <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd"/>
                            </svg>
                            <span class="text-green-700 font-medium">
                                Trade discount applied! You're saving {{ auth('trade')->user()->discount_percent }}% on this order.
                            </span>
                        </div>
                    </div>
                @elseif(!auth('trade')->check())
                    <div class="mb-6 p-4 bg-secondary-900 rounded-xl">
                        <div class="flex items-center justify-between flex-wrap gap-4">
                            <div class="flex items-center gap-3">
                                <svg class="w-5 h-5 text-primary-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8c-1.657 0-3 .895-3 2s1.343 2 3 2 3 .895 3 2-1.343 2-3 2m0-8c1.11 0 2.08.402 2.599 1M12 8V7m0 1v8m0 0v1m0-1c-1.11 0-2.08-.402-2.599-1M21 12a9 9 0 11-18 0 9 9 0 0118 0z"/>
                                </svg>
                                <span class="text-white font-medium">Trade account holders get 15% off this order</span>
                            </div>
                            <a href="{{ route('trade.login') }}" class="text-sm text-primary-400 hover:text-primary-300 font-medium">
                                Log in or Apply →
                            </a>
                        </div>
                    </div>
                @endif

                <div class="flex flex-col lg:flex-row gap-8">
                    <!-- Cart Items -->
                    <div class="flex-1">
                        <!-- Free Shipping Progress -->
                        @if(!$totals['qualifies_for_free_shipping'])
                            <div class="mb-6 p-4 bg-primary-50 border border-primary-200 rounded-xl">
                                <div class="flex items-center gap-3 mb-2">
                                    <svg class="w-5 h-5 text-primary-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 8h14M5 8a2 2 0 110-4h14a2 2 0 110 4M5 8v10a2 2 0 002 2h10a2 2 0 002-2V8m-9 4h4"/>
                                    </svg>
                                    <span class="text-primary-700 font-medium">
                                        Add <strong>£{{ number_format($totals['amount_to_free_shipping'], 2) }}</strong> more for FREE delivery!
                                    </span>
                                </div>
                                <div class="w-full bg-primary-200 rounded-full h-2">
                                    @php
                                        $progress = min(100, ($totals['subtotal'] / $totals['free_shipping_threshold']) * 100);
                                    @endphp
                                    <div class="bg-primary-600 h-2 rounded-full transition-all" style="width: {{ $progress }}%"></div>
                                </div>
                            </div>
                        @else
                            <div class="mb-6 p-4 bg-green-50 border border-green-200 rounded-xl">
                                <div class="flex items-center gap-3">
                                    <svg class="w-5 h-5 text-green-500" fill="currentColor" viewBox="0 0 20 20">
                                        <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd"/>
                                    </svg>
                                    <span class="text-green-700 font-medium">You qualify for FREE delivery!</span>
                                </div>
                            </div>
                        @endif

                        <!-- Cart Table -->
                        <div class="bg-white rounded-2xl border border-slate-200 overflow-hidden">
                            <!-- Desktop Table -->
                            <div class="hidden lg:block">
                                <table class="w-full">
                                    <thead>
                                        <tr class="bg-slate-50 border-b border-slate-200">
                                            <th class="text-left py-4 px-6 text-sm font-semibold text-secondary-900">Product</th>
                                            <th class="text-left py-4 px-4 text-sm font-semibold text-secondary-900">Price</th>
                                            <th class="text-center py-4 px-4 text-sm font-semibold text-secondary-900">Quantity</th>
                                            <th class="text-right py-4 px-4 text-sm font-semibold text-secondary-900">Total</th>
                                            <th class="py-4 px-4 w-12"></th>
                                        </tr>
                                    </thead>
                                    <tbody class="divide-y divide-slate-100">
                                        @foreach($cartItems as $item)
                                            <tr>
                                                <td class="py-4 px-6">
                                                    <div class="flex items-center gap-4">
                                                        <!-- Product Image -->
                                                        <div class="w-20 h-20 bg-gradient-to-br from-slate-100 to-slate-200 rounded-xl overflow-hidden flex-shrink-0">
                                                            @if($item['product']->image)
                                                                <img src="{{ $item['product']->image }}" alt="{{ $item['product']->name }}" class="w-full h-full object-cover">
                                                            @else
                                                                <div class="w-full h-full flex items-center justify-center">
                                                                    <svg class="w-8 h-8 text-slate-300" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1" d="M4 5a1 1 0 011-1h14a1 1 0 011 1v2a1 1 0 01-1 1H5a1 1 0 01-1-1V5z"/>
                                                                    </svg>
                                                                </div>
                                                            @endif
                                                        </div>
                                                        <!-- Product Info -->
                                                        <div>
                                                            <a href="{{ route('shop.show', $item['product']->slug) }}" class="font-semibold text-secondary-900 hover:text-primary-600 transition-colors">
                                                                {{ $item['product']->name }}
                                                            </a>
                                                            <p class="text-sm text-slate-500 mt-1">
                                                                @if($item['size'])
                                                                    Size: {{ $item['size'] }}
                                                                @endif
                                                                @if($item['size'] && $item['colour'])
                                                                    <span class="mx-1">•</span>
                                                                @endif
                                                                @if($item['colour'])
                                                                    Colour: {{ $item['colour'] }}
                                                                @endif
                                                            </p>
                                                            <p class="text-xs text-slate-400 mt-1">SKU: {{ $item['product']->sku }}</p>
                                                        </div>
                                                    </div>
                                                </td>
                                                <td class="py-4 px-4">
                                                    <span class="font-semibold text-secondary-900">£{{ number_format($item['unit_price'], 2) }}</span>
                                                    <span class="text-xs text-slate-500 block">ex VAT</span>
                                                </td>
                                                <td class="py-4 px-4">
                                                    <form action="{{ route('cart.update') }}" method="POST" class="flex items-center justify-center">
                                                        @csrf
                                                        <input type="hidden" name="item_key" value="{{ $item['key'] }}">
                                                        <div class="flex items-center border border-slate-200 rounded-lg overflow-hidden">
                                                            <button type="submit" name="quantity" value="{{ max(0, $item['quantity'] - 1) }}" class="w-8 h-8 flex items-center justify-center text-secondary-700 hover:bg-slate-100 transition-colors">
                                                                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M20 12H4"/>
                                                                </svg>
                                                            </button>
                                                            <input type="number" name="quantity" value="{{ $item['quantity'] }}" min="0" max="{{ $item['product']->stock }}" class="w-12 h-8 text-center text-sm font-semibold text-secondary-900 border-x border-slate-200 focus:outline-none" onchange="this.form.submit()">
                                                            <button type="submit" name="quantity" value="{{ $item['quantity'] + 1 }}" class="w-8 h-8 flex items-center justify-center text-secondary-700 hover:bg-slate-100 transition-colors" {{ $item['quantity'] >= $item['product']->stock ? 'disabled' : '' }}>
                                                                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4"/>
                                                                </svg>
                                                            </button>
                                                        </div>
                                                    </form>
                                                </td>
                                                <td class="py-4 px-4 text-right">
                                                    <span class="font-bold text-secondary-900">£{{ number_format($item['line_total'], 2) }}</span>
                                                </td>
                                                <td class="py-4 px-4">
                                                    <form action="{{ route('cart.remove') }}" method="POST">
                                                        @csrf
                                                        <input type="hidden" name="item_key" value="{{ $item['key'] }}">
                                                        <button type="submit" class="p-2 text-slate-400 hover:text-red-500 transition-colors">
                                                            <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16"/>
                                                            </svg>
                                                        </button>
                                                    </form>
                                                </td>
                                            </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>

                            <!-- Mobile Cards -->
                            <div class="lg:hidden divide-y divide-slate-100">
                                @foreach($cartItems as $item)
                                    <div class="p-4">
                                        <div class="flex gap-4">
                                            <!-- Product Image -->
                                            <div class="w-20 h-20 bg-gradient-to-br from-slate-100 to-slate-200 rounded-xl overflow-hidden flex-shrink-0">
                                                @if($item['product']->image)
                                                    <img src="{{ $item['product']->image }}" alt="{{ $item['product']->name }}" class="w-full h-full object-cover">
                                                @else
                                                    <div class="w-full h-full flex items-center justify-center">
                                                        <svg class="w-8 h-8 text-slate-300" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1" d="M4 5a1 1 0 011-1h14a1 1 0 011 1v2a1 1 0 01-1 1H5a1 1 0 01-1-1V5z"/>
                                                        </svg>
                                                    </div>
                                                @endif
                                            </div>
                                            <!-- Product Info -->
                                            <div class="flex-1">
                                                <a href="{{ route('shop.show', $item['product']->slug) }}" class="font-semibold text-secondary-900 hover:text-primary-600 transition-colors">
                                                    {{ $item['product']->name }}
                                                </a>
                                                <p class="text-sm text-slate-500 mt-1">
                                                    @if($item['size'])
                                                        {{ $item['size'] }}
                                                    @endif
                                                    @if($item['size'] && $item['colour'])
                                                        /
                                                    @endif
                                                    @if($item['colour'])
                                                        {{ $item['colour'] }}
                                                    @endif
                                                </p>
                                                <p class="text-sm font-semibold text-secondary-900 mt-2">£{{ number_format($item['unit_price'], 2) }} <span class="text-xs text-slate-400 font-normal">ex VAT</span></p>
                                            </div>
                                            <!-- Remove Button -->
                                            <form action="{{ route('cart.remove') }}" method="POST">
                                                @csrf
                                                <input type="hidden" name="item_key" value="{{ $item['key'] }}">
                                                <button type="submit" class="p-2 text-slate-400 hover:text-red-500 transition-colors">
                                                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"/>
                                                    </svg>
                                                </button>
                                            </form>
                                        </div>
                                        <!-- Quantity & Total -->
                                        <div class="flex items-center justify-between mt-4">
                                            <form action="{{ route('cart.update') }}" method="POST" class="flex items-center">
                                                @csrf
                                                <input type="hidden" name="item_key" value="{{ $item['key'] }}">
                                                <div class="flex items-center border border-slate-200 rounded-lg overflow-hidden">
                                                    <button type="submit" name="quantity" value="{{ max(0, $item['quantity'] - 1) }}" class="w-10 h-10 flex items-center justify-center text-secondary-700 hover:bg-slate-100 transition-colors">
                                                        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M20 12H4"/>
                                                        </svg>
                                                    </button>
                                                    <input type="number" name="quantity" value="{{ $item['quantity'] }}" min="0" class="w-12 h-10 text-center text-sm font-semibold text-secondary-900 border-x border-slate-200 focus:outline-none" onchange="this.form.submit()">
                                                    <button type="submit" name="quantity" value="{{ $item['quantity'] + 1 }}" class="w-10 h-10 flex items-center justify-center text-secondary-700 hover:bg-slate-100 transition-colors">
                                                        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4"/>
                                                        </svg>
                                                    </button>
                                                </div>
                                            </form>
                                            <span class="font-bold text-secondary-900">£{{ number_format($item['line_total'], 2) }}</span>
                                        </div>
                                    </div>
                                @endforeach
                            </div>
                        </div>

                        <!-- Continue Shopping -->
                        <div class="mt-6 flex items-center justify-between">
                            <a href="{{ route('shop.index') }}" class="inline-flex items-center gap-2 text-primary-600 hover:text-primary-700 font-medium transition-colors">
                                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 19l-7-7m0 0l7-7m-7 7h18"/>
                                </svg>
                                Continue Shopping
                            </a>
                            <form action="{{ route('cart.clear') }}" method="POST">
                                @csrf
                                <button type="submit" class="text-sm text-slate-500 hover:text-red-500 transition-colors">
                                    Clear Cart
                                </button>
                            </form>
                        </div>
                    </div>

                    <!-- Order Summary -->
                    <div class="lg:w-96">
                        <div class="bg-white rounded-2xl border border-slate-200 p-6 sticky top-28">
                            <h2 class="text-lg font-bold text-secondary-900 mb-4">Order Summary</h2>
                            
                            <div class="space-y-3 pb-4 border-b border-slate-200">
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
                            </div>

                            <div class="flex justify-between py-4 border-b border-slate-200">
                                <span class="font-bold text-secondary-900">Total</span>
                                <span class="font-bold text-2xl text-secondary-900">£{{ number_format($totals['total'], 2) }}</span>
                            </div>

                            <a href="{{ route('checkout.show') }}" class="mt-6 w-full inline-flex items-center justify-center gap-2 px-6 py-4 bg-primary-600 text-white font-semibold rounded-xl hover:bg-primary-700 transition-all hover:shadow-lg hover:shadow-primary-600/25">
                                Proceed to Checkout
                                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 8l4 4m0 0l-4 4m4-4H3"/>
                                </svg>
                            </a>

                            <!-- Secure Payment -->
                            <div class="mt-6 flex items-center justify-center gap-2 text-sm text-slate-500">
                                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 15v2m-6 4h12a2 2 0 002-2v-6a2 2 0 00-2-2H6a2 2 0 00-2 2v6a2 2 0 002 2zm10-10V7a4 4 0 00-8 0v4h8z"/>
                                </svg>
                                Secure payment with Stripe
                            </div>
                        </div>
                    </div>
                </div>
            @else
                <!-- Empty Cart -->
                <div class="bg-white rounded-2xl border border-slate-200 p-12 text-center max-w-lg mx-auto">
                    <div class="w-20 h-20 mx-auto bg-slate-100 rounded-full flex items-center justify-center mb-6">
                        <svg class="w-10 h-10 text-slate-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M3 3h2l.4 2M7 13h10l4-8H5.4M7 13L5.4 5M7 13l-2.293 2.293c-.63.63-.184 1.707.707 1.707H17m0 0a2 2 0 100 4 2 2 0 000-4zm-8 2a2 2 0 11-4 0 2 2 0 014 0z"/>
                        </svg>
                    </div>
                    <h2 class="text-xl font-bold text-secondary-900 mb-2">Your cart is empty</h2>
                    <p class="text-slate-600 mb-6">Looks like you haven't added any products to your cart yet.</p>
                    <a href="{{ route('shop.index') }}" class="inline-flex items-center gap-2 px-6 py-3 bg-primary-600 text-white font-semibold rounded-xl hover:bg-primary-700 transition-all">
                        Start Shopping
                        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 8l4 4m0 0l-4 4m4-4H3"/>
                        </svg>
                    </a>
                </div>
            @endif
        </div>
    </section>
</x-layouts.app>
