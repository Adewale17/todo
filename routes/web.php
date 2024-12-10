<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PageController;
use App\Http\Controllers\Authcontroller;
use App\Http\Controllers\TaskController;

Route::get('/', [PageController::class, 'index']);
Route::get('/login', [Authcontroller::class, 'showLoginForm'])->name('login');
Route::post('/login', [Authcontroller::class, 'login']);
Route::get('/register', [Authcontroller::class, 'showRegisterForm'])->name('register');
Route::get('/tasks', [TaskController::class, 'task'])
?>
