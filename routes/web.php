<?php

use App\Http\Controllers\Admin\AdminDashboardController;
use App\Http\Controllers\Admin\BookController;
use App\Http\Controllers\Admin\StudentController;
use App\Http\Controllers\Admin\TransactionController;
use App\Http\Controllers\Auth\AdminAuthController;
use App\Http\Controllers\Auth\StudentAuthController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return redirect()->route('admin.login');
});

Route::prefix('admin')->name('admin.')->group(function () {
    Route::get('/login', [AdminAuthController::class, 'showLoginForm'])->name('login');
    Route::post('/login', [AdminAuthController::class, 'login'])->name('login.submit');
    Route::post('/logout', [AdminAuthController::class, 'logout'])->name('logout');

    Route::middleware('admin.auth')->group(function () {
        Route::get('/dashboard', [AdminDashboardController::class, 'dashboard'])->name('dashboard');

        Route::resource('book', BookController::class);
        Route::resource('student', StudentController::class);
        Route::resource('transaction', TransactionController::class);
    });

});
Route::prefix('student')->name('student.')->group(function () {
    Route::get('/login', [StudentAuthController::class, 'showLoginForm'])->name('login');
    Route::post('/login', [StudentAuthController::class, 'login'])->name('login.submit');
    Route::get('/register', [StudentAuthController::class, 'showRegisterForm'])->name('register');
    Route::post('/register', [StudentAuthController::class, 'register'])->name('register.submit');
    Route::post('/logout', [StudentAuthController::class, 'logout'])->name('logout');

    Route::middleware('student.auth')->group(function () {
        Route::get('/dashboard', function () {
            return view('student.dashboard');
        })->name('dashboard');
    });
});
