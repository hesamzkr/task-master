<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\WelcomeController;
use Illuminate\Support\Facades\Route;

// Public routes
Route::get('/', [WelcomeController::class, 'welcome'])->name('welcome');

require __DIR__ . '/auth.php';


// Authenticated User routes
Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');



// Route::resource('posts', PostController::class);


// Admin User routes
Route::name('admin.')->middleware(['auth', 'is.admin'])->group(function () {
    // Route::resource('/admin/categories', \App\Http\Controllers\AdminCategoryController::class);
});
