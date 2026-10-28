<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('movies', function (Blueprint $table) {
            $table->id();
            $table->string('title');
            $table->string('director');
            $table->integer('year');
            $table->boolean('is_featured');
            $table->string('description')->nullable();
            $table->timestamps();
            // WALA DITO ANG genre o genre_id — idaragdag sa pangalawang migration
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('movies');
    }
};