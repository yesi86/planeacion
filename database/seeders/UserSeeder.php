<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use Spatie\Permission\Models\Role;
use App\Models\User;
// agregamos las relaciones con los modelos para manejar en nuestro seeder
use App\Models\puesto;
use App\Models\Division;
use App\Models\Departamento;
use App\Models\AreaResponsable;
use App\Models\AreaSuperior;
use App\Models\DivisionCarrera;
use App\Models\UserAreaPosition;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {

        $this->createSuperAdmin();
    }
    private function createSuperAdmin()
    {
        $role = Role::firstOrCreate(
            ['name' => 'SuperAdministrador'],
            ['guard_name' => 'web']
        );

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
