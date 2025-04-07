<?php
use App\Http\Controllers\Admin\PhotoController;
use App\Http\Controllers\PresentationController;
use App\Http\Controllers\Auth\LoginController;
use Illuminate\Support\Facades\Route;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

// Public presentation page (you can display all photos)
Route::get('/', [PresentationController::class, 'index'])->name('home');


// Show the login form
Route::get('/login', [LoginController::class, 'showLoginForm'])->name('login');

// Process the login
Route::post('/login', [LoginController::class, 'login'])->name('login.post');

Route::post('/logout', function(Request $request) {
    Auth::logout();
    $request->session()->invalidate();
    $request->session()->regenerateToken();
    return redirect('/login');
})->name('logout');

// Admin routes (prefix with 'admin')
Route::middleware('auth')->prefix('admin')->name('admin.')->group(function () {
    Route::resource('photos', PhotoController::class);
});


