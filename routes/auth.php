<?php

use App\Http\Controllers\Auth\AuthController;
use Illuminate\Support\Facades\Route;

// Login
Route::get('/login', [AuthController::class, 'viewLogin'])->name('view.login');
Route::post('/login', [AuthController::class, 'handleLogin'])->name('handle.login');

// Logout
Route::post('logout', [AuthController::class, 'handleLogout'])->name('handle.logout');



// // Show login form
// Route::get('/login', [AuthController::class, 'showLoginForm'])->name('login');

// // Handle login form submission
// Route::post('/login', [AuthController::class, 'login']);

// // Logout route
// Route::post('/logout', [AuthController::class, 'logout'])->name('logout');


Route::get('/dashboard', function () {
    // Only authenticated users may enter...
})->middleware('auth');
