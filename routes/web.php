<?php

use App\Models\Category;
use App\Models\Post;
use App\Models\User;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    $posts = Post::latest()->with(['category', 'author']);

    if (request('search')) {
        $posts->where('title', 'like', '%'.request('search').'%')
            ->OrWhere('body', 'like', '%'.request('search').'%');
    }

    return view('posts', [
        'posts' => $posts->get(),
        'categories' => Category::all(),
    ]);
})->name('home');

Route::get('posts/{post:slug}', fn (Post $post) => view('post', ['post' => $post]));

Route::get('/categories/{category:slug}', fn (Category $category) => view('posts', [
    'posts' => $category->posts->load(['category', 'author']),
    'currentCategory' => $category,
    'categories' => Category::all(),
]))->name('category');

Route::get('/authors/{author:username}', fn (User $author) => view('posts', ['posts' => $author->posts->load(['category', 'author'])]));
