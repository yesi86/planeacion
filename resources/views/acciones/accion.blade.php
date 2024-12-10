@extends('layouts.app')

@section('content')
<div class="max-w-4xl mx-auto bg-white shadow-md rounded p-6">
    <div>
        <div class="flex-grow">
            <h1 class="w-full text-2xl font-semibold mb-4">Modulo de Planeación</h1>
        </div>
        <div>
            <h2 style="font-size: 18px;" class="font-semibold">Seleccionar objetivo</h2>
            <section>
                <select name="objetivo" id="objetivo" class="w-full px-4 py-2 border border-gray-300 rounded" required>
                    <option value="" disabled selected>Seleccione un objetivo</option>
                    @forelse ($objetivos as $obj)
                        <option value="{{ $obj->id }}">{{ $obj->objetivo }} - ${{ number_format($obj->monto_asignado, 2) }}</option>
                    @empty
                        <option value="" disabled>No hay objetivos disponibles</option>
                    @endforelse
                </select>
            </section>
        </div>
        
        <!-- <div>
            <h2 style="font-size: 18px;" class="font-semibold">Seleccionar objetivo</h2>
            <section >
                <select name="objetivo" id="objetivo" class="w-full px-4 py-2 border border-gray-300 rounded" required>
                    <option value="" disabled selected>Seleccione un objetivo</option>
                    <option value="op1">Aumentar el porcentaje de ventas en un mercado determinado en un lapso de tiempo.</option>
                    <option value="op2">Lograr más conversiones en los canales digitales en un lapso de tiempo.</option>
                    <option value="op3">Convertirse en un referente del rubro en una región determinada en un lapso de tiempo.</option>
                </select>
                              
            </section>     
        </div> -->
        <div>
            <div class="p-2">
                <h2 style="font-size: 18px;" class="font-semibold">Acciones</h2>
                <div class="mt-2 flex flex-col space-y-4">
                    <!-- Menú desplegable -->
                    <div>
                        <select name="acciones" id="acciones" class="w-full px-4 py-2 border border-gray-300 rounded">
                            <option value="" disabled selected>Seleccione una acción</option>
                            @forelse ($acciones as $acc)
                                <option value="{{ $acc->id }}">{{ $acc->accion }}</option>
                            @empty
                                <option value="" disabled>No hay acciones disponibles</option>
                            @endforelse
                        </select>
                    </div>
            
                    <!-- Botón para abrir el modal -->
                    <div>
                        <button data-modal-toggle="AgregarAccionModal" class="px-6 py-3 bg-blue-500 text-blue font-semibold rounded-md shadow hover:bg-blue-600 focus:outline-none focus:ring-2 focus:ring-blue-400">
                            <i class="fas fa-plus"></i>
                            <span>Agregar Acción</span>
                        </button>
                    </div>
                </div>
            </div>
            <div class="p-2">
                <h2 style="font-size: 18px;" class="font-semibold">Actividades</h2>
                <div class="mt-2 flex ">
                    <button data-modal-toggle="AgregarActividadModal" class="px-6 py-3 bg-blue-500 text-blue font-semibold rounded-md shadow hover:bg-blue-600 focus:outline-none focus:ring-2 focus:ring-blue-400">
                        <i class="fas fa-plus"></i>
                        <span>Agregar Actividad</span>
                    </button>
                </div>
            </div>
            <div class="p-2">
                <h2 style="font-size: 18px;" class="font-semibold">Insumos</h2>
                <div class="mt-2 flex ">
                    <button data-modal-toggle="AgregarInsumoModal" class="px-6 py-3 bg-blue-500 text-blue font-semibold rounded-md shadow hover:bg-blue-600 focus:outline-none focus:ring-2 focus:ring-blue-400">
                        <i class="fas fa-plus"></i>
                        <span>Agregar Insumos</span>
                    </button>
                </div>
            </div>
        </div>
    </div>
        
</div>

@endsection


@section('style') 
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/flatpickr/dist/flatpickr.min.css">
<script src="https://cdn.jsdelivr.net/npm/flatpickr"></script>
<link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
<link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css" rel="stylesheet">

<script>
        document.addEventListener('DOMContentLoaded', function() {
            // Inicializar flatpickr en los campos
            flatpickr("#fecha1", {
                allowInput: true, // Permite escribir la fecha o seleccionar del calendario
                dateFormat: "Y-m-d" // Formato de fecha
            });
            flatpickr("#fecha2", {
                allowInput: true, // Permite escribir la fecha o seleccionar del calendario
                dateFormat: "Y-m-d" // Formato de fecha
            });
        });
    </script>

@endsection

@include('components.modals.modalaccion')
@include('components.modals.modalactividad')
@include('components.modals.modalinsumos')