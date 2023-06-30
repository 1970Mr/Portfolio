<?php

use App\Http\Controllers\AboutController;
use App\Http\Controllers\BlogController;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\HomeController;
use Illuminate\Support\Facades\Route;

Route::get('/', [HomeController::class, 'index'])->name('home');
Route::get('/home', [HomeController::class, 'index']);

Route::get('/about', [AboutController::class, 'index'])->name('about');

Route::get('/portfolio', function () {
  return view('portfolio');
})->name('portfolio');

Route::get('/contact', [ContactController::class, 'index'])->name('contact');

Route::get('/blogs', [BlogController::class, 'index'])->name('blog');
Route::get('/blogs/{blog}', [BlogController::class, 'show'])->name('blog.show');

Route::get('/blog-post', function () {
  return view('blog-post');
})->name('blog-post');
