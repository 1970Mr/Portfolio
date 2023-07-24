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
    Route::get('/personal', [AboutController::class, 'index'])->name('personal');
    Route::get('/personal/create', [AboutController::class, 'create'])->name('personal.create');
    Route::post('/personal', [AboutController::class, 'store'])->name('personal.store');
    Route::get('/personal/edit/{id}', [AboutController::class, 'edit'])->name('personal.edit');
    Route::put('/personal/{about}', [AboutController::class, 'update'])->name('personal.update');
    Route::delete('/personal/{id}', [AboutController::class, 'destroy'])->name('personal.destroy');

    Route::get('/skill', [SkillController::class, 'index'])->name('skill');
    Route::get('/skill/create', [SkillController::class, 'create'])->name('skill.create');
    Route::post('/skill', [SkillController::class, 'store'])->name('skill.store');
    Route::get('/skill/edit/{skill}', [SkillController::class, 'edit'])->name('skill.edit');
    Route::put('/skill/{skill}', [SkillController::class, 'update'])->name('skill.update');
    Route::delete('/skill/{skill}', [SkillController::class, 'destroy'])->name('skill.destroy');

    Route::get('/qualification', [QualificationController::class, 'index'])->name('qualification');
    Route::get('/qualification/create', [QualificationController::class, 'create'])->name('qualification.create');
    Route::post('/qualification', [QualificationController::class, 'store'])->name('qualification.store');
    Route::get('/qualification/edit/{qualification}', [QualificationController::class, 'edit'])->name('qualification.edit');
    Route::put('/qualification/{qualification}', [QualificationController::class, 'update'])->name('qualification.update');
    Route::delete('/qualification/{qualification}', [QualificationController::class, 'destroy'])->name('qualification.destroy');
});
Route::get('/about', fn () => to_route('admin.panel.about.personal'))->name('about');

Route::get('/portfolio', [PortfolioController::class, 'index'])->name('portfolio');
Route::get('/portfolio/create', [PortfolioController::class, 'create'])->name('portfolio.create');
Route::post('/portfolio', [PortfolioController::class, 'store'])->name('portfolio.store');
Route::get('/portfolio/edit/{portfolio}', [PortfolioController::class, 'edit'])->name('portfolio.edit');
Route::put('/portfolio/{portfolio}', [PortfolioController::class, 'update'])->name('portfolio.update');
Route::delete('/portfolio/{portfolio}', [PortfolioController::class, 'destroy'])->name('portfolio.destroy');
Route::delete('/portfolio/media/{portfolio}', [PortfolioController::class, 'destroyMedia'])->name('portfolio.destroy.media');

Route::prefix('contact')->name('contact.')->group(function () {
    Route::get('/details', [ContactController::class, 'index'])->name('details');
    Route::get('/details/create', [ContactController::class, 'create'])->name('details.create');
    Route::post('/details', [ContactController::class, 'store'])->name('details.store');
    Route::get('/details/edit/{contact}', [ContactController::class, 'edit'])->name('details.edit');
    Route::put('/details/{contact}', [ContactController::class, 'update'])->name('details.update');
    Route::delete('/details/{contact}', [ContactController::class, 'destroy'])->name('details.destroy');

    Route::get('/messages', [MessageController::class, 'index'])->name('message');
    Route::post('/messages', [MessageController::class, 'store'])->name('message.store');
    Route::get('/messages/{message}', [MessageController::class, 'show'])->name('message.show');
    Route::put('/messages/send-response/{message}', [MessageController::class, 'sendResponse'])->name('message.send.response');
    Route::delete('/messages/{message}', [MessageController::class, 'destroy'])->name('message.destroy');
});
Route::get('/contact', fn () => to_route('admin.panel.contact.details'))->name('contact');

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
