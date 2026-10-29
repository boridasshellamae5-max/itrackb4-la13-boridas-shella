<?php

namespace Database\Seeders;

use App\Models\Book;
use App\Models\Genre;
use Illuminate\Database\Seeder;

class BookSeeder extends Seeder
{
    public function run()
    {
        // ✅ UNANG GAWIN: Gumawa muna ng Genres
        $fantasy = Genre::create(['name' => 'Fantasy']);
        $classic = Genre::create(['name' => 'Classic']);
        $romance = Genre::create(['name' => 'Romance']);

        // ✅ PANGALAWA: Gumawa ng Books — gamitin ang tamang column na genre_id
        Book::create([
            'title'    => 'Harry Potter and the Philosopher\'s Stone',
            'author'   => 'J.K. Rowling',
            'year'     => 1997,
            'genre_id' => $fantasy->id,
        ]);

        Book::create([
            'title'    => 'The Great Gatsby',
            'author'   => 'F. Scott Fitzgerald',
            'year'     => 1925,
            'genre_id' => $classic->id,
        ]);

        Book::create([
            'title'    => 'Pride and Prejudice',
            'author'   => 'Jane Austen',
            'year'     => 1813,
            'genre_id' => $romance->id,
        ]);

        Book::create([
            'title'    => 'The Hobbit',
            'author'   => 'J.R.R. Tolkien',
            'year'     => 1937,
            'genre_id' => $fantasy->id,
        ]);

        Book::create([
            'title'    => 'Romeo and Juliet',
            'author'   => 'William Shakespeare',
            'year'     => 1597,
            'genre_id' => $romance->id,
        ]);
    }
}