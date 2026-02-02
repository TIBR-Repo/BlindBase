<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('products', function (Blueprint $table) {
            $table->id();
            $table->string('sku')->unique();
            $table->string('name');
            $table->string('slug')->unique();
            $table->foreignId('category_id')->constrained()->onDelete('cascade');
            $table->text('description')->nullable();
            $table->longText('full_description')->nullable();
            $table->decimal('price', 10, 2); // Price ex VAT
            $table->decimal('trade_price', 10, 2)->nullable();
            $table->integer('stock')->default(0);
            $table->json('sizes')->nullable();
            $table->json('colours')->nullable();
            $table->string('image')->nullable();
            $table->string('fire_rating')->nullable(); // e.g. "BS5867-B"
            $table->boolean('antimicrobial')->default(false);
            $table->boolean('wipe_clean')->default(false);
            $table->boolean('child_safe')->default(false);
            $table->string('fire_cert_path')->nullable();
            $table->string('spec_sheet_path')->nullable();
            $table->enum('status', ['published', 'draft', 'out_of_stock'])->default('draft');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('products');
    }
};
