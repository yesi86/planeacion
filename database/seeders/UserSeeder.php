<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use App\Models\User;
use App\Models\Role;
use Illuminate\Support\Facades\DB;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Buscar el rol "superadministrador"
        $role = Role::firstOrCreate(['name' => 'superadministrador']);

        $user = User::firstOrCreate(
            ['email' => 'Testing@example.com'],
            [
                'name' => 'GestionTesting',
                'password' => Hash::make('ITSX1305'),
                'role_id' => $role->id,
            ]
        );
        DB::table('model_has_roles')->insert([
            'role_id' => $role->id,
            'model_type' => User::class,
            'model_id' => $user->id,
        ]);
        $this->command->info("Usuario Superadmin creado o actualizado con éxito.");
    }
}
