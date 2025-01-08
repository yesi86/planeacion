<?php

namespace Database\Seeders;

use App\Models\Departamento;
use App\Models\User;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        $this->call([
            ClasificadorObjetoGastoSeeder::class,
            puestoSeeder::class,
            areaSuperiorSeeder::class,
            areaResponsableSeeder::class,
            DepartamentoSeeder::class,
            DivisionesCarreraSeeder::class,
            RoleSeeder::class,
            UserSeeder::class,
        ]);
    }
}
