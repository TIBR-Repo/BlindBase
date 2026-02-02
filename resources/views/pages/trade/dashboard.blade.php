<x-layouts.app>
    <!-- Dashboard Header -->
    <section class="bg-secondary-900 py-12">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="flex flex-col lg:flex-row lg:items-center lg:justify-between">
                <div>
                    <h1 class="text-3xl font-bold text-white mb-2">Trade Dashboard</h1>
                    <p class="text-slate-300">Welcome back, {{ $account->contact_name }}</p>
                </div>
                <div class="mt-4 lg:mt-0 flex items-center gap-4">
                    <a href="{{ route('shop.index') }}" class="inline-flex items-center gap-2 px-6 py-3 bg-primary-600 text-white font-semibold rounded-xl hover:bg-primary-700 transition-all">
                        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 3h2l.4 2M7 13h10l4-8H5.4M7 13L5.4 5M7 13l-2.293 2.293c-.63.63-.184 1.707.707 1.707H17m0 0a2 2 0 100 4 2 2 0 000-4zm-8 2a2 2 0 11-4 0 2 2 0 014 0z"/>
                        </svg>
                        Shop Now
                    </a>
                    <form action="{{ route('trade.logout') }}" method="POST">
                        @csrf
                        <button type="submit" class="inline-flex items-center gap-2 px-6 py-3 bg-white/10 text-white font-semibold rounded-xl hover:bg-white/20 transition-all">
                            Log Out
                        </button>
                    </form>
                </div>
            </div>
        </div>
    </section>

    <!-- Dashboard Content -->
    <section class="py-12 bg-slate-50">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <!-- Stats Cards -->
            <div class="grid grid-cols-1 md:grid-cols-3 gap-6 mb-12">
                <!-- Total Orders -->
                <div class="bg-white rounded-2xl border border-slate-200 p-6">
                    <div class="flex items-center gap-4">
                        <div class="w-14 h-14 bg-primary-100 rounded-xl flex items-center justify-center">
                            <svg class="w-7 h-7 text-primary-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5H7a2 2 0 00-2 2v12a2 2 0 002 2h10a2 2 0 002-2V7a2 2 0 00-2-2h-2M9 5a2 2 0 002 2h2a2 2 0 002-2M9 5a2 2 0 012-2h2a2 2 0 012 2"/>
                            </svg>
                        </div>
                        <div>
                            <p class="text-sm text-slate-500">Total Orders</p>
                            <p class="text-3xl font-bold text-secondary-900">{{ $stats['total_orders'] }}</p>
                        </div>
                    </div>
                </div>

                <!-- Total Spent -->
                <div class="bg-white rounded-2xl border border-slate-200 p-6">
                    <div class="flex items-center gap-4">
                        <div class="w-14 h-14 bg-green-100 rounded-xl flex items-center justify-center">
                            <svg class="w-7 h-7 text-green-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8c-1.657 0-3 .895-3 2s1.343 2 3 2 3 .895 3 2-1.343 2-3 2m0-8c1.11 0 2.08.402 2.599 1M12 8V7m0 1v8m0 0v1m0-1c-1.11 0-2.08-.402-2.599-1M21 12a9 9 0 11-18 0 9 9 0 0118 0z"/>
                            </svg>
                        </div>
                        <div>
                            <p class="text-sm text-slate-500">Total Spent</p>
                            <p class="text-3xl font-bold text-secondary-900">£{{ number_format($stats['total_spent'], 2) }}</p>
                        </div>
                    </div>
                </div>

                <!-- Pending Orders -->
                <div class="bg-white rounded-2xl border border-slate-200 p-6">
                    <div class="flex items-center gap-4">
                        <div class="w-14 h-14 bg-amber-100 rounded-xl flex items-center justify-center">
                            <svg class="w-7 h-7 text-amber-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z"/>
                            </svg>
                        </div>
                        <div>
                            <p class="text-sm text-slate-500">Pending Orders</p>
                            <p class="text-3xl font-bold text-secondary-900">{{ $stats['pending_orders'] }}</p>
                        </div>
                    </div>
                </div>
            </div>

            <div class="grid grid-cols-1 lg:grid-cols-3 gap-8">
                <!-- Order History -->
                <div class="lg:col-span-2">
                    <div class="bg-white rounded-2xl border border-slate-200 overflow-hidden">
                        <div class="px-6 py-4 border-b border-slate-200">
                            <h2 class="text-lg font-bold text-secondary-900">Order History</h2>
                        </div>

                        @if($orders->count() > 0)
                            <div class="divide-y divide-slate-100">
                                @foreach($orders as $order)
                                    <div class="p-6 hover:bg-slate-50 transition-colors">
                                        <div class="flex items-center justify-between">
                                            <div>
                                                <p class="font-semibold text-secondary-900">Order #{{ $order->order_number }}</p>
                                                <p class="text-sm text-slate-500">{{ $order->created_at->format('d M Y') }}</p>
                                            </div>
                                            <div class="text-right">
                                                <p class="font-semibold text-secondary-900">£{{ number_format($order->total, 2) }}</p>
                                                <span class="inline-flex items-center px-2.5 py-0.5 rounded-full text-xs font-medium
                                                    @if($order->status === 'completed') bg-green-100 text-green-700
                                                    @elseif($order->status === 'pending') bg-amber-100 text-amber-700
                                                    @elseif($order->status === 'processing') bg-blue-100 text-blue-700
                                                    @elseif($order->status === 'cancelled') bg-red-100 text-red-700
                                                    @else bg-slate-100 text-slate-700 @endif">
                                                    {{ ucfirst($order->status) }}
                                                </span>
                                            </div>
                                        </div>
                                    </div>
                                @endforeach
                            </div>

                            @if($orders->hasPages())
                                <div class="px-6 py-4 border-t border-slate-200">
                                    {{ $orders->links() }}
                                </div>
                            @endif
                        @else
                            <div class="p-12 text-center">
                                <svg class="w-12 h-12 text-slate-300 mx-auto mb-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5H7a2 2 0 00-2 2v12a2 2 0 002 2h10a2 2 0 002-2V7a2 2 0 00-2-2h-2M9 5a2 2 0 002 2h2a2 2 0 002-2M9 5a2 2 0 012-2h2a2 2 0 012 2"/>
                                </svg>
                                <p class="text-slate-500 mb-4">No orders yet</p>
                                <a href="{{ route('shop.index') }}" class="inline-flex items-center gap-2 text-primary-600 font-medium hover:underline">
                                    Start Shopping
                                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 8l4 4m0 0l-4 4m4-4H3"/>
                                    </svg>
                                </a>
                            </div>
                        @endif
                    </div>
                </div>

                <!-- Account Details Sidebar -->
                <div class="space-y-6">
                    <!-- Account Info -->
                    <div class="bg-white rounded-2xl border border-slate-200 p-6">
                        <h3 class="font-bold text-secondary-900 mb-4">Account Details</h3>
                        <div class="space-y-3 text-sm">
                            <div>
                                <p class="text-slate-500">Company</p>
                                <p class="font-medium text-secondary-900">{{ $account->company_name }}</p>
                            </div>
                            <div>
                                <p class="text-slate-500">Email</p>
                                <p class="font-medium text-secondary-900">{{ $account->email }}</p>
                            </div>
                            <div>
                                <p class="text-slate-500">Phone</p>
                                <p class="font-medium text-secondary-900">{{ $account->phone }}</p>
                            </div>
                            <div>
                                <p class="text-slate-500">Your Discount</p>
                                <p class="font-medium text-primary-600">{{ $account->discount_percent }}% off all orders</p>
                            </div>
                        </div>
                    </div>

                    <!-- Delivery Address -->
                    <div class="bg-white rounded-2xl border border-slate-200 p-6">
                        <h3 class="font-bold text-secondary-900 mb-4">Delivery Address</h3>
                        <p class="text-sm text-slate-600">
                            {{ $account->delivery_address }}<br>
                            {{ $account->delivery_city }}<br>
                            {{ $account->delivery_postcode }}
                        </p>
                    </div>

                    <!-- Quick Actions -->
                    <div class="bg-gradient-to-br from-primary-600 to-primary-700 rounded-2xl p-6 text-white">
                        <h3 class="font-bold mb-3">Need Help?</h3>
                        <p class="text-sm text-primary-100 mb-4">
                            Your dedicated account manager is here to help with quotes, orders, and compliance documentation.
                        </p>
                        <a href="{{ route('contact') }}" class="inline-flex items-center gap-2 text-sm font-semibold text-white hover:underline">
                            Contact Us
                            <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 8l4 4m0 0l-4 4m4-4H3"/>
                            </svg>
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </section>
</x-layouts.app>
