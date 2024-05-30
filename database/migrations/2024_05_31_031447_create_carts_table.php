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
        Schema::create('carts', function (Blueprint $table) {
            $table->id();
            $table->foreignIdFor(\App\Models\Shopper\Shopper::class)->constrained()->onDelete('cascade');
            $table->foreignIdFor(\App\Models\Seller\Seller::class)->constrained()->onDelete('cascade');
            $table->foreignIdFor(\App\Models\Seller\Food::class)->constrained()->onDelete('cascade');
            $table->foreignIdFor(\App\Models\Seller\Restaurant::class)->constrained()->onDelete('cascade');
            $table->string('count');
            $table->string('price');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('carts');
    }
};
