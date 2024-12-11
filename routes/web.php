<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Authcontroller;
use App\Http\Controllers\TaskController;

Route::group(['middleware'=> 'guest'], function () {
    Route::view('/login', 'auth/login')->name('login');
    Route::view('/', 'index')->name('index');
    Route::view('/register', 'auth/register')->name('register');
    Route::post('/register', [Authcontroller::class, 'register'])->name('register');
    Route::post('/login', [Authcontroller::class, 'login'])->name('login');
    });

Route::get('/tasks', [TaskController::class, 'index'])->name('tasks')
?>
