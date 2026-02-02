<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Order;
use App\Models\Product;
use App\Models\TradeAccount;
use Carbon\Carbon;

class DashboardController extends Controller
{
    public function index()
    {
        $today = Carbon::today();
        $startOfMonth = Carbon::now()->startOfMonth();

        $stats = [
            'today_orders' => Order::whereDate('created_at', $today)->count(),
            'pending_orders' => Order::where('status', 'pending')->count(),
            'month_revenue' => Order::where('status', 'completed')
                ->where('created_at', '>=', $startOfMonth)
                ->sum('total'),
            'low_stock_items' => Product::where('stock', '<=', 5)->where('is_published', true)->count(),
            'pending_trade_accounts' => TradeAccount::where('status', 'pending')->count(),
        ];

        $recentOrders = Order::with('tradeAccount')
            ->latest()
            ->limit(5)
            ->get();

        $lowStockProducts = Product::where('stock', '<=', 5)
            ->where('is_published', true)
            ->orderBy('stock', 'asc')
            ->limit(5)
            ->get();

        return view('admin.dashboard', compact('stats', 'recentOrders', 'lowStockProducts'));
    }
}
