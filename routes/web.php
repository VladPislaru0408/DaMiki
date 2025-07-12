<?php

use App\Http\Controllers\FurnitureController;
use App\Http\Controllers\ReviewController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Auth\LoginController;

// Public home page showing furniture gallery
Route::get('/', [FurnitureController::class, 'index'])->name('home');

// Public review submission
Route::post('/reviews', [ReviewController::class, 'store'])->name('reviews.store');

Route::get('/login', [LoginController::class, 'showLoginForm'])->name('login');
Route::post('/login', [LoginController::class, 'login']);
Route::post('/logout', [LoginController::class, 'logout'])->name('logout');

// Admin routes
Route::middleware(['auth'])->group(function () {
    Route::post('/furniture/store', [FurnitureController::class, 'store'])->name('furniture.store');
    Route::delete('/furniture/{id}', [FurnitureController::class, 'destroy'])->name('furniture.destroy');
    Route::put('/furniture/{id}', [FurnitureController::class, 'update'])->name('furniture.update');
    
    // Review management
    Route::get('/admin/reviews', function() {
        return view('admin.reviews');
    })->name('admin.reviews');
    Route::get('/admin/reviews/pending', [ReviewController::class, 'pending'])->name('admin.reviews.pending');
    Route::patch('/admin/reviews/{id}/approve', [ReviewController::class, 'approve'])->name('admin.reviews.approve');
    Route::patch('/admin/reviews/{id}/reject', [ReviewController::class, 'reject'])->name('admin.reviews.reject');
});
