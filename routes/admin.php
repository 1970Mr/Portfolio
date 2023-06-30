<?php

use App\Http\Controllers\Admin\HomeController;
use App\Http\Controllers\Admin\AboutController;
use App\Http\Controllers\Admin\BlogController;
use App\Http\Controllers\Admin\ContactController;
use App\Http\Controllers\Admin\PortfolioController;
use App\Http\Controllers\Admin\QualificationController;
use App\Http\Controllers\Admin\SkillController;
use Illuminate\Support\Facades\Route;

// Route::get('/admin/panel/home', [HomeController::class, 'index'])->name('admin.panel.home');

Route::prefix('admin-panel')->name('admin.panel.')->group(function () {
    Route::get('/dashboard', function () {
        return view('admin.dashboard');
    })->name('dashboard');

    Route::get('/home', [HomeController::class, 'index'])->name('home');
    Route::get('/home/create', [HomeController::class, 'create'])->name('home.create');
    Route::post('/home', [HomeController::class, 'store'])->name('home.store');
    Route::get('/home/edit/{home}', [HomeController::class, 'edit'])->name('home.edit');
    Route::put('/home/{home}', [HomeController::class, 'update'])->name('home.update');
    Route::delete('/home/{home}', [HomeController::class, 'destroy'])->name('home.destroy');

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

    Route::prefix('contact')->name('contact.')->group(function () {
        Route::get('/details', [ContactController::class, 'index'])->name('details');
        Route::get('/details/create', [ContactController::class, 'create'])->name('details.create');
        Route::post('/details', [ContactController::class, 'store'])->name('details.store');
        Route::get('/details/edit/{contact}', [ContactController::class, 'edit'])->name('details.edit');
        Route::put('/details/{contact}', [ContactController::class, 'update'])->name('details.update');
        Route::delete('/details/{contact}', [ContactController::class, 'destroy'])->name('details.destroy');
    });
    Route::get('/contact', fn () => to_route('admin.panel.contact.details'))->name('contact');

    Route::get('/blogs', [BlogController::class, 'index'])->name('blog');
    Route::get('/blogs/create', [BlogController::class, 'create'])->name('blog.create');
    Route::post('/blogs', [BlogController::class, 'store'])->name('blog.store');
    Route::get('/blogs/edit/{blog}', [BlogController::class, 'edit'])->name('blog.edit');
    Route::put('/blogs/{blog}', [BlogController::class, 'update'])->name('blog.update');
    Route::delete('/blogs/{blog}', [BlogController::class, 'destroy'])->name('blog.destroy');

    Route::get('/profile', function () {
        return view('admin.profile');
    })->name('profile');
});
