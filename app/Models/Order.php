<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Order extends Model
{
    use HasFactory;

    protected $fillable = [
        'order_number',
        'customer_email',
        'customer_phone',
        'customer_name',
        'company_name',
        'delivery_address',
        'delivery_city',
        'delivery_postcode',
        'delivery_instructions',
        'billing_address',
        'billing_city',
        'billing_postcode',
        'subtotal',
        'shipping',
        'vat',
        'total',
        'status',
        'tracking_number',
        'notes',
        'trade_account_id',
        'stripe_payment_id',
    ];

    protected function casts(): array
    {
        return [
            'subtotal' => 'decimal:2',
            'shipping' => 'decimal:2',
            'vat' => 'decimal:2',
            'total' => 'decimal:2',
        ];
    }

    /**
     * Get the trade account associated with the order.
     */
    public function tradeAccount(): BelongsTo
    {
        return $this->belongsTo(TradeAccount::class);
    }

    /**
     * Get the order items.
     */
    public function items(): HasMany
    {
        return $this->hasMany(OrderItem::class);
    }

    /**
     * Generate a unique order number.
     */
    public static function generateOrderNumber(): string
    {
        $date = now()->format('Ymd');
        $random = str_pad(random_int(0, 99999), 5, '0', STR_PAD_LEFT);
        
        $orderNumber = "BB-{$date}-{$random}";
        
        // Ensure uniqueness
        while (self::where('order_number', $orderNumber)->exists()) {
            $random = str_pad(random_int(0, 99999), 5, '0', STR_PAD_LEFT);
            $orderNumber = "BB-{$date}-{$random}";
        }
        
        return $orderNumber;
    }

    /**
     * Check if this is a trade order.
     */
    public function isTradeOrder(): bool
    {
        return $this->trade_account_id !== null;
    }

    /**
     * Scope to get orders by status.
     */
    public function scopeByStatus($query, string $status)
    {
        return $query->where('status', $status);
    }

    /**
     * Get full delivery address as a string.
     */
    public function getFullDeliveryAddressAttribute(): string
    {
        return implode(', ', array_filter([
            $this->delivery_address,
            $this->delivery_city,
            $this->delivery_postcode,
        ]));
    }

    /**
     * Get full billing address as a string.
     */
    public function getFullBillingAddressAttribute(): string
    {
        return implode(', ', array_filter([
            $this->billing_address,
            $this->billing_city,
            $this->billing_postcode,
        ]));
    }
}
