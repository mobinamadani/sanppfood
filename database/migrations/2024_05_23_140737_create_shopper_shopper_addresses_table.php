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
        Schema::create('shopper_shopper_addresses', function (Blueprint $table) {
            $table->id();
            $table->string('title');
            $table->string('address');
            $table->string('latitude');
            $table->string('longitude');
            $table->boolean('is_current')->default(false);
            $table->foreignId('shopper_id')->constrained()->onDelete('cascade');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('shopper_shopper_addresses');
    }
};
