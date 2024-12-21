<?php

use App\Http\Controllers\Authcontroller;
use App\Http\Controllers\TaskController;
use Illuminate\Support\Facades\Route;

// Routes for unauthenticated users
Route::group(['middleware' => 'guest'], function () {
    Route::view('/login', 'auth/login')->name('login');
    Route::view('/register', 'auth/register')->name('register');
    Route::post('/register', [AuthController::class, 'register'])->name('register');
    Route::post('/login', [AuthController::class, 'login'])->name('login');
    Route::view('/forgot-password', 'auth/forgot-password')->name('password-request');
    Route::post('/forgot-password', [Authcontroller::class, 'forgotPassword'])->name('password.email');
    Route::get('/reset-password/{token}', [AuthController::class, 'passwordReset'])->name('password.reset');
    Route::post('/reset-password', [AuthController::class, 'resetPassword'])->name('password.update');
});

// Routes for authenticated users
Route::group(['middleware' => 'auth'], function () {
    Route::get('/tasks', [TaskController::class, 'index'])->name('tasks');
    Route::post('/tasks', [TaskController::class, 'store'])->name('tasks.store');
    Route::get('/tasks/{id}/edit', [TaskController::class, 'edit'])->name('tasks.edit');
    Route::put('tasks/{id}', [TaskController::class, 'update'])->name('tasks.update');
    Route::delete('/task/{id}', [TaskController::class, 'destroy'])->name('tasks.destroy');
    Route::patch('task/{id}/complete', [TaskController::class, 'markComplete'])->name('tasks.complete');
});
Route::view('/', 'index')->name('index'); // Index route for logged-in users
Route::post('/logout', [AuthController::class, 'logout'])->name('logout');
