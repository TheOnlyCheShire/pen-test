<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\PageController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\RoleController;
use App\Http\Controllers\NewsController;
use App\Http\Controllers\KeywordController;

Route::get('/', [PageController::class, 'index']);

Route::get('/users', [PageController::class, 'showProfile'])->name('users');

Route::get('/news', [NewsController::class, 'index'])->name('news.index');


Route::get('/users/{id}/update', [PageController::class, 'showUpdateForm'])
    ->middleware('role_or_permission:update.form.showUpdateForm')
    ->name('update.form');

Route::post('/login', [LoginController::class, 'login'])->name('login');
Route::post('/logout', [LoginController::class, 'logout'])->name('logout');

Route::get('/register', [UserController::class, 'showRegisterForm'])
    ->middleware('role_or_permission:register.showRegisterForm')
    ->name('register');

Route::post('/register', [UserController::class, 'store'])
    ->middleware('role_or_permission:users.store.store')
    ->name('users.store');

Route::post('/users/{id}/update', [UserController::class, 'update'])
    ->middleware('role_or_permission:users.update.update')
    ->name('users.update');

Route::delete('/users/{id}/delete', [UserController::class, 'destroy'])
    ->middleware('role_or_permission:users.destroy.destroy')
    ->name('users.destroy');
//-----------------------------------------------------------------------------------------------------

Route::get('/roles', [RoleController::class, 'index'])
    ->middleware('role_or_permission:roles.index.index')
    ->name('roles.index');

Route::delete('/roles/{role}', [RoleController::class, 'destroy'])
    ->middleware('role_or_permission:roles.destroy.destroy')
    ->name('roles.destroy');

Route::get('/roles/{role}/edit', [RoleController::class, 'edit'])
    ->middleware('role_or_permission:roles.edit.edit')
    ->name('roles.edit');

Route::get('/roles/create', [RoleController::class, 'create'])
    ->middleware('role_or_permission:roles.create.create')
    ->name('roles.create');

Route::post('/roles', [RoleController::class, 'store'])
    ->middleware('role_or_permission:roles.store.store')
    ->name('roles.store');

Route::put('/roles/{role}', [RoleController::class, 'update'])
    ->middleware('role_or_permission:roles.update.update')
    ->name('roles.update');
//-----------------------------------------------------------------------------------------------------

Route::delete('/news/{news}', [NewsController::class, 'destroy'])
    ->middleware('role_or_permission:news.destroy.destroy')
    ->name('news.destroy');

Route::get('/news/{news}/edit', [NewsController::class, 'edit'])
    ->middleware('role_or_permission:news.edit.edit')
    ->name('news.edit');

Route::get('/news/create', [NewsController::class, 'create'])
    ->middleware('role_or_permission:news.create.create')
    ->name('news.create');

Route::post('/news', [NewsController::class, 'store'])
    ->middleware('role_or_permission:news.store.store')
    ->name('news.store');

Route::put('/news/{news}', [NewsController::class, 'update'])
    ->middleware('role_or_permission:news.update.update')
    ->name('news.update');

Route::get('/keywords', [KeywordController::class, 'search']);


