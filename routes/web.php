<?php

use App\Http\Controllers\Admin\PhotoController;
use App\Http\Controllers\FurnitureController;
use App\Http\Controllers\Auth\LoginController;
use Illuminate\Support\Facades\Route;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

// Public home page showing furniture gallery
Route::get('/', [FurnitureController::class, 'index'])->name('home');

// Show the login form
Route::get('/login', [LoginController::class, 'showLoginForm'])->name('login');

// Process the login
Route::post('/login', [LoginController::class, 'login'])->name('login.post');

// Logout route
Route::post('/logout', function(Request $request) {
    Auth::logout();
    $request->session()->invalidate();
    $request->session()->regenerateToken();
    return redirect('/login');
})->name('logout');

// Admin routes
Route::middleware('auth')->prefix('admin')->name('admin.')->group(function () {
    Route::resource('photos', PhotoController::class);
});
