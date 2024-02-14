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

// Dashboard
Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');
Route::get('/', static fn () => to_route('admin.panel.dashboard'));

// Home
Route::resource('home', HomeController::class)->except('show');

// About
Route::prefix('about')->name('about.')->group(function () {
    Route::get('/', fn () => to_route('admin.panel.about.personal.index'))->name('index');

    Route::resource('personal', AboutController::class)->except('show');

    Route::resource('skills', SkillController::class)->except('show');

    Route::resource('qualifications', QualificationController::class)->except('show');
});

// Portfolios
Route::resource('portfolios', PortfolioController::class)->except('show');
Route::delete('/portfolios/media/{portfolio}', [PortfolioController::class, 'destroyMedia'])->name('portfolios.destroy.media');

// Contact
Route::prefix('contact')->name('contact.')->group(function () {
    Route::get('/', fn () => to_route('admin.panel.contact.details.index'))->name('index');

    Route::resource('details', ContactController::class)->except('show');

    Route::resource('messages', MessageController::class)->except(['edit', 'update', 'create']);
    Route::put('/messages/send-response/{message}', [MessageController::class, 'sendResponse'])->name('message.send.response');
});

// Blogs
Route::resource('/blogs', BlogController::class)->except('show');

// Profile
Route::prefix('/profile')->name('profile.')->controller(ProfileController::class)->group(function () {
    Route::get('/', 'index')->name('index');
    Route::put('/', 'update')->name('update');
    Route::put('/change-password', 'changePassword')->name('change.password');
});
