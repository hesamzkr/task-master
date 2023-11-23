<?php

use App\Http\Controllers\AdminTeamController;
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

        Route::get('/inbox', [TaskController::class, 'index'])->name('inbox.index');

        Route::get('/board/{board}', [BoardController::class, 'show'])->name('board.show');

        Route::get('/teams', [TeamController::class, 'index'])->name('team.index');
    });

    Route::get('/board/{board}/task/create', [TaskController::class, 'create'])->name('task.create');
    Route::post('/board/{board}/task', [TaskController::class, 'store'])->name('task.store');

    Route::get('/task/{task}/edit', [TaskController::class, 'edit'])->name('task.edit');
    Route::put('/task/{task}', [TaskController::class, 'update'])->name('task.update');
    Route::delete('/task/{task}', [TaskController::class, 'destroy'])->name('task.destroy');
});



// Route::resource('posts', PostController::class);


// Admin User routes
Route::name('admin.')->middleware(['auth', 'is.admin'])->group(function () {
    Route::resource('/admin/teams', AdminTeamController::class);
});
