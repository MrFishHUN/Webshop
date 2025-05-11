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
        Schema::create('order_infos', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->cascadeOnDelete();
            //delivery address
            $table->string('name');
            $table->string('address');
            $table->string('postal_code');
            $table->string('city');
            $table->string('phone');
            $table->string('email');
            //billing address
            $table->string('billing_name');
            $table->string('billing_address');
            $table->string('billing_postal_code');
            $table->string('billing_phone');
            $table->string('billing_email');
            //payment method
            $table->string('payment_method');
            $table->string('payment_status');
            $table->string('payment_transaction_id')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('order_infos');
    }
};
