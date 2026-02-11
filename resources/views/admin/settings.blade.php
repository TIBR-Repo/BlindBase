@extends('admin.layouts.app')

@section('title', 'Settings')
@section('header', 'Settings')
@section('subheader', 'Configure your store settings')

@section('content')
    <div class="grid grid-cols-1 lg:grid-cols-2 gap-6">
        <!-- Company Details -->
        <div class="bg-white rounded-2xl border border-slate-200 p-6">
            <h2 class="font-bold text-secondary-900 mb-6">Company Details</h2>
            
            <form action="{{ route('admin.settings.update') }}" method="POST" class="space-y-4">
                @csrf

                <div>
                    <label for="company_name" class="block text-sm font-medium text-secondary-900 mb-2">Company Name</label>
                    <input type="text" name="company_name" id="company_name" value="{{ session('admin_settings.company_name', 'BlindPoint Supply Ltd') }}"
                        class="w-full px-4 py-2 border border-slate-200 rounded-lg focus:ring-2 focus:ring-primary-500 focus:border-primary-500">
                </div>

                <div>
                    <label for="company_email" class="block text-sm font-medium text-secondary-900 mb-2">Contact Email</label>
                    <input type="email" name="company_email" id="company_email" value="{{ session('admin_settings.company_email', 'sales@blindpoint.co.uk') }}"
                        class="w-full px-4 py-2 border border-slate-200 rounded-lg focus:ring-2 focus:ring-primary-500 focus:border-primary-500">
                </div>

                <div>
                    <label for="company_phone" class="block text-sm font-medium text-secondary-900 mb-2">Contact Phone</label>
                    <input type="text" name="company_phone" id="company_phone" value="{{ session('admin_settings.company_phone', '') }}"
                        class="w-full px-4 py-2 border border-slate-200 rounded-lg focus:ring-2 focus:ring-primary-500 focus:border-primary-500">
                </div>

                <div>
                    <label for="company_address" class="block text-sm font-medium text-secondary-900 mb-2">Address</label>
                    <textarea name="company_address" id="company_address" rows="3"
                        class="w-full px-4 py-2 border border-slate-200 rounded-lg focus:ring-2 focus:ring-primary-500 focus:border-primary-500">{{ session('admin_settings.company_address', '') }}</textarea>
                </div>

                <button type="submit" class="px-4 py-2 bg-primary-600 text-white font-medium rounded-lg hover:bg-primary-700 transition-colors">
                    Save Company Details
                </button>
            </form>
        </div>

        <!-- Shipping Settings -->
        <div class="bg-white rounded-2xl border border-slate-200 p-6">
            <h2 class="font-bold text-secondary-900 mb-6">Shipping Settings</h2>
            
            <form action="{{ route('admin.settings.update') }}" method="POST" class="space-y-4">
                @csrf

                <div>
                    <label for="free_shipping_threshold" class="block text-sm font-medium text-secondary-900 mb-2">Free Shipping Threshold (£)</label>
                    <input type="number" name="free_shipping_threshold" id="free_shipping_threshold" value="{{ session('admin_settings.free_shipping_threshold', '75') }}" step="0.01"
                        class="w-full px-4 py-2 border border-slate-200 rounded-lg focus:ring-2 focus:ring-primary-500 focus:border-primary-500">
                    <p class="mt-1 text-xs text-slate-500">Orders above this amount qualify for free delivery</p>
                </div>

                <div>
                    <label for="default_trade_discount" class="block text-sm font-medium text-secondary-900 mb-2">Default Trade Discount (%)</label>
                    <input type="number" name="default_trade_discount" id="default_trade_discount" value="{{ session('admin_settings.default_trade_discount', '15') }}" step="0.01" min="0" max="100"
                        class="w-full px-4 py-2 border border-slate-200 rounded-lg focus:ring-2 focus:ring-primary-500 focus:border-primary-500">
                    <p class="mt-1 text-xs text-slate-500">Default discount for new trade accounts</p>
                </div>

                <button type="submit" class="px-4 py-2 bg-primary-600 text-white font-medium rounded-lg hover:bg-primary-700 transition-colors">
                    Save Shipping Settings
                </button>
            </form>
        </div>

        <!-- Stripe Settings -->
        <div class="bg-white rounded-2xl border border-slate-200 p-6">
            <h2 class="font-bold text-secondary-900 mb-6">Stripe Payment Settings</h2>
            
            <div class="space-y-4">
                <div>
                    <label class="block text-sm font-medium text-secondary-900 mb-2">Publishable Key</label>
                    <input type="text" value="{{ config('services.stripe.key') ? '••••••••' . substr(config('services.stripe.key'), -8) : 'Not configured' }}" disabled
                        class="w-full px-4 py-2 border border-slate-200 rounded-lg bg-slate-50 text-slate-500">
                </div>

                <div>
                    <label class="block text-sm font-medium text-secondary-900 mb-2">Secret Key</label>
                    <input type="text" value="{{ config('services.stripe.secret') ? '••••••••' . substr(config('services.stripe.secret'), -8) : 'Not configured' }}" disabled
                        class="w-full px-4 py-2 border border-slate-200 rounded-lg bg-slate-50 text-slate-500">
                </div>

                <div class="p-4 bg-amber-50 rounded-lg">
                    <p class="text-sm text-amber-700">
                        <strong>Note:</strong> Stripe keys are configured via environment variables (.env file) for security. Contact your developer to update these settings.
                    </p>
                </div>
            </div>
        </div>

        <!-- Change Password -->
        <div class="bg-white rounded-2xl border border-slate-200 p-6">
            <h2 class="font-bold text-secondary-900 mb-6">Change Password</h2>
            
            <form action="{{ route('admin.settings.password') }}" method="POST" class="space-y-4">
                @csrf

                <div>
                    <label for="current_password" class="block text-sm font-medium text-secondary-900 mb-2">Current Password</label>
                    <input type="password" name="current_password" id="current_password" required
                        class="w-full px-4 py-2 border border-slate-200 rounded-lg focus:ring-2 focus:ring-primary-500 focus:border-primary-500 @error('current_password') border-red-500 @enderror">
                    @error('current_password')
                        <p class="mt-1 text-sm text-red-500">{{ $message }}</p>
                    @enderror
                </div>

                <div>
                    <label for="password" class="block text-sm font-medium text-secondary-900 mb-2">New Password</label>
                    <input type="password" name="password" id="password" required
                        class="w-full px-4 py-2 border border-slate-200 rounded-lg focus:ring-2 focus:ring-primary-500 focus:border-primary-500 @error('password') border-red-500 @enderror">
                    @error('password')
                        <p class="mt-1 text-sm text-red-500">{{ $message }}</p>
                    @enderror
                </div>

                <div>
                    <label for="password_confirmation" class="block text-sm font-medium text-secondary-900 mb-2">Confirm New Password</label>
                    <input type="password" name="password_confirmation" id="password_confirmation" required
                        class="w-full px-4 py-2 border border-slate-200 rounded-lg focus:ring-2 focus:ring-primary-500 focus:border-primary-500">
                </div>

                <button type="submit" class="px-4 py-2 bg-primary-600 text-white font-medium rounded-lg hover:bg-primary-700 transition-colors">
                    Update Password
                </button>
            </form>
        </div>
    </div>
@endsection
