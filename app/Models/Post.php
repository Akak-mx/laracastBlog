<?php

namespace App\Models;

use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Support\Facades\File;

class Post
{
    public static function all()
    {
        $posts = array_map(fn ($file) => $file->getContents(), $files = File::files(resource_path('views/posts')));

        return $posts;
    }

    public static function find($slug)
    {
        if (! File::exists($path = resource_path("views/posts/{$slug}.html"))) {
            throw new ModelNotFoundException;
        }

        return cache()->remember("posts/{$slug}", 5, fn () => file_get_contents($path));
    }
}
