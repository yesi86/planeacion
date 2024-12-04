<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Role;

class RoleSeeder extends Seeder
{
    public function run()
    {
        $roles = [
            ['name' => 'SuperAdministrador', 'guard_name' => 'web'],
            ['name' => 'Administrador', 'guard_name' => 'web'],
            ['name' => 'Responsable', 'guard_name' => 'web'],
            ['name' => 'Delegado', 'guard_name' => 'web']
        ];

        foreach ($roles as $role) {
            Role::create([
                'name' => $role['name'],
                'guard_name' => $role['guard_name'],  // debes de crear un guard por cada rol
            ]);
        }
    }
}
