<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        // 1. Gawin muna ang genres table
        Schema::create('genres', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->timestamps();
        });

        // 2. Pagkatapos, idagdag ang genre_id sa movies
        Schema::table('movies', function (Blueprint $table) {
            // Kung may lumang 'genre' text column, burahin muna
            if (Schema::hasColumn('movies', 'genre')) {
                $table->dropColumn('genre');
            }
            // Idagdag ang bagong foreign key
            $table->foreignId('genre_id')->constrained();
        });
    }

    public function down(): void
    {
        Schema::table('movies', function (Blueprint $table) {
            $table->dropForeign(['genre_id']);
            $table->dropColumn('genre_id');
        });
        Schema::dropIfExists('genres');
    }
};