<?php

namespace App\Http\Controllers;

use App\Mail\TradeAccountPendingMail;
use App\Models\Order;
use App\Models\TradeAccount;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;
use Illuminate\Validation\Rules\Password;

class TradeController extends Controller
{
    /**
     * Display the trade registration form.
     */
    public function showRegister()
    {
        return view('pages.trade.register');
    }

    /**
     * Handle trade registration.
     */
    public function register(Request $request)
    {
        $validated = $request->validate([
            // Company details
            'company_name' => ['required', 'string', 'max:255'],
            'company_reg_number' => ['nullable', 'string', 'max:50'],
            'vat_number' => ['nullable', 'string', 'max:50'],
            'sector' => ['required', 'string', 'in:education,healthcare,care-home,hospitality,commercial,government,other'],
            
            // Contact details
            'contact_name' => ['required', 'string', 'max:255'],
            'job_title' => ['nullable', 'string', 'max:100'],
            'email' => ['required', 'email', 'max:255', 'unique:trade_accounts,email'],
            'phone' => ['required', 'string', 'max:50'],
            
            // Delivery address
            'delivery_address' => ['required', 'string', 'max:255'],
            'delivery_city' => ['required', 'string', 'max:100'],
            'delivery_postcode' => ['required', 'string', 'max:20'],
            
            // Password
            'password' => ['required', 'confirmed', Password::min(8)],
            
            // Volume and terms
            'estimated_volume' => ['required', 'string', 'in:1-10,11-50,51-100,100+'],
            'terms' => ['required', 'accepted'],
            'marketing' => ['nullable', 'boolean'],
        ], [
            'sector.required' => 'Please select your business sector.',
            'sector.in' => 'Please select a valid business sector.',
            'email.unique' => 'This email address is already registered.',
            'estimated_volume.required' => 'Please select your estimated monthly volume.',
            'terms.accepted' => 'You must agree to the terms and conditions.',
        ]);

        // Remove non-model fields
        unset($validated['terms'], $validated['marketing']);

        // Set defaults
        $validated['status'] = 'pending';
        $validated['discount_percent'] = 15.00; // Default trade discount

        $account = TradeAccount::create($validated);

        // Send notification email to admin
        try {
            Mail::to(config('mail.from.address', 'sales@blindbase.co.uk'))
                ->send(new TradeAccountPendingMail($account));
        } catch (\Exception $e) {
            // Log but don't fail registration
            \Log::error('Failed to send trade account notification: ' . $e->getMessage());
        }

        return redirect()->route('trade.login')
            ->with('success', 'Your trade account application has been submitted successfully. We will review your application and contact you within 24-48 hours.');
    }

    /**
     * Display the trade login form.
     */
    public function showLogin()
    {
        return view('pages.trade.login');
    }

    /**
     * Handle trade login.
     */
    public function login(Request $request)
    {
        $credentials = $request->validate([
            'email' => ['required', 'email'],
            'password' => ['required'],
        ]);

        $remember = $request->boolean('remember');

        if (Auth::guard('trade')->attempt($credentials, $remember)) {
            $request->session()->regenerate();

            $user = Auth::guard('trade')->user();

            // Check account status
            if ($user->isPending()) {
                Auth::guard('trade')->logout();
                return redirect()->route('trade.pending');
            }

            if ($user->isSuspended()) {
                Auth::guard('trade')->logout();
                return back()->withErrors([
                    'email' => 'Your account has been suspended. Please contact us for more information.',
                ])->onlyInput('email');
            }

            return redirect()->intended(route('trade.dashboard'));
        }

        return back()->withErrors([
            'email' => 'The provided credentials do not match our records.',
        ])->onlyInput('email');
    }

    /**
     * Handle trade logout.
     */
    public function logout(Request $request)
    {
        Auth::guard('trade')->logout();

        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect()->route('home');
    }

    /**
     * Display the pending approval page.
     */
    public function pending()
    {
        return view('pages.trade.pending');
    }

    /**
     * Display the trade dashboard.
     */
    public function dashboard()
    {
        $account = Auth::guard('trade')->user();
        
        $orders = Order::where('trade_account_id', $account->id)
            ->orderBy('created_at', 'desc')
            ->paginate(10);

        $stats = [
            'total_orders' => Order::where('trade_account_id', $account->id)->count(),
            'total_spent' => Order::where('trade_account_id', $account->id)->sum('total'),
            'pending_orders' => Order::where('trade_account_id', $account->id)->whereIn('status', ['pending', 'processing'])->count(),
        ];

        return view('pages.trade.dashboard', compact('account', 'orders', 'stats'));
    }

    /**
     * Display account details.
     */
    public function account()
    {
        $account = Auth::guard('trade')->user();
        return view('pages.trade.account', compact('account'));
    }

    /**
     * Update account details.
     */
    public function updateAccount(Request $request)
    {
        $account = Auth::guard('trade')->user();

        $validated = $request->validate([
            'contact_name' => ['required', 'string', 'max:255'],
            'job_title' => ['nullable', 'string', 'max:100'],
            'phone' => ['required', 'string', 'max:50'],
            'delivery_address' => ['required', 'string', 'max:255'],
            'delivery_city' => ['required', 'string', 'max:100'],
            'delivery_postcode' => ['required', 'string', 'max:20'],
        ]);

        $account->update($validated);

        return back()->with('success', 'Your account details have been updated.');
    }
}
