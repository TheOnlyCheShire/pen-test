<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;

class RoleController extends Controller
{
    public function index()
    {
        $roles = DB::table('roles')->get(); // Получить все роли из таблицы roles
        return view('roles.list', compact('roles'));
    }

    public function edit($id)
    {
        $role = DB::table('roles')->where('id', $id)->first();
        return view('roles.edit', compact('role'));
    }

    public function create()
    {
        return view('roles.create');
    }

    public function destroy($id)
    {
        DB::table('roles')->where('id', $id)->delete();
        return redirect()->route('roles.index')->with('success', 'Роль удалена успешно');
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
        ]);

        DB::table('roles')->insert([
            'name' => $request->name,
        ]);

        return redirect()->route('roles.index')->with('success', 'Роль добавлена успешно');
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'name' => 'required|string|max:255',
        ]);

        DB::table('roles')->where('id', $id)->update([
            'name' => $request->name,
        ]);

        return redirect()->route('roles.index')->with('success', 'Роль обновлена успешно');
    }
}
