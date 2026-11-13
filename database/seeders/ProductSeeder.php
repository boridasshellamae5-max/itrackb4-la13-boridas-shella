<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Product;
use App\Models\Category;

class ProductSeeder extends Seeder
{
    public function run(): void
    {
        // Create categories FIRST
        $electronics = Category::create(['name' => 'Electronics']);
        $accessories = Category::create(['name' => 'Accessories']);
        $office = Category::create(['name' => 'Office Equipment']);

        // 20+ Products — spread across categories
        $products = [
            ['name' => 'Laptop', 'price' => 45000, 'quantity' => 5, 'category_id' => $electronics->id, 'available' => true, 'description' => 'High-performance laptop'],
            ['name' => 'Smartphone', 'price' => 15000, 'quantity' => 10, 'category_id' => $electronics->id, 'available' => true, 'description' => 'Android smartphone'],
            ['name' => 'Tablet', 'price' => 22000, 'quantity' => 7, 'category_id' => $electronics->id, 'available' => true, 'description' => '10-inch display tablet'],
            ['name' => 'Desktop Computer', 'price' => 38000, 'quantity' => 3, 'category_id' => $electronics->id, 'available' => true, 'description' => 'Complete desktop set'],
            ['name' => 'Wireless Earbuds', 'price' => 3500, 'quantity' => 12, 'category_id' => $electronics->id, 'available' => true, 'description' => 'Noise-cancelling earbuds'],
            
            ['name' => 'Keyboard', 'price' => 1200, 'quantity' => 15, 'category_id' => $accessories->id, 'available' => true, 'description' => 'Mechanical keyboard'],
            ['name' => 'Mouse', 'price' => 800, 'quantity' => 20, 'category_id' => $accessories->id, 'available' => true, 'description' => 'Wireless mouse'],
            ['name' => 'Headset', 'price' => 2500, 'quantity' => 8, 'category_id' => $accessories->id, 'available' => true, 'description' => 'Stereo headset with mic'],
            ['name' => 'Monitor Stand', 'price' => 950, 'quantity' => 18, 'category_id' => $accessories->id, 'available' => true, 'description' => 'Ergonomic stand'],
            ['name' => 'USB Hub', 'price' => 650, 'quantity' => 25, 'category_id' => $accessories->id, 'available' => true, 'description' => '4-port USB hub'],
            ['name' => 'Laptop Bag', 'price' => 1800, 'quantity' => 11, 'category_id' => $accessories->id, 'available' => true, 'description' => 'Waterproof backpack'],
            ['name' => 'Webcam', 'price' => 1400, 'quantity' => 9, 'category_id' => $accessories->id, 'available' => true, 'description' => '1080p HD camera'],
            
            ['name' => 'Printer', 'price' => 8500, 'quantity' => 4, 'category_id' => $office->id, 'available' => false, 'description' => 'Laser office printer'],
            ['name' => 'Office Chair', 'price' => 4500, 'quantity' => 6, 'category_id' => $office->id, 'available' => true, 'description' => 'Ergonomic chair'],
            ['name' => 'Paper Shredder', 'price' => 2800, 'quantity' => 5, 'category_id' => $office->id, 'available' => true, 'description' => 'Cross-cut shredder'],
            ['name' => 'Filing Cabinet', 'price' => 5200, 'quantity' => 3, 'category_id' => $office->id, 'available' => true, 'description' => '4-drawer cabinet'],
            ['name' => 'Projector', 'price' => 18500, 'quantity' => 2, 'category_id' => $office->id, 'available' => true, 'description' => 'HD projector'],
            ['name' => 'Calculator', 'price' => 450, 'quantity' => 30, 'category_id' => $office->id, 'available' => true, 'description' => 'Desktop calculator'],
            ['name' => 'Whiteboard', 'price' => 2200, 'quantity' => 4, 'category_id' => $office->id, 'available' => true, 'description' => 'Magnetic whiteboard'],
            ['name' => 'Stapler Set', 'price' => 280, 'quantity' => 40, 'category_id' => $office->id, 'available' => true, 'description' => 'Heavy duty stapler'],
        ];

        foreach ($products as $p) {
            Product::create($p);
        }
    }
}
