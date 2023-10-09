<?php

namespace App\Http\Controllers;

use App\Models\Post;

class PostController extends Controller
{
    public function index()
    {
        $posts = Post::latest()->with(['category', 'author']);

        return view('posts.index', [
            'posts' => $posts->filter(request(['search', 'category', 'author']))->get(),
        ]);
    }

    public function show(Post $post)
    {
        return view('posts.show', ['post' => $post]);
    }
}
