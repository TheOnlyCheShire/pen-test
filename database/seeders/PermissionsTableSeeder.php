<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;


class PermissionsTableSeeder extends Seeder
{
    public function run()
    {
        $permissions = [
            'update.form.showUpdateForm',
            'register.showRegisterForm',
            'users.store.store',
            'users.update.update',
            'users.destroy.destroy',
            'roles.index.index',
            'roles.destroy.destroy',
            'roles.edit.edit',
            'roles.create.create',
            'roles.store.store',
            'roles.update.update',
            'news.destroy.destroy',
            'news.edit.edit',
            'news.create.create',
            'news.store.store',
            'news.update.update',
        ];

        foreach ($permissions as $permission) {
            Permission::create(['name' => $permission]);
        }
        $permissions_a = Permission::all();

        $admin_role = Role::firstOrCreate(['name' => 'admin']);
        $admin_role->permissions()->sync($permissions_a->pluck('id'));

        $supervisor_role = Role::firstOrCreate(['name' => 'supervisor']);
        $supervisor_role->permissions()->sync($permissions_a->pluck('id'));

        $user_role = Role::firstOrCreate(['name' => 'user']);
        $permissions_u = Permission::whereIn('name', [
            'news.destroy.destroy',
            'news.edit.edit',
            'news.create.create',
            'news.store.store',
            'news.update.update',
        ])->get();

        $user_role->permissions()->sync($permissions_u->pluck('id'));

    }
}
