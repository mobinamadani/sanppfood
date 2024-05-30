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
            $table->foreignIdFor(\App\Models\Shopper\Cart::class)->constrained();
            $table->foreignIdFor(\App\Models\Seller\Restaurant::class)->constrained();
            $table->foreignIdFor(\App\Models\Shopper\Shopper::class)->constrained();
            $table->foreignIdFor(\App\Models\Seller\Seller::class)->constrained();
            $table->string('price');
            $table->string('status')->default('در حال بررسی');
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
