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
                    break;
                default:
                    $allData = $this->fetchAllData($search);
                    break;
            }
        } else {
            $allData = $this->fetchAllData($search);
        }

        // Si no hay datos, redirigir con mensaje de error
        if ($allData->isEmpty()) {
            return redirect()->route('areas.index')->with('error', 'No se encontraron resultados para tu búsqueda.');
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

    // Función auxiliar para obtener todos los datos sin filtro de tipo
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

        $allData = $allData->merge(
            $areaSuperiorQuery->get()->map(function ($item) {
                return [
                    'id' => $item->id,
                    'nombre' => $item->nombre,
                    'tipo' => 'Área Superior',
                    'areas_responsables' => $item->areasResponsables, // Áreas responsables
                ];
            })
        );
        $allData = $allData->merge(
            $areaResponsableQuery->get()->map(function ($item) {
                return [
                    'id' => $item->id,
                    'nombre' => $item->nombre,
                    'tipo' => 'Área Responsable',
                    'area_superior' => $item->areaSuperior, // Área superior
                    'departamentos' => $item->departamentos, // Departamentos
                ];
            })
        );
        $allData = $allData->merge(
            $departamentoQuery->get()->map(function ($item) {
                return [
                    'id' => $item->id,
                    'nombre' => $item->nombre,
                    'tipo' => 'Departamento',
                    'area_responsable' => $item->areaResponsable, // Área responsable
                    'divisiones_carrera' => $item->divisionesCarrera, // Divisiones carrera
                ];
            })
        );
        $allData = $allData->merge(
            $divisionCarreraQuery->get()->map(function ($item) {
                return [
                    'id' => $item->id,
                    'nombre' => $item->nombre,
                    'tipo' => 'División Carrera',
                    'departamento' => $item->departamento, // Departamento
                ];
            })
        );

        return $allData;
    }
}
