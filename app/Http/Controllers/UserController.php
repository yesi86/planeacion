<?php

namespace App\Http\Controllers;

use App\Models\Areas;
use App\Models\puesto;
use App\Models\User;
use App\Models\Role;
use Illuminate\Auth\Events\Validated;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\DB;

class UserController extends Controller
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
        $order = $request->input('order', 'asc'); // Por defecto 'asc'
        $roleFilter = $request->input('role');

        $query = User::query();

        if ($search) {
            $query->where('name', 'like', "%$search%")
                ->orWhere('email', 'like', "%$search%");
        }

        if ($roleFilter) {
            $query->whereHas('roles', function ($q) use ($roleFilter) {
                $q->where('name', $roleFilter);
            });
        }

        $query->orderBy('name', $order);
        $users = $query->paginate(10)->appends($request->except('page'));;
        $roles = Role::all();
        $areas = Areas::all();
        $puestos = puesto::all();



        return view('users.index', compact('users', 'roles', 'puestos', 'areas'));
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users',
            'password' => 'required|string|min:8|confirmed',
            'role' => 'required|exists:roles,name',
        ]);

        $user = User::create([
            'name' => $validated['name'],
            'email' => $validated['email'],
            'password' => bcrypt($validated['password']),
        ]);
        $user->assignRole($validated['role']);

        return redirect()->route('users.index')->with('success', 'Usuario creado correctamente');
    }
    public function add(Request $request, $id)
    {
        $validate = $request->validate([
            'area_id' => 'nullable|exists:areas,id',
            'puesto_id' => 'nullable|exists:puesto,id',
        ]);

        $user = User::findOrFail($id);
        $isUpdated = false;

        if (!empty($validate['area_id']) && $user->area_id != $validate['area_id']) {
            $user->area_id = $validate['area_id'];
            $isUpdated = true;
        }
        if (!empty($validate['puesto_id']) && $user->puesto_id != $validate['puesto_id']) {
            $user->puesto_id = $validate['puesto_id'];
            $isUpdated = true;
        }

        if ($isUpdated) {
            $user->save();
            return redirect()->route('users.index')
                ->with('success', 'Área y puesto asignados correctamente');
        } else {
            return redirect()->route('users.index')
                ->with('info', 'no se realizó ninguna operacion');
        }
    }
    public function update(Request $request, $id)
    {
        try {
            $validated = $request->validate([
                'name' => 'required|string|max:255',
                'role' => 'required|exists:roles,name',
            ]);

            $user = User::findOrFail($id);

            if ($user->name === $validated['name'] && $user->roles->first()->name === $validated['role']) {
                return redirect()->route('users.index')->with('info', 'No se realizó ningún cambio.');
            }

            $user->name = $validated['name'];

            if ($user->roles->first()->name !== $validated['role']) {
                $user->roles()->detach();
                $user->assignRole($validated['role']);
            }

            $user->save();

            return redirect()->route('users.index')->with('success', 'Usuario actualizado correctamente.');
        } catch (\Exception $e) {
            return redirect()->route('users.index')->with('error', 'Ocurrió un error al actualizar: ' . $e->getMessage());
        }
    }
    public function destroy($id)
    {
        $delete = User::findOrFail($id);
        try {
            $delete->delete();
            return redirect()->route('users.index')->with('success', 'usuario Eliminado exitosamente');
        } catch (\Exception $e) {
            return redirect()->route('users.index')->with('error', 'Error al eliminar el puesto.');
        }
    }
}
