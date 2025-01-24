<div id="viewAreaModal-{{ $area->id }}" class="fixed inset-0 bg-black bg-opacity-50 flex items-center justify-center z-50 {{ $errors->any() ? 'block' : 'hidden' }}">
    <div class="bg-white rounded-lg shadow-lg w-full max-w-xl h-auto max-h-[70vh] overflow-hidden">
        <!-- Header -->
        <div class="bg-blue-600 px-4 py-3 border-b flex justify-between items-center text-white">
            <h3 class="text-lg font-semibold flex items-center">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 mr-2" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M3 10h11m4 0h3m-7 0a4 4 0 100-8 4 4 0 000 8zm-7 0a4 4 0 110-8 4 4 0 010 8zm4 12v-4m0 4H7m4 0h4" />
                </svg>
                Detalles del Área: {{ $area->nombre }}
            </h3>
        </div>

        <!-- Content -->
        <div class="p-4 overflow-y-auto max-h-[50vh]">
            <table class="table-auto w-full border-collapse border border-gray-200">
                <tbody>
                    <tr>
                        <td class="font-semibold py-2 px-4 border-b bg-gray-50">Nombre:</td>
                        <td class="py-2 px-4 border-b">{{ $area->nombre }}</td>
                    </tr>
                    <tr>
                        <td class="font-semibold py-2 px-4 border-b bg-gray-50">Tipo:</td>
                        <td class="py-2 px-4 border-b">{{ $area->tipo }}</td>
                    </tr>
                    @if ($area->parent)
                    <tr>
                        <td class="font-semibold py-2 px-4 border-b bg-gray-50">Área Superior:</td>
                        <td class="py-2 px-4 border-b">{{ $area->parent->nombre }}</td>
                    </tr>
                    @endif
                    @if ($area->children->isNotEmpty())
                    <tr>
                        <td class="font-semibold py-2 px-4 border-b bg-gray-50">Áreas Dependientes:</td>
                        <td class="py-2 px-4 border-b">
                            <div class="overflow-y-auto max-h-[150px] border border-gray-200 rounded-md p-2">
                                <ul class="list-disc list-inside text-gray-700">
                                    @foreach ($area->children as $child)
                                    <li>{{ $child->nombre }}</li>
                                    @endforeach
                                </ul>
                            </div>
                        </td>
                    </tr>
                    @endif
                </tbody>
            </table>
        </div>

        <!-- Footer -->
        <div class="bg-gray-100 px-4 py-3 border-t flex justify-end">
            <button type="button" data-modal-toggle="viewAreaModal-{{ $area->id }}" class="closeModalButton bg-blue-600 text-white py-2 px-4 rounded hover:bg-blue-700">
                Cerrar
            </button>
        </div>
    </div>
</div>
