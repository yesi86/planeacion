<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Departamento;
use App\Models\AreaResponsable;

class DepartamentoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $departamentos = [
            ['nombre' => 'Divisiones de Carrera', 'area_responsable_id' => 1],
            ['nombre' => 'Departamento De Desarrollo Academico', 'area_responsable_id' => 1],
            ['nombre' => 'Departamento De Ciencias Basicas', 'area_responsable_id' => 1],
            ['nombre' => 'Departamento De Estudios Profesionales', 'area_responsable_id' => 1],
            ['nombre' => 'Coordinacion De Lenguas Extranjeras', 'area_responsable_id' => 1],
            ['nombre' => 'Coordinacion De Lenguas Extranjeras', 'area_responsable_id' => 1],

            ['nombre' => 'Departamento De PLaneacion Programacion Y Evaluacion', 'area_responsable_id' => 3],
            ['nombre' => 'Departamento De Estadistica', 'area_responsable_id' => 3],
            ['nombre' => 'Departamento De Servicios Escolares', 'area_responsable_id' => 3],

            ['nombre' => 'Departamento De Difusion Y Concertacion', 'area_responsable_id' => 4],
            ['nombre' => 'Departamento De Residencias Profesionales Y Servicio Social', 'area_responsable_id' => 4],
            ['nombre' => 'Servicio De Orientación Medica', 'area_responsable_id' => 4],



        ];

        foreach ($departamentos as $departamento) {
            Departamento::create($departamento);
        }
    }
}
