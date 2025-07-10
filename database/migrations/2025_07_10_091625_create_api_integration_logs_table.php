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
        Schema::create('api_integration_logs', function (Blueprint $table) {
            $table->id('log_id');
            $table->string('integration_name', 50);
            $table->enum('direction', ['inbound', 'outbound']);
            $table->enum('status', ['success', 'failed', 'pending']);
            $table->text('request_url')->nullable();
            $table->text('request_body')->nullable();
            $table->text('response_body')->nullable();
            $table->integer('response_code')->nullable();
            $table->integer('duration_ms')->nullable();
            $table->text('error_message')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('api_integration_logs');
    }
};
