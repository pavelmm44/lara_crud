<?php

namespace Database\Seeders;

use App\Models\Category;
use App\Models\Event;
use App\Models\Tag;
use App\Models\User;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // User::factory(10)->create();

//        User::factory()->create([
//            'name' => 'Test User',
//            'email' => 'test@example.com',
//        ]);

        User::factory(10)
            ->create();

        Category::factory(10)
            ->create();

        $tags = Tag::factory(10)
            ->create();

        Event::factory()
            ->count(10)
            ->hasAttached(
                $tags->random(rand(1,10))
            )
            ->create();

    }
}
