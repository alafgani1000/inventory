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
        Schema::create('inventory_count_items', function (Blueprint $table) {
            $table->id('count_item_id');
            $table->integer('count_id');
            $table->integer('item_id');
            $table->integer('location_id');
            $table->integer('system_quantity');
            $table->integer('counted_quantity');
            $table->integer('variance')->storedAs('counted_quantity - system_quantity');
            $table->text('notes')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('inventory_count_items');
    }
};
