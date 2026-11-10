<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('books', function (Blueprint $table) {
            $table->id();
            $table->string('title');          // Pamagat — short text
            $table->string('author');         // May-akda — short text
            $table->integer('year');         // Taon — whole number
            $table->boolean('is_filipino');   // Filipino ba? — true/false
            $table->text('description')->nullable();  // Buod — pwede walang laman
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('books');
    }
};
