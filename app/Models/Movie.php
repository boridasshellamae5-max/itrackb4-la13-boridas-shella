<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Movie extends Model
{
    use HasFactory;

    protected $fillable = [
        'title',
        'director',
        'year',
        'genre_id', // ✅ NANDITO DAPAT
        'is_featured',
        'description',
    ];

    public function genre()
    {
        return $this->belongsTo(Genre::class);
    }
}
