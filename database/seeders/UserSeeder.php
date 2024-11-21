<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use App\Models\User;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Crear el usuario Superadmin solo si no existe
        User::firstOrCreate(
            ['email' => 'Testing@example.com'],
            [
                'name' => 'GestionTesting',
                'password' => Hash::make('ITSX1305'),
                'role' => 'superadmin', // Asignar el rol de superadministrador
            ]
        );
    }
}
