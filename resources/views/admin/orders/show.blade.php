@extends('admin.layouts.app')

@section('title', 'Order #' . $order->order_number)
@section('header', 'Order #' . $order->order_number)
@section('subheader', 'Placed on ' . $order->created_at->format('d M Y \a\t H:i'))

@section('header-actions')
    <a href="{{ route('admin.orders.index') }}" class="inline-flex items-center gap-2 px-4 py-2 bg-slate-100 text-secondary-900 font-medium rounded-lg hover:bg-slate-200 transition-colors">
        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 19l-7-7m0 0l7-7m-7 7h18"/>
        </svg>
        Back to Orders
    </a>
@endsection

@section('content')
    <div class="grid grid-cols-1 lg:grid-cols-3 gap-6">
        <!-- Main Content -->
        <div class="lg:col-span-2 space-y-6">
            <!-- Order Items -->
            <div class="bg-white rounded-2xl border border-slate-200 overflow-hidden">
                <div class="px-6 py-4 border-b border-slate-200">
                    <h2 class="font-bold text-secondary-900">Order Items</h2>
                </div>
                <table class="w-full">
                    <thead>
                        <tr class="bg-slate-50 border-b border-slate-100">
                            <th class="text-left py-3 px-6 text-sm font-semibold text-secondary-900">Product</th>
                            <th class="text-center py-3 px-4 text-sm font-semibold text-secondary-900">Qty</th>
                            <th class="text-right py-3 px-4 text-sm font-semibold text-secondary-900">Unit Price</th>
                            <th class="text-right py-3 px-6 text-sm font-semibold text-secondary-900">Total</th>
                        </tr>
                    </thead>
                    <tbody class="divide-y divide-slate-100">
                        @foreach($order->items as $item)
                            <tr>
                                <td class="py-4 px-6">
                                    <div class="flex items-center gap-3">
                                        <div class="w-12 h-12 bg-slate-100 rounded-lg flex items-center justify-center">
                                            @if($item->product && $item->product->image)
                                                <img src="{{ $item->product->image }}" alt="{{ $item->product_name }}" class="w-full h-full object-cover rounded-lg">
                                            @else
                                                <svg class="w-6 h-6 text-slate-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M20 7l-8-4-8 4m16 0l-8 4m8-4v10l-8 4m0-10L4 7m8 4v10M4 7v10l8 4"/>
                                                </svg>
                                            @endif
                                        </div>
                                        <div>
                                            <p class="font-medium text-secondary-900">{{ $item->product_name }}</p>
                                            <p class="text-xs text-slate-500">SKU: {{ $item->product_sku }}</p>
                                            @if($item->size || $item->colour)
                                                <p class="text-xs text-slate-500">
                                                    @if($item->size) Size: {{ $item->size }} @endif
                                                    @if($item->size && $item->colour) • @endif
                                                    @if($item->colour) Colour: {{ $item->colour }} @endif
                                                </p>
                                            @endif
                                        </div>
                                    </div>
                                </td>
                                <td class="py-4 px-4 text-center">
                                    <span class="text-secondary-900">{{ $item->quantity }}</span>
                                </td>
                                <td class="py-4 px-4 text-right">
                                    <span class="text-secondary-900">£{{ number_format($item->unit_price, 2) }}</span>
                                </td>
                                <td class="py-4 px-6 text-right">
                                    <span class="font-semibold text-secondary-900">£{{ number_format($item->total_price, 2) }}</span>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                    <tfoot class="bg-slate-50">
                        <tr class="border-t border-slate-200">
                            <td colspan="3" class="py-3 px-6 text-right text-sm text-slate-600">Subtotal</td>
                            <td class="py-3 px-6 text-right font-medium text-secondary-900">£{{ number_format($order->subtotal, 2) }}</td>
                        </tr>
                        <tr>
                            <td colspan="3" class="py-2 px-6 text-right text-sm text-slate-600">Delivery</td>
                            <td class="py-2 px-6 text-right text-secondary-900">
                                @if($order->shipping == 0)
                                    <span class="text-green-600">FREE</span>
                                @else
                                    £{{ number_format($order->shipping, 2) }}
                                @endif
                            </td>
                        </tr>
                        <tr>
                            <td colspan="3" class="py-2 px-6 text-right text-sm text-slate-600">VAT (20%)</td>
                            <td class="py-2 px-6 text-right text-secondary-900">£{{ number_format($order->vat, 2) }}</td>
                        </tr>
                        <tr class="border-t border-slate-200">
                            <td colspan="3" class="py-4 px-6 text-right font-bold text-secondary-900">Total</td>
                            <td class="py-4 px-6 text-right text-xl font-bold text-secondary-900">£{{ number_format($order->total, 2) }}</td>
                        </tr>
                    </tfoot>
                </table>
            </div>

            <!-- Customer Details -->
            <div class="bg-white rounded-2xl border border-slate-200 p-6">
                <h2 class="font-bold text-secondary-900 mb-4">Customer Details</h2>
                
                <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                    <div>
                        <h3 class="text-sm font-medium text-slate-500 mb-2">Contact</h3>
                        <p class="font-medium text-secondary-900">{{ $order->customer_name }}</p>
                        <p class="text-sm text-slate-600">{{ $order->customer_email }}</p>
                        @if($order->customer_phone)
                            <p class="text-sm text-slate-600">{{ $order->customer_phone }}</p>
                        @endif
                        @if($order->company_name)
                            <p class="text-sm text-slate-600 mt-1">{{ $order->company_name }}</p>
                        @endif
                    </div>
                    <div>
                        <h3 class="text-sm font-medium text-slate-500 mb-2">Delivery Address</h3>
                        <p class="text-sm text-secondary-900">
                            {{ $order->delivery_address }}<br>
                            {{ $order->delivery_city }}<br>
                            {{ $order->delivery_postcode }}
                        </p>
                        @if($order->delivery_instructions)
                            <p class="text-xs text-slate-500 mt-2 italic">{{ $order->delivery_instructions }}</p>
                        @endif
                    </div>
                </div>

                @if($order->tradeAccount)
                    <div class="mt-6 p-4 bg-purple-50 rounded-xl">
                        <h3 class="text-sm font-medium text-purple-700 mb-1">Trade Account</h3>
                        <p class="text-sm text-purple-900">{{ $order->tradeAccount->company_name }}</p>
                        <p class="text-xs text-purple-600">{{ $order->tradeAccount->discount_percent }}% discount applied</p>
                    </div>
                @endif
            </div>
        </div>

        <!-- Sidebar -->
        <div class="space-y-6">
            <!-- Status Update -->
            <div class="bg-white rounded-2xl border border-slate-200 p-6">
                <h2 class="font-bold text-secondary-900 mb-4">Update Order</h2>
                
                <form action="{{ route('admin.orders.update', $order) }}" method="POST" class="space-y-4">
                    @csrf
                    @method('PUT')

                    <div>
                        <label for="status" class="block text-sm font-medium text-secondary-900 mb-2">Status</label>
                        <select name="status" id="status" class="w-full px-4 py-2 border border-slate-200 rounded-lg focus:ring-2 focus:ring-primary-500 focus:border-primary-500">
                            <option value="pending" {{ $order->status === 'pending' ? 'selected' : '' }}>Pending</option>
                            <option value="processing" {{ $order->status === 'processing' ? 'selected' : '' }}>Processing</option>
                            <option value="shipped" {{ $order->status === 'shipped' ? 'selected' : '' }}>Shipped</option>
                            <option value="completed" {{ $order->status === 'completed' ? 'selected' : '' }}>Completed</option>
                            <option value="cancelled" {{ $order->status === 'cancelled' ? 'selected' : '' }}>Cancelled</option>
                        </select>
                    </div>

                    <div>
                        <label for="tracking_number" class="block text-sm font-medium text-secondary-900 mb-2">Tracking Number</label>
                        <input type="text" name="tracking_number" id="tracking_number" value="{{ $order->tracking_number }}"
                            class="w-full px-4 py-2 border border-slate-200 rounded-lg focus:ring-2 focus:ring-primary-500 focus:border-primary-500"
                            placeholder="Enter tracking number">
                    </div>

                    <div>
                        <label for="notes" class="block text-sm font-medium text-secondary-900 mb-2">Notes</label>
                        <textarea name="notes" id="notes" rows="3"
                            class="w-full px-4 py-2 border border-slate-200 rounded-lg focus:ring-2 focus:ring-primary-500 focus:border-primary-500"
                            placeholder="Internal notes...">{{ $order->notes }}</textarea>
                    </div>

                    <button type="submit" class="w-full inline-flex items-center justify-center gap-2 px-4 py-2 bg-primary-600 text-white font-medium rounded-lg hover:bg-primary-700 transition-colors">
                        Update Order
                    </button>
                </form>
            </div>

            <!-- Quick Actions -->
            <div class="bg-white rounded-2xl border border-slate-200 p-6">
                <h2 class="font-bold text-secondary-900 mb-4">Actions</h2>
                
                <div class="space-y-3">
                    <button onclick="window.print()" class="w-full inline-flex items-center justify-center gap-2 px-4 py-2 bg-slate-100 text-secondary-900 font-medium rounded-lg hover:bg-slate-200 transition-colors">
                        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 17h2a2 2 0 002-2v-4a2 2 0 00-2-2H5a2 2 0 00-2 2v4a2 2 0 002 2h2m2 4h6a2 2 0 002-2v-4a2 2 0 00-2-2H9a2 2 0 00-2 2v4a2 2 0 002 2zm8-12V5a2 2 0 00-2-2H9a2 2 0 00-2 2v4h10z"/>
                        </svg>
                        Print Packing Slip
                    </button>
                    <button onclick="window.print()" class="w-full inline-flex items-center justify-center gap-2 px-4 py-2 bg-slate-100 text-secondary-900 font-medium rounded-lg hover:bg-slate-200 transition-colors">
                        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z"/>
                        </svg>
                        Print Invoice
                    </button>
                </div>
            </div>

            <!-- Order Info -->
            <div class="bg-white rounded-2xl border border-slate-200 p-6">
                <h2 class="font-bold text-secondary-900 mb-4">Order Info</h2>
                
                <div class="space-y-3 text-sm">
                    <div class="flex justify-between">
                        <span class="text-slate-500">Order Number</span>
                        <span class="font-medium text-secondary-900">{{ $order->order_number }}</span>
                    </div>
                    <div class="flex justify-between">
                        <span class="text-slate-500">Placed</span>
                        <span class="text-secondary-900">{{ $order->created_at->format('d M Y H:i') }}</span>
                    </div>
                    @if($order->shipped_at)
                        <div class="flex justify-between">
                            <span class="text-slate-500">Shipped</span>
                            <span class="text-secondary-900">{{ $order->shipped_at->format('d M Y H:i') }}</span>
                        </div>
                    @endif
                    <div class="flex justify-between">
                        <span class="text-slate-500">Payment</span>
                        <span class="text-green-600 font-medium">Paid via Stripe</span>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
