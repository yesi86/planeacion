<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use App\Models\User;
use Illuminate\Support\Facades\DB;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Verificar si el rol "superadmin" ya existe
        $roleId = DB::table('rol')->where('name', 'superadministrador')->value('id');



        // Crear el usuario Superadmin solo si no existe
        User::firstOrCreate(
            ['email' => 'Testing@example.com'],
            [
                'name' => 'GestionTesting',
                'password' => Hash::make('ITSX1305'),
                'role_id' => $roleId, // Asignar el ID del rol "superadmin"
            ]
        );
    }
}
