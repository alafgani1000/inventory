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
        Schema::create('receipt_items', function (Blueprint $table) {
            $table->id('receipt_item_id');
            $table->integer('receipt_id');
            $table->integer('po_item_id')->nullable();
            $table->integer('item_id');
            $table->integer('location_id');
            $table->integer('quantity_received');
            $table->decimal('unit_price', 10, 2)->nullable();
            $table->string('batch_number', 50)->nullable();
            $table->date('expiry_date')->nullable();
            $table->enum('condition', ['good', 'damaged', 'expired'])->default('good');
            $table->text('notes')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('receipt_items');
    }
};
