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
        Schema::create('purchase_requisitions', function (Blueprint $table) {
            $table->id('pr_id');
            $table->string('pr_number', 50)->unique();
            $table->integer('requested_by');
            $table->date('requested_date')->default(now());
            $table->enum('status', ['draft', 'submited', 'approved', 'rejected', 'processed']);
            $table->enum('urgency', ['low', 'medium', 'hight']);
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
        Schema::dropIfExists('purchase_requisitions');
    }
};
