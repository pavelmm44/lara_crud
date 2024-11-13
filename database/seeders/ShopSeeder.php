<?php

namespace Database\Seeders;

use App\Models\Shop;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ShopSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $shops = [
            ['title' => 'Comfy'],
            ['title' => 'Bicom'],
            ['title' => 'Foxtrot'],
            ['title' => 'CompServise'],
            ['title' => 'MoYo'],
        ];

        foreach ($shops as $shop) {
            Shop::create($shop);
        }
    }
}
