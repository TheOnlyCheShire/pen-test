<?php

use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\PageController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;


Route::get('/', [PageController::class, 'index'] );

Route::post('/login', [LoginController::class, 'login'])->name('login');

Route::get('/users', [PageController::class, 'showProfile'])->name('users');

Route::get('/register', [UserController::class, 'showRegisterForm'])->name('register');

Route::post('/register', [UserController::class, 'store'])->name('users.store');

Route::post('/users/{id}/update', [UserController::class, 'update'])->name('users.update');
Route::get('/users/{id}/update', [PageController::class, 'showUpdateForm'])->name('update.form');

Route::delete('/users/{id}/delete', [UserController::class, 'destroy'])->name('users.destroy');

