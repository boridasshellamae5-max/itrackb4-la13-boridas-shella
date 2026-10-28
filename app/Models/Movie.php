<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Movie extends Model
{
    protected $fillable = [
        'title', 'director', 'year', 'is_featured', 'genre_id', 'description'
    ];

    public function genre(): BelongsTo
    {
        return $this->belongsTo(Genre::class);
    }
}