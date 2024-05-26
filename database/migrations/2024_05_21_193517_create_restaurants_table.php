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
        Schema::create('restaurants', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->foreignIdFor(\App\Models\Seller\Seller::class)->constrained();
            $table->foreignIdFor(\App\Models\Admin\RestaurantCategory::class)->constrained();
            $table->string('phone_number');
            $table->string('address');
            $table->string('account');
            $table->string('is_open')->nullable();
            $table->string('agenda')->nullable();
            $table->string('total_cost')->nullable();
            $table->string('photo')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('restaurants');
    }
};
