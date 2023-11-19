<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;

use App\Models\Category;
use App\Models\Post;
use App\Models\User;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        User::factory()->create([
            'name' => 'Alejandro Suarez',
            'email' => 'akak@admin.com',
        ]);

        // necesito categorias
        $categories = [
            'Nightlife',
            'Culture',
            'Lifestile',
            'Sports',
            'Retirement',
        ];

        foreach ($categories as $category) {
            Category::factory()->hasPosts(5)->create([
                'name' => $category,
                'name' => strtolower($category),
            ]);
        }

        // Post::factory(30)->create();
    }
}
