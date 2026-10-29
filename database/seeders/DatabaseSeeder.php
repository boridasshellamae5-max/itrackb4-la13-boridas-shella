<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    public function run(): void
    {
        $this->call(BookSeeder::class); // ✅ DAPAT NAKASULAT ITO — WALANG IBANG TAWAG
    }
}