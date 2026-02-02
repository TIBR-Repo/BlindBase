<x-layouts.app>
    <section class="py-16 lg:py-24 bg-slate-50">
        <div class="max-w-2xl mx-auto px-4 sm:px-6 lg:px-8">
            <!-- Success Card -->
            <div class="bg-white rounded-2xl border border-slate-200 overflow-hidden">
                <!-- Header -->
                <div class="bg-gradient-to-br from-green-500 to-green-600 p-8 text-center">
                    <div class="w-20 h-20 mx-auto bg-white rounded-full flex items-center justify-center mb-4">
                        <svg class="w-10 h-10 text-green-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"/>
                        </svg>
                    </div>
                    <h1 class="text-2xl lg:text-3xl font-bold text-white">Order Confirmed!</h1>
                    <p class="text-green-100 mt-2">Thank you for your order</p>
                </div>

                <!-- Order Details -->
                <div class="p-8">
                    <div class="text-center mb-8">
                        <p class="text-sm text-slate-500 mb-1">Order Number</p>
                        <p class="text-2xl font-bold text-secondary-900">{{ $order->order_number }}</p>
                    </div>

                    <div class="bg-slate-50 rounded-xl p-4 mb-8">
                        <p class="text-sm text-slate-600 text-center">
                            A confirmation email has been sent to <strong class="text-secondary-900">{{ $order->customer_email }}</strong>
                        </p>
                    </div>

                    <!-- Order Summary -->
                    <div class="border-t border-slate-200 pt-6 mb-8">
                        <h2 class="font-semibold text-secondary-900 mb-4">Order Summary</h2>
                        
                        <div class="space-y-3">
                            @foreach($order->items as $item)
                                <div class="flex justify-between text-sm">
                                    <span class="text-slate-600">
                                        {{ $item->product_name }}
                                        @if($item->size || $item->colour)
                                            <span class="text-slate-400">
                                                ({{ $item->size }}{{ $item->size && $item->colour ? ' / ' : '' }}{{ $item->colour }})
                                            </span>
                                        @endif
                                        <span class="text-slate-400">× {{ $item->quantity }}</span>
                                    </span>
                                    <span class="font-medium text-secondary-900">£{{ number_format($item->total_price, 2) }}</span>
                                </div>
                            @endforeach
                        </div>

                        <div class="border-t border-slate-200 mt-4 pt-4 space-y-2">
                            <div class="flex justify-between text-sm">
                                <span class="text-slate-600">Subtotal (ex VAT)</span>
                                <span class="text-secondary-900">£{{ number_format($order->subtotal, 2) }}</span>
                            </div>
                            <div class="flex justify-between text-sm">
                                <span class="text-slate-600">Delivery</span>
                                @if($order->shipping == 0)
                                    <span class="text-green-600">FREE</span>
                                @else
                                    <span class="text-secondary-900">£{{ number_format($order->shipping, 2) }}</span>
                                @endif
                            </div>
                            <div class="flex justify-between text-sm">
                                <span class="text-slate-600">VAT (20%)</span>
                                <span class="text-secondary-900">£{{ number_format($order->vat, 2) }}</span>
                            </div>
                            <div class="flex justify-between font-bold text-lg pt-2 border-t border-slate-200">
                                <span class="text-secondary-900">Total</span>
                                <span class="text-secondary-900">£{{ number_format($order->total, 2) }}</span>
                            </div>
                        </div>
                    </div>

                    <!-- Delivery Address -->
                    <div class="border-t border-slate-200 pt-6 mb-8">
                        <h2 class="font-semibold text-secondary-900 mb-3">Delivery Address</h2>
                        <p class="text-sm text-slate-600">
                            {{ $order->customer_name }}<br>
                            @if($order->company_name)
                                {{ $order->company_name }}<br>
                            @endif
                            {{ $order->delivery_address }}<br>
                            {{ $order->delivery_city }}, {{ $order->delivery_postcode }}
                        </p>
                    </div>

                    <!-- What Happens Next -->
                    <div class="border-t border-slate-200 pt-6 mb-8">
                        <h2 class="font-semibold text-secondary-900 mb-4">What Happens Next</h2>
                        
                        <div class="space-y-4">
                            <div class="flex gap-4">
                                <div class="w-8 h-8 bg-primary-100 rounded-full flex items-center justify-center flex-shrink-0">
                                    <span class="text-sm font-bold text-primary-600">1</span>
                                </div>
                                <div>
                                    <p class="font-medium text-secondary-900">Order Processing</p>
                                    <p class="text-sm text-slate-500">We'll prepare your order for dispatch</p>
                                </div>
                            </div>
                            <div class="flex gap-4">
                                <div class="w-8 h-8 bg-primary-100 rounded-full flex items-center justify-center flex-shrink-0">
                                    <span class="text-sm font-bold text-primary-600">2</span>
                                </div>
                                <div>
                                    <p class="font-medium text-secondary-900">Dispatch Notification</p>
                                    <p class="text-sm text-slate-500">You'll receive an email with tracking details</p>
                                </div>
                            </div>
                            <div class="flex gap-4">
                                <div class="w-8 h-8 bg-primary-100 rounded-full flex items-center justify-center flex-shrink-0">
                                    <span class="text-sm font-bold text-primary-600">3</span>
                                </div>
                                <div>
                                    <p class="font-medium text-secondary-900">Delivery</p>
                                    <p class="text-sm text-slate-500">Your order will be delivered to your address</p>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Actions -->
                    <div class="flex flex-col sm:flex-row gap-4">
                        <a href="{{ route('shop.index') }}" class="flex-1 inline-flex items-center justify-center gap-2 px-6 py-3 bg-primary-600 text-white font-semibold rounded-xl hover:bg-primary-700 transition-all">
                            Continue Shopping
                            <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 8l4 4m0 0l-4 4m4-4H3"/>
                            </svg>
                        </a>
                        <a href="{{ route('home') }}" class="flex-1 inline-flex items-center justify-center gap-2 px-6 py-3 border border-slate-200 text-secondary-700 font-semibold rounded-xl hover:bg-slate-50 transition-all">
                            Back to Home
                        </a>
                    </div>
                </div>
            </div>

            <!-- Help -->
            <div class="mt-8 text-center">
                <p class="text-sm text-slate-500">
                    Need help? <a href="{{ route('contact') }}" class="text-primary-600 hover:text-primary-700 font-medium">Contact us</a>
                </p>
            </div>
        </div>
    </section>
</x-layouts.app>
