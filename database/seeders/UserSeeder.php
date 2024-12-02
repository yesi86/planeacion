<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use Spatie\Permission\Models\Role;
use App\Models\User;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $role = Role::firstOrCreate(
            ['name' => 'SuperAdministrador'],
            ['guard_name' => 'web']
        );

        // Crear o buscar el usuario
        $user = User::firstOrCreate(
            ['email' => 'testing@example.com'],
            [
                'name' => 'GestionTesting',
                'password' => Hash::make('ITSX1305'),
            ]
        );

        $user->assignRole($role);

        $this->command->info("Usuario Superadmin creado o actualizado con éxito.");
    }
}
