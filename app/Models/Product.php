<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Product extends Model
{
    use HasFactory;

    protected $fillable = [
        'sku',
        'name',
        'slug',
        'category_id',
        'description',
        'full_description',
        'price',
        'trade_price',
        'stock',
        'sizes',
        'colours',
        'image',
        'fire_rating',
        'antimicrobial',
        'wipe_clean',
        'child_safe',
        'fire_cert_path',
        'spec_sheet_path',
        'status',
    ];

    protected function casts(): array
    {
        return [
            'price' => 'decimal:2',
            'trade_price' => 'decimal:2',
            'sizes' => 'array',
            'colours' => 'array',
            'antimicrobial' => 'boolean',
            'wipe_clean' => 'boolean',
            'child_safe' => 'boolean',
        ];
    }

    /**
     * Get the category that the product belongs to.
     */
    public function category(): BelongsTo
    {
        return $this->belongsTo(Category::class);
    }

    /**
     * Get the order items for this product.
     */
    public function orderItems(): HasMany
    {
        return $this->hasMany(OrderItem::class);
    }

    /**
     * Scope to get only published products.
     */
    public function scopePublished($query)
    {
        return $query->where('status', 'published');
    }

    /**
     * Scope to get only in-stock products.
     */
    public function scopeInStock($query)
    {
        return $query->where('stock', '>', 0)->where('status', '!=', 'out_of_stock');
    }

    /**
     * Get the route key for the model.
     */
    public function getRouteKeyName(): string
    {
        return 'slug';
    }

    /**
     * Calculate price including VAT (20%).
     */
    public function getPriceIncVatAttribute(): float
    {
        return round($this->price * 1.20, 2);
    }

    /**
     * Calculate trade price including VAT (20%).
     */
    public function getTradePriceIncVatAttribute(): ?float
    {
        return $this->trade_price ? round($this->trade_price * 1.20, 2) : null;
    }
}
