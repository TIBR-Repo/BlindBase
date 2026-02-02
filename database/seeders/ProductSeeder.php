<?php

namespace Database\Seeders;

use App\Models\Category;
use App\Models\Product;
use Illuminate\Database\Seeder;

class ProductSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $rollerBlinds = Category::where('slug', 'roller-blinds')->first();

        $products = [
            [
                'sku' => 'RB-WHITE-001',
                'name' => 'Classic Roller Blind - White',
                'slug' => 'classic-roller-blind-white',
                'description' => 'A timeless white roller blind perfect for any room. Made with high-quality fabric that blocks light effectively while maintaining a clean, modern look.',
                'full_description' => '<p>Our Classic White Roller Blind is the perfect choice for any room in your home or office. Made from premium quality fabric, this blind offers excellent light control and privacy.</p><p>Features:</p><ul><li>High-quality woven fabric</li><li>Easy-to-operate chain mechanism</li><li>Available in multiple sizes</li><li>Child-safe design</li><li>Easy to clean</li></ul>',
                'price' => 24.95,
                'trade_price' => 18.95,
                'stock' => 100,
                'sizes' => ['60cm x 120cm', '90cm x 120cm', '120cm x 120cm', '150cm x 120cm', '180cm x 120cm'],
                'colours' => ['White'],
                'antimicrobial' => false,
                'wipe_clean' => true,
                'child_safe' => true,
                'status' => 'published',
            ],
            [
                'sku' => 'RB-LGREY-001',
                'name' => 'Classic Roller Blind - Light Grey',
                'slug' => 'classic-roller-blind-light-grey',
                'description' => 'A sophisticated light grey roller blind that adds elegance to any space. Perfect for modern interiors and office environments.',
                'full_description' => '<p>Our Classic Light Grey Roller Blind brings a touch of sophistication to any room. The subtle grey tone complements both contemporary and traditional décor.</p><p>Features:</p><ul><li>Premium woven fabric</li><li>Smooth chain operation</li><li>Multiple size options</li><li>Child-safe mechanism</li><li>Easy maintenance</li></ul>',
                'price' => 24.95,
                'trade_price' => 18.95,
                'stock' => 85,
                'sizes' => ['60cm x 120cm', '90cm x 120cm', '120cm x 120cm', '150cm x 120cm', '180cm x 120cm'],
                'colours' => ['Light Grey'],
                'antimicrobial' => false,
                'wipe_clean' => true,
                'child_safe' => true,
                'status' => 'published',
            ],
            [
                'sku' => 'RB-STONE-001',
                'name' => 'Classic Roller Blind - Stone',
                'slug' => 'classic-roller-blind-stone',
                'description' => 'A warm stone-coloured roller blind that brings natural warmth to your space. Ideal for living rooms and bedrooms.',
                'full_description' => '<p>Our Classic Stone Roller Blind offers a warm, natural tone that creates a cosy atmosphere in any room. The earthy colour pairs beautifully with wooden furniture and natural textures.</p><p>Features:</p><ul><li>Quality woven fabric</li><li>Reliable chain mechanism</li><li>Range of sizes available</li><li>Child-safe design</li><li>Wipe-clean surface</li></ul>',
                'price' => 24.95,
                'trade_price' => 18.95,
                'stock' => 72,
                'sizes' => ['60cm x 120cm', '90cm x 120cm', '120cm x 120cm', '150cm x 120cm', '180cm x 120cm'],
                'colours' => ['Stone'],
                'antimicrobial' => false,
                'wipe_clean' => true,
                'child_safe' => true,
                'status' => 'published',
            ],
            [
                'sku' => 'RB-CHAR-001',
                'name' => 'Classic Roller Blind - Charcoal',
                'slug' => 'classic-roller-blind-charcoal',
                'description' => 'A bold charcoal roller blind that makes a statement. Perfect for creating dramatic contrast in modern interiors.',
                'full_description' => '<p>Our Classic Charcoal Roller Blind makes a bold statement in any room. The deep, rich colour provides excellent light blocking and creates a sophisticated ambiance.</p><p>Features:</p><ul><li>Premium fabric construction</li><li>Smooth chain operation</li><li>Available in various sizes</li><li>Child-safe mechanism</li><li>Easy to clean</li></ul>',
                'price' => 24.95,
                'trade_price' => 18.95,
                'stock' => 60,
                'sizes' => ['60cm x 120cm', '90cm x 120cm', '120cm x 120cm', '150cm x 120cm', '180cm x 120cm'],
                'colours' => ['Charcoal'],
                'antimicrobial' => false,
                'wipe_clean' => true,
                'child_safe' => true,
                'status' => 'published',
            ],
        ];

        foreach ($products as $productData) {
            Product::create(array_merge($productData, [
                'category_id' => $rollerBlinds->id,
            ]));
        }
    }
}
