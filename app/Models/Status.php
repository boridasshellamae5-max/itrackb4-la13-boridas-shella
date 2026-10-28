<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Status extends Model
{
    protected $fillable = ['name']; // C2

    // C4 — Plural method name
    public function subjects(): HasMany
    {
        return $this->hasMany(Subject::class);
    }
}