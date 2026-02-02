<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Product;
use Illuminate\Http\Request;

class ShopController extends Controller
{
    /**
     * Display all products with filters.
     */
    public function index(Request $request)
    {
        $query = Product::published()->with('category');

        // Filter by category
        if ($request->filled('category')) {
            $categoryIds = is_array($request->category) ? $request->category : [$request->category];
            $query->whereIn('category_id', $categoryIds);
        }

        // Filter by sizes
        if ($request->filled('sizes')) {
            $sizes = is_array($request->sizes) ? $request->sizes : [$request->sizes];
            $query->where(function ($q) use ($sizes) {
                foreach ($sizes as $size) {
                    $q->orWhereJsonContains('sizes', $size);
                }
            });
        }

        // Filter by colours
        if ($request->filled('colours')) {
            $colours = is_array($request->colours) ? $request->colours : [$request->colours];
            $query->where(function ($q) use ($colours) {
                foreach ($colours as $colour) {
                    $q->orWhereJsonContains('colours', $colour);
                }
            });
        }

        // Filter by compliance
        if ($request->filled('compliance')) {
            $compliance = is_array($request->compliance) ? $request->compliance : [$request->compliance];
            
            if (in_array('fire_rated', $compliance)) {
                $query->whereNotNull('fire_rating');
            }
            if (in_array('antimicrobial', $compliance)) {
                $query->where('antimicrobial', true);
            }
            if (in_array('wipe_clean', $compliance)) {
                $query->where('wipe_clean', true);
            }
            if (in_array('child_safe', $compliance)) {
                $query->where('child_safe', true);
            }
        }

        // Sorting
        $sort = $request->get('sort', 'name');
        switch ($sort) {
            case 'price_low':
                $query->orderBy('price', 'asc');
                break;
            case 'price_high':
                $query->orderBy('price', 'desc');
                break;
            case 'newest':
                $query->orderBy('created_at', 'desc');
                break;
            default:
                $query->orderBy('name', 'asc');
        }

        $products = $query->paginate(12)->withQueryString();
        $categories = Category::root()->with('children')->orderBy('sort_order')->get();
        
        // Get unique sizes and colours for filters
        $allSizes = Product::published()
            ->whereNotNull('sizes')
            ->pluck('sizes')
            ->flatten()
            ->unique()
            ->sort()
            ->values();
            
        $allColours = Product::published()
            ->whereNotNull('colours')
            ->pluck('colours')
            ->flatten()
            ->unique()
            ->sort()
            ->values();

        return view('pages.shop.index', compact(
            'products',
            'categories',
            'allSizes',
            'allColours'
        ));
    }

    /**
     * Display products filtered by category.
     */
    public function category(string $slug, Request $request)
    {
        $category = Category::where('slug', $slug)->firstOrFail();
        
        // Get all category IDs (including children)
        $categoryIds = collect([$category->id]);
        if ($category->children->count() > 0) {
            $categoryIds = $categoryIds->merge($category->children->pluck('id'));
        }

        $query = Product::published()
            ->with('category')
            ->whereIn('category_id', $categoryIds);

        // Apply same filters as index
        if ($request->filled('sizes')) {
            $sizes = is_array($request->sizes) ? $request->sizes : [$request->sizes];
            $query->where(function ($q) use ($sizes) {
                foreach ($sizes as $size) {
                    $q->orWhereJsonContains('sizes', $size);
                }
            });
        }

        if ($request->filled('colours')) {
            $colours = is_array($request->colours) ? $request->colours : [$request->colours];
            $query->where(function ($q) use ($colours) {
                foreach ($colours as $colour) {
                    $q->orWhereJsonContains('colours', $colour);
                }
            });
        }

        if ($request->filled('compliance')) {
            $compliance = is_array($request->compliance) ? $request->compliance : [$request->compliance];
            
            if (in_array('fire_rated', $compliance)) {
                $query->whereNotNull('fire_rating');
            }
            if (in_array('antimicrobial', $compliance)) {
                $query->where('antimicrobial', true);
            }
            if (in_array('wipe_clean', $compliance)) {
                $query->where('wipe_clean', true);
            }
            if (in_array('child_safe', $compliance)) {
                $query->where('child_safe', true);
            }
        }

        // Sorting
        $sort = $request->get('sort', 'name');
        switch ($sort) {
            case 'price_low':
                $query->orderBy('price', 'asc');
                break;
            case 'price_high':
                $query->orderBy('price', 'desc');
                break;
            case 'newest':
                $query->orderBy('created_at', 'desc');
                break;
            default:
                $query->orderBy('name', 'asc');
        }

        $products = $query->paginate(12)->withQueryString();
        $categories = Category::root()->with('children')->orderBy('sort_order')->get();
        
        // Get unique sizes and colours for filters
        $allSizes = Product::published()
            ->whereIn('category_id', $categoryIds)
            ->whereNotNull('sizes')
            ->pluck('sizes')
            ->flatten()
            ->unique()
            ->sort()
            ->values();
            
        $allColours = Product::published()
            ->whereIn('category_id', $categoryIds)
            ->whereNotNull('colours')
            ->pluck('colours')
            ->flatten()
            ->unique()
            ->sort()
            ->values();

        return view('pages.shop.index', compact(
            'products',
            'categories',
            'category',
            'allSizes',
            'allColours'
        ));
    }

    /**
     * Display a single product.
     */
    public function show(string $slug)
    {
        $product = Product::where('slug', $slug)
            ->with('category')
            ->firstOrFail();
        
        $relatedProducts = Product::published()
            ->where('category_id', $product->category_id)
            ->where('id', '!=', $product->id)
            ->limit(4)
            ->get();

        return view('pages.shop.show', compact('product', 'relatedProducts'));
    }
}
