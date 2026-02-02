@extends('admin.layouts.app')

@section('title', 'Trade Accounts')
@section('header', 'Trade Accounts')
@section('subheader', 'Manage trade account applications and members')

@section('content')
    @if($pendingCount > 0)
        <div class="mb-6 p-4 bg-amber-50 border border-amber-200 rounded-xl">
            <div class="flex items-center justify-between">
                <div class="flex items-center gap-3">
                    <svg class="w-5 h-5 text-amber-500" fill="currentColor" viewBox="0 0 20 20">
                        <path fill-rule="evenodd" d="M8.257 3.099c.765-1.36 2.722-1.36 3.486 0l5.58 9.92c.75 1.334-.213 2.98-1.742 2.98H4.42c-1.53 0-2.493-1.646-1.743-2.98l5.58-9.92zM11 13a1 1 0 11-2 0 1 1 0 012 0zm-1-8a1 1 0 00-1 1v3a1 1 0 002 0V6a1 1 0 00-1-1z" clip-rule="evenodd"/>
                    </svg>
                    <span class="text-amber-700 font-medium">{{ $pendingCount }} pending application(s) awaiting review</span>
                </div>
                <a href="{{ route('admin.trade-accounts.index', ['status' => 'pending']) }}" class="text-sm text-amber-600 hover:text-amber-700 font-medium">
                    Review Now →
                </a>
            </div>
        </div>
    @endif

    <!-- Filters -->
    <div class="bg-white rounded-2xl border border-slate-200 p-6 mb-6">
        <form action="{{ route('admin.trade-accounts.index') }}" method="GET" class="flex flex-wrap items-end gap-4">
            <div class="flex-1 min-w-[200px]">
                <label class="block text-sm font-medium text-secondary-900 mb-2">Search</label>
                <input type="text" name="search" value="{{ request('search') }}" placeholder="Search by company, contact or email..."
                    class="w-full px-4 py-2 border border-slate-200 rounded-lg focus:ring-2 focus:ring-primary-500 focus:border-primary-500">
            </div>
            <div class="w-40">
                <label class="block text-sm font-medium text-secondary-900 mb-2">Status</label>
                <select name="status" class="w-full px-4 py-2 border border-slate-200 rounded-lg focus:ring-2 focus:ring-primary-500 focus:border-primary-500">
                    <option value="">All Status</option>
                    <option value="pending" {{ request('status') === 'pending' ? 'selected' : '' }}>Pending</option>
                    <option value="approved" {{ request('status') === 'approved' ? 'selected' : '' }}>Approved</option>
                    <option value="suspended" {{ request('status') === 'suspended' ? 'selected' : '' }}>Suspended</option>
                </select>
            </div>
            <button type="submit" class="px-4 py-2 bg-slate-100 text-secondary-900 font-medium rounded-lg hover:bg-slate-200 transition-colors">
                Filter
            </button>
            @if(request()->hasAny(['search', 'status']))
                <a href="{{ route('admin.trade-accounts.index') }}" class="px-4 py-2 text-slate-600 hover:text-secondary-900 transition-colors">
                    Clear
                </a>
            @endif
        </form>
    </div>

    <!-- Accounts Table -->
    <div class="bg-white rounded-2xl border border-slate-200 overflow-hidden">
        @if($accounts->count() > 0)
            <table class="w-full">
                <thead>
                    <tr class="bg-slate-50 border-b border-slate-200">
                        <th class="text-left py-4 px-6 text-sm font-semibold text-secondary-900">Company</th>
                        <th class="text-left py-4 px-4 text-sm font-semibold text-secondary-900">Contact</th>
                        <th class="text-left py-4 px-4 text-sm font-semibold text-secondary-900">Sector</th>
                        <th class="text-left py-4 px-4 text-sm font-semibold text-secondary-900">Applied</th>
                        <th class="text-center py-4 px-4 text-sm font-semibold text-secondary-900">Orders</th>
                        <th class="text-center py-4 px-4 text-sm font-semibold text-secondary-900">Status</th>
                        <th class="text-right py-4 px-6 text-sm font-semibold text-secondary-900">Actions</th>
                    </tr>
                </thead>
                <tbody class="divide-y divide-slate-100">
                    @foreach($accounts as $account)
                        <tr class="hover:bg-slate-50 transition-colors {{ $account->isPending() ? 'bg-amber-50/50' : '' }}">
                            <td class="py-4 px-6">
                                <p class="font-medium text-secondary-900">{{ $account->company_name }}</p>
                                <p class="text-xs text-slate-500">{{ $account->discount_percent }}% discount</p>
                            </td>
                            <td class="py-4 px-4">
                                <p class="text-sm text-secondary-900">{{ $account->contact_name }}</p>
                                <p class="text-xs text-slate-500">{{ $account->email }}</p>
                            </td>
                            <td class="py-4 px-4">
                                <span class="text-sm text-secondary-900 capitalize">{{ str_replace('-', ' ', $account->sector ?? 'N/A') }}</span>
                            </td>
                            <td class="py-4 px-4">
                                <span class="text-sm text-slate-600">{{ $account->created_at->format('d M Y') }}</span>
                            </td>
                            <td class="py-4 px-4 text-center">
                                <span class="text-sm text-secondary-900">{{ $account->orders_count }}</span>
                            </td>
                            <td class="py-4 px-4 text-center">
                                <span class="inline-flex items-center px-2.5 py-1 rounded-full text-xs font-medium
                                    @if($account->status === 'approved') bg-green-100 text-green-700
                                    @elseif($account->status === 'pending') bg-amber-100 text-amber-700
                                    @else bg-red-100 text-red-700 @endif">
                                    {{ ucfirst($account->status) }}
                                </span>
                            </td>
                            <td class="py-4 px-6 text-right">
                                <div class="flex items-center justify-end gap-2">
                                    @if($account->isPending())
                                        <form action="{{ route('admin.trade-accounts.approve', $account) }}" method="POST" class="inline">
                                            @csrf
                                            <button type="submit" class="px-3 py-1.5 text-xs font-medium text-green-600 hover:bg-green-50 rounded-lg transition-colors">
                                                Approve
                                            </button>
                                        </form>
                                        <form action="{{ route('admin.trade-accounts.reject', $account) }}" method="POST" class="inline">
                                            @csrf
                                            <button type="submit" class="px-3 py-1.5 text-xs font-medium text-red-600 hover:bg-red-50 rounded-lg transition-colors">
                                                Reject
                                            </button>
                                        </form>
                                    @endif
                                    <a href="{{ route('admin.trade-accounts.show', $account) }}" class="px-3 py-1.5 text-xs font-medium text-primary-600 hover:bg-primary-50 rounded-lg transition-colors">
                                        View
                                    </a>
                                </div>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>

            @if($accounts->hasPages())
                <div class="px-6 py-4 border-t border-slate-200">
                    {{ $accounts->links() }}
                </div>
            @endif
        @else
            <div class="p-12 text-center">
                <svg class="w-12 h-12 text-slate-300 mx-auto mb-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 21V5a2 2 0 00-2-2H7a2 2 0 00-2 2v16m14 0h2m-2 0h-5m-9 0H3m2 0h5"/>
                </svg>
                <p class="text-slate-500">No trade accounts found</p>
            </div>
        @endif
    </div>
@endsection
