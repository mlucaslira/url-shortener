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
        Schema::create('clicks', function (Blueprint $table) {
            $table->id();
            
            $table->foreignId('short_url_id')->constrained()->cascadeOnDelete();

            $table->ipAddress('ip');

            $table->text('user_agent')->nullable();

            $table->text('referrer')->nullable();

            $table->timestamp('clicked_at')->useCurrent();

            $table->timestamps();

            $table->index(['short_url_id', 'clicked_at']);
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('clicks');
    }
};
