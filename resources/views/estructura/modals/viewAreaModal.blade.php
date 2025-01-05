<!-- Modal Ver Área -->
<div id="viewAreaModal-{{ $item['id'] }}" class="fixed inset-0 z-50 flex items-center justify-center bg-gray-900 bg-opacity-50 hidden">
    <div class="bg-white p-6 rounded-lg shadow-lg w-96">
        <h3 class="text-xl font-semibold mb-4"> {{ $item['nombre'] }}</h3>

        <!-- Tabla de detalles -->
        <table class="table-auto w-full border-collapse border border-gray-200">
            <tbody>
                <!-- Área Superior -->
                <tr>
                    <td class="font-semibold py-2 px-4 border-b">Área Superior:</td>
                    <td class="py-2 px-4 border-b">
                        @if ($item instanceof App\Models\AreaSuperior)
                            Ninguna (Esta es un área superior)
                        @elseif ($item instanceof App\Models\AreaResponsable)
                            {{ $item->areaSuperior ? $item->areaSuperior->nombre : 'Ninguna' }}
                        @elseif ($item instanceof App\Models\Departamento)
                            {{ $item->areaResponsable->areaSuperior ? $item->areaResponsable->areaSuperior->nombre : 'Ninguna' }}
                        @elseif ($item instanceof App\Models\DivisionCarrera)
                            {{ $item->departamento->areaResponsable->areaSuperior ? $item->departamento->areaResponsable->areaSuperior->nombre : 'Ninguna' }}
                        @else
                            Ninguna
                        @endif
                    </td>
                </tr>

                <!-- Áreas Responsables -->
                <tr>
                    <td class="font-semibold py-2 px-4 border-b">Áreas Responsables:</td>
                    <td class="py-2 px-4 border-b">
                        @if ($item instanceof App\Models\AreaSuperior)
                            @if($item->areasResponsables->isEmpty())
                                Ninguna
                            @else
                                <ul class="list-disc pl-5">
                                    @foreach ($item->areasResponsables as $areaResponsable)
                                        <li>{{ $areaResponsable->nombre }}</li>
                                    @endforeach
                                </ul>
                            @endif
                        @else
                            Ninguna
                        @endif
                    </td>
                </tr>

                <!-- Departamentos -->
                <tr>
                    <td class="font-semibold py-2 px-4 border-b">Departamentos:</td>
                    <td class="py-2 px-4 border-b">
                        @if ($item instanceof App\Models\AreaResponsable)
                            @if($item->departamentos->isEmpty())
                                Ninguno
                            @else
                                <ul class="list-disc pl-5">
                                    @foreach ($item->departamentos as $departamento)
                                        <li>{{ $departamento->nombre }}</li>
                                    @endforeach
                                </ul>
                            @endif
                        @elseif ($item instanceof App\Models\Departamento)
                            Ninguno
                        @else
                            Ninguno
                        @endif
                    </td>
                </tr>

                <!-- Divisiones de Carrera -->
                <tr>
                    <td class="font-semibold py-2 px-4 border-b">Divisiones de Carrera:</td>
                    <td class="py-2 px-4 border-b">
                        @if ($item instanceof App\Models\Departamento)
                            @if($item->divisionesCarrera->isEmpty())
                                Ninguno
                            @else
                                <ul class="list-disc pl-5">
                                    @foreach ($item->divisionesCarrera as $divisionCarrera)
                                        <li>{{ $divisionCarrera->nombre }}</li>
                                    @endforeach
                                </ul>
                            @endif
                        @elseif ($item instanceof App\Models\DivisionCarrera)
                            Ninguna
                        @else
                            Ninguna
                        @endif
                    </td>
                </tr>
            </tbody>
        </table>

        <div class="flex justify-between items-center mt-4">
            <button type="button" data-modal-toggle="viewAreaModal-{{ $item['id'] }}" class="bg-gray-500 text-white py-2 px-4 rounded hover:bg-gray-600 closeModalButton">
                Cerrar
            </button>
        </div>
    </div>
</div>
