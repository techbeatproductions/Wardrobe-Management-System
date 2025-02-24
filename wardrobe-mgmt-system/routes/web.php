<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\ClotheController; // Import the ClotheController
use Illuminate\Foundation\Application;
use Illuminate\Support\Facades\Route;
use Inertia\Inertia;

// Public routes
Route::get('/', function () {
    return Inertia::render('Welcome', [
        'canLogin' => Route::has('login'),
        'canRegister' => Route::has('register'),
        'laravelVersion' => Application::VERSION,
        'phpVersion' => PHP_VERSION,
    ]);
});

// Authenticated routes
Route::middleware(['auth', 'verified'])->group(function () {
    // Dashboard
    Route::get('/dashboard', function () {
        return Inertia::render('Dashboard');
    })->name('dashboard');

    // Profile routes
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

    // Clothing items routes
    Route::prefix('clothes')->group(function () {
        Route::get('/', [ClotheController::class, 'index'])->name('clothes.index'); // List all clothes
        Route::get('/create', [ClotheController::class, 'create'])->name('clothes.create'); // Show create form
        Route::post('/', [ClotheController::class, 'store'])->name('clothes.store'); // Store new clothing item
        Route::get('/{id}', [ClotheController::class, 'show'])->name('clothes.show'); // Show a specific clothing item
        Route::get('/{id}/edit', [ClotheController::class, 'edit'])->name('clothes.edit'); // Show edit form
        Route::put('/{id}', [ClotheController::class, 'update'])->name('clothes.update'); // Update a clothing item
        Route::delete('/{id}', [ClotheController::class, 'destroy'])->name('clothes.destroy'); // Delete a clothing item
    });
});

// Authentication routes (from auth.php)
require __DIR__.'/auth.php';