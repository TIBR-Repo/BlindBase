@extends('admin.layouts.app')

@section('title', 'Orders')
@section('header', 'Orders')
@section('subheader', 'Manage customer orders')

@section('content')
    <!-- Status Tabs -->
    <div class="bg-white rounded-2xl border border-slate-200 p-2 mb-6">
        <div class="flex flex-wrap gap-1">
            <a href="{{ route('admin.orders.index') }}" class="px-4 py-2 rounded-lg text-sm font-medium transition-colors {{ !request('status') || request('status') === 'all' ? 'bg-primary-600 text-white' : 'text-slate-600 hover:bg-slate-100' }}">
                All ({{ $statusCounts['all'] }})
            </a>
            <a href="{{ route('admin.orders.index', ['status' => 'pending']) }}" class="px-4 py-2 rounded-lg text-sm font-medium transition-colors {{ request('status') === 'pending' ? 'bg-amber-600 text-white' : 'text-slate-600 hover:bg-slate-100' }}">
                Pending ({{ $statusCounts['pending'] }})
            </a>
            <a href="{{ route('admin.orders.index', ['status' => 'processing']) }}" class="px-4 py-2 rounded-lg text-sm font-medium transition-colors {{ request('status') === 'processing' ? 'bg-blue-600 text-white' : 'text-slate-600 hover:bg-slate-100' }}">
                Processing ({{ $statusCounts['processing'] }})
            </a>
            <a href="{{ route('admin.orders.index', ['status' => 'completed']) }}" class="px-4 py-2 rounded-lg text-sm font-medium transition-colors {{ request('status') === 'completed' ? 'bg-green-600 text-white' : 'text-slate-600 hover:bg-slate-100' }}">
                Completed ({{ $statusCounts['completed'] }})
            </a>
            <a href="{{ route('admin.orders.index', ['status' => 'cancelled']) }}" class="px-4 py-2 rounded-lg text-sm font-medium transition-colors {{ request('status') === 'cancelled' ? 'bg-red-600 text-white' : 'text-slate-600 hover:bg-slate-100' }}">
                Cancelled ({{ $statusCounts['cancelled'] }})
            </a>
        </div>
    </div>

    <!-- Search -->
    <div class="bg-white rounded-2xl border border-slate-200 p-6 mb-6">
        <form action="{{ route('admin.orders.index') }}" method="GET" class="flex gap-4">
            <input type="hidden" name="status" value="{{ request('status') }}">
            <div class="flex-1">
                <input type="text" name="search" value="{{ request('search') }}" placeholder="Search by order number, customer name or email..."
                    class="w-full px-4 py-2 border border-slate-200 rounded-lg focus:ring-2 focus:ring-primary-500 focus:border-primary-500">
            </div>
            <button type="submit" class="px-4 py-2 bg-slate-100 text-secondary-900 font-medium rounded-lg hover:bg-slate-200 transition-colors">
                Search
            </button>
        </form>
    </div>

    <!-- Orders Table -->
    <div class="bg-white rounded-2xl border border-slate-200 overflow-hidden">
        @if($orders->count() > 0)
            <table class="w-full">
                <thead>
                    <tr class="bg-slate-50 border-b border-slate-200">
                        <th class="text-left py-4 px-6 text-sm font-semibold text-secondary-900">Order</th>
                        <th class="text-left py-4 px-4 text-sm font-semibold text-secondary-900">Customer</th>
                        <th class="text-left py-4 px-4 text-sm font-semibold text-secondary-900">Date</th>
                        <th class="text-center py-4 px-4 text-sm font-semibold text-secondary-900">Items</th>
                        <th class="text-right py-4 px-4 text-sm font-semibold text-secondary-900">Total</th>
                        <th class="text-center py-4 px-4 text-sm font-semibold text-secondary-900">Status</th>
                        <th class="text-right py-4 px-6 text-sm font-semibold text-secondary-900">Action</th>
                    </tr>
                </thead>
                <tbody class="divide-y divide-slate-100">
                    @foreach($orders as $order)
                        <tr class="hover:bg-slate-50 transition-colors">
                            <td class="py-4 px-6">
                                <a href="{{ route('admin.orders.show', $order) }}" class="font-semibold text-secondary-900 hover:text-primary-600">
                                    #{{ $order->order_number }}
                                </a>
                                @if($order->tradeAccount)
                                    <span class="ml-2 inline-flex items-center px-1.5 py-0.5 rounded text-xs font-medium bg-purple-100 text-purple-700">Trade</span>
                                @endif
                            </td>
                            <td class="py-4 px-4">
                                <p class="font-medium text-secondary-900">{{ $order->customer_name }}</p>
                                <p class="text-sm text-slate-500">{{ $order->customer_email }}</p>
                            </td>
                            <td class="py-4 px-4">
                                <p class="text-sm text-secondary-900">{{ $order->created_at->format('d M Y') }}</p>
                                <p class="text-xs text-slate-500">{{ $order->created_at->format('H:i') }}</p>
                            </td>
                            <td class="py-4 px-4 text-center">
                                <span class="text-sm text-secondary-900">{{ $order->items->count() }}</span>
                            </td>
                            <td class="py-4 px-4 text-right">
                                <span class="font-semibold text-secondary-900">£{{ number_format($order->total, 2) }}</span>
                            </td>
                            <td class="py-4 px-4 text-center">
                                <span class="inline-flex items-center px-2.5 py-1 rounded-full text-xs font-medium
                                    @if($order->status === 'completed') bg-green-100 text-green-700
                                    @elseif($order->status === 'pending') bg-amber-100 text-amber-700
                                    @elseif($order->status === 'processing') bg-blue-100 text-blue-700
                                    @elseif($order->status === 'shipped') bg-indigo-100 text-indigo-700
                                    @elseif($order->status === 'cancelled') bg-red-100 text-red-700
                                    @else bg-slate-100 text-slate-700 @endif">
                                    {{ ucfirst($order->status) }}
                                </span>
                            </td>
                            <td class="py-4 px-6 text-right">
                                <a href="{{ route('admin.orders.show', $order) }}" class="inline-flex items-center gap-1 px-3 py-1.5 text-sm font-medium text-primary-600 hover:bg-primary-50 rounded-lg transition-colors">
                                    View
                                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"/>
                                    </svg>
                                </a>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>

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
                <p class="text-slate-500">No orders found</p>
            </div>
        @endif
    </div>
@endsection
