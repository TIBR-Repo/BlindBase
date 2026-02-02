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
        Schema::create('orders', function (Blueprint $table) {
            $table->id();
            $table->string('order_number')->unique(); // Format: BB-YYYYMMDD-XXXXX
            $table->string('customer_email');
            $table->string('customer_phone')->nullable();
            $table->string('customer_name');
            $table->string('company_name')->nullable();
            $table->string('delivery_address');
            $table->string('delivery_city');
            $table->string('delivery_postcode');
            $table->text('delivery_instructions')->nullable();
            $table->string('billing_address')->nullable();
            $table->string('billing_city')->nullable();
            $table->string('billing_postcode')->nullable();
            $table->decimal('subtotal', 10, 2);
            $table->decimal('shipping', 10, 2)->default(0);
            $table->decimal('vat', 10, 2);
            $table->decimal('total', 10, 2);
            $table->enum('status', ['pending', 'processing', 'dispatched', 'completed', 'cancelled'])->default('pending');
            $table->string('tracking_number')->nullable();
            $table->text('notes')->nullable();
            $table->foreignId('trade_account_id')->nullable()->constrained()->onDelete('set null');
            $table->string('stripe_payment_id')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('orders');
    }
};
