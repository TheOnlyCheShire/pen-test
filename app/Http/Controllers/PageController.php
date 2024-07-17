<?php

namespace App\Http\Controllers;

use Spatie\Permission\Models\Role;
use App\Models\User;
use Illuminate\Support\Facades\Auth;

class PageController extends Controller
{
    public function __construct()
    {
        $this->middleware('role_or_permission:update.form.showUpdateForm')->only(['showUpdateForm']);
    }
    public function index()
    {
        if (Auth::check()) {
            return redirect()->route('users');
        }
        return view('auth.index');
    }

    public function showProfile()
    {
        $users = User::with('roles')->get();
        return view('auth.users_list', compact('users'));
    }
    public function showUpdateForm($id)
    {
        $user = User::find($id);

        if (!$user) {
            return redirect()->route('users.index')->with('error', 'User not found');
        }

        $roles = Role::all();

        return view('auth.update', compact('user', 'roles'));
    }

}
