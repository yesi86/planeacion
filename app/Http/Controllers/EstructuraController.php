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

        // Genera las consultas para cada tabla
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

        // Combina todos los resultados con el campo 'tipo'
        $allData = collect();

        // Agregar datos de las diferentes áreas
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

        // Paginación manual
        $paginatedData = new LengthAwarePaginator(
            $allData->forPage($currentPage, $perPage),
            $allData->count(),
            $perPage,
            $currentPage,
            ['path' => $request->url(), 'query' => $request->query()]
        );

        // Retornar la vista con el paginador
        return view('estructura.index', [
            'data' => $paginatedData,
            'search' => $search,
            'filter' => $filter,
        ]);
    }
}
