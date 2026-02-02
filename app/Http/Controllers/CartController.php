<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;

class CartController extends Controller
{
    /**
     * Display the cart page.
     */
    public function index()
    {
        $cart = $this->getCart();
        $cartItems = $this->getCartItemsWithProducts($cart);
        $totals = $this->calculateTotals($cartItems);

        return view('pages.cart', compact('cartItems', 'totals'));
    }

    /**
     * Add a product to the cart.
     */
    public function add(Request $request)
    {
        $validated = $request->validate([
            'product_id' => 'required|exists:products,id',
            'size' => 'nullable|string',
            'colour' => 'nullable|string',
            'quantity' => 'required|integer|min:1',
        ]);

        $product = Product::findOrFail($validated['product_id']);

        // Check stock
        if ($product->stock < $validated['quantity']) {
            return back()->with('error', 'Not enough stock available.');
        }

        $cart = $this->getCart();

        // Create unique key for this item (product + size + colour combination)
        $itemKey = $this->generateItemKey(
            $validated['product_id'],
            $validated['size'] ?? null,
            $validated['colour'] ?? null
        );

        // Check if item already exists in cart
        if (isset($cart[$itemKey])) {
            $newQuantity = $cart[$itemKey]['quantity'] + $validated['quantity'];
            
            if ($newQuantity > $product->stock) {
                return back()->with('error', 'Cannot add more items. Stock limit reached.');
            }
            
            $cart[$itemKey]['quantity'] = $newQuantity;
        } else {
            $cart[$itemKey] = [
                'product_id' => $validated['product_id'],
                'size' => $validated['size'] ?? null,
                'colour' => $validated['colour'] ?? null,
                'quantity' => $validated['quantity'],
            ];
        }

        $this->saveCart($cart);
        $this->updateCartCount();

        if ($request->expectsJson()) {
            return response()->json([
                'success' => true,
                'message' => 'Product added to cart',
                'cart_count' => $this->getCartCount(),
            ]);
        }

        return redirect()->route('cart.index')->with('success', 'Product added to cart!');
    }

    /**
     * Update cart item quantity.
     */
    public function update(Request $request)
    {
        $validated = $request->validate([
            'item_key' => 'required|string',
            'quantity' => 'required|integer|min:0',
        ]);

        $cart = $this->getCart();

        if (!isset($cart[$validated['item_key']])) {
            return back()->with('error', 'Item not found in cart.');
        }

        if ($validated['quantity'] === 0) {
            unset($cart[$validated['item_key']]);
        } else {
            // Check stock
            $product = Product::find($cart[$validated['item_key']]['product_id']);
            if ($product && $validated['quantity'] > $product->stock) {
                return back()->with('error', 'Not enough stock available.');
            }
            
            $cart[$validated['item_key']]['quantity'] = $validated['quantity'];
        }

        $this->saveCart($cart);
        $this->updateCartCount();

        if ($request->expectsJson()) {
            $cartItems = $this->getCartItemsWithProducts($cart);
            $totals = $this->calculateTotals($cartItems);
            
            return response()->json([
                'success' => true,
                'cart_count' => $this->getCartCount(),
                'totals' => $totals,
            ]);
        }

        return back()->with('success', 'Cart updated!');
    }

    /**
     * Remove item from cart.
     */
    public function remove(Request $request)
    {
        $validated = $request->validate([
            'item_key' => 'required|string',
        ]);

        $cart = $this->getCart();

        if (isset($cart[$validated['item_key']])) {
            unset($cart[$validated['item_key']]);
            $this->saveCart($cart);
            $this->updateCartCount();
        }

        if ($request->expectsJson()) {
            return response()->json([
                'success' => true,
                'message' => 'Item removed from cart',
                'cart_count' => $this->getCartCount(),
            ]);
        }

        return back()->with('success', 'Item removed from cart!');
    }

    /**
     * Clear the entire cart.
     */
    public function clear()
    {
        session()->forget('cart');
        session()->forget('cart_count');

        return redirect()->route('cart.index')->with('success', 'Cart cleared!');
    }

    /**
     * Get cart from session.
     */
    protected function getCart(): array
    {
        return session('cart', []);
    }

    /**
     * Save cart to session.
     */
    protected function saveCart(array $cart): void
    {
        session(['cart' => $cart]);
    }

    /**
     * Generate unique key for cart item.
     */
    protected function generateItemKey(int $productId, ?string $size, ?string $colour): string
    {
        return md5($productId . '-' . ($size ?? 'no-size') . '-' . ($colour ?? 'no-colour'));
    }

    /**
     * Get cart items with product data.
     */
    protected function getCartItemsWithProducts(array $cart): array
    {
        $items = [];

        foreach ($cart as $key => $item) {
            $product = Product::find($item['product_id']);
            
            if ($product) {
                // Check if trade user
                $isTradeUser = auth('trade')->check();
                $tradeAccount = $isTradeUser ? auth('trade')->user() : null;
                
                // Calculate unit price
                $unitPrice = $product->price;
                if ($isTradeUser && $product->trade_price) {
                    $unitPrice = $product->trade_price;
                } elseif ($isTradeUser && $tradeAccount) {
                    $unitPrice = $tradeAccount->calculateDiscountedPrice($product->price);
                }

                $items[$key] = [
                    'key' => $key,
                    'product' => $product,
                    'size' => $item['size'],
                    'colour' => $item['colour'],
                    'quantity' => $item['quantity'],
                    'unit_price' => $unitPrice,
                    'line_total' => $unitPrice * $item['quantity'],
                ];
            }
        }

        return $items;
    }

    /**
     * Calculate cart totals.
     */
    protected function calculateTotals(array $cartItems): array
    {
        $subtotal = 0;
        
        foreach ($cartItems as $item) {
            $subtotal += $item['line_total'];
        }

        $freeShippingThreshold = 75.00;
        $shippingCost = 5.95;
        
        $shipping = $subtotal >= $freeShippingThreshold ? 0 : $shippingCost;
        $subtotalWithShipping = $subtotal + $shipping;
        $vat = round($subtotalWithShipping * 0.20, 2);
        $total = round($subtotalWithShipping + $vat, 2);

        return [
            'subtotal' => round($subtotal, 2),
            'shipping' => $shipping,
            'vat' => $vat,
            'total' => $total,
            'free_shipping_threshold' => $freeShippingThreshold,
            'amount_to_free_shipping' => max(0, round($freeShippingThreshold - $subtotal, 2)),
            'qualifies_for_free_shipping' => $subtotal >= $freeShippingThreshold,
        ];
    }

    /**
     * Update cart count in session.
     */
    protected function updateCartCount(): void
    {
        $cart = $this->getCart();
        $count = 0;
        
        foreach ($cart as $item) {
            $count += $item['quantity'];
        }
        
        session(['cart_count' => $count]);
    }

    /**
     * Get cart item count.
     */
    protected function getCartCount(): int
    {
        return session('cart_count', 0);
    }

    /**
     * Get cart data for checkout (public method for other controllers).
     */
    public function getCartForCheckout(): array
    {
        $cart = $this->getCart();
        $cartItems = $this->getCartItemsWithProducts($cart);
        $totals = $this->calculateTotals($cartItems);

        return [
            'items' => $cartItems,
            'totals' => $totals,
        ];
    }

    /**
     * Clear cart after successful order.
     */
    public function clearCart(): void
    {
        session()->forget('cart');
        session()->forget('cart_count');
    }
}
