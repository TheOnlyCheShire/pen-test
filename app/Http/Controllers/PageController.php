<?php

namespace App\Http\Controllers;

use App\Models\User;

class PageController extends Controller
{
    public function index()
    {
        return view('auth.index');
    }

    public function showProfile()
    {
        $users = User::all();
        return view('auth.users_list', compact('users'));
    }
    public function showUpdateForm($id)
    {
        $user = User::find($id);

        if (!$user) {
            return redirect()->route('users.index')->with('error', 'User not found');
        }

        return view('auth.update', compact('user'));
    }

}
