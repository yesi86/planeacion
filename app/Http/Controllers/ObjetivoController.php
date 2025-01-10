<?php


namespace App\Http\Controllers;

use App\Models\Objetivo;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ObjetivoController extends Controller
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
        $order = $request->input('order', 'asc');
        $filter = $request->input('filter'); // Filtro de tipo de área

        // Consulta base para obtener los objetivos
        $query = Objetivo::query()->with('areas'); // Relación con la tabla pivote

        // Filtro por búsqueda
        if ($search) {
            $query->where(function ($q) use ($search) {
                $q->where('Folio', 'like', "%$search%")
                    ->orWhere('descripcion', 'like', "%$search%");
            });
        }

        // Filtro por tipo de área (usando la tabla pivote `objetivo_areas`)
        if ($filter) {
            $query->whereHas('areas', function ($q) use ($filter) {
                // Realizamos un solo join con un alias único
                $q->join('objetivo_areas as oa', 'oa.objetivo_id', '=', 'objetivo.id')
                    ->where('oa.tipo', $filter);
            });
        }

        // Ordenar por Folio
        $query->orderBy('Folio', $order);

        // Obtener resultados paginados
        $objetivos = $query->paginate(10);

        // Verificar si no hay registros con el filtro aplicado
        if ($filter && $objetivos->isEmpty()) {
            session()->flash('error', 'No se encontraron registros con el filtro aplicado.');
        }

        return view('objetivos.index', compact('objetivos', 'filter'));
    }
}
