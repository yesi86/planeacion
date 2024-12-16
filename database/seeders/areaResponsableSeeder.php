<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\AreaResponsable;
use App\Models\AreaSuperior;

class AreaResponsableSeeder extends Seeder
{
    public function run()
    {
        $areas = [
            'Subdireccion Academica' => 'Direccion Academica',
            'Subdireccion De Posgrado E Investigacion' => 'Direccion Academica',
            'Subdireccion De Planeacion' => 'Direccion De Planeacion y Vinculacion',
            'Subdireccion De Vinculacion' => 'Direccion De Planeacion y Vinculacion',
            'Departamento De Recursos Humanos' => 'Subdireccion Administrativa',
            'Departamento De Recursos Financieros' => 'Subdireccion Administrativa',
            'Departamento De Recursos Materiales Y Servicios Generales' => 'Subdireccion Administrativa',
            'Departamento De Tecnologias De La Informacion' => 'Subdireccion Administrativa',
        ];

        foreach ($areas as $nombre => $areaSuperiorNombre) {
            $areaSuperior = AreaSuperior::where('nombre', $areaSuperiorNombre)->first();
            AreaResponsable::create([
                'nombre' => $nombre,
                'area_superior_id' => $areaSuperior->id,
            ]);
        }
    }
}
