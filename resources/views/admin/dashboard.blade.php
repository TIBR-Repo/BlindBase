@extends('admin.layouts.app')

@section('title', 'Dashboard')
@section('header', 'Dashboard')
@section('subheader', 'Welcome back! Here\'s what\'s happening with your store.')

@section('content')
    <!-- Stats Cards -->
    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-6 mb-8">
        <!-- Today's Orders -->
        <div class="bg-white rounded-2xl border border-slate-200 p-6">
            <div class="flex items-center gap-4">
                <div class="w-14 h-14 bg-primary-100 rounded-xl flex items-center justify-center">
                    <svg class="w-7 h-7 text-primary-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 11V7a4 4 0 00-8 0v4M5 9h14l1 12H4L5 9z"/>
                    </svg>
                </div>
                <div>
                    <p class="text-sm text-slate-500">Today's Orders</p>
                    <p class="text-3xl font-bold text-secondary-900">{{ $stats['today_orders'] }}</p>
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

        <!-- Month Revenue -->
        <div class="bg-white rounded-2xl border border-slate-200 p-6">
            <div class="flex items-center gap-4">
                <div class="w-14 h-14 bg-green-100 rounded-xl flex items-center justify-center">
                    <svg class="w-7 h-7 text-green-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8c-1.657 0-3 .895-3 2s1.343 2 3 2 3 .895 3 2-1.343 2-3 2m0-8c1.11 0 2.08.402 2.599 1M12 8V7m0 1v8m0 0v1m0-1c-1.11 0-2.08-.402-2.599-1M21 12a9 9 0 11-18 0 9 9 0 0118 0z"/>
                    </svg>
                </div>
                <div>
                    <p class="text-sm text-slate-500">Month Revenue</p>
                    <p class="text-3xl font-bold text-secondary-900">£{{ number_format($stats['month_revenue'], 2) }}</p>
                </div>
            </div>
        </div>

        <!-- Low Stock -->
        <div class="bg-white rounded-2xl border border-slate-200 p-6">
            <div class="flex items-center gap-4">
                <div class="w-14 h-14 bg-red-100 rounded-xl flex items-center justify-center">
                    <svg class="w-7 h-7 text-red-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 9v2m0 4h.01m-6.938 4h13.856c1.54 0 2.502-1.667 1.732-3L13.732 4c-.77-1.333-2.694-1.333-3.464 0L3.34 16c-.77 1.333.192 3 1.732 3z"/>
                    </svg>
                </div>
                <div>
                    <p class="text-sm text-slate-500">Low Stock Items</p>
                    <p class="text-3xl font-bold text-secondary-900">{{ $stats['low_stock_items'] }}</p>
                </div>
            </div>
        </div>
    </div>

    <!-- Quick Actions -->
    <div class="mb-8">
        <h2 class="text-lg font-bold text-secondary-900 mb-4">Quick Actions</h2>
        <div class="flex flex-wrap gap-3">
            <a href="{{ route('admin.products.create') }}" class="inline-flex items-center gap-2 px-4 py-2 bg-primary-600 text-white font-medium rounded-lg hover:bg-primary-700 transition-colors">
                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4"/>
                </svg>
                Add Product
            </a>
            <a href="{{ route('admin.orders.index') }}?status=pending" class="inline-flex items-center gap-2 px-4 py-2 bg-amber-600 text-white font-medium rounded-lg hover:bg-amber-700 transition-colors">
                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5H7a2 2 0 00-2 2v12a2 2 0 002 2h10a2 2 0 002-2V7a2 2 0 00-2-2h-2M9 5a2 2 0 002 2h2a2 2 0 002-2M9 5a2 2 0 012-2h2a2 2 0 012 2"/>
                </svg>
                View Pending Orders
            </a>
            @if($stats['pending_trade_accounts'] > 0)
                <a href="{{ route('admin.trade-accounts.index') }}?status=pending" class="inline-flex items-center gap-2 px-4 py-2 bg-purple-600 text-white font-medium rounded-lg hover:bg-purple-700 transition-colors">
                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 21V5a2 2 0 00-2-2H7a2 2 0 00-2 2v16m14 0h2m-2 0h-5m-9 0H3m2 0h5"/>
                    </svg>
                    Review Trade Applications ({{ $stats['pending_trade_accounts'] }})
                </a>
            @endif
        </div>
    </div>

    <div class="grid grid-cols-1 lg:grid-cols-2 gap-8">
        <!-- Recent Orders -->
        <div class="bg-white rounded-2xl border border-slate-200 overflow-hidden">
            <div class="px-6 py-4 border-b border-slate-200 flex items-center justify-between">
                <h2 class="font-bold text-secondary-900">Recent Orders</h2>
                <a href="{{ route('admin.orders.index') }}" class="text-sm text-primary-600 hover:underline">View All</a>
            </div>
            @if($recentOrders->count() > 0)
                <div class="divide-y divide-slate-100">
                    @foreach($recentOrders as $order)
                        <div class="px-6 py-4 hover:bg-slate-50 transition-colors">
                            <div class="flex items-center justify-between">
                                <div>
                                    <a href="{{ route('admin.orders.show', $order) }}" class="font-semibold text-secondary-900 hover:text-primary-600">#{{ $order->order_number }}</a>
                                    <p class="text-sm text-slate-500">{{ $order->customer_name }}</p>
                                </div>
                                <div class="text-right">
                                    <p class="font-semibold text-secondary-900">£{{ number_format($order->total, 2) }}</p>
                                    <span class="inline-flex items-center px-2 py-0.5 rounded-full text-xs font-medium
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
            @else
                <div class="p-12 text-center text-slate-500">
                    No orders yet
                </div>
            @endif
        </div>

        <!-- Low Stock Alert -->
        <div class="bg-white rounded-2xl border border-slate-200 overflow-hidden">
            <div class="px-6 py-4 border-b border-slate-200 flex items-center justify-between">
                <h2 class="font-bold text-secondary-900">Low Stock Alert</h2>
                <a href="{{ route('admin.products.index') }}?stock=low" class="text-sm text-primary-600 hover:underline">View All</a>
            </div>
            @if($lowStockProducts->count() > 0)
                <div class="divide-y divide-slate-100">
                    @foreach($lowStockProducts as $product)
                        <div class="px-6 py-4 hover:bg-slate-50 transition-colors">
                            <div class="flex items-center justify-between">
                                <div class="flex items-center gap-3">
                                    <div class="w-10 h-10 bg-slate-100 rounded-lg flex items-center justify-center">
                                        @if($product->image)
                                            <img src="{{ $product->image }}" alt="{{ $product->name }}" class="w-full h-full object-cover rounded-lg">
                                        @else
                                            <svg class="w-5 h-5 text-slate-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M20 7l-8-4-8 4m16 0l-8 4m8-4v10l-8 4m0-10L4 7m8 4v10M4 7v10l8 4"/>
                                            </svg>
                                        @endif
                                    </div>
                                    <div>
                                        <a href="{{ route('admin.products.edit', $product) }}" class="font-medium text-secondary-900 hover:text-primary-600">{{ $product->name }}</a>
                                        <p class="text-xs text-slate-500">{{ $product->sku }}</p>
                                    </div>
                                </div>
                                <div class="text-right">
                                    <span class="inline-flex items-center px-2 py-1 rounded-lg text-sm font-bold
                                        @if($product->stock === 0) bg-red-100 text-red-700
                                        @else bg-amber-100 text-amber-700 @endif">
                                        {{ $product->stock }} left
                                    </span>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
            @else
                <div class="p-12 text-center text-slate-500">
                    <svg class="w-12 h-12 text-green-300 mx-auto mb-3" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"/>
                    </svg>
                    All products well stocked!
                </div>
            @endif
        </div>
    </div>
@endsection
