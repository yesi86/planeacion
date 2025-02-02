<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Areas; // Modelo Areas

class AreasLista extends Seeder
{
    public function run()
    {
        // Nivel raíz (Dirección General)
        $direccionGeneral = Areas::create([
            'nombre' => 'Direccion General',
            'tipo' => 'Instituto',
            'parent_id' => null,
        ]);

        $direccionAcademica = Areas::create([
            'nombre' => 'Direccion Academica',
            'tipo' => 'Superior',
            'parent_id' => $direccionGeneral->id,
        ]);

        $direccionPlaneacion = Areas::create([
            'nombre' => 'Direccion De Planeacion y Vinculacion',
            'tipo' => 'Superior',
            'parent_id' => $direccionGeneral->id,
        ]);

        $subdireccionAdministrativa = Areas::create([
            'nombre' => 'Subdireccion Administrativa',
            'tipo' => 'Superior',
            'parent_id' => $direccionGeneral->id,
        ]);

        $subdireccionAcademica = Areas::create([
            'nombre' => 'subdireccion Academica',
            'tipo' => 'Responsable',
            'parent_id' => $direccionAcademica->id,
        ]);

        $subdireccionPlaneacion = Areas::create([
            'nombre' => 'Subdireccion De Planeacion',
            'tipo' => 'Responsable',
            'parent_id' => $direccionPlaneacion->id,
        ]);
        $subdireccionVinculacion = Areas::create([
            'nombre' => 'Subdireccion De Vinculacion',
            'tipo' => 'Responsable',
            'parent_id' => $direccionPlaneacion->id,
        ]);

        $subdireccionPosgrado = Areas::create([
            'nombre' => 'Subdireccion De Posgrado E Investigacion',
            'tipo' => 'Responsable',
            'parent_id' => $direccionAcademica->id,
        ]);
        $DivisionesCarrera = Areas::create([
            'nombre' => 'Divisiones de Carrera',
            'tipo' => 'Departamento',
            'parent_id' => $subdireccionAcademica->id,
        ]);

        $responsables = [
            ['nombre' => 'Subdireccion De Recursos Humanos', 'parent_id' => $subdireccionAdministrativa->id],
            ['nombre' => 'Subdireccion De Recursos Financieros', 'parent_id' => $subdireccionAdministrativa->id],
            ['nombre' => 'Subdireccion De Recursos Materiales Y Servicios Generales', 'parent_id' => $subdireccionAdministrativa->id],
            ['nombre' => 'Subdireccion De Tecnologias De La Informacion', 'parent_id' => $subdireccionAdministrativa->id],
        ];


        foreach ($responsables as $responsable) {
            Areas::create([
                'nombre' => $responsable['nombre'],
                'tipo' => 'Responsable',
                'parent_id' => $responsable['parent_id'],
            ]);
        }

        $departamentos = [
            ['nombre' => 'Departamento De Desarrollo Academico', 'parent_id' => $subdireccionAcademica->id],
            ['nombre' => 'Departamento De Ciencias Basicas', 'parent_id' => $subdireccionAcademica->id],
            ['nombre' => 'Departamento De Estudios Profesionales', 'parent_id' => $subdireccionAcademica->id],
            ['nombre' => 'Coordinacion De Lenguas Extranjeras', 'parent_id' => $subdireccionAcademica->id],
            ['nombre' => 'Coordinacion De Actividades Complementarias', 'parent_id' => $subdireccionAcademica->id],


            ['nombre' => 'Departamento De Planeacion Programacion Y Evaluacion', 'parent_id' => $subdireccionPlaneacion->id],
            ['nombre' => 'Departamento De Estadistica y Evaluacion', 'parent_id' => $subdireccionPlaneacion->id],
            ['nombre' => 'Departamento De Control Escolar', 'parent_id' => $subdireccionPlaneacion->id],

            ['nombre' => 'Departamento De Difusion Y Concertacion', 'parent_id' => $subdireccionVinculacion->id],
            ['nombre' => 'Departamento De Residencias Profesionales Y Servicio Social', 'parent_id' => $subdireccionVinculacion->id],
            ['nombre' => 'Servicio De Orientación Medica', 'parent_id' => $subdireccionVinculacion->id],

            ['nombre' => 'Coordinacion de Transferencia e Innovación', 'parent_id' => $subdireccionPosgrado->id]
        ];

        foreach ($departamentos as $departamento) {
            Areas::create([
                'nombre' => $departamento['nombre'],
                'tipo' => 'Departamento',
                'parent_id' => $departamento['parent_id'],
            ]);
        }

        $divisiones = [
            'Ingeniería Industrial',
            'Ingeniería en Sistemas Computacionales',
            'Ingeniería Electrónica',
            'Ingeniería Electromecánica',
            'Ingeniería Bioquimica',
            'Ingeniería Mecatrónica',
            'Ingeniería en Gestion Empresarial',
            'Ingeniería en Industrias Alimentarias',
            'Ingeniería Civil',
            'Gastronomia',
        ];

        foreach ($divisiones as $division) {
            Areas::create([
                'nombre' => $division,
                'tipo' => 'Division de Carrera',
                'parent_id' => $DivisionesCarrera->id,
            ]);
        }
    }
}
