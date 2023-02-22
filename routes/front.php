<?php

use App\Http\Controllers\HomeController;
use Illuminate\Support\Facades\Route;

Route::get('/', [HomeController::class, 'index'])->name('home');
Route::get('/home', [HomeController::class, 'index']);

Route::get('/about', function () {
  return view('about');
})->name('about');

Route::get('/portfolio', function () {
  return view('portfolio');
})->name('portfolio');

Route::get('/contact', function () {
  return view('contact');
})->name('contact');

Route::get('/blog', function () {
  return view('blog');
})->name('blog');

Route::get('/blog-post', function () {
  return view('blog-post');
})->name('blog-post');
