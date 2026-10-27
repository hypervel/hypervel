<?php

declare(strict_types=1);

use Hypervel\Database\Migrations\Migration;
use Hypervel\Database\Schema\Blueprint;
use Hypervel\Support\Facades\Schema;

return new class extends Migration {
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('job_outbox', function (Blueprint $table) {
            $table->id();
            $table->uuid('uuid')->unique();
            $table->string('connection');
            $table->string('queue')->nullable();
            $table->longText('payload');
            $table->text('options')->nullable();
            $table->unsignedBigInteger('deliver_at')->nullable();
            $table->unsignedInteger('attempts')->default(0);
            $table->unsignedBigInteger('available_at');
            $table->uuid('lease_token')->nullable();
            $table->text('last_error')->nullable();
            $table->unsignedBigInteger('created_at');

            $table->index(['available_at', 'id']);
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('job_outbox');
    }
};
