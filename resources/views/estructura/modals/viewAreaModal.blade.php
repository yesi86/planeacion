<!-- Modal View -->
<div id="viewAreaModal-{{ $area->id }}" class="fixed inset-0 bg-black bg-opacity-50 flex items-center justify-center z-50 {{ $errors->any() ? 'block' : 'hidden' }}">
    <div class="bg-white rounded-lg shadow-lg w-full max-w-xl h-auto max-h-[70vh] overflow-hidden">
        <!-- Header -->
        <div class="bg-gray-100 px-4 py-3 border-b flex justify-between items-center">
            <h3 class="text-lg font-semibold">Detalles del Área: {{ $area->nombre }}</h3>
        </div>

        <!-- Content -->
        <div class="p-4 overflow-y-auto max-h-[50vh]">
            <table class="table-auto w-full border-collapse border border-gray-200">
                <tbody>
                    <tr>
                        <td class="font-semibold py-2 px-4 border-b">Nombre:</td>
                        <td class="py-2 px-4 border-b">{{ $area->nombre }}</td>
                    </tr>
                    <tr>
                        <td class="font-semibold py-2 px-4 border-b">Tipo:</td>
                        <td class="py-2 px-4 border-b">{{ $area->tipo }}</td>
                    </tr>
                    @if ($area->parent)
                    <tr>
                        <td class="font-semibold py-2 px-4 border-b">Área Superior:</td>
                        <td class="py-2 px-4 border-b">{{ $area->parent->nombre }}</td>
                    </tr>
                    @endif
                    @if ($area->children->isNotEmpty())
                    <tr>
                        <td class="font-semibold py-2 px-4 border-b">Áreas Dependientes:</td>
                        <td class="py-2 px-4 border-b">
                            <ul>
                                @foreach ($area->children as $child)
                                <li>{{ $child->nombre }}</li>
                                @endforeach
                            </ul>
                        </td>
                    </tr>
                    @endif
                </tbody>
            </table>
        </div>

        <!-- Footer -->
        <div class="bg-gray-100 px-4 py-3 border-t flex justify-end">
            <button type="button" data-modal-toggle="viewAreaModal-{{ $area->id }}" class="closeModalButton bg-gray-500 text-white py-2 px-4 rounded hover:bg-gray-600">
                Cerrar
            </button>
        </div>
    </div>
</div>
