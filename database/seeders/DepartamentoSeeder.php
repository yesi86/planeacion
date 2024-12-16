<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Departamento;
use App\Models\AreaResponsable;

class DepartamentoSeeder extends Seeder
{
    public function run()
    {
        $departamentos = [
            'Divisiones de Carrera' => 'Subdireccion Academica',
            'Departamento De Desarrollo Academico' => 'Subdireccion Academica',
            'Departamento De Ciencias Basicas' => 'Subdireccion Academica',
            'Departamento De Estudios Profesionales' => 'Subdireccion Academica',
            'Coordinacion De Lenguas Extranjeras' => 'Subdireccion Academica',
            'Departamento De Planeacion Programacion Y Evaluacion' => 'Subdireccion De Planeacion',
            'Departamento De Estadistica' => 'Subdireccion De Planeacion',
            'Departamento De Servicios Escolares' => 'Subdireccion De Planeacion',
            'Departamento De Difusion Y Concertacion' => 'Subdireccion De Vinculacion',
            'Departamento De Residencias Profesionales Y Servicio Social' => 'Subdireccion De Vinculacion',
            'Servicio De Orientación Medica' => 'Subdireccion De Vinculacion',
        ];

        foreach ($departamentos as $nombre => $areaResponsableNombre) {
            $areaResponsable = AreaResponsable::where('nombre', $areaResponsableNombre)->first();
            Departamento::create([
                'nombre' => $nombre,
                'area_responsable_id' => $areaResponsable->id,
            ]);
        }
    }
}
