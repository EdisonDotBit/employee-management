<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\EmployeeController;
use App\Http\Controllers\HomeController;
use App\Http\Middleware\EnsureUserIsVerified;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

// Homepage Routes
Route::get('/', [HomeController::class, 'index'])->name('home');
Route::get('/about', [HomeController::class, 'about'])->name('about');
Route::get('/contact', [HomeController::class, 'contact'])->name('contact');

// Authentication Routes
Route::middleware('guest')->group(function () {
    Route::get('/register', [AuthController::class, 'showRegistrationForm'])->name('register');
    Route::post('/register', [AuthController::class, 'register']);

    Route::get('/verify-pin', [AuthController::class, 'showVerifyPinForm'])
        ->name('verify.pin');
    Route::post('/verify-pin', [AuthController::class, 'verifyPin'])
        ->name('verify.pin.submit');
    Route::post('/resend-pin', [AuthController::class, 'resendPin'])
        ->name('resend.pin');

    Route::get('/login', [AuthController::class, 'showLoginForm'])->name('login');
    Route::post('/login', [AuthController::class, 'login']);
});

// Authenticated & Verified Routes
Route::middleware(['auth', EnsureUserIsVerified::class])->group(function () {
    // Logout
    Route::post('/logout', [AuthController::class, 'logout'])->name('logout');

    // Dashboard
    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');

    // Employee Management
    // Custom summary route placed BEFORE resource route
    Route::get('/employees/summary', [EmployeeController::class, 'summary'])
        ->name('employees.summary');

    // Resource route with show method excluded to prevent conflict
    Route::resource('employees', EmployeeController::class);
});

// Fallback Route
Route::fallback(function () {
    return redirect()->route('home');
});
