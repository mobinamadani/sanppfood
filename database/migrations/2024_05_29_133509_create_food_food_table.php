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
        Schema::create('food_food', function (Blueprint $table) {
            $table->id();
            $table->foreignIdFor(\App\Models\Seller\Food::class)->constrained()->onDelete('CASCADE');
            $table->foreignIdFor(\App\Models\Admin\FoodCategory::class)->constrained()->onDelete('CASCADE');
            $table->unique(['food_id' , 'food_category_id']);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('food_food');
    }
};
