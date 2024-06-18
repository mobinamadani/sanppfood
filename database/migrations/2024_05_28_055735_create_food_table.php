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
        Schema::create('food', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('recipe')->nullable();
            $table->string('price');
            $table->text('photo')->nullable();
            $table->foreignIdFor(\App\Models\Admin\FoodCategory::class)->constrained();
            $table->foreignIdFor(\App\Models\Admin\Discount::class)->nullable()->constrained();
            $table->foreignIdFor(\App\Models\Seller\Seller::class)->nullable()->constrained();
            $table->foreignIdFor(\App\Models\Seller\Restaurant::class)->nullable()->constrained();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('food');
    }
};
