<?php

namespace App\Http\Controllers;

use App\Models\AreaSuperior;
use App\Models\AreaResponsable;
use App\Models\Departamento;
use App\Models\DivisionCarrera;
use Illuminate\Http\Request;
use Illuminate\Pagination\LengthAwarePaginator;
use Illuminate\Support\Facades\Auth;


class EstructuraController extends Controller
{
    public function index(Request $request)
    {
        /** @var \App\Models\User|null $user */
        $user = Auth::user();

        if (!$user->hasRole('SuperAdministrador')) {
            return redirect()->route('dashboard')
                ->with('alert', 'No tienes permisos para acceder a esta página');
        }

        $search = $request->input('search');
        $filter = $request->input('filter', 'area_superior');
        $perPage = 10;
        $currentPage = $request->input('page', 1);
        $allData = collect();

        $areasSuperiores = AreaSuperior::all();
        $areasResponsables = AreaResponsable::all();
        $departamento = Departamento::all();

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
                                'tipo' => 'Superior',
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
                                'tipo' => 'Responsable',
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
                                'tipo' => 'Division Carrera',
                                'departamento' => $item->departamento, // Departamento asociado
                            ];
                        });
                    break;
                default:
                    $allData = $this->fetchAllData($search);
                    break;
            }
        } else {
            if ($search) {
                $allData = $this->fetchAllData($search);
            } else {
                $allData = AreaSuperior::with('areasResponsables') // Cargar las áreas responsables
                    ->when($search, function ($query, $search) {
                        return $query->where('nombre', 'like', '%' . $search . '%');
                    })->get()->map(function ($item) {
                        return [
                            'id' => $item->id,
                            'nombre' => $item->nombre,
                            'tipo' => 'Superior',
                            'areas_responsables' => $item->areasResponsables, // Agregar las áreas responsables
                        ];
                    });
            }
        }

        // Paginación manual
        $paginatedData = new LengthAwarePaginator(
            $allData->forPage($currentPage, $perPage),
            $allData->count(),
            $perPage,
            $currentPage,
            ['path' => $request->url(), 'query' => $request->query()]
        );

        // dd($departamento);
        return view('estructura.index', [
            'data' => $paginatedData,
            'search' => $search,
            'filter' => $filter,
            // casos para combobox
            'areasSuperiores' => $areasSuperiores,
            'areasResponsables' => $areasResponsables,
            'departamento' => $departamento,
        ]);
    }


    private function fetchAllData($search)
    {
        $allData = collect();

        // Consultas para obtener los datos
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
                    'tipo' => 'Superior',
                    'areas_responsables' => $item->areasResponsables->map(function ($areaResponsable) {
                        return [
                            'id' => $areaResponsable->id,
                            'nombre' => $areaResponsable->nombre,
                        ];
                    }),
                ];
            })
        );

        // Área Responsable
        $allData = $allData->merge(
            $areaResponsableQuery->get()->map(function ($item) {
                return [
                    'id' => $item->id,
                    'nombre' => $item->nombre,
                    'tipo' => 'Responsable',
                    'area_superior' => $item->areaSuperior ? [
                        'id' => $item->areaSuperior->id,
                        'nombre' => $item->areaSuperior->nombre,
                    ] : null,
                    'departamentos' => $item->departamentos->map(function ($departamento) {
                        return [
                            'id' => $departamento->id,
                            'nombre' => $departamento->nombre,
                        ];
                    }),
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
                    ] : null,
                    'divisiones_carrera' => $item->divisionesCarrera->map(function ($divisionCarrera) {
                        return [
                            'id' => $divisionCarrera->id,
                            'nombre' => $divisionCarrera->nombre,
                        ];
                    }),
                ];
            })
        );

        // División Carrera
        $allData = $allData->merge(
            $divisionCarreraQuery->get()->map(function ($item) {
                return [
                    'id' => $item->id,
                    'nombre' => $item->nombre,
                    'tipo' => 'Division Carrera',
                    'departamento' => $item->departamento ? [
                        'id' => $item->departamento->id,
                        'nombre' => $item->departamento->nombre,
                    ] : null,
                ];
            })
        );

        return $allData;
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'name' => 'required|max:255',
        ]);

        $item = null; //tiene que estar en null para que tenga nuevos datos
        //lo puse así para que no tenga error nullpointer

        switch ($request->input('tipo')) {
            case 'Superior':
                $item = AreaSuperior::findOrFail($id);
                break;
            case 'Responsable':
                $item = AreaResponsable::findOrFail($id);
                break;
            case 'Departamento':
                $item = Departamento::findOrFail($id);
                break;
            case 'Division Carrera':
                $item = DivisionCarrera::findOrFail($id);
                break;
            default:
                return redirect()->route('areas.index')->with('error', 'Tipo no válido.');
        }

        $item->update(['nombre' => $request->input('name')]);

        return redirect()->route('areas.index')->with('success', 'Área actualizada exitosamente.');
    }
    public function destroy(Request $request, $id)
    {
        try {
            $item = match ($request->input('tipo')) {
                'Superior' => AreaSuperior::findOrFail($id),
                'Responsable' => AreaResponsable::findOrFail($id),
                'Departamento' => Departamento::findOrFail($id),
                'Division Carrera' => DivisionCarrera::findOrFail($id),
                default => null,
            };

            if (!$item) {
                return redirect()->back()->with('error', 'Tipo no válido.');
            }

            $item->delete();

            return redirect()->route('areas.index')->with('success', 'Elemento eliminado correctamente.');
        } catch (\Exception $e) {
            return redirect()->route('areas.index')->with('error', 'Error al eliminar el elemento: ' . $e->getMessage());
        }
    }

    public function store(Request $request)
    {
        // dd($request->all());
        $request->validate([
            'name' => 'required|max:255',
            'tipo' => 'required',
        ]);

        switch ($request->input('tipo')) {
            case 'area_superior':
                AreaSuperior::create([
                    'nombre' => $request->input('name'),
                ]);
                break;

            case 'area_responsable':
                $request->validate([
                    'area_superior' => 'required|exists:area_superior,id',
                ]);

                AreaResponsable::create([
                    'nombre' => $request->input('name'),
                    'area_superior_id' => $request->input('area_superior'),
                ]);
                break;

            case 'departamento':
                $request->validate([
                    'area_responsable' => 'required|exists:area_responsable,id',
                ]);

                Departamento::create([
                    'nombre' => $request->input('name'),
                    'area_responsable_id' => $request->input('area_responsable'),
                ]);
                break;

            case 'division_carrera':

                $departamento = Departamento::where('nombre', 'Divisiones de Carrera')->first();
                if (!$departamento) {
                    return redirect()->route('areas.index')->with('error', 'No existe el departamento Divisiones de Carrera, favor de crearlo');
                }

                DivisionCarrera::create([
                    'nombre' => $request->input('name'),
                    'departamento_id' => $departamento->id,
                ]);

                // dd($departamento->id);
                break;

            default:
                return redirect()->route('areas.index')->with('error', 'Tipo no válido.');
        }

        return redirect()->route('areas.index')->with('success', 'Área creada exitosamente.');
    }
}
