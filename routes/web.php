<?php

use App\Http\Controllers\Admin\AdminAuthController;
use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\OrderController as AdminOrderController;
use App\Http\Controllers\Admin\ProductController as AdminProductController;
use App\Http\Controllers\Admin\SettingsController;
use App\Http\Controllers\Admin\TradeAccountController;
use App\Http\Controllers\CartController;
use App\Http\Controllers\CheckoutController;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\PageController;
use App\Http\Controllers\ShopController;
use App\Http\Controllers\StripeController;
use App\Http\Controllers\TradeController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Public Routes
|--------------------------------------------------------------------------
*/

Route::get('/', [PageController::class, 'home'])->name('home');

// Shop Routes
Route::get('/shop', [ShopController::class, 'index'])->name('shop.index');
Route::get('/shop/{slug}', [ShopController::class, 'category'])->name('shop.category');
Route::get('/product/{slug}', [ShopController::class, 'show'])->name('shop.show');

// Legacy route aliases for backwards compatibility
Route::get('/category/{slug}', [ShopController::class, 'category'])->name('category');
Route::get('/products/{slug}', [ShopController::class, 'show'])->name('product');

// Static Pages
Route::get('/compliance', [PageController::class, 'compliance'])->name('compliance');

// Contact Routes
Route::get('/contact', [ContactController::class, 'show'])->name('contact');
Route::post('/contact', [ContactController::class, 'send'])->name('contact.send');

// Redirect /shop alias for homepage links
Route::get('/shop-all', fn() => redirect()->route('shop.index'))->name('shop');

/*
|--------------------------------------------------------------------------
| Cart Routes
|--------------------------------------------------------------------------
*/

Route::prefix('cart')->name('cart.')->group(function () {
    Route::get('/', [CartController::class, 'index'])->name('index');
    Route::post('/add', [CartController::class, 'add'])->name('add');
    Route::post('/update', [CartController::class, 'update'])->name('update');
    Route::post('/remove', [CartController::class, 'remove'])->name('remove');
    Route::post('/clear', [CartController::class, 'clear'])->name('clear');
});

/*
|--------------------------------------------------------------------------
| Checkout Routes
|--------------------------------------------------------------------------
*/

Route::get('/checkout', [CheckoutController::class, 'show'])->name('checkout.show');
Route::post('/checkout', [CheckoutController::class, 'process'])->name('checkout.process');
Route::get('/order-confirmation/{orderNumber}', [CheckoutController::class, 'confirmation'])->name('order.confirmation');

/*
|--------------------------------------------------------------------------
| Stripe Routes
|--------------------------------------------------------------------------
*/

Route::prefix('stripe')->name('stripe.')->group(function () {
    Route::get('/checkout/{order}', [StripeController::class, 'checkout'])->name('checkout');
    Route::get('/success/{order}', [StripeController::class, 'success'])->name('success');
    Route::get('/cancel/{order}', [StripeController::class, 'cancel'])->name('cancel');
});

// Stripe Webhook (excluded from CSRF)
Route::post('/stripe/webhook', [StripeController::class, 'webhook'])->name('stripe.webhook');

/*
|--------------------------------------------------------------------------
| Trade Account Routes
|--------------------------------------------------------------------------
*/

Route::prefix('trade')->name('trade.')->group(function () {
    // Guest routes (login/register)
    Route::middleware('guest:trade')->group(function () {
        Route::get('/login', [TradeController::class, 'showLogin'])->name('login');
        Route::post('/login', [TradeController::class, 'login']);
        Route::get('/register', [TradeController::class, 'showRegister'])->name('register');
        Route::post('/register', [TradeController::class, 'register']);
    });

    // Pending approval page (accessible without approved status)
    Route::get('/pending', [TradeController::class, 'pending'])->name('pending');

    // Authenticated routes (requires approved status)
    Route::middleware('trade.approved')->group(function () {
        Route::get('/dashboard', [TradeController::class, 'dashboard'])->name('dashboard');
        Route::get('/account', [TradeController::class, 'account'])->name('account');
        Route::put('/account', [TradeController::class, 'updateAccount'])->name('account.update');
    });

    // Logout (just needs to be logged in)
    Route::middleware('auth:trade')->group(function () {
        Route::post('/logout', [TradeController::class, 'logout'])->name('logout');
    });
});

/*
|--------------------------------------------------------------------------
| Admin Routes
|--------------------------------------------------------------------------
*/

Route::prefix('admin')->name('admin.')->group(function () {
    // Guest routes (login)
    Route::middleware('guest:admin')->group(function () {
        Route::get('/login', [AdminAuthController::class, 'showLogin'])->name('login');
        Route::post('/login', [AdminAuthController::class, 'login']);
    });

    // Authenticated admin routes
    Route::middleware('admin')->group(function () {
        // Dashboard
        Route::get('/', [DashboardController::class, 'index'])->name('dashboard');

        // Products
        Route::resource('products', AdminProductController::class);

        // Orders
        Route::get('/orders', [AdminOrderController::class, 'index'])->name('orders.index');
        Route::get('/orders/{order}', [AdminOrderController::class, 'show'])->name('orders.show');
        Route::put('/orders/{order}', [AdminOrderController::class, 'update'])->name('orders.update');

        // Trade Accounts
        Route::get('/trade-accounts', [TradeAccountController::class, 'index'])->name('trade-accounts.index');
        Route::get('/trade-accounts/{tradeAccount}', [TradeAccountController::class, 'show'])->name('trade-accounts.show');
        Route::put('/trade-accounts/{tradeAccount}', [TradeAccountController::class, 'update'])->name('trade-accounts.update');
        Route::post('/trade-accounts/{tradeAccount}/approve', [TradeAccountController::class, 'approve'])->name('trade-accounts.approve');
        Route::post('/trade-accounts/{tradeAccount}/reject', [TradeAccountController::class, 'reject'])->name('trade-accounts.reject');
        Route::delete('/trade-accounts/{tradeAccount}', [TradeAccountController::class, 'destroy'])->name('trade-accounts.destroy');

        // Settings
        Route::get('/settings', [SettingsController::class, 'index'])->name('settings');
        Route::post('/settings', [SettingsController::class, 'update'])->name('settings.update');
        Route::post('/settings/password', [SettingsController::class, 'updatePassword'])->name('settings.password');

        // Logout
        Route::post('/logout', [AdminAuthController::class, 'logout'])->name('logout');
    });
});
