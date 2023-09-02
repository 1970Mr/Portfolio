<?php

use App\Http\Controllers\Admin\HomeController;
use App\Http\Controllers\Admin\AboutController;
use App\Http\Controllers\Admin\BlogController;
use App\Http\Controllers\Admin\ContactController;
use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\MessageController;
use App\Http\Controllers\Admin\PortfolioController;
use App\Http\Controllers\Admin\ProfileController;
use App\Http\Controllers\Admin\QualificationController;
use App\Http\Controllers\Admin\SkillController;
use Illuminate\Support\Facades\Route;

Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');

Route::prefix('home')->name('home.')->controller(HomeController::class)->group(function () {
    Route::get('/', 'index')->name('index');
    Route::get('/create', 'create')->name('create');
    Route::post('/', 'store')->name('store');
    Route::get('/edit/{home}', 'edit')->name('edit');
    Route::put('/{home}', 'update')->name('update');
    Route::delete('/{home}', 'destroy')->name('destroy');
});

Route::prefix('about')->name('about.')->group(function () {
    Route::get('/', fn () => to_route('admin.panel.about.personal.index'))->name('index');

    Route::prefix('personal')->name('personal.')->controller(AboutController::class)->group(function () {
        Route::get('/', 'index')->name('index');
        Route::get('/create', 'create')->name('create');
        Route::post('/', 'store')->name('store');
        Route::get('/edit/{about}', 'edit')->name('edit');
        Route::put('/{about}', 'update')->name('update');
        Route::delete('/{about}', 'destroy')->name('destroy');
    });

    Route::resource('skills', SkillController::class)->except('show');

    Route::resource('qualifications', QualificationController::class)->except('show');
});

Route::resource('portfolios', PortfolioController::class)->except('show');
Route::delete('/portfolios/media/{portfolio}', [PortfolioController::class, 'destroyMedia'])->name('portfolios.destroy.media');

Route::prefix('contact')->name('contact.')->group(function () {
    Route::get('/', fn () => to_route('admin.panel.contact.details.index'))->name('index');
    Route::resource('details', ContactController::class)->except('show');

    // Route::get('/messages', [MessageController::class, 'index'])->name('message');
    // Route::post('/messages', [MessageController::class, 'store'])->name('message.store');
    // Route::get('/messages/{message}', [MessageController::class, 'show'])->name('message.show');
    // Route::delete('/messages/{message}', [MessageController::class, 'destroy'])->name('message.destroy');
    Route::resource('messages', MessageController::class)->except(['edit', 'update']);
    Route::put('/messages/send-response/{message}', [MessageController::class, 'sendResponse'])->name('message.send.response');
});

Route::get('/blogs', [BlogController::class, 'index'])->name('blog');
Route::get('/blogs/create', [BlogController::class, 'create'])->name('blog.create');
Route::post('/blogs', [BlogController::class, 'store'])->name('blog.store');
Route::get('/blogs/edit/{blog}', [BlogController::class, 'edit'])->name('blog.edit');
Route::put('/blogs/{blog}', [BlogController::class, 'update'])->name('blog.update');
Route::delete('/blogs/{blog}', [BlogController::class, 'destroy'])->name('blog.destroy');

Route::prefix('/profile')->name('profile.')->group(function () {
    Route::get('/', [ProfileController::class, 'index'])->name('index');
    Route::put('/', [ProfileController::class, 'update'])->name('update');
    Route::put('/change-password', [ProfileController::class, 'changePassword'])->name('change.password');
});
