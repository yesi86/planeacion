<div id="createResponsableModal" tabindex="-1" aria-hidden="true"
    class="fixed inset-0 bg-black bg-opacity-50 flex items-center justify-center z-50 hidden">
    <div class="bg-white rounded-lg p-6 w-96">
        <h3 class="text-xl font-semibold mb-4">Crear Responsable</h3>

        <form method="POST" action="{{ route('responsables.store') }}" enctype="multipart/form-data">
            @csrf

            <!-- Mostrar errores de validación -->
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
                <input type="file" name="photo" id="photo"
                    class="w-full px-4 py-2 border border-gray-300 rounded @error('photo') border-red-500 @enderror">
                @error('photo')
                    <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                @enderror
            </div>

            <!-- Campo de nombre -->
            <div class="mb-4">
                <label for="name" class="block text-gray-700">Nombre</label>
                <input type="text" name="name" id="name"
                    class="w-full px-4 py-2 border border-gray-300 rounded @error('name') border-red-500 @enderror"
                    value="{{ old('name') }}" required>
                @error('name')
                    <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                @enderror
            </div>

            <!-- Campo de correo -->
            <div class="mb-4">
                <label for="email" class="block text-gray-700">Correo</label>
                <input type="email" name="email" id="email"
                    class="w-full px-4 py-2 border border-gray-300 rounded @error('email') border-red-500 @enderror"
                    value="{{ old('email') }}" required>
                @error('email')
                    <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                @enderror
            </div>

            <!-- Campo de contraseña -->
            <div class="mb-4">
                <label for="password" class="block text-gray-700">Contraseña</label>
                <input type="password" name="password" id="password"
                    class="w-full px-4 py-2 border border-gray-300 rounded @error('password') border-red-500 @enderror"
                    required>
                @error('password')
                    <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                @enderror
            </div>

            <!-- Campo de confirmación de contraseña -->
            <div class="mb-4">
                <label for="password_confirmation" class="block text-gray-700">Confirmar Contraseña</label>
                <input type="password" name="password_confirmation" id="password_confirmation"
                    class="w-full px-4 py-2 border border-gray-300 rounded" required>
            </div>

            <!-- Botones -->
            <div class="flex justify-end space-x-4">
                <button type="submit"
                    class="bg-indigo-600 text-white py-2 px-4 rounded hover:bg-indigo-700">Guardar</button>
                <button type="button"
                    class="bg-red-500 text-white py-2 px-4 rounded hover:bg-red-700 closeModalButton">Cancelar</button>
            </div>
        </form>
    </div>
</div>
