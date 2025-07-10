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
        Schema::create('stock_adjusments', function (Blueprint $table) {
            $table->id('adjustment_id');
            $table->string('adjustment_number', 50)->unique();
            $table->integer('count_id')->nullable();
            $table->timestamp('adjustment_date')->useCurrent();
            $table->integer('adjusted_by');
            $table->integer('approved_by')->nullable();
            $table->enum('status', ['pending', 'approved', 'rejected', 'processed']);
            $table->string('reason', 100);
            $table->text('notes')->nullable();
            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('stock_adjusments');
    }
};
