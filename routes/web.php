<?php

use App\Http\Controllers\BoardController;
use App\Http\Controllers\TeamController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\TaskController;
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


    Route::prefix('dashboard')->name('dashboard.')->group(function () {
        Route::get('/', function () {
            return view('dashboard');
        });

        Route::get('/notifications', function () {
            return view('dashboard');
        })->name('notification.index');

        Route::get('/board/{id}', [BoardController::class, 'show'])->name('board.show');

        Route::get('/team', function () {
            return view('dashboard');
        })->name('team.index');
    });

    Route::get('/board/{board_id}/task/create', [TaskController::class, 'create'])->name('task.create');
    // Route::prefix('/task')->name('task.')->group(function () {
    //     Route::get('/create/')
    // });
});



// Route::resource('posts', PostController::class);


// Admin User routes
Route::name('admin.')->middleware(['auth', 'is.admin'])->group(function () {
    Route::resource('/admin/teams', TeamController::class);
});
