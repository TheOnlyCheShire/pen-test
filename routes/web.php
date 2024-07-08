<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\PageController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\RoleController;
use App\Http\Controllers\NewsController;
use App\Http\Controllers\KeywordController;

Route::get('/', [PageController::class, 'index'] );
Route::get('/users', [PageController::class, 'showProfile'])->name('users');
Route::get('/users/{id}/update', [PageController::class, 'showUpdateForm'])->name('update.form');

Route::post('/login', [LoginController::class, 'login'])->name('login');
Route::post('/logout', [LoginController::class, 'logout'])->name('logout');

Route::get('/register', [UserController::class, 'showRegisterForm'])->name('register');
Route::post('/register', [UserController::class, 'store'])->name('users.store');
Route::post('/users/{id}/update', [UserController::class, 'update'])->name('users.update');
Route::delete('/users/{id}/delete', [UserController::class, 'destroy'])->name('users.destroy');

Route::get('/roles', [RoleController::class, 'index'])->name('roles.index');
Route::delete('/roles/{role}', [RoleController::class, 'destroy'])->name('roles.destroy');
Route::get('/roles/{role}/edit', [RoleController::class, 'edit'])->name('roles.edit');
Route::get('/roles/create', [RoleController::class, 'create'])->name('roles.create');
Route::post('/roles', [RoleController::class, 'store'])->name('roles.store');
Route::put('/roles/{role}', [RoleController::class, 'update'])->name('roles.update');

Route::get('/news', [NewsController::class, 'index'])->name('news.index');
Route::delete('/news/{news}', [NewsController::class, 'destroy'])->name('news.destroy');
Route::get('/news/{news}/edit', [NewsController::class, 'edit'])->name('news.edit');
Route::get('/news/create', [NewsController::class, 'create'])->name('news.create');
Route::post('/news', [NewsController::class, 'store'])->name('news.store');
Route::put('/news/{news}', [NewsController::class, 'update'])->name('news.update');
Route::get('/keywords', [KeywordController::class, 'search']);


