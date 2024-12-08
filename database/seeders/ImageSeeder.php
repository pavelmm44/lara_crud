<?php

namespace Database\Seeders;

use App\Models\Event;
use App\Models\Image;
use App\Models\Product;
use App\Models\Shop;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ImageSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $ev = Event::findOrFail(9);

        $images = [
            ['url' => 'sport3'],
            ['url' => 'culture3'],
            ['url' => 'business3'],
            ['url' => 'marketing3'],
            ['url' => 'science3']
        ];

        foreach ($images as $img) {
            $image = new Image();
            $image->fill($img);
            $ev->images()->save($image);
        }
    }
}
