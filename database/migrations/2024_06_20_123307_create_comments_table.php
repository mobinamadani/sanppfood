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
        Schema::create('comments', function (Blueprint $table) {
            $table->id();
            $table->string('message');
            $table->string('score');
            $table->foreignIdFor(\App\Models\Shopper\Cart::class)->constrained()->onDelete('cascade');
            $table->foreignIdFor(\App\Models\Shopper\Shopper::class)->constrained()->onDelete('cascade');
            $table->foreignIdFor(\App\Models\Seller\Food::class)->constrained()->onDelete('cascade');
            $table->string('response')->nullable();
            $table->string('status')->default(false);
            $table->string('delete_request')->nullable();
            $table->softDeletes();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('comments');
    }
};
