<?php

namespace App\Http\Controllers;

use App\Models\User;

use Illuminate\Http\Request;

class UserController extends Controller
{
    // Получение всех пользователей
    $users = User::all();

    // Передача пользователей в шаблон
    return view('users.index', compact('users'));
}
