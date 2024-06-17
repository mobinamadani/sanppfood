<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {

    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('address_shopper', function (Blueprint $table) {
            $table->foreignId('address_id')->constrained('shopper_shopper_addresses');
            $table->foreignId('shopper_id')->constrained('shoppers');
            $table->boolean('current_address')->default(false);
            $table->primary(['address_id', 'shopper_id']);
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('address_shopper');
    }


};

