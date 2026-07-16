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
        Schema::create('short_urls', function (Blueprint $table) {
            $table->id();

            $table->foreignId('user_id')->nullable()->constrained()->nullOnDelete();

            $table->text('original_url');

            $table->string('short_code', 30)->unique();

            $table->string('title')->nullable();

            $table->text('description')->nullable();

            $table->string('favicon_url')->nullable();

            $table->boolean('is_custom')->default(false);

            $table->boolean('is_active')->default(true);

            $table->bigInteger('clicks')->default(0);

            $table->timestamp('last_clicked_at')->nullable();

            $table->smallInteger('redirect_delay')->default(1);

            $table->timestamp('expires_at')->nullable();

            $table->timestamps();

            $table->softDeletes();

            $table->index(['user_id', 'created_at']);
            $table->index(['is_active', 'clicks']);
            $table->index('last_clicked_at');
            $table->index('expires_at');

        });

        /*
         |--------------------------------------------------------------------------
         | PostgreSQL CHECK Constraints
         |--------------------------------------------------------------------------
         */

        DB::statement("
            ALTER TABLE short_urls
            ADD CONSTRAINT chk_short_urls_clicks
            CHECK (clicks >= 0)
        ");

        DB::statement("
            ALTER TABLE short_urls
            ADD CONSTRAINT chk_short_urls_redirect_delay
            CHECK (redirect_delay BETWEEN 0 AND 10)
        ");

    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('short_urls');
    }
};
