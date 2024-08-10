<?php

use App\Http\Controllers\AboutController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\BlogController;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\TestimonialController;
use Illuminate\Support\Facades\Route;

# Navigation Routes
Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified',
])->group(function () {
    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');
});

Route::get('/products', function () {
    return view('product.body');
});

Route::get('/blog', function () {
    return view('blog.body');
});

Route::get('/contact', function () {
    return view('contact.body');
});

Route::get('/about', function () {
    return view('about.body');
});

Route::get('/testimonial', function () {
    return view('testimonial.body');
});

# Admin Controller Routes
route::get('/view_category', [AdminController::class, 'view_category']);

route::post('/add_category', [AdminController::class, 'add_category']);

route::get('/delete_category/{id}', [AdminController::class, 'delete_category']);

route::get('/add_product', [AdminController::class, 'add_product']);

route::post('/add_product_items', [AdminController::class, 'add_product_items']);

route::get('/view_product', [AdminController::class, 'view_product']);

route::get('/delete_product/{id}', [AdminController::class, 'delete_product']);

route::get('/update_product/{id}', [AdminController::class, 'update_product']);

route::post('/update_product_confirm/{id}', [AdminController::class, 'update_product_confirm']);

# Home Controller Routes
route::get('redirect', [HomeController::class, 'redirect']);

route::get('/', [HomeController::class, 'index']);

route::get('/product_details/{id}', [HomeController::class, 'product_details']);

route::post('/add_cart/{id}', [HomeController::class, 'add_cart']);

route::get('/show_cart', [HomeController::class, 'show_cart']);

route::get('/remove_cart/{id}', [HomeController::class, 'remove_cart']);

# Product Controller Routes
Route::get('/products', [ProductController::class, 'showAllProducts']);

# About Controller Routes
Route::get('/about', [AboutController::class, 'showAboutPage']);

# Testimonial Controller Routes
Route::get('/testimonial', [TestimonialController::class, 'showTestimonialPage']);

# Blog Controller Routes
Route::get('/blog', [BlogController::class, 'showBlogPage']);

# Contact Controller Routes
Route::get('/contact', [ContactController::class, 'showContactPage']);
