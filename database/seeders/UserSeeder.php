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
        $this->createHierarchicalUsers();
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
    private function createHierarchicalUsers()
    {
        $jefeCarreraRole = Role::firstOrCreate(
            ['name' => 'Jefe de Carrera'],
            ['guard_name' => 'web']
        );

        $userJefeCarrera = User::firstOrCreate(
            ['email' => 'jefe.carrera@example.com'],
            [
                'name' => 'Jefe de Carrera',
                'password' => Hash::make('password'),
            ]
        );

        $userJefeCarrera->assignRole($jefeCarreraRole);

        $puestoJefeCarrera = puesto::firstOrCreate(['name' => 'Jefa de la División de la Carrera de Ingeniería Industrial']);
        $division = DivisionCarrera::firstOrCreate(['nombre' => ' División de Carrera de Ingeniería Industrial']);

        UserAreaPosition::firstOrCreate([
            'user_id' => $userJefeCarrera->id,
            'division_id' => $division->id,
            'puesto_id' => $puestoJefeCarrera->id,
            'role' => $jefeCarreraRole->name,
        ]);

        $this->command->info("Usuario Jefe de Carrera creado o actualizado con éxito.");

        $delegadoRole = Role::firstOrCreate(
            ['name' => 'Delegado'],
            ['guard_name' => 'web']
        );

        $userDelegado = User::firstOrCreate(
            ['email' => 'delegado@example.com'],
            [
                'name' => 'Delegado Responsable',
                'password' => Hash::make('password'),
            ]
        );

        $userDelegado->assignRole($delegadoRole);

        $puestoDelegado = puesto::firstOrCreate(['name' => 'Jefe del Departamento de Ciencias Básicas']);
        $departamento = Departamento::firstOrCreate(['nombre' => 'Departamento de Ciencias Básicas']);

        UserAreaPosition::firstOrCreate([
            'user_id' => $userDelegado->id,
            'departamento_id' => $departamento->id,
            'puesto_id' => $puestoDelegado->id,
            'role' => $delegadoRole->name,
        ]);

        $this->command->info("Usuario Delegado creado o actualizado con éxito.");
    }
}
