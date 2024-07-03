<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;

class RolesPermissionsSeeder extends Seeder
{
    public function run()
    {
        $roles = ['admin', 'user', 'supervisor'];

        foreach ($roles as $role) {
            Role::create(['name' => $role]);
        }
    }
}

