<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use App\Models\puesto;

class puestoSeeder extends Seeder
{
    public function run()
    {
        $puestos = [
            'Subdirectora Académica',
            'Subdirectora de Posgrado e Investigación',
            'Subdirector de Planeación',
            'Subdirector  de Vinculación',
            'Director General',
            'Titular de la Unidad de Transparencia',
            'Titular de la Coordinación de Gestión de Calidad',
            'Titular de laUnidad de Género',
            'Director Académico',
            'Directora de Planeación y Vinculación',
            'Subdirector Administrativo',
            'Jefa del Departamento de Recursos Humanos',
            'Jefa del Departamento de Recursos Financieros',
            'Jefe del Departamento de Recursos Materiales y Servicios',
            'Jefe del Departamento de Tecnologías de la Información',
            'Jefa de la División de la Carrera de Ingeniería Industrial',
            'Jefe de la División de la Carrera de Ingeniería en Sistemas Computacionales',
            'Jefe de División de la Carrera de Ingeniería en Electrónica',
            'Jefe la de División de la Carrera de Ingeniería en Electromecánica',
            'Jefe de la División de la Carrera de Ingeniería en Industrias Alimentarias',
            'Jefa de División de la Carrera de Ingeniería en Gestión Empresarial',
            'Jefe de la División de la Carrera de Ingeniería Mecatrónica',
            'Jefa de la División de la Carrera de Ingeniería Bioquímica',
            'Jefe de la División de la Carrera de Ingeniería Civil',
            'Jefe de la División de la Carrera de Gastronomía',
            'Jefa del Departamento de Desarrollo Académico',
            'Jefe del Departamento de Ciencias Básicas',
            'Jefa del Departamento de Estudios Profesionales',
            'Titular de la Coordinación de Lenguas Extranjeras',
            'Titular de la Coordinación de Actividades Complementarias',
            'Jefe del Departamento de Planeación y Programación',
            'Jefe del Departamento de Estadística y Evaluación',
            'Jefa del Departamento de Control Escolar',
            'Titular de la Coordinación de Transferencia e Innovación',
            'Jefa del Departamento de Difusión y Concertación',
            'Jefa del Departamento de Residencias Profesionales y Servicio Social',
            'Titular del Servicio de Orientación Médica',
        ];

        foreach ($puestos as $name) {
            Puesto::create([
                'name' => $name
            ]);
        }
    }
}
