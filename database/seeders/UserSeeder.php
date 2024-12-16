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
        $division = DivisionCarrera::find(10);

        if ($division) {
            $departamento = $division->departamento()->first();

            if ($departamento) {
                $areaResponsable = $departamento->areaResponsable;

                if ($areaResponsable) {
                    $areaSuperior = $areaResponsable->areaSuperior;
                    $puestoJefeCarrera = puesto::firstOrCreate(['name' => 'Jefe de Carrera']);
                    $role = Role::firstOrCreate(
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
                    $userJefeCarrera->assignRole($role);

                    UserAreaPosition::firstOrCreate([
                        'user_id' => $userJefeCarrera->id,
                        'departamento_id' => $departamento->id,
                        'area_responsable_id' => $areaResponsable->id,
                        'area_superior_id' => $areaSuperior ? $areaSuperior->id : null,
                        'division_id' => $division->id,
                        'puesto_id' => $puestoJefeCarrera->id,
                        'role' => $role->name,
                    ]);

                    $this->command->info("Usuario Jefe de Carrera creado o actualizado con éxito.");
                }
            }
        }
    }
}
