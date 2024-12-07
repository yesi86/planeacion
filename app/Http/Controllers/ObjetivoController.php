<?php

namespace App\Http\Controllers;

use App\Models\Objetivo;
use Illuminate\Http\Request;

class ObjetivoController extends Controller
{
    public function index()
    {
        $objetivos = Objetivo::all();
        $queue = session('objetivos', []); // Cola de objetivos en sesión
        return view('objetivos.objetivo', compact('objetivos', 'queue'));
    }

    public function addToQueue(Request $request)
    {
        $objetivo = $request->input('campo1');
        $monto = $request->input('campo2');

        if (!$objetivo || !$monto) {
            return response()->json(['error' => 'Faltan campos'], 400);
        }

        // Obtener la cola de la sesión y añadir el nuevo objetivo
        $queue = session('objetivos', []);
        $queue[] = ['objetivo' => $objetivo, 'monto_asignado' => $monto];

        session(['objetivos' => $queue]);

        return response()->json(['queue' => $queue]);
    }

    public function store(Request $request)
    {
        $queue = session('objetivos', []);

        foreach ($queue as $item) {
            Objetivo::create([
                'objetivo' => $item['objetivo'],
                'monto_asignado' => $item['monto_asignado']
            ]);
        }

        session()->forget('objetivos'); // Limpiar la cola después de guardar

        return redirect()->route('objetivos.index')->with('success', 'Objetivos guardados correctamente.');
    }

    public function getQueue()
    {
        $queue = session('objetivos', []);
        return response()->json(['queue' => $queue]);
    }
}
