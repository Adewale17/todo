<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Authcontroller;
use App\Http\Controllers\TaskController;

Route::group(['middleware'=> 'guest'], function () {
    Route::view('/login', 'auth/login')->name('login');
    Route::view('/register', 'auth/register')->name('register');
    Route::post('/login', [Authcontroller::class, 'login']);
    });

Route::get('/tasks', [TaskController::class, 'task'])
?>
