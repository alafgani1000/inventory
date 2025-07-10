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
        Schema::create('stock_adjusment_items', function (Blueprint $table) {
            $table->id('adjustment_item_id');
            $table->integer('adjustment_id');
            $table->integer('item_id');
            $table->integer('location_id');
            $table->integer('current_quantity');
            $table->integer('new_quantity');
            $table->integer('adjustment_value')->storedAs('new_quantity - current_quantity');
            $table->decimal('cost_per_unit', 10, 2)->nullable();
            $table->decimal('total_cost', 12, 2)->storedAs('(new_quantity - current_quantity) * cost_per_unit');
            $table->text('notes')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('stock_adjusment_items');
    }
};
