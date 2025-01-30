<div id="viewUserModal-{{ $user->id }}" class="fixed inset-0 bg-black bg-opacity-50 flex items-center justify-center z-50 {{ $errors->any() ? 'block' : 'hidden' }}">
    <div class="bg-white rounded-lg shadow-lg w-full max-w-3xl h-auto max-h-[80vh] overflow-hidden">
        <!-- Header -->
        <div class="bg-blue-600 px-4 py-3 border-b flex justify-between items-center text-white">
            <div class="flex items-center">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 mr-2" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M8 10h.01M12 10h.01M16 10h.01M9 16h6M12 20h0m0-4h0m0 4v-4m0-4v-6c0-1.104.896-2 2-2h2c1.104 0 2 .896 2 2v6" />
                </svg>
                <h3 class="text-lg font-semibold">Detalles del usuario: {{ $user->name }}</h3>
            </div>
           
        </div>

          <!-- Content -->
          <div class="p-4 overflow-y-auto max-h-[65vh]">
            <table class="table-auto w-full border-collapse border border-gray-300">
                <tbody>
                    <tr>
                        <td class="font-semibold py-2 px-4 border-b bg-gray-100">Rol:</td>
                        <td class="py-2 px-4 border-b">{{ $user->roles->first()->name }}</td>
                    </tr>
                     <tr>
                        <td class="font-semibold py-2 px-4 border-b bg-gray-100">Area establecida:</td>
                        <td class="py-2 px-4 border-b">
                            @if ($user->area_id && $user->area_id->isEmpty()) 
                                {{ $user->roles->first()->name }}
                             @else
                                Sin asignar
                            @endif
                        </td>
                    </tr>
                    <tr>
                        <td class="font-semibold py-2 px-4 border-b bg-gray-100">Puesto:</td>
                        <td class="py-2 px-4 border-b">
                            @if ($user->puesto_id && $user->puesto_id->isEmpty()) 
                                {{ $user->roles->first()->name }}
                             @else
                                Sin asignar
                            @endif
                        </td>
                    </tr>
                </tbody>
            </table>
        </div>

        <!-- Footer -->
        <div class="bg-gray-100 px-4 py-3 border-t flex justify-end">
            <button type="button" data-modal-toggle="viewObjetivoModal-{{ $user->id }}" class="closeModalButton bg-blue-600 text-white py-2 px-4 rounded hover:bg-blue-700">
                Cerrar
            </button>
        </div>
    </div>
</div>
