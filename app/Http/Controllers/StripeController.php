<?php

namespace App\Http\Controllers;

use App\Models\Order;
use Illuminate\Http\Request;
use Stripe\Stripe;
use Stripe\Checkout\Session;
use Stripe\Webhook;

class StripeController extends Controller
{
    public function __construct()
    {
        Stripe::setApiKey(config('services.stripe.secret'));
    }

    /**
     * Create a Stripe Checkout session.
     */
    public function checkout(Order $order)
    {
        // Verify the order belongs to the current session or trade account
        $pendingOrderId = session('pending_order_id');
        
        if ($pendingOrderId !== $order->id && auth('trade')->id() !== $order->trade_account_id) {
            return redirect()->route('cart.index')->with('error', 'Invalid order.');
        }

        try {
            // Build line items from order
            $lineItems = [];
            
            foreach ($order->items as $item) {
                $lineItems[] = [
                    'price_data' => [
                        'currency' => 'gbp',
                        'product_data' => [
                            'name' => $item->product_name,
                            'description' => implode(' / ', array_filter([$item->size, $item->colour])) ?: null,
                        ],
                        'unit_amount' => (int) ($item->unit_price * 100), // Convert to pence
                    ],
                    'quantity' => $item->quantity,
                ];
            }

            // Add shipping if applicable
            if ($order->shipping > 0) {
                $lineItems[] = [
                    'price_data' => [
                        'currency' => 'gbp',
                        'product_data' => [
                            'name' => 'Delivery',
                        ],
                        'unit_amount' => (int) ($order->shipping * 100),
                    ],
                    'quantity' => 1,
                ];
            }

            // Create Stripe Checkout Session
            $session = Session::create([
                'payment_method_types' => ['card'],
                'line_items' => $lineItems,
                'mode' => 'payment',
                'success_url' => route('stripe.success', ['order' => $order->id]) . '?session_id={CHECKOUT_SESSION_ID}',
                'cancel_url' => route('stripe.cancel', ['order' => $order->id]),
                'customer_email' => $order->customer_email,
                'metadata' => [
                    'order_id' => $order->id,
                    'order_number' => $order->order_number,
                ],
                'automatic_tax' => [
                    'enabled' => true,
                ],
                'billing_address_collection' => 'auto',
            ]);

            // Store session ID on order
            $order->update(['stripe_payment_id' => $session->id]);

            return redirect($session->url);

        } catch (\Exception $e) {
            return redirect()->route('checkout.show')->with('error', 'Payment error: ' . $e->getMessage());
        }
    }

    /**
     * Handle successful payment return.
     */
    public function success(Request $request, Order $order)
    {
        $sessionId = $request->get('session_id');

        if (!$sessionId) {
            return redirect()->route('home')->with('error', 'Invalid payment session.');
        }

        try {
            $session = Session::retrieve($sessionId);

            if ($session->payment_status === 'paid') {
                // Update order status
                $order->update([
                    'status' => 'processing',
                    'stripe_payment_id' => $session->payment_intent,
                ]);

                // Clear the cart
                app(CartController::class)->clearCart();
                session()->forget('pending_order_id');

                return redirect()->route('order.confirmation', $order->order_number);
            }

            return redirect()->route('checkout.show')->with('error', 'Payment was not completed.');

        } catch (\Exception $e) {
            return redirect()->route('checkout.show')->with('error', 'Error verifying payment.');
        }
    }

    /**
     * Handle cancelled payment.
     */
    public function cancel(Order $order)
    {
        // Restore stock
        foreach ($order->items as $item) {
            if ($item->product) {
                $item->product->increment('stock', $item->quantity);
            }
        }

        // Delete the order
        $order->delete();

        session()->forget('pending_order_id');

        return redirect()->route('checkout.show')->with('error', 'Payment was cancelled. Please try again.');
    }

    /**
     * Handle Stripe webhooks.
     */
    public function webhook(Request $request)
    {
        $payload = $request->getContent();
        $sigHeader = $request->header('Stripe-Signature');
        $webhookSecret = config('services.stripe.webhook_secret');

        try {
            $event = Webhook::constructEvent($payload, $sigHeader, $webhookSecret);
        } catch (\Exception $e) {
            return response()->json(['error' => 'Webhook signature verification failed'], 400);
        }

        // Handle the event
        switch ($event->type) {
            case 'checkout.session.completed':
                $session = $event->data->object;
                $this->handleCheckoutCompleted($session);
                break;

            case 'payment_intent.succeeded':
                $paymentIntent = $event->data->object;
                $this->handlePaymentSucceeded($paymentIntent);
                break;

            case 'payment_intent.payment_failed':
                $paymentIntent = $event->data->object;
                $this->handlePaymentFailed($paymentIntent);
                break;
        }

        return response()->json(['status' => 'success']);
    }

    /**
     * Handle checkout.session.completed event.
     */
    protected function handleCheckoutCompleted($session)
    {
        $order = Order::where('stripe_payment_id', $session->id)->first();

        if ($order && $session->payment_status === 'paid') {
            $order->update([
                'status' => 'processing',
                'stripe_payment_id' => $session->payment_intent,
            ]);
        }
    }

    /**
     * Handle payment_intent.succeeded event.
     */
    protected function handlePaymentSucceeded($paymentIntent)
    {
        $order = Order::where('stripe_payment_id', $paymentIntent->id)->first();

        if ($order) {
            $order->update(['status' => 'processing']);
        }
    }

    /**
     * Handle payment_intent.payment_failed event.
     */
    protected function handlePaymentFailed($paymentIntent)
    {
        $order = Order::where('stripe_payment_id', $paymentIntent->id)->first();

        if ($order) {
            // Restore stock
            foreach ($order->items as $item) {
                if ($item->product) {
                    $item->product->increment('stock', $item->quantity);
                }
            }
            
            $order->update(['status' => 'cancelled']);
        }
    }
}
