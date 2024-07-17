<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Spatie\Permission\Models\Role;
use Illuminate\Support\Facades\Storage;

class UserController extends Controller
{
    public function __construct()
    {
        $this->middleware('role_or_permission:users.update.update')->only(['update']);
        $this->middleware('role_or_permission:users.destroy.destroy')->only(['destroy']);
        $this->middleware('role_or_permission:users.store.store')->only(['store']);
        $this->middleware('role_or_permission:register.showRegisterForm')->only(['showRegisterForm']);
    }

    public function destroy($id)
    {
        $user = User::find($id);
        if ($user) {
            if ($user->avatar) {
                Storage::disk('public')->delete($user->avatar);
            }
            $user->delete();
            return redirect()->route('users');
        }
        return redirect()->route('users')->with('error', 'User not found');
    }

    public function update(Request $request, $id)
    {
        $user = User::find($id);
        if ($user) { //валидация данных
            $validatedData = $request->validate([
                'first_name' => 'required|string|max:255',
                'second_name' => 'required|string|max:255',
                'third_name' => 'required|string|max:255',
                'username' => 'required|string|max:255',
                'email' => 'required|string|email|max:255',
                'password' => 'nullable|string|min:6',
                'role' => 'required|string|exists:roles,name',
                'avatar' =>'nullable|image|max:2048',
            ]);
            //удаление старой аватарки
            if ($user->avatar && $request->hasFile('avatar')) {
                Storage::disk('public')->delete($user->avatar);
            }

            if (!empty($validatedData['password'])) {
                $validatedData['password'] = Hash::make($validatedData['password']);
            } else {
                unset($validatedData['password']);
            }
            $user->update($validatedData);

            //присвоение уникального названия и сохранение аватара
            $avatarName = $request->file('avatar') ? $user->id.'_'. $request->file('avatar')->getClientOriginalName() : $user->avatar;
            $avatarPath = "";
            if ($request->hasFile('avatar')) {
                $avatarPath = Storage::disk('public')->putFileAs('avatars', $request->file('avatar'), $avatarName);
            }
            $user->avatar = $avatarPath;

            $user->syncRoles([$validatedData['role']]);

            return redirect()->route('users')->with('success', 'User updated successfully');
        }
        return redirect()->route('users')->with('error', 'User not found');
    }

    public function store(Request $request)
    {
        $validatedData = $request->validate([ //валидация данных
            'first_name' => 'required|string|max:255',
            'second_name' => 'required|string|max:255',
            'third_name' => 'required|string|max:255',
            'username' => 'required|string|max:255|unique:users',
            'email' => 'required|string|email|max:255|unique:users',
            'password' => 'required|string|min:6',
            'role' => 'required|string|exists:roles,name',
            'avatar' => 'nullable|image|max:2048',
        ]);

        //создание пользователя
        $user = new User();
        $user->first_name = $validatedData['first_name'];
        $user->second_name = $validatedData['second_name'];
        $user->third_name = $validatedData['third_name'];
        $user->username = $validatedData['username'];
        $user->email = $validatedData['email'];
        $user->password = Hash::make($validatedData['password']);
        $user->save();

        //присвоение уникального названия и сохранение аватара
        $avatarName = $request->file('avatar') ? $user->id.'_'. $request->file('avatar')->getClientOriginalName() : null;
        $avatarPath = "";
        if ($request->hasFile('avatar')) {
            $avatarPath = Storage::disk('public')->putFileAs('avatars', $request->file('avatar'), $avatarName);
        }
        $user->avatar = $avatarPath;
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
