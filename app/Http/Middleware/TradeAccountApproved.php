<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\HttpFoundation\Response;

class TradeAccountApproved
{
    /**
     * Handle an incoming request.
     *
     * Check if the trade user is logged in and their account is approved.
     */
    public function handle(Request $request, Closure $next): Response
    {
        // Check if user is logged in with trade guard
        if (!Auth::guard('trade')->check()) {
            return redirect()->route('trade.login');
        }

        $user = Auth::guard('trade')->user();

        // Check if account is pending
        if ($user->isPending()) {
            Auth::guard('trade')->logout();
            return redirect()->route('trade.pending');
        }

        // Check if account is suspended
        if ($user->isSuspended()) {
            Auth::guard('trade')->logout();
            return redirect()->route('trade.login')
                ->withErrors(['email' => 'Your account has been suspended. Please contact us for more information.']);
        }

        // Account is approved, proceed
        return $next($request);
    }
}
