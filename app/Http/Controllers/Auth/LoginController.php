<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    public function login(Request $request)
    {
                // Валидация данных
        $request->validate([
            'username' => 'required|string|max:255',
            'password' => 'required|string|min:6',
        ]);

        // Аутентификация пользователя
        $credentials = $request->only('username', 'password');
        if (Auth::attempt($credentials)) {
            // Аутентификация прошла успешно, перенаправление на другую страницу
            return redirect()->intended('profile');
        }

        // Аутентификация не удалась, перенаправление обратно с ошибкой
        return back()->withErrors([
            'username' => 'The provided credentials do not match our records.',
        ]);
    }
}
