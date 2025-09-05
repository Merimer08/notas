<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('note_tag', function (Blueprint $table) {
            // Especificamos la tabla por claridad (evita problemas de pluralización)
            $table->foreignId('note_id')->constrained('notes')->cascadeOnDelete();
            $table->foreignId('tag_id')->constrained('tags')->cascadeOnDelete();
            $table->primary(['note_id', 'tag_id']);
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('note_tag');
    }
};
