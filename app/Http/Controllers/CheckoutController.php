<?php

namespace App\Http\Controllers;

use App\Models\Order;
use App\Models\OrderItem;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class CheckoutController extends Controller
{
    protected CartController $cartController;

    public function __construct(CartController $cartController)
    {
        $this->cartController = $cartController;
    }

    /**
     * Display the checkout form.
     */
    public function show()
    {
        $cartData = $this->cartController->getCartForCheckout();

        if (empty($cartData['items'])) {
            return redirect()->route('cart.index')->with('error', 'Your cart is empty.');
        }

        $tradeAccount = auth('trade')->user();

        return view('pages.checkout', [
            'cartItems' => $cartData['items'],
            'totals' => $cartData['totals'],
            'tradeAccount' => $tradeAccount,
        ]);
    }

    /**
     * Process the checkout and create order.
     */
    public function process(Request $request)
    {
        $cartData = $this->cartController->getCartForCheckout();

        if (empty($cartData['items'])) {
            return redirect()->route('cart.index')->with('error', 'Your cart is empty.');
        }

        $validated = $request->validate([
            'customer_email' => 'required|email',
            'customer_phone' => 'nullable|string|max:50',
            'customer_name' => 'required|string|max:255',
            'company_name' => 'nullable|string|max:255',
            'delivery_address' => 'required|string|max:255',
            'delivery_city' => 'required|string|max:100',
            'delivery_postcode' => 'required|string|max:20',
            'delivery_instructions' => 'nullable|string|max:500',
            'same_as_delivery' => 'nullable|boolean',
            'billing_address' => 'required_without:same_as_delivery|nullable|string|max:255',
            'billing_city' => 'required_without:same_as_delivery|nullable|string|max:100',
            'billing_postcode' => 'required_without:same_as_delivery|nullable|string|max:20',
        ]);

        // If billing same as delivery
        if ($request->boolean('same_as_delivery')) {
            $validated['billing_address'] = $validated['delivery_address'];
            $validated['billing_city'] = $validated['delivery_city'];
            $validated['billing_postcode'] = $validated['delivery_postcode'];
        }

        try {
            DB::beginTransaction();

            // Create the order
            $order = Order::create([
                'order_number' => Order::generateOrderNumber(),
                'customer_email' => $validated['customer_email'],
                'customer_phone' => $validated['customer_phone'],
                'customer_name' => $validated['customer_name'],
                'company_name' => $validated['company_name'],
                'delivery_address' => $validated['delivery_address'],
                'delivery_city' => $validated['delivery_city'],
                'delivery_postcode' => $validated['delivery_postcode'],
                'delivery_instructions' => $validated['delivery_instructions'],
                'billing_address' => $validated['billing_address'],
                'billing_city' => $validated['billing_city'],
                'billing_postcode' => $validated['billing_postcode'],
                'subtotal' => $cartData['totals']['subtotal'],
                'shipping' => $cartData['totals']['shipping'],
                'vat' => $cartData['totals']['vat'],
                'total' => $cartData['totals']['total'],
                'status' => 'pending',
                'trade_account_id' => auth('trade')->id(),
            ]);

            // Create order items
            foreach ($cartData['items'] as $item) {
                OrderItem::create([
                    'order_id' => $order->id,
                    'product_id' => $item['product']->id,
                    'product_name' => $item['product']->name,
                    'product_sku' => $item['product']->sku,
                    'size' => $item['size'],
                    'colour' => $item['colour'],
                    'quantity' => $item['quantity'],
                    'unit_price' => $item['unit_price'],
                    'total_price' => $item['line_total'],
                ]);

                // Reduce stock
                $item['product']->decrement('stock', $item['quantity']);
            }

            DB::commit();

            // Store order ID in session for Stripe
            session(['pending_order_id' => $order->id]);

            // Redirect to Stripe checkout
            return redirect()->route('stripe.checkout', ['order' => $order->id]);

        } catch (\Exception $e) {
            DB::rollBack();
            return back()->with('error', 'There was an error processing your order. Please try again.');
        }
    }

    /**
     * Display order confirmation page.
     */
    public function confirmation(string $orderNumber)
    {
        $order = Order::where('order_number', $orderNumber)
            ->with('items')
            ->firstOrFail();

        return view('pages.order-confirmation', compact('order'));
    }
}
