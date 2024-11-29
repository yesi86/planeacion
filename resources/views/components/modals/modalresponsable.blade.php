<div id="createResponsableModal" tabindex="-1" aria-hidden="true" class="fixed inset-0 bg-black bg-opacity-50 flex items-center justify-center z-50 hidden">
    <div class="bg-white rounded-lg p-6 w-96">
        <h3 class="text-xl font-semibold mb-4">Crear Responsable</h3>
        <form method="POST" action="{{ route('responsables.store') }}" enctype="multipart/form-data">
            @csrf

            <!-- Validar y mostrar errores -->
            @if ($errors->any())
                <div class="bg-red-500 text-white p-4 rounded mb-4">
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif

            <!-- Campo de foto -->
            <div class="mb-4">
                <label for="photo" class="block text-gray-700">Foto (opcional)</label>
                <input type="file" name="photo" id="photo" class="w-full px-4 py-2 border border-gray-300 rounded">
            </div>

            <!-- Campo de nombre -->
            <div class="mb-4">
                <label for="name" class="block text-gray-700">Nombre</label>
                <input type="text" name="name" id="name" class="w-full px-4 py-2 border border-gray-300 rounded" required>
            </div>

            <!-- Campo de correo -->
            <div class="mb-4">
                <label for="email" class="block text-gray-700">Correo</label>
                <input type="email" name="email" id="email" class="w-full px-4 py-2 border border-gray-300 rounded" required>
            </div>

               <!-- Campo de contraseña -->
               <div class="mb-4">
                <label for="password" class="block text-gray-700">Contraseña</label>
                <input type="password" name="password" id="password" class="w-full px-4 py-2 border border-gray-300 rounded" required>
            </div>

            <!-- Campo de confirmación de contraseña -->
            <div class="mb-4">
                <label for="password_confirmation" class="block text-gray-700">Confirmar Contraseña</label>
                <input type="password" name="password_confirmation" id="password_confirmation" class="w-full px-4 py-2 border border-gray-300 rounded" required>
            </div>
            {{-- <!-- Campo de área -->
            <div class="mb-4">
                <label for="area_id" class="block text-gray-700">Área</label>
                <select name="area_id" id="area_id" class="w-full px-4 py-2 border border-gray-300 rounded" required>
                    @foreach($areas as $area)
                        <option value="{{ $area->id }}">{{ $area->name }}</option>
                    @endforeach
                </select>
            </div>

            <!-- Campo de delegado -->
            <div class="mb-4">
                <label for="delegado_id" class="block text-gray-700">Delegado</label>
                <input type="text" name="delegado_id" id="delegado_id" class="w-full px-4 py-2 border border-gray-300 rounded">
            </div>

            <!-- Campo de planeación -->
            <div class="mb-4">
                <label for="planeacion_id" class="block text-gray-700">Planeación</label>
                <input type="text" name="planeacion_id" id="planeacion_id" class="w-full px-4 py-2 border border-gray-300 rounded">
            </div> --}}

            <div class="flex justify-end space-x-4">
                <button type="submit" class="bg-indigo-600 text-white py-2 px-4 rounded hover:bg-indigo-700">Guardar</button>
                <button type="button" class="bg-gray-600 text-white py-2 px-4 rounded hover:bg-gray-700" onclick="closeModal()">Cancelar</button>
            </div>
        </form>
    </div>
</div>
