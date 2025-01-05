<!-- Modal View -->
<div id="viewAreaModal-{{ $item['id'] }}" class="fixed inset-0 z-50 flex items-center justify-center bg-gray-900 bg-opacity-50 hidden">
    <div class="bg-white p-6 rounded-lg shadow-lg w-96">
        <h3 class="text-xl font-semibold mb-4">Detalles del Área: {{ $item['nombre'] }}</h3>

        <!-- Tabla de detalles -->
        <table class="table-auto w-full border-collapse border border-gray-200">
            <tbody>
                <!-- Tipo de Área -->
                <tr>
                    <td class="font-semibold py-2 px-4 border-b">Tipo de Área:</td>
                    <td class="py-2 px-4 border-b">{{ $item['tipo'] }}</td>
                </tr>

                <!-- Mostrar información dependiendo del tipo de área -->
                @if($item['tipo'] == 'Área Superior')
                    <tr>
                        <td class="font-semibold py-2 px-4 border-b">Áreas Responsables:</td>
                        <td class="py-2 px-4 border-b">
                            @if($item['areas_responsables']->isEmpty())
                                Ninguna
                            @else
                                <ul class="list-disc pl-5">
                                    @foreach($item['areas_responsables'] as $areaResponsable)
                                        <li>{{ $areaResponsable['nombre'] }}</li>
                                    @endforeach
                                </ul>
                            @endif
                        </td>
                    </tr>
                @elseif($item['tipo'] == 'Área Responsable')
                    <tr>
                        <td class="font-semibold py-2 px-4 border-b">Área Superior:</td>
                        <td class="py-2 px-4 border-b">{{ $item['area_superior']['nombre'] ?? 'N/A' }}</td>
                    </tr>
                    <tr>
                        <td class="font-semibold py-2 px-4 border-b">Departamentos:</td>
                        <td class="py-2 px-4 border-b">
                            @if($item['departamentos']->isEmpty())
                                Ninguno
                            @else
                                <ul class="list-disc pl-5">
                                    @foreach($item['departamentos'] as $departamento)
                                        <li>{{ $departamento['nombre'] }}</li>
                                    @endforeach
                                </ul>
                            @endif
                        </td>
                    </tr>
                @elseif($item['tipo'] == 'Departamento')
                    <tr>
                        <td class="font-semibold py-2 px-4 border-b">Área Responsable:</td>
                        <td class="py-2 px-4 border-b">{{ $item['area_responsable']['nombre'] ?? 'N/A' }}</td>
                    </tr>
                    <tr>
                        <td class="font-semibold py-2 px-4 border-b">Divisiones de Carrera:</td>
                        <td class="py-2 px-4 border-b">
                            @if($item['divisiones_carrera']->isEmpty())
                                Ninguno
                            @else
                                <ul class="list-disc pl-5">
                                    @foreach($item['divisiones_carrera'] as $division)
                                        <li>{{ $division['nombre'] }}</li>
                                    @endforeach
                                </ul>
                            @endif
                        </td>
                    </tr>
                @elseif($item['tipo'] == 'División Carrera')
                    <tr>
                        <td class="font-semibold py-2 px-4 border-b">Departamento:</td>
                        <td class="py-2 px-4 border-b">{{ $item['departamento']['nombre'] ?? 'N/A' }}</td>
                    </tr>
                @endif
            </tbody>
        </table>

        <!-- Botón de cerrar con la clase correcta -->
        <div class="flex justify-between items-center mt-4">
            <button type="button" data-modal-toggle="viewAreaModal-{{ $item['id'] }}" class="bg-gray-500 text-white py-2 px-4 rounded hover:bg-gray-600 closeModalButton">
                Cerrar
            </button>
        </div>
    </div>
</div>
