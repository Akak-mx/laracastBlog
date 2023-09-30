<?php

use App\Models\Post;
use Illuminate\Support\Facades\Route;

Route::get('/', fn () => view('posts', ['posts' => Post::all()]));

Route::get('posts/{post}', fn (Post $post) => view('post', ['post' => $post]));
