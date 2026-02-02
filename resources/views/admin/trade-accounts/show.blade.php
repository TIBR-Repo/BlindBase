@extends('admin.layouts.app')

@section('title', $tradeAccount->company_name)
@section('header', $tradeAccount->company_name)
@section('subheader', 'Trade Account Details')

@section('header-actions')
    <a href="{{ route('admin.trade-accounts.index') }}" class="inline-flex items-center gap-2 px-4 py-2 bg-slate-100 text-secondary-900 font-medium rounded-lg hover:bg-slate-200 transition-colors">
        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 19l-7-7m0 0l7-7m-7 7h18"/>
        </svg>
        Back to Accounts
    </a>
@endsection

@section('content')
    <div class="grid grid-cols-1 lg:grid-cols-3 gap-6">
        <!-- Main Content -->
        <div class="lg:col-span-2 space-y-6">
            <!-- Company Details -->
            <div class="bg-white rounded-2xl border border-slate-200 p-6">
                <h2 class="font-bold text-secondary-900 mb-4">Company Details</h2>
                
                <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                    <div>
                        <p class="text-sm text-slate-500">Company Name</p>
                        <p class="font-medium text-secondary-900">{{ $tradeAccount->company_name }}</p>
                    </div>
                    <div>
                        <p class="text-sm text-slate-500">Business Sector</p>
                        <p class="font-medium text-secondary-900 capitalize">{{ str_replace('-', ' ', $tradeAccount->sector ?? 'Not specified') }}</p>
                    </div>
                    @if($tradeAccount->company_reg_number)
                        <div>
                            <p class="text-sm text-slate-500">Company Registration</p>
                            <p class="font-medium text-secondary-900">{{ $tradeAccount->company_reg_number }}</p>
                        </div>
                    @endif
                    @if($tradeAccount->vat_number)
                        <div>
                            <p class="text-sm text-slate-500">VAT Number</p>
                            <p class="font-medium text-secondary-900">{{ $tradeAccount->vat_number }}</p>
                        </div>
                    @endif
                </div>
            </div>

            <!-- Contact Details -->
            <div class="bg-white rounded-2xl border border-slate-200 p-6">
                <h2 class="font-bold text-secondary-900 mb-4">Contact Details</h2>
                
                <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                    <div>
                        <p class="text-sm text-slate-500">Contact Name</p>
                        <p class="font-medium text-secondary-900">{{ $tradeAccount->contact_name }}</p>
                    </div>
                    @if($tradeAccount->job_title)
                        <div>
                            <p class="text-sm text-slate-500">Job Title</p>
                            <p class="font-medium text-secondary-900">{{ $tradeAccount->job_title }}</p>
                        </div>
                    @endif
                    <div>
                        <p class="text-sm text-slate-500">Email</p>
                        <a href="mailto:{{ $tradeAccount->email }}" class="font-medium text-primary-600 hover:underline">{{ $tradeAccount->email }}</a>
                    </div>
                    <div>
                        <p class="text-sm text-slate-500">Phone</p>
                        <a href="tel:{{ $tradeAccount->phone }}" class="font-medium text-primary-600 hover:underline">{{ $tradeAccount->phone }}</a>
                    </div>
                </div>
            </div>

            <!-- Delivery Address -->
            <div class="bg-white rounded-2xl border border-slate-200 p-6">
                <h2 class="font-bold text-secondary-900 mb-4">Delivery Address</h2>
                <p class="text-secondary-900">
                    {{ $tradeAccount->delivery_address }}<br>
                    {{ $tradeAccount->delivery_city }}<br>
                    {{ $tradeAccount->delivery_postcode }}
                </p>
            </div>

            <!-- Order History -->
            <div class="bg-white rounded-2xl border border-slate-200 overflow-hidden">
                <div class="px-6 py-4 border-b border-slate-200 flex items-center justify-between">
                    <h2 class="font-bold text-secondary-900">Recent Orders</h2>
                    <a href="{{ route('admin.orders.index', ['search' => $tradeAccount->email]) }}" class="text-sm text-primary-600 hover:underline">View All</a>
                </div>
                @if($tradeAccount->orders->count() > 0)
                    <div class="divide-y divide-slate-100">
                        @foreach($tradeAccount->orders as $order)
                            <div class="px-6 py-4 hover:bg-slate-50 transition-colors">
                                <div class="flex items-center justify-between">
                                    <div>
                                        <a href="{{ route('admin.orders.show', $order) }}" class="font-semibold text-secondary-900 hover:text-primary-600">#{{ $order->order_number }}</a>
                                        <p class="text-sm text-slate-500">{{ $order->created_at->format('d M Y') }}</p>
                                    </div>
                                    <div class="text-right">
                                        <p class="font-semibold text-secondary-900">£{{ number_format($order->total, 2) }}</p>
                                        <span class="inline-flex items-center px-2 py-0.5 rounded-full text-xs font-medium
                                            @if($order->status === 'completed') bg-green-100 text-green-700
                                            @elseif($order->status === 'pending') bg-amber-100 text-amber-700
                                            @else bg-slate-100 text-slate-700 @endif">
                                            {{ ucfirst($order->status) }}
                                        </span>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    </div>
                @else
                    <div class="p-8 text-center text-slate-500">
                        No orders yet
                    </div>
                @endif
            </div>
        </div>

        <!-- Sidebar -->
        <div class="space-y-6">
            <!-- Status & Actions -->
            <div class="bg-white rounded-2xl border border-slate-200 p-6">
                <h2 class="font-bold text-secondary-900 mb-4">Account Status</h2>
                
                <div class="mb-6">
                    <span class="inline-flex items-center px-3 py-1.5 rounded-full text-sm font-medium
                        @if($tradeAccount->status === 'approved') bg-green-100 text-green-700
                        @elseif($tradeAccount->status === 'pending') bg-amber-100 text-amber-700
                        @else bg-red-100 text-red-700 @endif">
                        {{ ucfirst($tradeAccount->status) }}
                    </span>
                </div>

                @if($tradeAccount->isPending())
                    <div class="flex gap-3 mb-6">
                        <form action="{{ route('admin.trade-accounts.approve', $tradeAccount) }}" method="POST" class="flex-1">
                            @csrf
                            <button type="submit" class="w-full px-4 py-2 bg-green-600 text-white font-medium rounded-lg hover:bg-green-700 transition-colors">
                                Approve
                            </button>
                        </form>
                        <form action="{{ route('admin.trade-accounts.reject', $tradeAccount) }}" method="POST" class="flex-1">
                            @csrf
                            <button type="submit" class="w-full px-4 py-2 bg-red-600 text-white font-medium rounded-lg hover:bg-red-700 transition-colors">
                                Reject
                            </button>
                        </form>
                    </div>
                @endif

                <form action="{{ route('admin.trade-accounts.update', $tradeAccount) }}" method="POST" class="space-y-4">
                    @csrf
                    @method('PUT')

                    <div>
                        <label for="discount_percent" class="block text-sm font-medium text-secondary-900 mb-2">Discount %</label>
                        <input type="number" name="discount_percent" id="discount_percent" value="{{ $tradeAccount->discount_percent }}" step="0.01" min="0" max="100"
                            class="w-full px-4 py-2 border border-slate-200 rounded-lg focus:ring-2 focus:ring-primary-500 focus:border-primary-500">
                    </div>

                    <div>
                        <label for="status" class="block text-sm font-medium text-secondary-900 mb-2">Status</label>
                        <select name="status" id="status" class="w-full px-4 py-2 border border-slate-200 rounded-lg focus:ring-2 focus:ring-primary-500 focus:border-primary-500">
                            <option value="pending" {{ $tradeAccount->status === 'pending' ? 'selected' : '' }}>Pending</option>
                            <option value="approved" {{ $tradeAccount->status === 'approved' ? 'selected' : '' }}>Approved</option>
                            <option value="suspended" {{ $tradeAccount->status === 'suspended' ? 'selected' : '' }}>Suspended</option>
                        </select>
                    </div>

                    <button type="submit" class="w-full px-4 py-2 bg-primary-600 text-white font-medium rounded-lg hover:bg-primary-700 transition-colors">
                        Update Account
                    </button>
                </form>
            </div>

            <!-- Stats -->
            <div class="bg-white rounded-2xl border border-slate-200 p-6">
                <h2 class="font-bold text-secondary-900 mb-4">Statistics</h2>
                
                <div class="space-y-4">
                    <div class="flex justify-between items-center">
                        <span class="text-slate-500">Total Orders</span>
                        <span class="font-bold text-secondary-900">{{ $stats['total_orders'] }}</span>
                    </div>
                    <div class="flex justify-between items-center">
                        <span class="text-slate-500">Total Spent</span>
                        <span class="font-bold text-secondary-900">£{{ number_format($stats['total_spent'], 2) }}</span>
                    </div>
                    <div class="flex justify-between items-center">
                        <span class="text-slate-500">Member Since</span>
                        <span class="text-secondary-900">{{ $tradeAccount->created_at->format('d M Y') }}</span>
                    </div>
                    @if($tradeAccount->approved_at)
                        <div class="flex justify-between items-center">
                            <span class="text-slate-500">Approved</span>
                            <span class="text-secondary-900">{{ $tradeAccount->approved_at->format('d M Y') }}</span>
                        </div>
                    @endif
                </div>
            </div>

            <!-- Application Details -->
            <div class="bg-white rounded-2xl border border-slate-200 p-6">
                <h2 class="font-bold text-secondary-900 mb-4">Application Info</h2>
                
                <div class="space-y-3 text-sm">
                    <div>
                        <p class="text-slate-500">Estimated Volume</p>
                        <p class="font-medium text-secondary-900">{{ $tradeAccount->estimated_volume ?? 'Not specified' }} blinds/month</p>
                    </div>
                </div>
            </div>

            <!-- Delete Account -->
            <div class="bg-red-50 rounded-2xl border border-red-200 p-6">
                <h2 class="font-bold text-red-900 mb-2">Danger Zone</h2>
                <p class="text-sm text-red-700 mb-4">Permanently delete this trade account and all associated data.</p>
                <form action="{{ route('admin.trade-accounts.destroy', $tradeAccount) }}" method="POST" onsubmit="return confirm('Are you sure? This action cannot be undone.')">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="w-full px-4 py-2 bg-red-600 text-white font-medium rounded-lg hover:bg-red-700 transition-colors">
                        Delete Account
                    </button>
                </form>
            </div>
        </div>
    </div>
@endsection
