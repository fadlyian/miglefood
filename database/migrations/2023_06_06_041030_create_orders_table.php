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
            $table->foreignId('cashier_id')->constrained('users');
            $table->foreignId('consumer_id')->constrained('consumers');
            $table->string('status')->nullable();
            $table->string('tableNumber')->nullable();
            $table->string('subTotal')->nullable();
            $table->string('ppn')->nullable();
            $table->string('grandTotal')->nullable();
            $table->string('paymentStatus')->nullable();
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
