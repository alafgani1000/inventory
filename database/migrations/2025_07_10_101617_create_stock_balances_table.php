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
        Schema::create('stock_balances', function (Blueprint $table) {
            $table->id('balance_id');
            $table->integer('item_id');
            $table->integer('location_id');
            $table->integer('quantity_on_hand')->default(0);
            $table->integer('quantity_allocated')->default(0);
            $table->integer('quantity_available')->storedAs('quantity_on_hand - quantity_allocated');
            $table->timestamp('last_movement_date')->nullable();
            $table->timestamps();

            $table->unique('item_id', 'location_id');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('stock_balances');
    }
};
