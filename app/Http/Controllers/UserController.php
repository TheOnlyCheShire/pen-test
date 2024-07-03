<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Spatie\Permission\Models\Role;

class UserController extends Controller
{
    public function destroy($id)
    {
        $user = User::find($id);
        if ($user) {
            $user->delete();
            return redirect()->route('users');
        }
        return redirect()->route('users')->with('error', 'User not found');
    }

    public function update(Request $request, $id)
    {
        $user = User::find($id);
        if ($user) {
            $validatedData = $request->validate([
                'first_name' => 'required|string|max:255',
                'second_name' => 'required|string|max:255',
                'third_name' => 'required|string|max:255',
                'username' => 'required|string|max:255',
                'email' => 'required|string|email|max:255',
                'password' => 'nullable|string|min:6',
                'role' => 'required|string|exists:roles,name',
            ]);

            if (!empty($validatedData['password'])) {
                $validatedData['password'] = Hash::make($validatedData['password']);
            } else {
                unset($validatedData['password']);
            }
            $user->update($validatedData);

            $user->syncRoles([$validatedData['role']]);

            return redirect()->route('users')->with('success', 'User updated successfully');
        }
        return redirect()->route('users')->with('error', 'User not found');
    }

    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'first_name' => 'required|string|max:255',
            'second_name' => 'required|string|max:255',
            'third_name' => 'required|string|max:255',
            'username' => 'required|string|max:255|unique:users',
            'email' => 'required|string|email|max:255|unique:users',
            'password' => 'required|string|min:6',
            'role' => 'required|string|exists:roles,name',
        ]);

        $user = new User();
        $user->first_name = $validatedData['first_name'];
        $user->second_name = $validatedData['second_name'];
        $user->third_name = $validatedData['third_name'];
        $user->username = $validatedData['username'];
        $user->email = $validatedData['email'];
        $user->password = Hash::make($validatedData['password']);
        $user->save();

        $user->assignRole($validatedData['role']);

        return redirect()->route('users');
    }

    public function showRegisterForm()
    {
        $roles = Role::all();
        return view('auth.register', compact('roles'));
    }
}
