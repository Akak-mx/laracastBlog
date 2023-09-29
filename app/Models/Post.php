<?php

namespace App\Models;

use Illuminate\Support\Facades\File;
use Spatie\YamlFrontMatter\YamlFrontMatter;

class Post
{
    public function __construct(
        public $title,
        public $slug,
        public $excerpt,
        public $date,
        public $body,
    ) {
    }

    public static function all()
    {
        // return cache()->remember('posts.all', 60, function() {
            return collect(File::files(resource_path('views/posts')))
                ->map(fn ($file) => YamlFrontMatter::parseFile($file))
                ->map(fn ($document) => new self(
                    $document->title,
                    $document->slug,
                    $document->excerpt,
                    $document->date,
                    $document->body()
                ))
                ->sortByDesc('date');
        // });
    }

    public static function find($slug)
    {
        return self::all()->firstWhere('slug', $slug);
    }
}
