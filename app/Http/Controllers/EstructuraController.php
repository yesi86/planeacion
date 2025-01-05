<?php

namespace App\Http\Controllers;

use App\Models\AreaSuperior;
use App\Models\AreaResponsable;
use App\Models\Departamento;
use App\Models\DivisionCarrera;
use Illuminate\Http\Request;
use Illuminate\Pagination\LengthAwarePaginator;

class EstructuraController extends Controller
{
    public function index(Request $request)
    {
        $search = $request->input('search');
        $filter = $request->input('filter');
        $perPage = 10;
        $currentPage = $request->input('page', 1);
        $allData = collect();

        // Filtrado por tipo
        if ($filter) {
            switch ($filter) {
                case 'area_superior':
                    $allData = AreaSuperior::with('areasResponsables') // Cargar las áreas responsables
                        ->when($search, function ($query, $search) {
                            return $query->where('nombre', 'like', '%' . $search . '%');
                        })->get()->map(function ($item) {
                            return [
                                'id' => $item->id,
                                'nombre' => $item->nombre,
                                'tipo' => 'Área Superior',
                                'areas_responsables' => $item->areasResponsables, // Agregar las áreas responsables
                            ];
                        });
                    // dd($allData); // Aquí hacemos el dd
                    break;
                case 'area_responsable':
                    $allData = AreaResponsable::with('areaSuperior', 'departamentos') // Cargar área superior y departamentos
                        ->when($search, function ($query, $search) {
                            return $query->where('nombre', 'like', '%' . $search . '%');
                        })->get()->map(function ($item) {
                            return [
                                'id' => $item->id,
                                'nombre' => $item->nombre,
                                'tipo' => 'Área Responsable',
                                'area_superior' => $item->areaSuperior, // Área superior asociada
                                'departamentos' => $item->departamentos, // Departamentos asociados
                            ];
                        });
                    // dd($allData); // Aquí también hacemos el dd
                    break;
                case 'departamento':
                    $allData = Departamento::with('areaResponsable', 'divisionesCarrera') // Cargar área responsable y divisiones
                        ->when($search, function ($query, $search) {
                            return $query->where('nombre', 'like', '%' . $search . '%');
                        })->get()->map(function ($item) {
                            return [
                                'id' => $item->id,
                                'nombre' => $item->nombre,
                                'tipo' => 'Departamento',
                                'area_responsable' => $item->areaResponsable, // Área responsable asociada
                                'divisiones_carrera' => $item->divisionesCarrera, // Divisiones asociadas
                            ];
                        });
                    // dd($allData); // Aquí también hacemos el dd
                    break;
                case 'division_carrera':
                    $allData = DivisionCarrera::with('departamento') // Cargar departamento
                        ->when($search, function ($query, $search) {
                            return $query->where('nombre', 'like', '%' . $search . '%');
                        })->get()->map(function ($item) {
                            return [
                                'id' => $item->id,
                                'nombre' => $item->nombre,
                                'tipo' => 'División Carrera',
                                'departamento' => $item->departamento, // Departamento asociado
                            ];
                        });
                    // dd($allData); // Aquí también hacemos el dd
                    break;
                default:
                    $allData = $this->fetchAllData($search);
                    // dd($allData); // Aquí también hacemos el dd
                    break;
            }
        } else {
            $allData = $this->fetchAllData($search);
            // dd($allData); // Aquí también hacemos el dd
        }

        // Paginación manual
        $paginatedData = new LengthAwarePaginator(
            $allData->forPage($currentPage, $perPage),
            $allData->count(),
            $perPage,
            $currentPage,
            ['path' => $request->url(), 'query' => $request->query()]
        );

        return view('estructura.index', [
            'data' => $paginatedData,
            'search' => $search,
            'filter' => $filter,
        ]);
    }


    private function fetchAllData($search)
    {
        $allData = collect();

        $areaSuperiorQuery = AreaSuperior::with('areasResponsables')->when($search, function ($query, $search) {
            return $query->where('nombre', 'like', '%' . $search . '%');
        });

        $areaResponsableQuery = AreaResponsable::with('areaSuperior', 'departamentos')->when($search, function ($query, $search) {
            return $query->where('nombre', 'like', '%' . $search . '%');
        });

        $departamentoQuery = Departamento::with('areaResponsable', 'divisionesCarrera')->when($search, function ($query, $search) {
            return $query->where('nombre', 'like', '%' . $search . '%');
        });

        $divisionCarreraQuery = DivisionCarrera::with('departamento')->when($search, function ($query, $search) {
            return $query->where('nombre', 'like', '%' . $search . '%');
        });

        // Área Superior
        $allData = $allData->merge(
            $areaSuperiorQuery->get()->map(function ($item) {
                return [
                    'id' => $item->id,
                    'nombre' => $item->nombre,
                    'tipo' => 'Área Superior',
                    'areas_responsables' => $item->areasResponsables->map(function ($areaResponsable) {
                        return [
                            'id' => $areaResponsable->id,
                            'nombre' => $areaResponsable->nombre,
                        ];
                    }), // Extrae solo los atributos necesarios de las áreas responsables
                ];
            })
        );

        // Área Responsable
        $allData = $allData->merge(
            $areaResponsableQuery->get()->map(function ($item) {
                return [
                    'id' => $item->id,
                    'nombre' => $item->nombre,
                    'tipo' => 'Área Responsable',
                    'area_superior' => $item->areaSuperior ? [
                        'id' => $item->areaSuperior->id,
                        'nombre' => $item->areaSuperior->nombre,
                    ] : null, // Extrae solo los atributos necesarios del área superior
                    'departamentos' => $item->departamentos->map(function ($departamento) {
                        return [
                            'id' => $departamento->id,
                            'nombre' => $departamento->nombre,
                        ];
                    }), // Extrae solo los atributos necesarios de los departamentos
                ];
            })
        );

        // Departamento
        $allData = $allData->merge(
            $departamentoQuery->get()->map(function ($item) {
                return [
                    'id' => $item->id,
                    'nombre' => $item->nombre,
                    'tipo' => 'Departamento',
                    'area_responsable' => $item->areaResponsable ? [
                        'id' => $item->areaResponsable->id,
                        'nombre' => $item->areaResponsable->nombre,
                    ] : null, // Extrae solo los atributos necesarios del área responsable
                    'divisiones_carrera' => $item->divisionesCarrera->map(function ($divisionCarrera) {
                        return [
                            'id' => $divisionCarrera->id,
                            'nombre' => $divisionCarrera->nombre,
                        ];
                    }), // Extrae solo los atributos necesarios de las divisiones carrera
                ];
            })
        );

        // División Carrera
        $allData = $allData->merge(
            $divisionCarreraQuery->get()->map(function ($item) {
                return [
                    'id' => $item->id,
                    'nombre' => $item->nombre,
                    'tipo' => 'División Carrera',
                    'departamento' => $item->departamento ? [
                        'id' => $item->departamento->id,
                        'nombre' => $item->departamento->nombre,
                    ] : null, // Extrae solo los atributos necesarios del departamento
                ];
            })
        );

        return $allData;
    }
}
