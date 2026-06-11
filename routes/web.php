<?php

use App\Http\Controllers\ServiceController as PublicServiceController;
use App\Http\Controllers\ProjectController as PublicProjectController;
use App\Http\Controllers\Admin\ServiceController as AdminServiceController;
use App\Http\Controllers\Admin\ProjectController as AdminProjectController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\CooperationController;
use Illuminate\Support\Facades\Route;

Route::get('/', [HomeController::class, 'index'])->name('home');

Route::view('/about', 'pages.about')->name('about');

Route::get('/services', [PublicServiceController::class, 'index'])
    ->name('services');

Route::get('/services/{service:slug}', [PublicServiceController::class, 'show'])
    ->name('services.show');


Route::get('/projects', [PublicProjectController::class, 'index'])
    ->name('projects');

Route::get('/projects/{project:slug}', [PublicProjectController::class, 'show'])
    ->name('projects.show');
    
Route::view('/cooperation', 'pages.cooperation')->name('cooperation');
Route::post('/cooperation', [CooperationController::class, 'store'])->name('cooperation.store');

Route::prefix('admin')
    ->name('admin.')
    ->group(function () {
        Route::resource('services', AdminServiceController::class);
        Route::resource('projects', AdminProjectController::class);
    });