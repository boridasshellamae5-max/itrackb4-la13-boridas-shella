<?php

namespace Database\Seeders;

use App\Models\Genre;
use App\Models\Movie;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    public function run(): void
    {
        // Clear existing data first to avoid duplicates
        Movie::truncate();
        Genre::truncate();

        // Create Genres
        $sciFi  = Genre::create(['name' => 'Sci-Fi']);
        $action = Genre::create(['name' => 'Action']);
        $crime  = Genre::create(['name' => 'Crime']);

        // 20 Movies
        $movies = [
            ['title' => 'Inception', 'director' => 'Christopher Nolan', 'year' => 2010, 'genre_id' => $sciFi->id, 'is_featured' => true, 'description' => 'A thief who steals corporate secrets through dream-sharing technology.'],
            ['title' => 'Interstellar', 'director' => 'Christopher Nolan', 'year' => 2014, 'genre_id' => $sciFi->id, 'is_featured' => true, 'description' => 'A team travels through a wormhole in space.'],
            ['title' => 'The Matrix', 'director' => 'The Wachowskis', 'year' => 1999, 'genre_id' => $sciFi->id, 'is_featured' => false, 'description' => 'A computer hacker learns the shocking truth.'],
            ['title' => 'Blade Runner', 'director' => 'Ridley Scott', 'year' => 1982, 'genre_id' => $sciFi->id, 'is_featured' => false, 'description' => 'A blade runner must pursue and terminate four replicants.'],
            ['title' => 'Avatar', 'director' => 'James Cameron', 'year' => 2009, 'genre_id' => $sciFi->id, 'is_featured' => true, 'description' => 'A paraplegic Marine dispatched to the moon Pandora.'],
            ['title' => 'The Dark Knight', 'director' => 'Christopher Nolan', 'year' => 2008, 'genre_id' => $action->id, 'is_featured' => true, 'description' => 'Batman faces his greatest psychological and physical test.'],
            ['title' => 'The Expandables', 'director' => 'Michael Bay', 'year' => 2010, 'genre_id' => $action->id, 'is_featured' => false, 'description' => 'A team of elite mercenaries takes on a dangerous mission.'],
            ['title' => 'Avengers: Endgame', 'director' => 'Russo Brothers', 'year' => 2019, 'genre_id' => $action->id, 'is_featured' => true, 'description' => 'The Avengers assemble one last time.'],
            ['title' => 'Mad Max: Fury Road', 'director' => 'George Miller', 'year' => 2015, 'genre_id' => $action->id, 'is_featured' => true, 'description' => 'A woman rebels against a tyrannical ruler.'],
            ['title' => 'John Wick', 'director' => 'Chad Stahelski', 'year' => 2014, 'genre_id' => $action->id, 'is_featured' => false, 'description' => 'An ex-hit-man comes out of retirement.'],
            ['title' => 'Mission Impossible', 'director' => 'Brian De Palma', 'year' => 1996, 'genre_id' => $action->id, 'is_featured' => false, 'description' => 'A secret agent is framed for the murder of his team.'],
            ['title' => 'The Godfather', 'director' => 'Francis Ford Coppola', 'year' => 1972, 'genre_id' => $crime->id, 'is_featured' => true, 'description' => 'The aging patriarch transfers control of his empire.'],
            ['title' => 'The Godfather Part II', 'director' => 'Francis Ford Coppola', 'year' => 1974, 'genre_id' => $crime->id, 'is_featured' => true, 'description' => 'The early life and career of Vito Corleone.'],
            ['title' => 'Goodfellas', 'director' => 'Martin Scorsese', 'year' => 1990, 'genre_id' => $crime->id, 'is_featured' => false, 'description' => 'The story of Henry Hill and his life in the mob.'],
            ['title' => 'Scarface', 'director' => 'Brian De Palma', 'year' => 1983, 'genre_id' => $crime->id, 'is_featured' => false, 'description' => 'In Miami, a determined Cuban immigrant takes over a drug cartel.'],
            ['title' => 'The Departed', 'director' => 'Martin Scorsese', 'year' => 2006, 'genre_id' => $crime->id, 'is_featured' => true, 'description' => 'An undercover cop and a mole try to identify each other.'],
            ['title' => 'Pulp Fiction', 'director' => 'Quentin Tarantino', 'year' => 1994, 'genre_id' => $crime->id, 'is_featured' => true, 'description' => 'The lives of two mob hitmen, a boxer, and others intertwine.'],
            ['title' => 'Fight Club', 'director' => 'David Fincher', 'year' => 1999, 'genre_id' => $crime->id, 'is_featured' => false, 'description' => 'An insomniac office worker forms an underground fight club.'],
            ['title' => 'Casino', 'director' => 'Martin Scorsese', 'year' => 1995, 'genre_id' => $crime->id, 'is_featured' => false, 'description' => 'A tale of greed, deception and power in Las Vegas.'],
            ['title' => 'Heat', 'director' => 'Michael Mann', 'year' => 1995, 'genre_id' => $crime->id, 'is_featured' => true, 'description' => 'A group of high-end professional thieves start to feel the heat.'],
        ];

        foreach ($movies as $m) {
            Movie::create($m);
        }
    }
}
