<?php

namespace Database\Seeders;

use App\Models\Genre;
use App\Models\Movie;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    public function run(): void
    {
        // Unahin ang mga Genre
        $sciFi  = Genre::create(['name' => 'Sci-Fi']);
        $action = Genre::create(['name' => 'Action']);
        $crime  = Genre::create(['name' => 'Crime']);

        // Gamitin ang $genre->id para sigurado ang tamang numero
        Movie::create([
            'title'       => 'Inception',
            'director'    => 'Christopher Nolan',
            'year'        => 2010,
            'is_featured' => true,
            'genre_id'    => $sciFi->id,
            'description' => '',
        ]);

        Movie::create([
            'title'       => 'The Dark Knight',
            'director'    => 'Christopher Nolan',
            'year'        => 2008,
            'is_featured' => true,
            'genre_id'    => $action->id,
            'description' => '',
        ]);

        Movie::create([
            'title'       => 'The Expandables',
            'director'    => 'Michael Bay',
            'year'        => 2010,
            'is_featured' => true,
            'genre_id'    => $action->id,
            'description' => '',
        ]);
    }
}