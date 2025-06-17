<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\PostController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
    //post route
	Route::get('/posts', [PostController::class, 'index'])->name('posts');
	Route::get('/posts/create', [PostController::class, 'create'])->name('posts.create');
    Route::post('/posts', [PostController::class, 'store'])->name('posts.store');
    Route::get('/posts/{id}/edit', [PostController::class, 'edit'])->name('posts.edit');
	Route::get('/all-posts', [PostController::class, 'allPosts'])->name('posts.all');
    Route::put('/posts/{id}', [PostController::class, 'update'])->name('posts.update');
    Route::delete('/postsdel/{id}', [PostController::class, 'destroy'])->name('posts.destroy');

    Route::get('/showpost/{id}', [PostController::class, 'show'])->name('posts.show');

    //like post route
    Route::post('/posts/{id}/like', [PostController::class, 'like'])->name('posts.like');
	Route::post('/posts/{id}/unlike', [PostController::class, 'unlike'])->name('posts.unlike');
});
require __DIR__.'/auth.php';
