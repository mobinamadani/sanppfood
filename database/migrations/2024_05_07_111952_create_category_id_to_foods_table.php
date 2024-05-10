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
        Schema::create('category_id_to_foods', function (Blueprint $table) {
            $table->id();
            Schema::table('foods_categories', function (Blueprint $table) {
                if (!Schema::hasColumn('foods_categories', 'category_id')) {
                    $table->foreignId('category_id')
                        ->after('id')
                        ->constrained('foods_categories')
                        ->cascadeOnDelete()
                        ->cascadeOnUpdate();
                }
            });
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('category_id_to_foods');
    }
};
