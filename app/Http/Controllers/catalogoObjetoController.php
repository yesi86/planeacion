<?php

namespace App\Http\Controllers;

use App\Models\ObjetoGasto;
use Illuminate\Validation\Rule;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use PhpParser\Node\Expr\Cast\Object_;

class catalogoObjetoController extends Controller
{
    public function index(Request $request)
    {
        /** @var \App\Models\User|null $user */
        $user = Auth::user();

        if (!$user->hasRole('SuperAdministrador')) {
            if ($user->hasRole('Administrador')) {
                return redirect()->route('admin')
                    ->with('alert', 'No tienes permisos para acceder a esta página');
            }
            return redirect()->route('general')
                ->with('alert', 'No tienes permisos para acceder a esta página');
        }
        $search = $request->input('search');
        $order = $request->input('order', 'asc');
        $capituloFilter = $request->input('capitulo');

        $query = ObjetoGasto::query();

        if ($search) {
            $query->where('capitulo', 'like', "%$search%")
                ->orWhere('partida', 'like', "%$search%")
                ->orWhere('descripcion', 'like', "%$search%");
        }

        if ($capituloFilter) {
            $query->where('capitulo', $capituloFilter);
        }

        $query->orderBy('capitulo', $order);

        $objetoGasto = $query->paginate(35)->appends($request->except('page'));

        $capitulos = ObjetoGasto::distinct()->pluck('capitulo')->toArray();

        return view('objetoGasto.index', compact('objetoGasto', 'capitulos'));
    }

    public function store(Request $request)
    {
        $validate = $request->validate([
            'capitulo' => 'required|string|max:50',
            'partida' => 'required|string|max:50',
            'descripcion' => 'required|string|max:255',
        ]);

        try {
            $existe = ObjetoGasto::where('capitulo', $validate['capitulo'])
                ->where('partida', $validate['partida'])
                ->exists();

            if ($existe) {
                throw new \Exception('Ya existe una partida con este capítulo.');
            }

            $objetoGasto = new ObjetoGasto();
            $objetoGasto->capitulo = $validate['capitulo'];
            $objetoGasto->partida = $validate['partida'];
            $objetoGasto->descripcion = $validate['descripcion'];
            $objetoGasto->save();

            return redirect()->route('objeto.index')
                ->with('success', 'El objeto de gasto se creó exitosamente.');
        } catch (\Exception $e) {
            return redirect()->route('objeto.index')
                ->with('error', 'Ocurrió un error: ' . $e->getMessage());
        }
    }
    public function destroy($id)
    {
        $delete = ObjetoGasto::findOrFail($id);
        try {
            $delete->delete();
            return redirect()->route('objeto.index')->with('success', 'Objeto Eliminado exitosamente');
        } catch (\Exception $e) {
            return redirect()->route('objeto.index')->with('error', 'Error al eliminar el puesto.');
        }
    }
}
