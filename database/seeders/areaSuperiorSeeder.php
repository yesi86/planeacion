<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\AreaSuperior;

class AreaSuperiorSeeder extends Seeder
{
    public function run()
    {
        AreaSuperior::create(['nombre' => 'Direccion General']);
        AreaSuperior::create(['nombre' => 'Direccion Academica']);
        AreaSuperior::create(['nombre' => 'Direccion De Planeacion y Vinculacion']);
        AreaSuperior::create(['nombre' => 'Subdireccion Administrativa']);
    }
}
