<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>New Order Notification</title>
    <style>
        body { font-family: Arial, sans-serif; line-height: 1.6; color: #333; background-color: #f4f4f4; margin: 0; padding: 0; }
        .container { max-width: 600px; margin: 20px auto; background: #fff; border-radius: 8px; overflow: hidden; box-shadow: 0 2px 10px rgba(0,0,0,0.1); }
        .header { background: #0f172a; color: #fff; padding: 30px; text-align: center; }
        .header h1 { margin: 0; font-size: 24px; }
        .logo { font-size: 28px; font-weight: bold; margin-bottom: 10px; }
        .logo span { color: #2563eb; }
        .content { padding: 30px; }
        .alert { background: #22c55e; color: #fff; padding: 15px; border-radius: 8px; text-align: center; margin-bottom: 20px; }
        .order-details { background: #f8fafc; padding: 20px; border-radius: 8px; margin: 20px 0; }
        .detail-row { display: flex; justify-content: space-between; padding: 8px 0; border-bottom: 1px solid #e2e8f0; }
        .detail-row:last-child { border-bottom: none; }
        .items-table { width: 100%; border-collapse: collapse; margin: 20px 0; }
        .items-table th, .items-table td { padding: 10px; text-align: left; border-bottom: 1px solid #e2e8f0; }
        .items-table th { background: #f8fafc; }
        .button { display: inline-block; background: #2563eb; color: #fff; padding: 12px 30px; border-radius: 6px; text-decoration: none; margin: 10px 5px; }
        .button.secondary { background: #64748b; }
        .footer { background: #f8fafc; padding: 20px; text-align: center; font-size: 12px; color: #64748b; }
    </style>
</head>
<body>
    <div class="container">
        <div class="header">
            <div class="logo">BLIND<span>BASE</span></div>
            <h1>New Order Received</h1>
        </div>
        
        <div class="content">
            <div class="alert">
                🎉 A new order has been placed!
            </div>
            
            <div class="order-details">
                <div class="detail-row">
                    <strong>Order Number:</strong>
                    <span>#{{ $order->order_number }}</span>
                </div>
                <div class="detail-row">
                    <strong>Order Date:</strong>
                    <span>{{ $order->created_at->format('d M Y H:i') }}</span>
                </div>
                <div class="detail-row">
                    <strong>Customer:</strong>
                    <span>{{ $order->customer_name }}</span>
                </div>
                <div class="detail-row">
                    <strong>Email:</strong>
                    <span>{{ $order->customer_email }}</span>
                </div>
                @if($order->customer_phone)
                <div class="detail-row">
                    <strong>Phone:</strong>
                    <span>{{ $order->customer_phone }}</span>
                </div>
                @endif
                @if($order->tradeAccount)
                <div class="detail-row">
                    <strong>Trade Account:</strong>
                    <span>{{ $order->tradeAccount->company_name }}</span>
                </div>
                @endif
                <div class="detail-row">
                    <strong>Order Total:</strong>
                    <span style="font-size: 18px; font-weight: bold; color: #22c55e;">£{{ number_format($order->total, 2) }}</span>
                </div>
            </div>
            
            <h3>Order Items</h3>
            <table class="items-table">
                <thead>
                    <tr>
                        <th>Product</th>
                        <th>SKU</th>
                        <th>Qty</th>
                        <th style="text-align: right;">Total</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($order->items as $item)
                    <tr>
                        <td>{{ $item->product_name }}</td>
                        <td>{{ $item->product_sku }}</td>
                        <td>{{ $item->quantity }}</td>
                        <td style="text-align: right;">£{{ number_format($item->total_price, 2) }}</td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
            
            <h3>Delivery Address</h3>
            <p>
                {{ $order->customer_name }}<br>
                {{ $order->delivery_address }}<br>
                {{ $order->delivery_city }}<br>
                {{ $order->delivery_postcode }}
            </p>
            
            <p style="text-align: center; margin-top: 30px;">
                <a href="{{ route('admin.orders.show', $order) }}" class="button">View Order</a>
                <a href="{{ route('admin.orders.index') }}" class="button secondary">All Orders</a>
            </p>
        </div>
        
        <div class="footer">
            <p>This is an automated notification from BlindBase Admin.</p>
        </div>
    </div>
</body>
</html>
