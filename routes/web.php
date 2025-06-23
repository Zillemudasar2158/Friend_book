<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\PostController;
use App\Http\Controllers\apicontroller;
use App\Http\Controllers\MailController;
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
    
    //post controller route
    Route::controller(PostController::class)->group(function(){
    	Route::get('/posts', 'index')->name('posts');
    	Route::get('/search', 'search')->name('search');
		Route::get('/posts/create','create')->name('posts.create');
	    Route::post('/posts','store')->name('posts.store');
	    Route::get('/posts/{id}/edit','edit')->name('posts.edit');
		Route::get('/all-posts','allPosts')->name('posts.all');
	    Route::put('/posts/{id}','update')->name('posts.update');
	    Route::delete('/postsdel/{id}','destroy')->name('posts.destroy');

	    Route::get('/showpost/{id}','show')->name('posts.show');

	    //like post route
	    Route::post('/posts/{id}/like','like')->name('posts.like');
		Route::post('/posts/{id}/unlike','unlike')->name('posts.unlike');

		//reaction add
		Route::get('/reaction','reactions')->name('posts.reaction');
		Route::post('/posts/{id}/react','react')->name('posts.react');
    });
		
	// api testing http
	Route::get('/api',[apicontroller::class,'index'])->name('api');
});
		//Email checking
	Route::get('sendemail',[MailController::class,'sendemail']);
require __DIR__.'/auth.php';
