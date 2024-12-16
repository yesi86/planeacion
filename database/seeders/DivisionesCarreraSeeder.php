<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\DivisionCarrera;
use App\Models\Departamento;

class DivisionesCarreraSeeder extends Seeder
{
    public function run(): void
    {
        $divisiones = [
            'Ingeniería Industrial',
            'Ingeniería en Sistemas Computacionales',
            'Ingeniería Electrónica',
            'Ingeniería Electromecánica',
            'Ingeniería Bioquímica',
            'Ingeniería Mecatrónica',
            'Ingeniería en Gestión Empresarial',
            'Ingeniería en Industrias Alimentarias',
            'Ingeniería Civil',
            'Gastronomía',
        ];

        $departamento = Departamento::where('nombre', 'Divisiones de Carrera')->first();

        foreach ($divisiones as $nombre) {
            DivisionCarrera::create([
                'nombre' => "División de Carrera de $nombre",
                'departamento_id' => $departamento->id,
            ]);
        }
    }
}
