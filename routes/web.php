<?php

use App\Models\Post;
use Illuminate\Support\Facades\Route;

Route::get('/', fn () => view('posts', ['posts' => Post::get()->sortByDesc('created_at')]));

Route::get('posts/{post:slug}', fn (Post $post) => view('post', ['post' => $post]));
