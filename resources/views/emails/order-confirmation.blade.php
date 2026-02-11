<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Order Confirmation</title>
    <style>
        body { font-family: Arial, sans-serif; line-height: 1.6; color: #333; background-color: #f4f4f4; margin: 0; padding: 0; }
        .container { max-width: 600px; margin: 20px auto; background: #fff; border-radius: 8px; overflow: hidden; box-shadow: 0 2px 10px rgba(0,0,0,0.1); }
        .header { background: #0f172a; color: #fff; padding: 30px; text-align: center; }
        .header h1 { margin: 0; font-size: 24px; }
        .logo { font-size: 28px; font-weight: bold; margin-bottom: 10px; }
        .logo span { color: #2563eb; }
        .content { padding: 30px; }
        .success-icon { text-align: center; margin-bottom: 20px; }
        .success-icon svg { width: 60px; height: 60px; fill: #22c55e; }
        .order-number { background: #f1f5f9; padding: 15px; border-radius: 8px; text-align: center; margin: 20px 0; }
        .order-number strong { font-size: 20px; color: #2563eb; }
        .items-table { width: 100%; border-collapse: collapse; margin: 20px 0; }
        .items-table th, .items-table td { padding: 12px; text-align: left; border-bottom: 1px solid #e2e8f0; }
        .items-table th { background: #f8fafc; font-weight: 600; }
        .totals { background: #f8fafc; padding: 20px; border-radius: 8px; }
        .totals-row { display: flex; justify-content: space-between; padding: 8px 0; }
        .totals-row.total { font-size: 18px; font-weight: bold; border-top: 2px solid #e2e8f0; padding-top: 15px; margin-top: 10px; }
        .address-box { background: #f8fafc; padding: 15px; border-radius: 8px; margin: 20px 0; }
        .button { display: inline-block; background: #2563eb; color: #fff; padding: 12px 30px; border-radius: 6px; text-decoration: none; margin: 20px 0; }
        .footer { background: #f8fafc; padding: 20px; text-align: center; font-size: 12px; color: #64748b; }
    </style>
</head>
<body>
    <div class="container">
        <div class="header">
            <div class="logo">BLIND<span>POINT</span></div>
            <h1>Order Confirmation</h1>
        </div>
        
        <div class="content">
            <div class="success-icon">
                <svg viewBox="0 0 20 20" fill="currentColor">
                    <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd"/>
                </svg>
            </div>
            
            <p>Hi {{ $order->customer_name }},</p>
            <p>Thank you for your order! We're getting it ready and will let you know when it ships.</p>
            
            <div class="order-number">
                Order Number: <strong>#{{ $order->order_number }}</strong>
            </div>
            
            <h3>Order Summary</h3>
            <table class="items-table">
                <thead>
                    <tr>
                        <th>Product</th>
                        <th>Qty</th>
                        <th style="text-align: right;">Price</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($order->items as $item)
                    <tr>
                        <td>
                            {{ $item->product_name }}
                            @if($item->size || $item->colour)
                            <br><small style="color: #64748b;">{{ $item->size }} {{ $item->colour }}</small>
                            @endif
                        </td>
                        <td>{{ $item->quantity }}</td>
                        <td style="text-align: right;">£{{ number_format($item->total_price, 2) }}</td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
            
            <div class="totals">
                <div class="totals-row">
                    <span>Subtotal</span>
                    <span>£{{ number_format($order->subtotal, 2) }}</span>
                </div>
                <div class="totals-row">
                    <span>Delivery</span>
                    <span>{{ $order->shipping == 0 ? 'FREE' : '£' . number_format($order->shipping, 2) }}</span>
                </div>
                <div class="totals-row">
                    <span>VAT (20%)</span>
                    <span>£{{ number_format($order->vat, 2) }}</span>
                </div>
                <div class="totals-row total">
                    <span>Total</span>
                    <span>£{{ number_format($order->total, 2) }}</span>
                </div>
            </div>
            
            <h3>Delivery Address</h3>
            <div class="address-box">
                {{ $order->customer_name }}<br>
                {{ $order->delivery_address }}<br>
                {{ $order->delivery_city }}<br>
                {{ $order->delivery_postcode }}
            </div>
            
            <p>If you have any questions about your order, please don't hesitate to contact us.</p>
            
            <p style="text-align: center;">
                <a href="{{ route('home') }}" class="button">Continue Shopping</a>
            </p>
        </div>
        
        <div class="footer">
            <p>&copy; {{ date('Y') }} BlindPoint Supply. All rights reserved.</p>
            <p>sales@blindpoint.co.uk</p>
        </div>
    </div>
</body>
</html>
