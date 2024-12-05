<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\DivisionCarrera;
use App\Models\Departamento;



class DivisionesCarreraSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $divisiones = [
            ['nombre' => 'Division de carrera de Ingenieria Industrial', 'departamento_id' => 1],
            ['nombre' => 'Division de carrera de Ingenieria En Sistemas Computacionales', 'departamento_id' => 1],
            ['nombre' => 'Division de carrera de Ingenieria En Electronica', 'departamento_id' => 1],
            ['nombre' => 'Division de carrera de Ingenieria En Electromecanica', 'departamento_id' => 1],
            ['nombre' => 'Division de carrera de Ingenieria En Industrias Alimentarias', 'departamento_id' => 1],
            ['nombre' => 'Division de carrera de Ingenieria En Gestion Empresarial', 'departamento_id' => 1],
            ['nombre' => 'Division de carrera de Ingenieria Mecatronica', 'departamento_id' => 1],
            ['nombre' => 'Division de carrera de Ingenieria Bioquimica', 'departamento_id' => 1],
            ['nombre' => 'Division de carrera de Ingenieria Civil', 'departamento_id' => 1],
            ['nombre' => 'Division de carrera de Gastronomia', 'departamento_id' => 1],

        ];

        foreach ($divisiones as $division) {
            DivisionCarrera::create($division);
        }
    }
}
