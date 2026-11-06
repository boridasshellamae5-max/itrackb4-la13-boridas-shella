<?php

namespace Database\Seeders;

use App\Models\Book;
use App\Models\Genre;
use Illuminate\Database\Seeder;

class BookSeeder extends Seeder
{
    public function run()
    {
        // ✅ GUMAGAWA NG GENRES DITO — kaya hindi na kailangan ng hiwalay na GenreSeeder
        $fantasy = Genre::firstOrCreate(['name' => 'Fantasy']);
        $classic = Genre::firstOrCreate(['name' => 'Classic']);
        $romance = Genre::firstOrCreate(['name' => 'Romance']);

        // ✅ GUMAGAWA NG BOOKS — gamit ang firstOrCreate para hindi magdoble
        Book::firstOrCreate(
            ['title' => 'Harry Potter and the Philosopher\'s Stone'],
            ['author' => 'J.K. Rowling', 'year' => 1997, 'genre_id' => $fantasy->id]
        );

        Book::firstOrCreate(
            ['title' => 'The Great Gatsby'],
            ['author' => 'F. Scott Fitzgerald', 'year' => 1925, 'genre_id' => $classic->id]
        );

        Book::firstOrCreate(
            ['title' => 'Pride and Prejudice'],
            ['author' => 'Jane Austen', 'year' => 1813, 'genre_id' => $romance->id]
        );

        Book::firstOrCreate(
            ['title' => 'The Hobbit'],
            ['author' => 'J.R.R. Tolkien', 'year' => 1937, 'genre_id' => $fantasy->id]
        );

        Book::firstOrCreate(
            ['title' => 'Romeo and Juliet'],
            ['author' => 'William Shakespeare', 'year' => 1597, 'genre_id' => $romance->id]
        );
    }
}
