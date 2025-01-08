<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\ObjetoGasto;

class ClasificadorObjetoGastoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $catalogos = [
            ['capitulo' => '1000_(Serv._Personales)', 'partida' => '11100001', 'descripcion' => 'Dietas'],

        ];

        foreach ($catalogos as $reparto) {
            ObjetoGasto::create([
                'capitulo' => $reparto['capitulo'],
                'partida' => $reparto['partida'],
                'descripcion' => $reparto['descripcion'],
            ]);
        }
    }
}
