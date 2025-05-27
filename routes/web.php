<?php

use App\Http\Controllers\FurnitureController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Auth\LoginController;

// Public home page showing furniture gallery
Route::get('/', [FurnitureController::class, 'index'])->name('home');

Route::get('/login', [LoginController::class, 'showLoginForm'])->name('login');
Route::post('/login', [LoginController::class, 'login']);
Route::post('/logout', [LoginController::class, 'logout'])->name('logout');
// Admin routes

Route::middleware(['auth'])->group(function () {
    Route::post('/furniture/store', [FurnitureController::class, 'store'])->name('furniture.store');
});

Route::delete('/furniture/{id}', [FurnitureController::class, 'destroy'])->name('furniture.destroy');
Route::put('/furniture/{id}', [FurnitureController::class, 'update'])->name('furniture.update');
