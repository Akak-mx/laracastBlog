<?php

use App\Http\Controllers\AdminPostController;
use App\Http\Controllers\NewsletterSubscriptionController;
use App\Http\Controllers\NewsletterUnsubscriptionController;
use App\Http\Controllers\PostCommentsController;
use App\Http\Controllers\PostController;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\SessionController;
use Illuminate\Support\Facades\Route;

Route::get('/', [PostController::class, 'index'])->name('home');
Route::get('/posts/{post:slug}', [PostController::class, 'show']);

Route::post('/posts/{post:slug}/comments', [PostCommentsController::class, 'store']);

Route::get('/register', [RegisterController::class, 'create'])->middleware('guest');
Route::post('/register', [RegisterController::class, 'store'])->middleware('guest');

Route::get('/login', [SessionController::class, 'create'])->middleware('guest');
Route::post('/login', [SessionController::class, 'store'])->middleware('guest');
Route::post('/logout', [SessionController::class, 'destroy'])->middleware('auth');

Route::post('/newsletter', NewsletterSubscriptionController::class);
Route::get('/newsletter', NewsletterUnsubscriptionController::class);

/* Opción eliminada pero que sirve */
// Route::get('admin/posts', [AdminPostController::class, 'index'])->middleware('admin');
// Route::post('/admin/posts', [AdminPostController::class, 'store'])->middleware('admin');
// Route::get('/admin/posts/create', [AdminPostController::class, 'create'])->middleware('admin');
// Route::get('/admin/posts/{post:slug}/edit', [AdminPostController::class, 'edit'])->middleware('admin');
// Route::patch('/admin/posts/{post:slug}/', [AdminPostController::class, 'update'])->middleware('admin');
// Route::delete('/admin/posts/{post:slug}/', [AdminPostController::class, 'destroy'])->middleware('admin');

/* Otra opción de user los gates con el middleare de can y la nueva lógica */
// Route::get('admin/posts', [AdminPostController::class, 'index'])->middleware('can:admins');
// Route::post('/admin/posts', [AdminPostController::class, 'store'])->middleware('can:admins');
// Route::get('/admin/posts/create', [AdminPostController::class, 'create'])->middleware('can:admins');
// Route::get('/admin/posts/{post:slug}/edit', [AdminPostController::class, 'edit'])->middleware('can:admins');
// Route::patch('/admin/posts/{post:slug}/', [AdminPostController::class, 'update'])->middleware('can:admins');
// Route::delete('/admin/posts/{post:slug}/', [AdminPostController::class, 'destroy'])->middleware('can:admins');

/* y agrupando simplificado */
Route::middleware('can:admins')->group(function() {
    Route::resource('admin/posts', AdminPostController::class)
        ->scoped(['post' => 'slug'])
        ->except('show');
});
