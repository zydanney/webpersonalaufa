<?php

use App\Http\Controllers\HomeController;
use App\Http\Controllers\PostController;
use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', [HomeController::class, 'home'])->name('home');
Route::get('/post/{post}', [HomeController::class, 'post'])->name('post');
Route::get('/user/{user}/posts', [HomeController::class, 'userPosts'])->name('user.posts');

Route::get('/about', function() {
    return view('about');
})->name('about');

Route::get('/portfolio', function() {
    return view('portfolio');
})->name('portfolio');

Route::get('/contact', function() {
    return view('contact');
})->name('contact');

Route::middleware('auth')->group(function () {
    Route::get('/posts/datatables', [PostController::class, 'datatables'])->name('posts.datatables');
    Route::resource('/posts', PostController::class);
    
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__ . '/auth.php';
