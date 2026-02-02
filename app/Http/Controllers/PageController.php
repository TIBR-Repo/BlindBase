<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Product;
use Illuminate\Http\Request;

class PageController extends Controller
{
    /**
     * Display the homepage.
     */
    public function home()
    {
        return view('pages.home');
    }

    /**
     * Display the shop page (all products).
     */
    public function shop(Request $request)
    {
        $products = Product::published()
            ->with('category')
            ->orderBy('name')
            ->paginate(12);

        $categories = Category::root()->with('children')->orderBy('sort_order')->get();

        return view('pages.shop', compact('products', 'categories'));
    }

    /**
     * Display a category page.
     */
    public function category(string $slug)
    {
        $category = Category::where('slug', $slug)->firstOrFail();
        
        $products = Product::published()
            ->where('category_id', $category->id)
            ->orderBy('name')
            ->paginate(12);

        return view('pages.category', compact('category', 'products'));
    }

    /**
     * Display a product page.
     */
    public function product(string $slug)
    {
        $product = Product::where('slug', $slug)->firstOrFail();
        
        $relatedProducts = Product::published()
            ->where('category_id', $product->category_id)
            ->where('id', '!=', $product->id)
            ->limit(4)
            ->get();

        return view('pages.product', compact('product', 'relatedProducts'));
    }

    /**
     * Display the compliance page.
     */
    public function compliance()
    {
        return view('pages.compliance');
    }

    /**
     * Display the contact page.
     */
    public function contact()
    {
        return view('pages.contact');
    }

    /**
     * Display the cart page.
     */
    public function cart()
    {
        return view('pages.cart');
    }
}
