<?php

namespace Database\Seeders;

use App\Models\Product;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ProductSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $products = [
            ['brand' => 'AMD', 'model' => 'Ryzen 9'],
            ['brand' => 'AMD', 'model' => 'Ryzen 7'],
            ['brand' => 'Intel', 'model' => 'Core i7'],
            ['brand' => 'Intel', 'model' => 'Core i9'],
            ['brand' => 'GeForce', 'model' => 'RTX 4060'],
            ['brand' => 'GeForce', 'model' => 'RTX 4090'],
            ['brand' => 'Logitech', 'model' => 'Mouse 1'],
            ['brand' => 'Logitech', 'model' => 'Mouse 2'],
        ];

        foreach ($products as $product) {
            Product::create($product);
        }
    }
}
