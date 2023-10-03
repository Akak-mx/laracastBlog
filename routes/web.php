<?php

use App\Models\Category;
use App\Models\Post;
use App\Models\User;
use Illuminate\Support\Facades\Route;

Route::get('/', fn () => view('posts', ['posts' => Post::latest()->with(['category', 'author'])->get()]));

Route::get('posts/{post:slug}', fn (Post $post) => view('post', ['post' => $post]));

Route::get('/categories/{category:slug}', fn (Category $category) => view('posts', ['posts' => $category->posts]));

Route::get('/authors/{author:username}', fn (User $author) => view('posts', ['posts' => $author->posts]));
