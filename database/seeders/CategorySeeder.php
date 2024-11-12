<?php

namespace Database\Seeders;

use App\Models\Category;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $cats = [
            ['url' => 'sport', 'title' => 'Sport'],
            ['url' => 'culture', 'title' => 'Culture'],
            ['url' => 'business', 'title' => 'Business'],
            ['url' => 'marketing', 'title' => 'Marketing'],
            ['url' => 'lifestyle', 'title' => 'Lifestyle'],
        ];

        foreach ($cats as $cat) {
            Category::create($cat);
        }
    }
}
