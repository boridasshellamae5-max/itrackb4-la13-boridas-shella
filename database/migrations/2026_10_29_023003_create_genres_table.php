<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        // 1. Gumawa ng genres table
        Schema::create('genres', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->timestamps();
        });

        // 2. Tanggalin ang lumang 'genre' column LANG KUNG MERON
        if (Schema::hasColumn('books', 'genre')) {
            Schema::table('books', function (Blueprint $table) {
                $table->dropColumn('genre');
            });
        }

        // 3. Magdagdag ng genre_id column sa books
        Schema::table('books', function (Blueprint $table) {
            $table->foreignId('genre_id')->constrained();
        });
    }

    public function down()
    {
        Schema::dropIfExists('genres');

        Schema::table('books', function (Blueprint $table) {
            $table->dropForeign(['genre_id']);
            $table->dropColumn('genre_id');
        });
    }
};