<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Authcontroller;
use App\Http\Controllers\TaskController;

// Routes for unauthenticated users
Route::group(['middleware' => 'guest'], function () {
    Route::view('/login', 'auth/login')->name('login');
    Route::view('/register', 'auth/register')->name('register');
    Route::post('/register', [AuthController::class, 'register'])->name('register');
    Route::post('/login', [AuthController::class, 'login'])->name('login');
});

// Routes for authenticated users
Route::group(['middleware' => 'auth'], function () {
    Route::get('/tasks', [TaskController::class, 'index'])->name('tasks'); // Task route for logged-in users
});
Route::view('/', 'index')->name('index'); // Index route for logged-in users
Route::post('/logout', [AuthController::class,'logout'])->name('logout');
