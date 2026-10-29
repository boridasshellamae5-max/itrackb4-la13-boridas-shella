<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Book extends Model
{
    protected $fillable = [
        'title',
        'author',
        'year',
        'genre_id', // ✅ DAPAT NANDITO — hindi 'genre'
    ];

    // ✅ Pangalan ay SINGULAR — 'genre' HINDI 'genres'
    public function genre(): BelongsTo
    {
        return $this->belongsTo(Genre::class);
    }
}