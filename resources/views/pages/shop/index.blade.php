<x-layouts.app>
    @php
        $pageTitle = isset($category) ? $category->name : 'Shop';
    @endphp

    <!-- Page Header -->
    <section class="bg-secondary-900 py-12">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <nav class="flex items-center gap-2 text-sm text-slate-400 mb-4">
                <a href="{{ route('home') }}" class="hover:text-white transition-colors">Home</a>
                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"/>
                </svg>
                @if(isset($category))
                    <a href="{{ route('shop.index') }}" class="hover:text-white transition-colors">Shop</a>
                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"/>
                    </svg>
                    <span class="text-white">{{ $category->name }}</span>
                @else
                    <span class="text-white">Shop</span>
                @endif
            </nav>
            <h1 class="text-3xl lg:text-4xl font-bold text-white">{{ $pageTitle }}</h1>
            @if(isset($category) && $category->children->count() > 0)
                <div class="flex flex-wrap gap-2 mt-4">
                    @foreach($category->children as $child)
                        <a href="{{ route('shop.category', $child->slug) }}" class="px-4 py-2 bg-white/10 text-white text-sm rounded-lg hover:bg-white/20 transition-colors">
                            {{ $child->name }}
                        </a>
                    @endforeach
                </div>
            @endif
        </div>
    </section>

    <section class="py-8 lg:py-12 bg-slate-50">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="flex flex-col lg:flex-row gap-8">
                <!-- Mobile Filter Toggle -->
                <div class="lg:hidden">
                    <button type="button" id="filter-toggle" class="w-full flex items-center justify-between px-4 py-3 bg-white rounded-xl border border-slate-200 text-secondary-900 font-medium">
                        <span class="flex items-center gap-2">
                            <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 4a1 1 0 011-1h16a1 1 0 011 1v2.586a1 1 0 01-.293.707l-6.414 6.414a1 1 0 00-.293.707V17l-4 4v-6.586a1 1 0 00-.293-.707L3.293 7.293A1 1 0 013 6.586V4z"/>
                            </svg>
                            Filters
                        </span>
                        <svg class="w-5 h-5 transition-transform" id="filter-toggle-icon" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"/>
                        </svg>
                    </button>
                </div>

                <!-- Sidebar Filters -->
                <aside id="filters-sidebar" class="hidden lg:block w-full lg:w-72 flex-shrink-0">
                    <form id="filter-form" method="GET" action="{{ isset($category) ? route('shop.category', $category->slug) : route('shop.index') }}">
                        <div class="bg-white rounded-2xl border border-slate-200 overflow-hidden">
                            <!-- Categories -->
                            @if(!isset($category))
                            <div class="p-5 border-b border-slate-200">
                                <h3 class="font-semibold text-secondary-900 mb-4">Categories</h3>
                                <div class="space-y-2">
                                    @foreach($categories as $cat)
                                        <div>
                                            <label class="flex items-center gap-3 cursor-pointer group">
                                                <input type="checkbox" name="category[]" value="{{ $cat->id }}" 
                                                    {{ in_array($cat->id, request('category', [])) ? 'checked' : '' }}
                                                    class="w-4 h-4 rounded border-slate-300 text-primary-600 focus:ring-primary-500">
                                                <span class="text-sm text-secondary-700 group-hover:text-primary-600 transition-colors">{{ $cat->name }}</span>
                                            </label>
                                            @if($cat->children->count() > 0)
                                                <div class="ml-7 mt-2 space-y-2">
                                                    @foreach($cat->children as $child)
                                                        <label class="flex items-center gap-3 cursor-pointer group">
                                                            <input type="checkbox" name="category[]" value="{{ $child->id }}"
                                                                {{ in_array($child->id, request('category', [])) ? 'checked' : '' }}
                                                                class="w-4 h-4 rounded border-slate-300 text-primary-600 focus:ring-primary-500">
                                                            <span class="text-sm text-slate-600 group-hover:text-primary-600 transition-colors">{{ $child->name }}</span>
                                                        </label>
                                                    @endforeach
                                                </div>
                                            @endif
                                        </div>
                                    @endforeach
                                </div>
                            </div>
                            @endif

                            <!-- Sizes -->
                            @if($allSizes->count() > 0)
                            <div class="p-5 border-b border-slate-200">
                                <h3 class="font-semibold text-secondary-900 mb-4">Sizes</h3>
                                <div class="space-y-2 max-h-48 overflow-y-auto">
                                    @foreach($allSizes as $size)
                                        <label class="flex items-center gap-3 cursor-pointer group">
                                            <input type="checkbox" name="sizes[]" value="{{ $size }}"
                                                {{ in_array($size, request('sizes', [])) ? 'checked' : '' }}
                                                class="w-4 h-4 rounded border-slate-300 text-primary-600 focus:ring-primary-500">
                                            <span class="text-sm text-secondary-700 group-hover:text-primary-600 transition-colors">{{ $size }}</span>
                                        </label>
                                    @endforeach
                                </div>
                            </div>
                            @endif

                            <!-- Colours -->
                            @if($allColours->count() > 0)
                            <div class="p-5 border-b border-slate-200">
                                <h3 class="font-semibold text-secondary-900 mb-4">Colours</h3>
                                <div class="space-y-2">
                                    @foreach($allColours as $colour)
                                        <label class="flex items-center gap-3 cursor-pointer group">
                                            <input type="checkbox" name="colours[]" value="{{ $colour }}"
                                                {{ in_array($colour, request('colours', [])) ? 'checked' : '' }}
                                                class="w-4 h-4 rounded border-slate-300 text-primary-600 focus:ring-primary-500">
                                            <span class="text-sm text-secondary-700 group-hover:text-primary-600 transition-colors">{{ $colour }}</span>
                                        </label>
                                    @endforeach
                                </div>
                            </div>
                            @endif

                            <!-- Compliance -->
                            <div class="p-5">
                                <h3 class="font-semibold text-secondary-900 mb-4">Compliance</h3>
                                <div class="space-y-2">
                                    <label class="flex items-center gap-3 cursor-pointer group">
                                        <input type="checkbox" name="compliance[]" value="fire_rated"
                                            {{ in_array('fire_rated', request('compliance', [])) ? 'checked' : '' }}
                                            class="w-4 h-4 rounded border-slate-300 text-primary-600 focus:ring-primary-500">
                                        <span class="text-sm text-secondary-700 group-hover:text-primary-600 transition-colors">Fire Rated</span>
                                    </label>
                                    <label class="flex items-center gap-3 cursor-pointer group">
                                        <input type="checkbox" name="compliance[]" value="antimicrobial"
                                            {{ in_array('antimicrobial', request('compliance', [])) ? 'checked' : '' }}
                                            class="w-4 h-4 rounded border-slate-300 text-primary-600 focus:ring-primary-500">
                                        <span class="text-sm text-secondary-700 group-hover:text-primary-600 transition-colors">Antimicrobial</span>
                                    </label>
                                    <label class="flex items-center gap-3 cursor-pointer group">
                                        <input type="checkbox" name="compliance[]" value="wipe_clean"
                                            {{ in_array('wipe_clean', request('compliance', [])) ? 'checked' : '' }}
                                            class="w-4 h-4 rounded border-slate-300 text-primary-600 focus:ring-primary-500">
                                        <span class="text-sm text-secondary-700 group-hover:text-primary-600 transition-colors">Wipe Clean</span>
                                    </label>
                                    <label class="flex items-center gap-3 cursor-pointer group">
                                        <input type="checkbox" name="compliance[]" value="child_safe"
                                            {{ in_array('child_safe', request('compliance', [])) ? 'checked' : '' }}
                                            class="w-4 h-4 rounded border-slate-300 text-primary-600 focus:ring-primary-500">
                                        <span class="text-sm text-secondary-700 group-hover:text-primary-600 transition-colors">Child Safe</span>
                                    </label>
                                </div>
                            </div>
                        </div>

                        <!-- Filter Actions -->
                        <div class="mt-4 flex gap-3">
                            <button type="submit" class="flex-1 px-4 py-2.5 bg-primary-600 text-white font-semibold rounded-xl hover:bg-primary-700 transition-colors">
                                Apply Filters
                            </button>
                            <a href="{{ isset($category) ? route('shop.category', $category->slug) : route('shop.index') }}" class="px-4 py-2.5 bg-slate-200 text-secondary-700 font-semibold rounded-xl hover:bg-slate-300 transition-colors">
                                Clear
                            </a>
                        </div>
                    </form>
                </aside>

                <!-- Products Grid -->
                <div class="flex-1">
                    <!-- Sort Bar -->
                    <div class="flex flex-col sm:flex-row sm:items-center justify-between gap-4 mb-6">
                        <p class="text-slate-600">
                            Showing <span class="font-semibold text-secondary-900">{{ $products->count() }}</span> of <span class="font-semibold text-secondary-900">{{ $products->total() }}</span> products
                        </p>
                        <div class="flex items-center gap-3">
                            <label class="text-sm text-slate-600">Sort by:</label>
                            <select name="sort" onchange="window.location.href=this.value" class="px-4 py-2 bg-white border border-slate-200 rounded-lg text-sm text-secondary-900 focus:ring-2 focus:ring-primary-500 focus:border-primary-500">
                                <option value="{{ request()->fullUrlWithQuery(['sort' => 'name']) }}" {{ request('sort', 'name') == 'name' ? 'selected' : '' }}>Name A-Z</option>
                                <option value="{{ request()->fullUrlWithQuery(['sort' => 'price_low']) }}" {{ request('sort') == 'price_low' ? 'selected' : '' }}>Price: Low to High</option>
                                <option value="{{ request()->fullUrlWithQuery(['sort' => 'price_high']) }}" {{ request('sort') == 'price_high' ? 'selected' : '' }}>Price: High to Low</option>
                                <option value="{{ request()->fullUrlWithQuery(['sort' => 'newest']) }}" {{ request('sort') == 'newest' ? 'selected' : '' }}>Newest First</option>
                            </select>
                        </div>
                    </div>

                    @if($products->count() > 0)
                        <!-- Products Grid -->
                        <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-6">
                            @foreach($products as $product)
                                <article class="group bg-white rounded-2xl border border-slate-200 overflow-hidden hover:shadow-xl transition-all duration-300">
                                    <!-- Product Image -->
                                    <a href="{{ route('shop.show', $product->slug) }}" class="block relative aspect-square bg-gradient-to-br from-slate-100 to-slate-200 overflow-hidden">
                                        @if($product->image)
                                            <img src="{{ $product->image }}" alt="{{ $product->name }}" class="w-full h-full object-cover group-hover:scale-105 transition-transform duration-300">
                                        @else
                                            <div class="absolute inset-0 flex items-center justify-center">
                                                <svg class="w-20 h-20 text-slate-300" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1" d="M4 5a1 1 0 011-1h14a1 1 0 011 1v2a1 1 0 01-1 1H5a1 1 0 01-1-1V5zM4 13a1 1 0 011-1h6a1 1 0 011 1v6a1 1 0 01-1 1H5a1 1 0 01-1-1v-6z"/>
                                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1" d="M16 13h2m-1-1v8"/>
                                                </svg>
                                            </div>
                                        @endif
                                        
                                        <!-- Compliance Badges -->
                                        <div class="absolute top-3 left-3 flex flex-wrap gap-1">
                                            @if($product->fire_rating)
                                                <span class="px-2 py-1 bg-orange-500 text-white text-xs font-semibold rounded-md">Fire Rated</span>
                                            @endif
                                            @if($product->child_safe)
                                                <span class="px-2 py-1 bg-purple-500 text-white text-xs font-semibold rounded-md">Child Safe</span>
                                            @endif
                                        </div>

                                        <!-- Stock Status -->
                                        @if($product->stock <= 0 || $product->status === 'out_of_stock')
                                            <div class="absolute top-3 right-3">
                                                <span class="px-2 py-1 bg-red-500 text-white text-xs font-semibold rounded-md">Out of Stock</span>
                                            </div>
                                        @elseif($product->stock <= 10)
                                            <div class="absolute top-3 right-3">
                                                <span class="px-2 py-1 bg-amber-500 text-white text-xs font-semibold rounded-md">Low Stock</span>
                                            </div>
                                        @endif
                                    </a>

                                    <!-- Product Info -->
                                    <div class="p-5">
                                        <!-- Category -->
                                        <a href="{{ route('shop.category', $product->category->slug) }}" class="text-xs font-semibold text-primary-600 uppercase tracking-wide hover:text-primary-700">
                                            {{ $product->category->name }}
                                        </a>

                                        <!-- Name -->
                                        <h3 class="mt-2 font-bold text-secondary-900 group-hover:text-primary-600 transition-colors">
                                            <a href="{{ route('shop.show', $product->slug) }}">{{ $product->name }}</a>
                                        </h3>

                                        <!-- Price -->
                                        <div class="mt-3">
                                            <span class="text-2xl font-bold text-secondary-900">£{{ number_format($product->price, 2) }}</span>
                                            <span class="text-sm text-slate-500 ml-1">ex VAT</span>
                                        </div>

                                        <!-- Stock Status Text -->
                                        <div class="mt-2">
                                            @if($product->stock <= 0 || $product->status === 'out_of_stock')
                                                <span class="text-sm text-red-600 font-medium">Out of Stock</span>
                                            @elseif($product->stock <= 10)
                                                <span class="text-sm text-amber-600 font-medium">Only {{ $product->stock }} left</span>
                                            @else
                                                <span class="text-sm text-green-600 font-medium">In Stock</span>
                                            @endif
                                        </div>

                                        <!-- View Product Button -->
                                        <a href="{{ route('shop.show', $product->slug) }}" class="mt-4 w-full inline-flex items-center justify-center gap-2 px-4 py-2.5 bg-secondary-900 text-white font-semibold rounded-xl hover:bg-secondary-800 transition-colors">
                                            View Product
                                            <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"/>
                                            </svg>
                                        </a>
                                    </div>
                                </article>
                            @endforeach
                        </div>

                        <!-- Pagination -->
                        @if($products->hasPages())
                            <div class="mt-8">
                                {{ $products->links() }}
                            </div>
                        @endif
                    @else
                        <!-- No Products Found -->
                        <div class="bg-white rounded-2xl border border-slate-200 p-12 text-center">
                            <svg class="w-16 h-16 mx-auto text-slate-300 mb-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M9.172 16.172a4 4 0 015.656 0M9 10h.01M15 10h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"/>
                            </svg>
                            <h3 class="text-lg font-semibold text-secondary-900 mb-2">No products found</h3>
                            <p class="text-slate-600 mb-6">Try adjusting your filters or browse all products.</p>
                            <a href="{{ route('shop.index') }}" class="inline-flex items-center gap-2 px-6 py-3 bg-primary-600 text-white font-semibold rounded-xl hover:bg-primary-700 transition-colors">
                                View All Products
                            </a>
                        </div>
                    @endif
                </div>
            </div>
        </div>
    </section>

    <script>
        // Mobile filter toggle
        document.getElementById('filter-toggle')?.addEventListener('click', function() {
            const sidebar = document.getElementById('filters-sidebar');
            const icon = document.getElementById('filter-toggle-icon');
            sidebar.classList.toggle('hidden');
            icon.classList.toggle('rotate-180');
        });
    </script>
</x-layouts.app>
