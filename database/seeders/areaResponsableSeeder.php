<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\AreaResponsable;
use App\Models\areaSuperior;

class areaResponsableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $areasResponsables = [
            ['nombre' => 'Subdireccion Academica', 'area_superior_id' => 2],
            ['nombre' => 'Subireccion De Posgrado E Investigacion', 'area_superior_id' => 2],
            ['nombre' => 'Subdireccion De Planeacion', 'area_superior_id' => 3],
            ['nombre' => 'Subdireccion De Vinculacion', 'area_superior_id' => 3],
            ['nombre' => 'Departamento De Recursos Humanos', 'area_superior_id' => 4],
            ['nombre' => 'Departamento De Recursos Financieros', 'area_superior_id' => 4],
            ['nombre' => 'Departamento De Recursos Materiales Y Servicios Generales', 'area_superior_id' => 4],
            ['nombre' => 'Departamento De Tecnologias De La Informacion', 'area_superior_id' => 4],
        ];

        foreach ($areasResponsables as $area) {
            AreaResponsable::create($area);
        }
    }
}
