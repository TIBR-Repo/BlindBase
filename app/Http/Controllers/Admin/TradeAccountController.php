<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\TradeAccount;
use Illuminate\Http\Request;

class TradeAccountController extends Controller
{
    public function index(Request $request)
    {
        $query = TradeAccount::withCount('orders');

        // Filter by status
        if ($request->filled('status') && $request->status !== 'all') {
            $query->where('status', $request->status);
        }

        // Search
        if ($request->filled('search')) {
            $search = $request->search;
            $query->where(function ($q) use ($search) {
                $q->where('company_name', 'like', "%{$search}%")
                    ->orWhere('contact_name', 'like', "%{$search}%")
                    ->orWhere('email', 'like', "%{$search}%");
            });
        }

        $accounts = $query->latest()->paginate(20);
        $pendingCount = TradeAccount::where('status', 'pending')->count();

        return view('admin.trade-accounts.index', compact('accounts', 'pendingCount'));
    }

    public function show(TradeAccount $tradeAccount)
    {
        $tradeAccount->load(['orders' => fn($q) => $q->latest()->limit(10)]);
        $stats = [
            'total_orders' => $tradeAccount->orders()->count(),
            'total_spent' => $tradeAccount->orders()->sum('total'),
        ];

        return view('admin.trade-accounts.show', compact('tradeAccount', 'stats'));
    }

    public function approve(TradeAccount $tradeAccount)
    {
        $tradeAccount->update([
            'status' => 'approved',
            'approved_at' => now(),
        ]);

        return back()->with('success', 'Trade account approved successfully.');
    }

    public function reject(TradeAccount $tradeAccount)
    {
        $tradeAccount->update([
            'status' => 'suspended',
        ]);

        return redirect()->route('admin.trade-accounts.index')
            ->with('success', 'Trade account application rejected.');
    }

    public function update(Request $request, TradeAccount $tradeAccount)
    {
        $validated = $request->validate([
            'discount_percent' => 'required|numeric|min:0|max:100',
            'status' => 'required|in:pending,approved,suspended',
        ]);

        $tradeAccount->update($validated);

        return back()->with('success', 'Trade account updated successfully.');
    }

    public function destroy(TradeAccount $tradeAccount)
    {
        $tradeAccount->delete();

        return redirect()->route('admin.trade-accounts.index')
            ->with('success', 'Trade account deleted successfully.');
    }
}
