<?php

use App\Http\Controllers\Admin\HomeController;
use App\Http\Controllers\Admin\AboutController;
use Illuminate\Support\Facades\Route;

// Route::get('/admin/panel/home', [HomeController::class, 'index'])->name('admin.panel.home');

Route::prefix('admin-panel')->name('admin.panel.')->group(function () {
  Route::get('/dashboard', function () {
    return view('admin.dashboard');
  })->name('dashboard');

  Route::get('/home', [HomeController::class, 'index'])->name('home');
  Route::get('/home/create', [HomeController::class, 'create'])->name('home.create');
  Route::post('/home', [HomeController::class, 'store'])->name('home.store');
  Route::get('/home/edit/{id}', [HomeController::class, 'edit'])->name('home.edit');
  Route::put('/home/{home}', [HomeController::class, 'update'])->name('home.update');
  Route::delete('/home/{id}', [HomeController::class, 'destroy'])->name('home.destroy');

  Route::get('/about', [AboutController::class, 'index'])->name('about');
  Route::get('/about/create', [AboutController::class, 'create'])->name('about.create');
  Route::post('/about', [AboutController::class, 'store'])->name('about.store');
  Route::get('/about/edit/{id}', [AboutController::class, 'edit'])->name('about.edit');
  Route::put('/about/{about}', [AboutController::class, 'update'])->name('about.update');
  Route::delete('/about/{id}', [AboutController::class, 'destroy'])->name('about.destroy');

  Route::get('/portfolio', function () {
    return view('admin.portfolio');
  })->name('portfolio');

  Route::get('/contact', function () {
    return view('admin.contact');
  })->name('contact');

  Route::get('/blog', function () {
    return view('admin.blog');
  })->name('blog');

  Route::get('/profile', function () {
    return view('admin.profile');
  })->name('profile');
});
