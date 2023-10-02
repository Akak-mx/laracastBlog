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
        User::truncate();
        Category::truncate();
        Post::truncate();

        $user = User::factory()->create();

        $personal = Category::create([
            'name' => 'Personal',
            'slug' => 'personal'
        ]);

        $work = Category::create([
            'name' => 'Work',
            'slug' => 'work'
        ]);

        Post::create([
            'category_id' => $personal->id,
            'user_id' => $user->id,
            'title' => "My first personal post",
            'slug' => "my-first-personal-post",
            'excerpt' => "<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit.</p>",
            'body' => "<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Repellat at, inventore dicta hic quidem est nemo nulla eum doloribus quae qui, quas eius. Itaque, fugiat distinctio unde libero magnam quos</p>",
        ]);

        Post::create([
            'category_id' => $work->id,
            'user_id' => $user->id,
            'title' => "My first work post",
            'slug' => "my-first-work-post",
            'excerpt' => "<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit.</p>",
            'body' => "<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Repellat at, inventore dicta hic quidem est nemo nulla eum doloribus quae qui, quas eius. Itaque, fugiat distinctio unde libero magnam quos</p>",
        ]);

    }
}
