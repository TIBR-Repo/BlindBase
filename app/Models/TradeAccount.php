<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Foundation\Auth\User as Authenticatable;

class TradeAccount extends Authenticatable
{
    use HasFactory;

    protected $fillable = [
        'company_name',
        'company_reg_number',
        'vat_number',
        'contact_name',
        'job_title',
        'email',
        'phone',
        'password',
        'delivery_address',
        'delivery_city',
        'delivery_postcode',
        'invoice_address',
        'invoice_city',
        'invoice_postcode',
        'sector',
        'estimated_volume',
        'discount_percent',
        'status',
        'approved_at',
    ];

    protected $hidden = [
        'password',
    ];

    protected function casts(): array
    {
        return [
            'discount_percent' => 'decimal:2',
            'approved_at' => 'datetime',
            'password' => 'hashed',
        ];
    }

    /**
     * Get all orders for this trade account.
     */
    public function orders(): HasMany
    {
        return $this->hasMany(Order::class);
    }

    /**
     * Check if the account is approved.
     */
    public function isApproved(): bool
    {
        return $this->status === 'approved';
    }

    /**
     * Check if the account is pending.
     */
    public function isPending(): bool
    {
        return $this->status === 'pending';
    }

    /**
     * Check if the account is suspended.
     */
    public function isSuspended(): bool
    {
        return $this->status === 'suspended';
    }

    /**
     * Calculate discounted price for a given amount.
     */
    public function calculateDiscountedPrice(float $price): float
    {
        return round($price * (1 - $this->discount_percent / 100), 2);
    }
}
