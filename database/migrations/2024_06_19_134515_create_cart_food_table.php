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
        Schema::create('cart_food', function (Blueprint $table) {
            $table->id();
            $table->foreignIdFor(\App\Models\Shopper\Cart::class)->constrained()->cascadeOnDelete();
            $table->foreignIdFor(\App\Models\Seller\Food::class)->constrained()->cascadeOnDelete();
            $table->unique(['cart_id' , 'food_id']);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('cart_food');
    }
};
