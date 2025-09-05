<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('notes', function (Blueprint $table) {
            $table->id(); // BIGINT UNSIGNED
            $table->foreignId('user_id')->constrained()->cascadeOnDelete(); // users.id
            $table->string('title');
            $table->text('content')->nullable();
            $table->boolean('pinned')->default(false);
            $table->boolean('is_archived')->default(false);
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('notes');
    }
};
