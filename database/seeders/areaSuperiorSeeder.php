<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\AreaSuperior;

class areaSuperiorSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $areasSuperiores = [
            ['nombre' => 'Direccion General'],
            ['nombre' => 'Direccion Academica'],
            ['nombre' => 'Direccion De Planeacion y Vinculacion'],
            ['nombre' => 'Subdirecion Administrativa'],
        ];

        foreach ($areasSuperiores as $area) {
            AreaSuperior::create($area);
        }
    }
}
