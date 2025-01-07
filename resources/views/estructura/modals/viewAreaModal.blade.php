<!-- Modal View -->
<div id="viewAreaModal-{{ $item['id'] }}" class="fixed inset-0 bg-black bg-opacity-50 flex items-center justify-center z-50 {{ $errors->any() ? 'block' : 'hidden' }}">
    <div class="bg-white rounded-lg shadow-lg w-full max-w-4xl h-auto max-h-[90vh] overflow-hidden">
        <!-- Header -->
        <div class="bg-gray-100 px-6 py-4 border-b flex justify-between items-center">
            <h3 class="text-lg font-semibold">Detalles del Área: {{ $item['nombre'] }}</h3>
        </div>

        <!-- Content -->
        <div class="p-6 overflow-y-auto max-h-[70vh]">
            <table class="table-auto w-full border-collapse border border-gray-200">
                <tbody>
                    <!-- Tipo de Área -->
                    <tr>
                        <td class="font-semibold py-2 px-4 border-b w-1/3">Tipo de Área:</td>
                        <td class="py-2 px-4 border-b w-2/3">{{ $item['tipo'] }}</td>
                    </tr>

                    <!-- Mostrar información dependiendo del tipo de área -->
                    @if($item['tipo'] == 'Superior')
                        <tr>
                            <td class="font-semibold py-2 px-4 border-b">Áreas Responsables:</td>
                            <td class="py-2 px-4 border-b">
                                @if($item['areas_responsables']->isEmpty())
                                    Ninguna
                                @else
                                    <ul class="list-disc pl-5 max-h-32 overflow-y-auto">
                                        @foreach($item['areas_responsables'] as $areaResponsable)
                                            <li>{{ $areaResponsable['nombre'] }}</li>
                                        @endforeach
                                    </ul>
                                @endif
                            </td>
                        </tr>
                    @elseif($item['tipo'] == 'Responsable')
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
                                    <ul class="list-disc pl-5 max-h-32 overflow-y-auto">
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
                                    <ul class="list-disc pl-5 max-h-32 overflow-y-auto">
                                        @foreach($item['divisiones_carrera'] as $division)
                                            <li>{{ $division['nombre'] }}</li>
                                        @endforeach
                                    </ul>
                                @endif
                            </td>
                        </tr>
                    @elseif($item['tipo'] == 'Division Carrera')
                        <tr>
                            <td class="font-semibold py-2 px-4 border-b">Departamento:</td>
                            <td class="py-2 px-4 border-b">{{ $item['departamento']['nombre'] ?? 'N/A' }}</td>
                        </tr>
                    @endif
                </tbody>
            </table>
        </div>

        <!-- Footer -->
        <div class="bg-gray-100 px-6 py-4 border-t flex justify-end">
            <button type="button" data-modal-toggle="viewAreaModal-{{ $item['id'] }}" class="closeModalButton bg-gray-500 text-white py-2 px-4 rounded hover:bg-gray-600 ">
                Cerrar
            </button>
        </div>
    </div>
</div>
