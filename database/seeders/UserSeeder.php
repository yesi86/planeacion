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
        // Buscar o crear el rol "superadministrador"
        $role = Role::firstOrCreate(
            ['name' => 'SuperAdministrador'], // Asegúrate de usar el nombre correcto
            ['guard_name' => 'web']
        );

        // Crear o buscar el usuario
        $user = User::firstOrCreate(
            ['email' => 'testing@example.com'], // Normalizar el correo
            [
                'name' => 'GestionTesting',
                'password' => Hash::make('ITSX1305'),
            ]
        );

        // Asignar el rol al usuario
        if (!$user->hasRole('SuperAdministrador')) {
            $user->assignRole('SuperAdministrador');
        }

        $this->command->info("Usuario Superadmin creado o actualizado con éxito.");
    }
}
