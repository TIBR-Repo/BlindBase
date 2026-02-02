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
        Schema::create('trade_accounts', function (Blueprint $table) {
            $table->id();
            $table->string('company_name');
            $table->string('company_reg_number')->nullable();
            $table->string('vat_number')->nullable();
            $table->string('contact_name');
            $table->string('job_title')->nullable();
            $table->string('email')->unique();
            $table->string('phone');
            $table->string('password');
            $table->string('delivery_address');
            $table->string('delivery_city');
            $table->string('delivery_postcode');
            $table->string('invoice_address')->nullable();
            $table->string('invoice_city')->nullable();
            $table->string('invoice_postcode')->nullable();
            $table->string('sector')->nullable();
            $table->string('estimated_volume')->nullable();
            $table->decimal('discount_percent', 5, 2)->default(15.00);
            $table->enum('status', ['pending', 'approved', 'suspended'])->default('pending');
            $table->timestamp('approved_at')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('trade_accounts');
    }
};
