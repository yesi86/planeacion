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

        // Iniciar una colección vacía para almacenar todos los datos
        $allData = collect();

        // Filtrado por tipo
        if ($filter) {
            switch ($filter) {
                case 'area_superior':
                    $allData = AreaSuperior::when($search, function ($query, $search) {
                        return $query->where('nombre', 'like', '%' . $search . '%');
                    })->get()->map(function ($item) {
                        return [
                            'id' => $item->id,
                            'nombre' => $item->nombre,
                            'tipo' => 'Área Superior',
                        ];
                    });
                    break;
                case 'area_responsable':
                    $allData = AreaResponsable::when($search, function ($query, $search) {
                        return $query->where('nombre', 'like', '%' . $search . '%');
                    })->get()->map(function ($item) {
                        return [
                            'id' => $item->id,
                            'nombre' => $item->nombre,
                            'tipo' => 'Área Responsable',
                        ];
                    });
                    break;
                case 'departamento':
                    $allData = Departamento::when($search, function ($query, $search) {
                        return $query->where('nombre', 'like', '%' . $search . '%');
                    })->get()->map(function ($item) {
                        return [
                            'id' => $item->id,
                            'nombre' => $item->nombre,
                            'tipo' => 'Departamento',
                        ];
                    });
                    break;
                case 'division_carrera':
                    $allData = DivisionCarrera::when($search, function ($query, $search) {
                        return $query->where('nombre', 'like', '%' . $search . '%');
                    })->get()->map(function ($item) {
                        return [
                            'id' => $item->id,
                            'nombre' => $item->nombre,
                            'tipo' => 'División Carrera',
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

        // Si no hay datos, enviar un mensaje flash
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

        $areaSuperiorQuery = AreaSuperior::when($search, function ($query, $search) {
            return $query->where('nombre', 'like', '%' . $search . '%');
        });

        $areaResponsableQuery = AreaResponsable::when($search, function ($query, $search) {
            return $query->where('nombre', 'like', '%' . $search . '%');
        });

        $departamentoQuery = Departamento::when($search, function ($query, $search) {
            return $query->where('nombre', 'like', '%' . $search . '%');
        });

        $divisionCarreraQuery = DivisionCarrera::when($search, function ($query, $search) {
            return $query->where('nombre', 'like', '%' . $search . '%');
        });

        $allData = $allData->merge(
            $areaSuperiorQuery->get()->map(function ($item) {
                return [
                    'id' => $item->id,
                    'nombre' => $item->nombre,
                    'tipo' => 'Área Superior',
                ];
            })
        );
        $allData = $allData->merge(
            $areaResponsableQuery->get()->map(function ($item) {
                return [
                    'id' => $item->id,
                    'nombre' => $item->nombre,
                    'tipo' => 'Área Responsable',
                ];
            })
        );
        $allData = $allData->merge(
            $departamentoQuery->get()->map(function ($item) {
                return [
                    'id' => $item->id,
                    'nombre' => $item->nombre,
                    'tipo' => 'Departamento',
                ];
            })
        );
        $allData = $allData->merge(
            $divisionCarreraQuery->get()->map(function ($item) {
                return [
                    'id' => $item->id,
                    'nombre' => $item->nombre,
                    'tipo' => 'División Carrera',
                ];
            })
        );

        return $allData;
    }
}
