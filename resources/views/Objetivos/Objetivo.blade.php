@extends('layouts.app') 

@section('content')

<div class="max-w-4xl mx-auto bg-white shadow-md rounded p-6">
    <div class="flex space-x-4">
        <div class="flex-grow">
            <h4 class="w-full text-2xl font-semibold mb-4">Objetivos</h4>
            <input type="text" id="campo1" name="campo1" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500 sm:text-sm" placeholder="Ingresa un objetivo de planeacion">
        </div>
        <div class="w-1/3">
            <h4 class="text-2xl font-semibold mb-4">Monto asignado</h4>
            <input type="text" id="campo2" name="campo2" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500 sm:text-sm" placeholder="$$">
        </div>
    </div>
    <div class="mt-6 flex justify-end">
        <button type="button" class="px-6 py-3 bg-blue-500 text-blue font-semibold rounded-md shadow hover:bg-blue-600 focus:outline-none focus:ring-2 focus:ring-blue-400">
            <i class="fas fa-plus"></i>
            <span>Añadir</span>
        </button>
    </div>
    <div class="mt-2 space-y-4">
        <h4 class="text-2xl font-semibold tracking-wider mb-4">Techo presupuestal</h4>
        <div class="flex space-x-4">
            <div class="w-1/3">
                <label for="techo1">Techo 1</label>
                <input type="text" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500 sm:text-sm" placeholder="techo 1">
            </div>
            <div class="w-1/3">
                <label for="techo2">Techo 2</label>
                <input type="text" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500 sm:text-sm" placeholder="techo 2">
            </div>
            <div class="w-1/3">
                <label for="techo3">Techo 3</label>
                <input type="text" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500 sm:text-sm" placeholder="techo 3">
            </div>
        </div>
    </div>
    <div class="mt-4">
        <h4 class="text-2xl font-semibold tracking-wider mb-4">Lista de Objetivos</h4>
        <div class="flex space-x-4">
            <div class="flex-grow">
                <input type="text" id="campo1" name="campo1" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500 sm:text-sm" placeholder="Ingresa un objetivo de planeacion">
            </div>
            <div class="w-1/3">
                <input type="text" id="campo2" name="campo2" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500 sm:text-sm" placeholder="$$">
            </div>
        </div>
    </div>
    <div class="mt-6 flex justify-end">
        <button type="button" class="px-6 py-3 bg-red-500 text-blue font-semibold rounded-md shadow 
            hover:bg-red-600 focus:outline-none focus:ring-2 focus:ring-red-400 transition duration-200 ease-in-out">
            Finalizar
        </button>
    </div>
</div>

@endsection

@section('style')
<link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
<link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css" rel="stylesheet">

@endsection

