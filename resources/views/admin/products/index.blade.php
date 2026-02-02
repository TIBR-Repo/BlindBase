@extends('admin.layouts.app')

@section('title', 'Products')
@section('header', 'Products')
@section('subheader', 'Manage your product catalog')

@section('header-actions')
    <a href="{{ route('admin.products.create') }}" class="inline-flex items-center gap-2 px-4 py-2 bg-primary-600 text-white font-medium rounded-lg hover:bg-primary-700 transition-colors">
        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4"/>
        </svg>
        Add Product
    </a>
@endsection

@section('content')
    <!-- Filters -->
    <div class="bg-white rounded-2xl border border-slate-200 p-6 mb-6">
        <form action="{{ route('admin.products.index') }}" method="GET" class="flex flex-wrap items-end gap-4">
            <div class="flex-1 min-w-[200px]">
                <label class="block text-sm font-medium text-secondary-900 mb-2">Search</label>
                <input type="text" name="search" value="{{ request('search') }}" placeholder="Search by name or SKU..."
                    class="w-full px-4 py-2 border border-slate-200 rounded-lg focus:ring-2 focus:ring-primary-500 focus:border-primary-500">
            </div>
            <div class="w-48">
                <label class="block text-sm font-medium text-secondary-900 mb-2">Category</label>
                <select name="category" class="w-full px-4 py-2 border border-slate-200 rounded-lg focus:ring-2 focus:ring-primary-500 focus:border-primary-500">
                    <option value="">All Categories</option>
                    @foreach($categories as $category)
                        <option value="{{ $category->id }}" {{ request('category') == $category->id ? 'selected' : '' }}>{{ $category->name }}</option>
                    @endforeach
                </select>
            </div>
            <div class="w-40">
                <label class="block text-sm font-medium text-secondary-900 mb-2">Status</label>
                <select name="status" class="w-full px-4 py-2 border border-slate-200 rounded-lg focus:ring-2 focus:ring-primary-500 focus:border-primary-500">
                    <option value="">All Status</option>
                    <option value="published" {{ request('status') === 'published' ? 'selected' : '' }}>Published</option>
                    <option value="draft" {{ request('status') === 'draft' ? 'selected' : '' }}>Draft</option>
                </select>
            </div>
            <div class="w-40">
                <label class="block text-sm font-medium text-secondary-900 mb-2">Stock</label>
                <select name="stock" class="w-full px-4 py-2 border border-slate-200 rounded-lg focus:ring-2 focus:ring-primary-500 focus:border-primary-500">
                    <option value="">All Stock</option>
                    <option value="low" {{ request('stock') === 'low' ? 'selected' : '' }}>Low Stock (≤5)</option>
                    <option value="out" {{ request('stock') === 'out' ? 'selected' : '' }}>Out of Stock</option>
                </select>
            </div>
            <button type="submit" class="px-4 py-2 bg-slate-100 text-secondary-900 font-medium rounded-lg hover:bg-slate-200 transition-colors">
                Filter
            </button>
            @if(request()->hasAny(['search', 'category', 'status', 'stock']))
                <a href="{{ route('admin.products.index') }}" class="px-4 py-2 text-slate-600 hover:text-secondary-900 transition-colors">
                    Clear
                </a>
            @endif
        </form>
    </div>

    <!-- Products Table -->
    <div class="bg-white rounded-2xl border border-slate-200 overflow-hidden">
        @if($products->count() > 0)
            <table class="w-full">
                <thead>
                    <tr class="bg-slate-50 border-b border-slate-200">
                        <th class="text-left py-4 px-6 text-sm font-semibold text-secondary-900">Product</th>
                        <th class="text-left py-4 px-4 text-sm font-semibold text-secondary-900">SKU</th>
                        <th class="text-left py-4 px-4 text-sm font-semibold text-secondary-900">Price</th>
                        <th class="text-center py-4 px-4 text-sm font-semibold text-secondary-900">Stock</th>
                        <th class="text-center py-4 px-4 text-sm font-semibold text-secondary-900">Status</th>
                        <th class="text-right py-4 px-6 text-sm font-semibold text-secondary-900">Actions</th>
                    </tr>
                </thead>
                <tbody class="divide-y divide-slate-100">
                    @foreach($products as $product)
                        <tr class="hover:bg-slate-50 transition-colors">
                            <td class="py-4 px-6">
                                <div class="flex items-center gap-3">
                                    <div class="w-12 h-12 bg-slate-100 rounded-lg flex items-center justify-center overflow-hidden">
                                        @if($product->image)
                                            <img src="{{ $product->image }}" alt="{{ $product->name }}" class="w-full h-full object-cover">
                                        @else
                                            <svg class="w-6 h-6 text-slate-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M20 7l-8-4-8 4m16 0l-8 4m8-4v10l-8 4m0-10L4 7m8 4v10M4 7v10l8 4"/>
                                            </svg>
                                        @endif
                                    </div>
                                    <div>
                                        <p class="font-medium text-secondary-900">{{ $product->name }}</p>
                                        <p class="text-xs text-slate-500">{{ $product->category->name ?? 'Uncategorized' }}</p>
                                    </div>
                                </div>
                            </td>
                            <td class="py-4 px-4">
                                <span class="text-sm text-slate-600 font-mono">{{ $product->sku }}</span>
                            </td>
                            <td class="py-4 px-4">
                                <span class="font-semibold text-secondary-900">£{{ number_format($product->price, 2) }}</span>
                                @if($product->trade_price)
                                    <br><span class="text-xs text-slate-500">Trade: £{{ number_format($product->trade_price, 2) }}</span>
                                @endif
                            </td>
                            <td class="py-4 px-4 text-center">
                                <span class="inline-flex items-center px-2 py-1 rounded-lg text-sm font-medium
                                    @if($product->stock === 0) bg-red-100 text-red-700
                                    @elseif($product->stock <= 5) bg-amber-100 text-amber-700
                                    @else bg-green-100 text-green-700 @endif">
                                    {{ $product->stock }}
                                </span>
                            </td>
                            <td class="py-4 px-4 text-center">
                                @if($product->is_published)
                                    <span class="inline-flex items-center px-2 py-1 rounded-full text-xs font-medium bg-green-100 text-green-700">Published</span>
                                @else
                                    <span class="inline-flex items-center px-2 py-1 rounded-full text-xs font-medium bg-slate-100 text-slate-700">Draft</span>
                                @endif
                            </td>
                            <td class="py-4 px-6 text-right">
                                <div class="flex items-center justify-end gap-2">
                                    <a href="{{ route('admin.products.edit', $product) }}" class="p-2 text-slate-400 hover:text-primary-600 transition-colors" title="Edit">
                                        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z"/>
                                        </svg>
                                    </a>
                                    <form action="{{ route('admin.products.destroy', $product) }}" method="POST" onsubmit="return confirm('Are you sure you want to delete this product?')">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="p-2 text-slate-400 hover:text-red-600 transition-colors" title="Delete">
                                            <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16"/>
                                            </svg>
                                        </button>
                                    </form>
                                </div>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>

            @if($products->hasPages())
                <div class="px-6 py-4 border-t border-slate-200">
                    {{ $products->links() }}
                </div>
            @endif
        @else
            <div class="p-12 text-center">
                <svg class="w-12 h-12 text-slate-300 mx-auto mb-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M20 7l-8-4-8 4m16 0l-8 4m8-4v10l-8 4m0-10L4 7m8 4v10M4 7v10l8 4"/>
                </svg>
                <p class="text-slate-500 mb-4">No products found</p>
                <a href="{{ route('admin.products.create') }}" class="inline-flex items-center gap-2 text-primary-600 font-medium hover:underline">
                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4"/>
                    </svg>
                    Add your first product
                </a>
            </div>
        @endif
    </div>
@endsection
