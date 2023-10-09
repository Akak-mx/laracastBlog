<?php

use App\Http\Controllers\PostController;
use App\Models\User;
use Illuminate\Support\Facades\Route;

Route::get('/', [PostController::class, 'index'])->name('home');

Route::get('posts/{post:slug}', [PostController::class, 'show']);

Route::get('/authors/{author:username}', fn (User $author) => view('posts', [
    'posts' => $author->posts->load(['category', 'author']),
]));
