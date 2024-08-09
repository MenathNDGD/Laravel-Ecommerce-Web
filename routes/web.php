<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\HomeController;
use Illuminate\Support\Facades\Route;

Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified',
])->group(function () {
    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');
});

# Home Controller Routes
route::get('redirect', [HomeController::class, 'redirect']);

route::get('/', [HomeController::class, 'index']);

# Admin Controller Routes
route::get('/view_category', [AdminController::class, 'view_category']);

route::post('/add_category', [AdminController::class, 'add_category']);

route::get('/delete_category/{id}', [AdminController::class, 'delete_category']);