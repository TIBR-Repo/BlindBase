@if($errors->any())
    <div class="p-4 bg-red-50 border border-red-200 rounded-xl">
        <div class="flex items-start gap-3">
            <svg class="w-5 h-5 text-red-500 mt-0.5" fill="currentColor" viewBox="0 0 20 20">
                <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zM8.707 7.293a1 1 0 00-1.414 1.414L8.586 10l-1.293 1.293a1 1 0 101.414 1.414L10 11.414l1.293 1.293a1 1 0 001.414-1.414L11.414 10l1.293-1.293a1 1 0 00-1.414-1.414L10 8.586 8.707 7.293z" clip-rule="evenodd"/>
            </svg>
            <div>
                <h3 class="font-medium text-red-800">Please correct the following errors:</h3>
                <ul class="mt-2 text-sm text-red-700 list-disc list-inside">
                    @foreach($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        </div>
    </div>
@endif

<div class="grid grid-cols-1 lg:grid-cols-3 gap-6">
    <!-- Main Content -->
    <div class="lg:col-span-2 space-y-6">
        <!-- Basic Info -->
        <div class="bg-white rounded-2xl border border-slate-200 p-6">
            <h2 class="text-lg font-bold text-secondary-900 mb-6">Basic Information</h2>
            
            <div class="space-y-6">
                <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                    <div>
                        <label for="name" class="block text-sm font-medium text-secondary-900 mb-2">Product Name *</label>
                        <input type="text" name="name" id="name" value="{{ old('name', $product->name ?? '') }}" required
                            class="w-full px-4 py-3 border border-slate-200 rounded-xl focus:ring-2 focus:ring-primary-500 focus:border-primary-500">
                    </div>
                    <div>
                        <label for="sku" class="block text-sm font-medium text-secondary-900 mb-2">SKU *</label>
                        <input type="text" name="sku" id="sku" value="{{ old('sku', $product->sku ?? '') }}" required
                            class="w-full px-4 py-3 border border-slate-200 rounded-xl focus:ring-2 focus:ring-primary-500 focus:border-primary-500 font-mono">
                    </div>
                </div>

                <div>
                    <label for="category_id" class="block text-sm font-medium text-secondary-900 mb-2">Category *</label>
                    <select name="category_id" id="category_id" required
                        class="w-full px-4 py-3 border border-slate-200 rounded-xl focus:ring-2 focus:ring-primary-500 focus:border-primary-500">
                        <option value="">Select category...</option>
                        @foreach($categories as $category)
                            <option value="{{ $category->id }}" {{ old('category_id', $product->category_id ?? '') == $category->id ? 'selected' : '' }}>{{ $category->name }}</option>
                        @endforeach
                    </select>
                </div>

                <div>
                    <label for="short_description" class="block text-sm font-medium text-secondary-900 mb-2">Short Description</label>
                    <input type="text" name="short_description" id="short_description" value="{{ old('short_description', $product->short_description ?? '') }}" maxlength="255"
                        class="w-full px-4 py-3 border border-slate-200 rounded-xl focus:ring-2 focus:ring-primary-500 focus:border-primary-500">
                    <p class="mt-1 text-xs text-slate-500">Brief summary shown in product listings</p>
                </div>

                <div>
                    <label for="description" class="block text-sm font-medium text-secondary-900 mb-2">Full Description</label>
                    <textarea name="description" id="description" rows="5"
                        class="w-full px-4 py-3 border border-slate-200 rounded-xl focus:ring-2 focus:ring-primary-500 focus:border-primary-500">{{ old('description', $product->description ?? '') }}</textarea>
                </div>
            </div>
        </div>

        <!-- Pricing -->
        <div class="bg-white rounded-2xl border border-slate-200 p-6">
            <h2 class="text-lg font-bold text-secondary-900 mb-6">Pricing & Inventory</h2>
            
            <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
                <div>
                    <label for="price" class="block text-sm font-medium text-secondary-900 mb-2">Price (ex VAT) *</label>
                    <div class="relative">
                        <span class="absolute left-4 top-1/2 -translate-y-1/2 text-slate-400">£</span>
                        <input type="number" name="price" id="price" value="{{ old('price', $product->price ?? '') }}" step="0.01" min="0" required
                            class="w-full pl-8 pr-4 py-3 border border-slate-200 rounded-xl focus:ring-2 focus:ring-primary-500 focus:border-primary-500">
                    </div>
                </div>
                <div>
                    <label for="trade_price" class="block text-sm font-medium text-secondary-900 mb-2">Trade Price</label>
                    <div class="relative">
                        <span class="absolute left-4 top-1/2 -translate-y-1/2 text-slate-400">£</span>
                        <input type="number" name="trade_price" id="trade_price" value="{{ old('trade_price', $product->trade_price ?? '') }}" step="0.01" min="0"
                            class="w-full pl-8 pr-4 py-3 border border-slate-200 rounded-xl focus:ring-2 focus:ring-primary-500 focus:border-primary-500">
                    </div>
                    <p class="mt-1 text-xs text-slate-500">Optional fixed trade price</p>
                </div>
                <div>
                    <label for="stock" class="block text-sm font-medium text-secondary-900 mb-2">Stock *</label>
                    <input type="number" name="stock" id="stock" value="{{ old('stock', $product->stock ?? 0) }}" min="0" required
                        class="w-full px-4 py-3 border border-slate-200 rounded-xl focus:ring-2 focus:ring-primary-500 focus:border-primary-500">
                </div>
            </div>
        </div>

        <!-- Variants -->
        <div class="bg-white rounded-2xl border border-slate-200 p-6">
            <h2 class="text-lg font-bold text-secondary-900 mb-6">Variants</h2>
            
            @php
                $availableSizes = ['600x900mm', '900x1200mm', '1200x1500mm', '1500x1800mm', '1800x2100mm', 'Custom'];
                $availableColours = ['White', 'Cream', 'Grey', 'Charcoal', 'Navy', 'Beige', 'Green'];
                $currentSizes = json_decode(old('sizes', $product->sizes ?? '[]'), true) ?: [];
                $currentColours = json_decode(old('colours', $product->colours ?? '[]'), true) ?: [];
            @endphp

            <div class="space-y-6">
                <div>
                    <label class="block text-sm font-medium text-secondary-900 mb-3">Available Sizes</label>
                    <div class="flex flex-wrap gap-3">
                        @foreach($availableSizes as $size)
                            <label class="flex items-center gap-2 px-4 py-2 bg-slate-50 rounded-lg cursor-pointer hover:bg-slate-100 transition-colors">
                                <input type="checkbox" name="sizes[]" value="{{ $size }}" 
                                    {{ in_array($size, $currentSizes) ? 'checked' : '' }}
                                    class="w-4 h-4 text-primary-600 border-slate-300 rounded focus:ring-primary-500">
                                <span class="text-sm text-secondary-900">{{ $size }}</span>
                            </label>
                        @endforeach
                    </div>
                </div>

                <div>
                    <label class="block text-sm font-medium text-secondary-900 mb-3">Available Colours</label>
                    <div class="flex flex-wrap gap-3">
                        @foreach($availableColours as $colour)
                            <label class="flex items-center gap-2 px-4 py-2 bg-slate-50 rounded-lg cursor-pointer hover:bg-slate-100 transition-colors">
                                <input type="checkbox" name="colours[]" value="{{ $colour }}"
                                    {{ in_array($colour, $currentColours) ? 'checked' : '' }}
                                    class="w-4 h-4 text-primary-600 border-slate-300 rounded focus:ring-primary-500">
                                <span class="text-sm text-secondary-900">{{ $colour }}</span>
                            </label>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>

        <!-- Instructions -->
        <div class="bg-white rounded-2xl border border-slate-200 p-6">
            <h2 class="text-lg font-bold text-secondary-900 mb-6">Additional Information</h2>
            
            <div class="space-y-6">
                <div>
                    <label for="specifications" class="block text-sm font-medium text-secondary-900 mb-2">Specifications</label>
                    <textarea name="specifications" id="specifications" rows="3"
                        class="w-full px-4 py-3 border border-slate-200 rounded-xl focus:ring-2 focus:ring-primary-500 focus:border-primary-500">{{ old('specifications', $product->specifications ?? '') }}</textarea>
                </div>
                <div>
                    <label for="fitting_instructions" class="block text-sm font-medium text-secondary-900 mb-2">Fitting Instructions</label>
                    <textarea name="fitting_instructions" id="fitting_instructions" rows="3"
                        class="w-full px-4 py-3 border border-slate-200 rounded-xl focus:ring-2 focus:ring-primary-500 focus:border-primary-500">{{ old('fitting_instructions', $product->fitting_instructions ?? '') }}</textarea>
                </div>
                <div>
                    <label for="care_instructions" class="block text-sm font-medium text-secondary-900 mb-2">Care Instructions</label>
                    <textarea name="care_instructions" id="care_instructions" rows="3"
                        class="w-full px-4 py-3 border border-slate-200 rounded-xl focus:ring-2 focus:ring-primary-500 focus:border-primary-500">{{ old('care_instructions', $product->care_instructions ?? '') }}</textarea>
                </div>
            </div>
        </div>
    </div>

    <!-- Sidebar -->
    <div class="space-y-6">
        <!-- Publish -->
        <div class="bg-white rounded-2xl border border-slate-200 p-6">
            <h2 class="text-lg font-bold text-secondary-900 mb-4">Publish</h2>
            
            <label class="flex items-center gap-3 cursor-pointer mb-6">
                <input type="checkbox" name="is_published" value="1" 
                    {{ old('is_published', $product->is_published ?? false) ? 'checked' : '' }}
                    class="w-5 h-5 text-primary-600 border-slate-300 rounded focus:ring-primary-500">
                <span class="text-sm text-secondary-900">Published</span>
            </label>

            <div class="flex gap-3">
                <button type="submit" class="flex-1 inline-flex items-center justify-center gap-2 px-4 py-3 bg-primary-600 text-white font-medium rounded-xl hover:bg-primary-700 transition-colors">
                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"/>
                    </svg>
                    Save
                </button>
                <a href="{{ route('admin.products.index') }}" class="px-4 py-3 bg-slate-100 text-secondary-900 font-medium rounded-xl hover:bg-slate-200 transition-colors">
                    Cancel
                </a>
            </div>
        </div>

        <!-- Image -->
        <div class="bg-white rounded-2xl border border-slate-200 p-6">
            <h2 class="text-lg font-bold text-secondary-900 mb-4">Product Image</h2>
            
            <div class="space-y-4">
                @if(isset($product) && $product->image)
                    <div class="aspect-square bg-slate-100 rounded-xl overflow-hidden">
                        <img src="{{ $product->image }}" alt="{{ $product->name }}" class="w-full h-full object-cover">
                    </div>
                @else
                    <div class="aspect-square bg-slate-100 rounded-xl flex items-center justify-center">
                        <svg class="w-16 h-16 text-slate-300" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1" d="M4 16l4.586-4.586a2 2 0 012.828 0L16 16m-2-2l1.586-1.586a2 2 0 012.828 0L20 14m-6-6h.01M6 20h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z"/>
                        </svg>
                    </div>
                @endif
                <input type="file" name="image" accept="image/*"
                    class="w-full text-sm text-slate-500 file:mr-4 file:py-2 file:px-4 file:rounded-lg file:border-0 file:text-sm file:font-medium file:bg-primary-50 file:text-primary-600 hover:file:bg-primary-100">
            </div>
        </div>

        <!-- Compliance -->
        <div class="bg-white rounded-2xl border border-slate-200 p-6">
            <h2 class="text-lg font-bold text-secondary-900 mb-4">Compliance</h2>
            
            <div class="space-y-3">
                <label class="flex items-center gap-3 cursor-pointer">
                    <input type="checkbox" name="is_fire_rated" value="1"
                        {{ old('is_fire_rated', $product->is_fire_rated ?? false) ? 'checked' : '' }}
                        class="w-5 h-5 text-primary-600 border-slate-300 rounded focus:ring-primary-500">
                    <span class="text-sm text-secondary-900">Fire Rated (BS 5867)</span>
                </label>
                <label class="flex items-center gap-3 cursor-pointer">
                    <input type="checkbox" name="is_antimicrobial" value="1"
                        {{ old('is_antimicrobial', $product->is_antimicrobial ?? false) ? 'checked' : '' }}
                        class="w-5 h-5 text-primary-600 border-slate-300 rounded focus:ring-primary-500">
                    <span class="text-sm text-secondary-900">Antimicrobial</span>
                </label>
                <label class="flex items-center gap-3 cursor-pointer">
                    <input type="checkbox" name="is_child_safe" value="1"
                        {{ old('is_child_safe', $product->is_child_safe ?? false) ? 'checked' : '' }}
                        class="w-5 h-5 text-primary-600 border-slate-300 rounded focus:ring-primary-500">
                    <span class="text-sm text-secondary-900">Child Safe (EN 13120)</span>
                </label>
                <label class="flex items-center gap-3 cursor-pointer">
                    <input type="checkbox" name="is_wipeable" value="1"
                        {{ old('is_wipeable', $product->is_wipeable ?? false) ? 'checked' : '' }}
                        class="w-5 h-5 text-primary-600 border-slate-300 rounded focus:ring-primary-500">
                    <span class="text-sm text-secondary-900">Wipe Clean</span>
                </label>
            </div>
        </div>
    </div>
</div>
