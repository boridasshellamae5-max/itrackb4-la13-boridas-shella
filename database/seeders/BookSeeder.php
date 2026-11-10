<?php

namespace Database\Seeders;

use App\Models\Book;
use Illuminate\Database\Seeder;

class BookSeeder extends Seeder
{
    public function run(): void
    {
        Book::create([
            'title' => 'Noli Me Tangere',
            'author' => 'Jose Rizal',
            'year' => 1887,
            'is_filipino' => true,
            'description' => 'Isang nobela tungkol sa lipunan ng Pilipinas sa ilalim ng mga Kastila.',
        ]);

        Book::create([
            'title' => 'El Filibusterismo',
            'author' => 'Jose Rizal',
            'year' => 1891,
            'is_filipino' => true,
            'description' => 'Ang ikalawang nobela ni Rizal na patungkol sa himagsikan.',
        ]);

        Book::create([
            'title' => 'Florante at Laura',
            'author' => 'Francisco Balagtas',
            'year' => 1838,
            'is_filipino' => true,
            'description' => 'Isang tula na nagpapakita ng pag-ibig at kalayaan.',
        ]);

        Book::create([
            'title' => 'Ninay',
            'author' => 'Pedro Paterno',
            'year' => 1885,
            'is_filipino' => true,
            'description' => 'Unang nobelang isinulat ng isang Pilipino sa wikang Kastila.',
        ]);

        Book::create([
            'title' => 'The Woman Who Had Two Navels',
            'author' => 'Nick Joaquin',
            'year' => 1961,
            'is_filipino' => true,
            'description' => '', // intentionally left blank — nullable ginamit dito
        ]);
    }
}
