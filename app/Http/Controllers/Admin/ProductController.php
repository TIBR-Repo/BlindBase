<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class ProductController extends Controller
{
    public function index(Request $request)
    {
        $query = Product::with('category');

        // Filter by category
        if ($request->filled('category')) {
            $query->where('category_id', $request->category);
        }

        // Filter by status
        if ($request->filled('status')) {
            if ($request->status === 'published') {
                $query->where('is_published', true);
            } elseif ($request->status === 'draft') {
                $query->where('is_published', false);
            }
        }

        // Filter by stock
        if ($request->stock === 'low') {
            $query->where('stock', '<=', 5);
        } elseif ($request->stock === 'out') {
            $query->where('stock', 0);
        }

        // Search
        if ($request->filled('search')) {
            $search = $request->search;
            $query->where(function ($q) use ($search) {
                $q->where('name', 'like', "%{$search}%")
                    ->orWhere('sku', 'like', "%{$search}%");
            });
        }

        $products = $query->orderBy('created_at', 'desc')->paginate(20);
        $categories = Category::orderBy('name')->get();

        return view('admin.products.index', compact('products', 'categories'));
    }

    public function create()
    {
        $categories = Category::orderBy('name')->get();
        return view('admin.products.create', compact('categories'));
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'sku' => 'required|string|max:50|unique:products',
            'category_id' => 'required|exists:categories,id',
            'description' => 'nullable|string',
            'short_description' => 'nullable|string|max:255',
            'price' => 'required|numeric|min:0',
            'trade_price' => 'nullable|numeric|min:0',
            'stock' => 'required|integer|min:0',
            'sizes' => 'nullable|array',
            'colours' => 'nullable|array',
            'is_fire_rated' => 'boolean',
            'is_antimicrobial' => 'boolean',
            'is_child_safe' => 'boolean',
            'is_wipeable' => 'boolean',
            'specifications' => 'nullable|string',
            'fitting_instructions' => 'nullable|string',
            'care_instructions' => 'nullable|string',
            'is_published' => 'boolean',
            'image' => 'nullable|image|max:2048',
        ]);

        $validated['slug'] = Str::slug($validated['name']);
        $validated['sizes'] = json_encode($request->sizes ?? []);
        $validated['colours'] = json_encode($request->colours ?? []);
        $validated['is_published'] = $request->boolean('is_published');
        $validated['is_fire_rated'] = $request->boolean('is_fire_rated');
        $validated['is_antimicrobial'] = $request->boolean('is_antimicrobial');
        $validated['is_child_safe'] = $request->boolean('is_child_safe');
        $validated['is_wipeable'] = $request->boolean('is_wipeable');

        // Handle image upload
        if ($request->hasFile('image')) {
            $path = $request->file('image')->store('products', 'public');
            $validated['image'] = '/storage/' . $path;
        }

        Product::create($validated);

        return redirect()->route('admin.products.index')
            ->with('success', 'Product created successfully.');
    }

    public function edit(Product $product)
    {
        $categories = Category::orderBy('name')->get();
        return view('admin.products.edit', compact('product', 'categories'));
    }

    public function update(Request $request, Product $product)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'sku' => 'required|string|max:50|unique:products,sku,' . $product->id,
            'category_id' => 'required|exists:categories,id',
            'description' => 'nullable|string',
            'short_description' => 'nullable|string|max:255',
            'price' => 'required|numeric|min:0',
            'trade_price' => 'nullable|numeric|min:0',
            'stock' => 'required|integer|min:0',
            'sizes' => 'nullable|array',
            'colours' => 'nullable|array',
            'is_fire_rated' => 'boolean',
            'is_antimicrobial' => 'boolean',
            'is_child_safe' => 'boolean',
            'is_wipeable' => 'boolean',
            'specifications' => 'nullable|string',
            'fitting_instructions' => 'nullable|string',
            'care_instructions' => 'nullable|string',
            'is_published' => 'boolean',
            'image' => 'nullable|image|max:2048',
        ]);

        $validated['slug'] = Str::slug($validated['name']);
        $validated['sizes'] = json_encode($request->sizes ?? []);
        $validated['colours'] = json_encode($request->colours ?? []);
        $validated['is_published'] = $request->boolean('is_published');
        $validated['is_fire_rated'] = $request->boolean('is_fire_rated');
        $validated['is_antimicrobial'] = $request->boolean('is_antimicrobial');
        $validated['is_child_safe'] = $request->boolean('is_child_safe');
        $validated['is_wipeable'] = $request->boolean('is_wipeable');

        // Handle image upload
        if ($request->hasFile('image')) {
            $path = $request->file('image')->store('products', 'public');
            $validated['image'] = '/storage/' . $path;
        }

        $product->update($validated);

        return redirect()->route('admin.products.index')
            ->with('success', 'Product updated successfully.');
    }

    public function destroy(Product $product)
    {
        $product->delete();

        return redirect()->route('admin.products.index')
            ->with('success', 'Product deleted successfully.');
    }
}
