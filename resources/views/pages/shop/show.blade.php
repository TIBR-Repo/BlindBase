<x-layouts.app>
    <!-- Breadcrumb -->
    <section class="bg-slate-100 border-b border-slate-200">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-4">
            <nav class="flex items-center gap-2 text-sm text-slate-600">
                <a href="{{ route('home') }}" class="hover:text-primary-600 transition-colors">Home</a>
                <svg class="w-4 h-4 text-slate-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"/>
                </svg>
                <a href="{{ route('shop.index') }}" class="hover:text-primary-600 transition-colors">Shop</a>
                <svg class="w-4 h-4 text-slate-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"/>
                </svg>
                <a href="{{ route('shop.category', $product->category->slug) }}" class="hover:text-primary-600 transition-colors">{{ $product->category->name }}</a>
                <svg class="w-4 h-4 text-slate-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"/>
                </svg>
                <span class="text-secondary-900 font-medium">{{ $product->name }}</span>
            </nav>
        </div>
    </section>

    <!-- Product Detail -->
    <section class="py-8 lg:py-12 bg-white">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="grid grid-cols-1 lg:grid-cols-2 gap-8 lg:gap-12">
                <!-- Product Image -->
                <div class="relative">
                    <div class="aspect-square bg-gradient-to-br from-slate-100 to-slate-200 rounded-2xl overflow-hidden">
                        @if($product->image)
                            <img src="{{ $product->image }}" alt="{{ $product->name }}" class="w-full h-full object-cover">
                        @else
                            <div class="absolute inset-0 flex items-center justify-center">
                                <svg class="w-32 h-32 text-slate-300" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1" d="M4 5a1 1 0 011-1h14a1 1 0 011 1v2a1 1 0 01-1 1H5a1 1 0 01-1-1V5zM4 13a1 1 0 011-1h6a1 1 0 011 1v6a1 1 0 01-1 1H5a1 1 0 01-1-1v-6z"/>
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1" d="M16 13h2m-1-1v8"/>
                                </svg>
                            </div>
                        @endif
                    </div>

                    <!-- Compliance Badges -->
                    <div class="absolute top-4 left-4 flex flex-wrap gap-2">
                        @if($product->fire_rating)
                            <span class="px-3 py-1.5 bg-orange-500 text-white text-sm font-semibold rounded-lg shadow-lg">
                                🔥 Fire Rated
                            </span>
                        @endif
                        @if($product->antimicrobial)
                            <span class="px-3 py-1.5 bg-green-500 text-white text-sm font-semibold rounded-lg shadow-lg">
                                🛡️ Antimicrobial
                            </span>
                        @endif
                        @if($product->child_safe)
                            <span class="px-3 py-1.5 bg-purple-500 text-white text-sm font-semibold rounded-lg shadow-lg">
                                👶 Child Safe
                            </span>
                        @endif
                    </div>
                </div>

                <!-- Product Info -->
                <div>
                    <!-- Category & SKU -->
                    <div class="flex items-center justify-between mb-2">
                        <a href="{{ route('shop.category', $product->category->slug) }}" class="text-sm font-semibold text-primary-600 uppercase tracking-wide hover:text-primary-700">
                            {{ $product->category->name }}
                        </a>
                        <span class="text-sm text-slate-500">SKU: {{ $product->sku }}</span>
                    </div>

                    <!-- Product Name -->
                    <h1 class="text-3xl lg:text-4xl font-bold text-secondary-900 mb-4">{{ $product->name }}</h1>

                    <!-- Price Box -->
                    <div class="bg-slate-50 rounded-2xl p-6 mb-6">
                        <div class="flex items-baseline gap-4 mb-2">
                            <span class="text-4xl font-bold text-secondary-900">£{{ number_format($product->price, 2) }}</span>
                            <span class="text-lg text-slate-500">ex VAT</span>
                        </div>
                        <div class="flex items-baseline gap-4 text-slate-600">
                            <span class="text-lg">£{{ number_format($product->price_inc_vat, 2) }}</span>
                            <span class="text-sm">inc VAT</span>
                        </div>
                        @auth('trade')
                            @if($product->trade_price)
                                <div class="mt-4 pt-4 border-t border-slate-200">
                                    <div class="flex items-center gap-2 mb-1">
                                        <svg class="w-5 h-5 text-green-500" fill="currentColor" viewBox="0 0 20 20">
                                            <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd"/>
                                        </svg>
                                        <span class="text-sm font-semibold text-green-600">Trade Price</span>
                                    </div>
                                    <div class="flex items-baseline gap-4">
                                        <span class="text-2xl font-bold text-green-600">£{{ number_format($product->trade_price, 2) }}</span>
                                        <span class="text-sm text-slate-500">ex VAT</span>
                                        <span class="text-sm text-green-600 font-medium">
                                            Save {{ round((1 - $product->trade_price / $product->price) * 100) }}%
                                        </span>
                                    </div>
                                </div>
                            @endif
                        @else
                            <div class="mt-4 pt-4 border-t border-slate-200">
                                <a href="{{ route('trade.register') }}" class="text-sm text-primary-600 hover:text-primary-700 font-medium">
                                    Open a trade account for exclusive pricing →
                                </a>
                            </div>
                        @endauth
                    </div>

                    <!-- Description -->
                    @if($product->description)
                        <p class="text-slate-600 mb-6 leading-relaxed">{{ $product->description }}</p>
                    @endif

                    <!-- Product Options Form -->
                    <form id="add-to-cart-form" action="{{ route('cart.add') }}" method="POST" class="space-y-6">
                        @csrf
                        <input type="hidden" name="product_id" value="{{ $product->id }}">

                        <!-- Size Selector -->
                        @if($product->sizes && count($product->sizes) > 0)
                            <div>
                                <label class="block text-sm font-semibold text-secondary-900 mb-3">Size</label>
                                <div class="flex flex-wrap gap-2">
                                    @foreach($product->sizes as $index => $size)
                                        <label class="relative">
                                            <input type="radio" name="size" value="{{ $size }}" class="peer sr-only" {{ $index === 0 ? 'checked' : '' }}>
                                            <span class="block px-4 py-2.5 border-2 border-slate-200 rounded-xl text-sm font-medium text-secondary-700 cursor-pointer hover:border-primary-300 peer-checked:border-primary-600 peer-checked:bg-primary-50 peer-checked:text-primary-700 transition-all">
                                                {{ $size }}
                                            </span>
                                        </label>
                                    @endforeach
                                </div>
                            </div>
                        @endif

                        <!-- Colour Selector -->
                        @if($product->colours && count($product->colours) > 0)
                            <div>
                                <label class="block text-sm font-semibold text-secondary-900 mb-3">Colour</label>
                                <div class="flex flex-wrap gap-2">
                                    @foreach($product->colours as $index => $colour)
                                        <label class="relative">
                                            <input type="radio" name="colour" value="{{ $colour }}" class="peer sr-only" {{ $index === 0 ? 'checked' : '' }}>
                                            <span class="block px-4 py-2.5 border-2 border-slate-200 rounded-xl text-sm font-medium text-secondary-700 cursor-pointer hover:border-primary-300 peer-checked:border-primary-600 peer-checked:bg-primary-50 peer-checked:text-primary-700 transition-all">
                                                {{ $colour }}
                                            </span>
                                        </label>
                                    @endforeach
                                </div>
                            </div>
                        @endif

                        <!-- Quantity Selector -->
                        <div>
                            <label class="block text-sm font-semibold text-secondary-900 mb-3">Quantity</label>
                            <div class="flex items-center gap-3">
                                <div class="flex items-center border-2 border-slate-200 rounded-xl overflow-hidden">
                                    <button type="button" id="qty-decrease" class="w-12 h-12 flex items-center justify-center text-secondary-700 hover:bg-slate-100 transition-colors">
                                        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M20 12H4"/>
                                        </svg>
                                    </button>
                                    <input type="number" name="quantity" id="quantity" value="1" min="1" max="{{ $product->stock }}" class="w-16 h-12 text-center text-lg font-semibold text-secondary-900 border-x-2 border-slate-200 focus:outline-none">
                                    <button type="button" id="qty-increase" class="w-12 h-12 flex items-center justify-center text-secondary-700 hover:bg-slate-100 transition-colors">
                                        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4"/>
                                        </svg>
                                    </button>
                                </div>
                                <span class="text-sm text-slate-500">
                                    @if($product->stock > 0)
                                        {{ $product->stock }} available
                                    @endif
                                </span>
                            </div>
                        </div>

                        <!-- Add to Cart Button -->
                        <div class="flex flex-col sm:flex-row gap-3">
                            @if($product->stock > 0 && $product->status !== 'out_of_stock')
                                <button type="submit" class="flex-1 inline-flex items-center justify-center gap-2 px-8 py-4 bg-primary-600 text-white font-semibold rounded-xl hover:bg-primary-700 transition-all hover:shadow-lg hover:shadow-primary-600/25">
                                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 3h2l.4 2M7 13h10l4-8H5.4M7 13L5.4 5M7 13l-2.293 2.293c-.63.63-.184 1.707.707 1.707H17m0 0a2 2 0 100 4 2 2 0 000-4zm-8 2a2 2 0 11-4 0 2 2 0 014 0z"/>
                                    </svg>
                                    Add to Cart
                                </button>
                            @else
                                <button type="button" disabled class="flex-1 inline-flex items-center justify-center gap-2 px-8 py-4 bg-slate-300 text-slate-500 font-semibold rounded-xl cursor-not-allowed">
                                    Out of Stock
                                </button>
                            @endif
                        </div>

                        <!-- Stock Status -->
                        <div class="flex items-center gap-2">
                            @if($product->stock <= 0 || $product->status === 'out_of_stock')
                                <span class="w-3 h-3 bg-red-500 rounded-full"></span>
                                <span class="text-sm font-medium text-red-600">Out of Stock</span>
                            @elseif($product->stock <= 10)
                                <span class="w-3 h-3 bg-amber-500 rounded-full"></span>
                                <span class="text-sm font-medium text-amber-600">Low Stock - Only {{ $product->stock }} left</span>
                            @else
                                <span class="w-3 h-3 bg-green-500 rounded-full"></span>
                                <span class="text-sm font-medium text-green-600">In Stock - Ready to dispatch</span>
                            @endif
                        </div>
                    </form>

                    <!-- Compliance Section -->
                    <div class="mt-8 pt-8 border-t border-slate-200">
                        <h3 class="font-semibold text-secondary-900 mb-4">Compliance & Certifications</h3>
                        <div class="grid grid-cols-2 gap-4">
                            @if($product->fire_rating)
                                <div class="flex items-center gap-3 p-3 bg-orange-50 rounded-xl">
                                    <svg class="w-6 h-6 text-orange-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"/>
                                    </svg>
                                    <div>
                                        <span class="block text-sm font-semibold text-secondary-900">Fire Rated</span>
                                        <span class="text-xs text-slate-600">{{ $product->fire_rating }}</span>
                                    </div>
                                </div>
                            @endif
                            @if($product->antimicrobial)
                                <div class="flex items-center gap-3 p-3 bg-green-50 rounded-xl">
                                    <svg class="w-6 h-6 text-green-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"/>
                                    </svg>
                                    <div>
                                        <span class="block text-sm font-semibold text-secondary-900">Antimicrobial</span>
                                        <span class="text-xs text-slate-600">Treated fabric</span>
                                    </div>
                                </div>
                            @endif
                            @if($product->wipe_clean)
                                <div class="flex items-center gap-3 p-3 bg-blue-50 rounded-xl">
                                    <svg class="w-6 h-6 text-blue-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"/>
                                    </svg>
                                    <div>
                                        <span class="block text-sm font-semibold text-secondary-900">Wipe Clean</span>
                                        <span class="text-xs text-slate-600">Easy maintenance</span>
                                    </div>
                                </div>
                            @endif
                            @if($product->child_safe)
                                <div class="flex items-center gap-3 p-3 bg-purple-50 rounded-xl">
                                    <svg class="w-6 h-6 text-purple-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"/>
                                    </svg>
                                    <div>
                                        <span class="block text-sm font-semibold text-secondary-900">Child Safe</span>
                                        <span class="text-xs text-slate-600">Safe mechanism</span>
                                    </div>
                                </div>
                            @endif
                        </div>

                        <!-- Download Links -->
                        @if($product->fire_cert_path || $product->spec_sheet_path)
                            <div class="mt-4 flex flex-wrap gap-3">
                                @if($product->fire_cert_path)
                                    <a href="{{ $product->fire_cert_path }}" target="_blank" class="inline-flex items-center gap-2 px-4 py-2 border border-slate-200 rounded-lg text-sm font-medium text-secondary-700 hover:bg-slate-50 transition-colors">
                                        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 10v6m0 0l-3-3m3 3l3-3m2 8H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z"/>
                                        </svg>
                                        Fire Certificate
                                    </a>
                                @endif
                                @if($product->spec_sheet_path)
                                    <a href="{{ $product->spec_sheet_path }}" target="_blank" class="inline-flex items-center gap-2 px-4 py-2 border border-slate-200 rounded-lg text-sm font-medium text-secondary-700 hover:bg-slate-50 transition-colors">
                                        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 10v6m0 0l-3-3m3 3l3-3m2 8H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z"/>
                                        </svg>
                                        Spec Sheet
                                    </a>
                                @endif
                            </div>
                        @endif
                    </div>
                </div>
            </div>

            <!-- Accordion Sections -->
            <div class="mt-12 border-t border-slate-200 pt-12">
                <div class="max-w-3xl">
                    <!-- Specifications -->
                    <div class="border-b border-slate-200">
                        <button type="button" class="accordion-trigger w-full flex items-center justify-between py-5 text-left" data-target="spec-content">
                            <span class="text-lg font-semibold text-secondary-900">Specifications</span>
                            <svg class="accordion-icon w-5 h-5 text-slate-500 transition-transform" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"/>
                            </svg>
                        </button>
                        <div id="spec-content" class="accordion-content hidden pb-5">
                            @if($product->full_description)
                                <div class="prose prose-slate max-w-none">
                                    {!! $product->full_description !!}
                                </div>
                            @else
                                <div class="grid grid-cols-2 gap-4 text-sm">
                                    <div class="flex justify-between py-2 border-b border-slate-100">
                                        <span class="text-slate-600">SKU</span>
                                        <span class="font-medium text-secondary-900">{{ $product->sku }}</span>
                                    </div>
                                    @if($product->sizes && count($product->sizes) > 0)
                                        <div class="flex justify-between py-2 border-b border-slate-100">
                                            <span class="text-slate-600">Available Sizes</span>
                                            <span class="font-medium text-secondary-900">{{ count($product->sizes) }} options</span>
                                        </div>
                                    @endif
                                    @if($product->colours && count($product->colours) > 0)
                                        <div class="flex justify-between py-2 border-b border-slate-100">
                                            <span class="text-slate-600">Colours</span>
                                            <span class="font-medium text-secondary-900">{{ implode(', ', $product->colours) }}</span>
                                        </div>
                                    @endif
                                    @if($product->fire_rating)
                                        <div class="flex justify-between py-2 border-b border-slate-100">
                                            <span class="text-slate-600">Fire Rating</span>
                                            <span class="font-medium text-secondary-900">{{ $product->fire_rating }}</span>
                                        </div>
                                    @endif
                                </div>
                            @endif
                        </div>
                    </div>

                    <!-- Fitting Instructions -->
                    <div class="border-b border-slate-200">
                        <button type="button" class="accordion-trigger w-full flex items-center justify-between py-5 text-left" data-target="fitting-content">
                            <span class="text-lg font-semibold text-secondary-900">Fitting Instructions</span>
                            <svg class="accordion-icon w-5 h-5 text-slate-500 transition-transform" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"/>
                            </svg>
                        </button>
                        <div id="fitting-content" class="accordion-content hidden pb-5">
                            <div class="prose prose-slate max-w-none text-sm">
                                <ol class="space-y-3">
                                    <li><strong>Measure your window</strong> - Measure the width and drop of the recess or window frame where the blind will be fitted.</li>
                                    <li><strong>Mark bracket positions</strong> - Hold the brackets in position and mark through the screw holes with a pencil.</li>
                                    <li><strong>Drill pilot holes</strong> - Using an appropriate drill bit, create pilot holes at your marked positions.</li>
                                    <li><strong>Fix the brackets</strong> - Secure the brackets using the screws provided.</li>
                                    <li><strong>Attach the blind</strong> - Click the roller blind headrail into the brackets until it locks into place.</li>
                                    <li><strong>Test the operation</strong> - Ensure the blind operates smoothly and the chain mechanism works correctly.</li>
                                </ol>
                                <p class="mt-4 text-slate-600">For detailed fitting instructions, please refer to the documentation included with your order or download our fitting guide.</p>
                            </div>
                        </div>
                    </div>

                    <!-- Care Instructions -->
                    <div class="border-b border-slate-200">
                        <button type="button" class="accordion-trigger w-full flex items-center justify-between py-5 text-left" data-target="care-content">
                            <span class="text-lg font-semibold text-secondary-900">Care Instructions</span>
                            <svg class="accordion-icon w-5 h-5 text-slate-500 transition-transform" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"/>
                            </svg>
                        </button>
                        <div id="care-content" class="accordion-content hidden pb-5">
                            <div class="prose prose-slate max-w-none text-sm">
                                <ul class="space-y-2">
                                    <li><strong>Regular dusting</strong> - Use a soft cloth or feather duster to remove dust regularly.</li>
                                    <li><strong>Spot cleaning</strong> - For marks or stains, use a damp cloth with mild soap solution. Test on an inconspicuous area first.</li>
                                    @if($product->wipe_clean)
                                        <li><strong>Wipe clean surface</strong> - This blind has a wipe-clean coating. Simply wipe with a damp cloth for easy maintenance.</li>
                                    @endif
                                    <li><strong>Do not machine wash</strong> - Never put the blind fabric in a washing machine or tumble dryer.</li>
                                    <li><strong>Avoid harsh chemicals</strong> - Do not use bleach or abrasive cleaners.</li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Related Products -->
    @if($relatedProducts->count() > 0)
        <section class="py-12 lg:py-16 bg-slate-50">
            <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
                <h2 class="text-2xl lg:text-3xl font-bold text-secondary-900 mb-8">Related Products</h2>
                
                <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-6">
                    @foreach($relatedProducts as $related)
                        <article class="group bg-white rounded-2xl border border-slate-200 overflow-hidden hover:shadow-xl transition-all duration-300">
                            <a href="{{ route('shop.show', $related->slug) }}" class="block relative aspect-square bg-gradient-to-br from-slate-100 to-slate-200 overflow-hidden">
                                @if($related->image)
                                    <img src="{{ $related->image }}" alt="{{ $related->name }}" class="w-full h-full object-cover group-hover:scale-105 transition-transform duration-300">
                                @else
                                    <div class="absolute inset-0 flex items-center justify-center">
                                        <svg class="w-16 h-16 text-slate-300" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1" d="M4 5a1 1 0 011-1h14a1 1 0 011 1v2a1 1 0 01-1 1H5a1 1 0 01-1-1V5zM4 13a1 1 0 011-1h6a1 1 0 011 1v6a1 1 0 01-1 1H5a1 1 0 01-1-1v-6z"/>
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1" d="M16 13h2m-1-1v8"/>
                                        </svg>
                                    </div>
                                @endif
                            </a>
                            <div class="p-4">
                                <h3 class="font-semibold text-secondary-900 group-hover:text-primary-600 transition-colors truncate">
                                    <a href="{{ route('shop.show', $related->slug) }}">{{ $related->name }}</a>
                                </h3>
                                <div class="mt-2">
                                    <span class="text-lg font-bold text-secondary-900">£{{ number_format($related->price, 2) }}</span>
                                    <span class="text-sm text-slate-500">ex VAT</span>
                                </div>
                            </div>
                        </article>
                    @endforeach
                </div>
            </div>
        </section>
    @endif

    <script>
        // Quantity controls
        const qtyInput = document.getElementById('quantity');
        const qtyDecrease = document.getElementById('qty-decrease');
        const qtyIncrease = document.getElementById('qty-increase');
        const maxQty = {{ $product->stock }};

        qtyDecrease?.addEventListener('click', function() {
            const currentVal = parseInt(qtyInput.value) || 1;
            if (currentVal > 1) {
                qtyInput.value = currentVal - 1;
            }
        });

        qtyIncrease?.addEventListener('click', function() {
            const currentVal = parseInt(qtyInput.value) || 1;
            if (currentVal < maxQty) {
                qtyInput.value = currentVal + 1;
            }
        });

        qtyInput?.addEventListener('change', function() {
            let val = parseInt(this.value) || 1;
            if (val < 1) val = 1;
            if (val > maxQty) val = maxQty;
            this.value = val;
        });

        // Accordion functionality
        document.querySelectorAll('.accordion-trigger').forEach(trigger => {
            trigger.addEventListener('click', function() {
                const targetId = this.getAttribute('data-target');
                const content = document.getElementById(targetId);
                const icon = this.querySelector('.accordion-icon');
                
                content.classList.toggle('hidden');
                icon.classList.toggle('rotate-180');
            });
        });
    </script>
</x-layouts.app>
