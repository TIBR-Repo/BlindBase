<?php

namespace Database\Seeders;

use App\Models\Category;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Roller Blinds (root category)
        Category::create([
            'name' => 'Roller Blinds',
            'slug' => 'roller-blinds',
            'sort_order' => 1,
        ]);

        // Components (root category with subcategories)
        $components = Category::create([
            'name' => 'Components',
            'slug' => 'components',
            'sort_order' => 2,
        ]);

        // Components subcategories
        Category::create([
            'name' => 'Brackets & Fixings',
            'slug' => 'brackets-fixings',
            'parent_id' => $components->id,
            'sort_order' => 1,
        ]);

        Category::create([
            'name' => 'Chains & Controls',
            'slug' => 'chains-controls',
            'parent_id' => $components->id,
            'sort_order' => 2,
        ]);

        Category::create([
            'name' => 'Bottom Bars',
            'slug' => 'bottom-bars',
            'parent_id' => $components->id,
            'sort_order' => 3,
        ]);

        Category::create([
            'name' => 'Replacement Parts',
            'slug' => 'replacement-parts',
            'parent_id' => $components->id,
            'sort_order' => 4,
        ]);

        // Window Films (root category with subcategories)
        $windowFilms = Category::create([
            'name' => 'Window Films',
            'slug' => 'window-films',
            'sort_order' => 3,
        ]);

        Category::create([
            'name' => 'Privacy',
            'slug' => 'privacy-films',
            'parent_id' => $windowFilms->id,
            'sort_order' => 1,
        ]);

        Category::create([
            'name' => 'Solar',
            'slug' => 'solar-films',
            'parent_id' => $windowFilms->id,
            'sort_order' => 2,
        ]);

        Category::create([
            'name' => 'Safety',
            'slug' => 'safety-films',
            'parent_id' => $windowFilms->id,
            'sort_order' => 3,
        ]);

        // Maintenance Kits (root category)
        Category::create([
            'name' => 'Maintenance Kits',
            'slug' => 'maintenance-kits',
            'sort_order' => 4,
        ]);
    }
}
