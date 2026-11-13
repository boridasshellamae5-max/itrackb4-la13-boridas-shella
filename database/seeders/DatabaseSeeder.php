<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    public function run(): void
    {
        // ✅ DAPAT NANDITO ITO — I-ADD KUNG WALA
        $this->call(ProductSeeder::class);
    }
}
