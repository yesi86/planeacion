<div id="createUserModal" class="fixed inset-0 bg-black bg-opacity-50 flex items-center justify-center z-50 {{ $errors->any() ? 'block' : 'hidden' }}">
    <div class="bg-white rounded-lg p-4 w-96 shadow-xl">
        <!-- Icono de creación -->
        <div class="flex justify-center items-center mb-4">
            <div class="bg-green-100 text-green-600 rounded-full p-4">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-10 w-10" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M12 4v16m8-8H4" />
                </svg>
            </div>
        </div>        
         <!-- Título -->
   <h3 class="text-center text-2xl font-semibold text-gray-800 mb-4">Crear Nuevo Usuario</h3>

        <form method="POST" action="{{ route('users.store') }}" enctype="multipart/form-data">
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

            <!-- Campo de nombre -->
            <div class="mb-4">
                <label for="name" class="block font-medium">Nombre</label>
                <input type="text" name="name" id="name" class="w-full border border-gray rounded-lg p-3 focus:ring-2 focus:ring-green-500 focus:border-green-500" required>
            </div>

            <!-- Campo de correo -->
            <div class="mb-4">
                <label for="email" class="block font-medium">Correo</label>
                <input type="email" name="email" id="email" class="w-full border border-gray rounded-lg p-3 focus:ring-2 focus:ring-green-500 focus:border-green-500" required>
            </div>

            <!-- Campo de contraseña -->
            <div class="mb-4">
                <label for="password" class="block font-medium">Contraseña</label>
                <input type="password" name="password" id="password" class="w-full border border-gray rounded-lg p-3 focus:ring-2 focus:ring-green-500 focus:border-green-500" required>
            </div>

            <!-- Campo de confirmación de contraseña -->
            <div class="mb-4">
                <label for="password_confirmation" class="block font-medium">Confirmar Contraseña</label>
                <input type="password" name="password_confirmation" id="password_confirmation" class="w-full border border-gray rounded-lg p-3 focus:ring-2 focus:ring-green-500 focus:border-green-500" required>
            </div>

         <!-- Campo de rol -->
         <div class="mb-4">
            <label for="role" class="block font-medium">Rol</label>
            <select name="role" id="role" class="w-full border border-gray rounded-lg p-3 focus:ring-2 focus:ring-green-500 focus:border-green-500" required>
                <option value="" disabled selected>Seleccione un rol</option>
                @foreach($roles as $role)
                    <option value="{{ $role->name }}">{{ $role->name }}</option>
                @endforeach
            </select>
        </div>
              <!-- Botones de acción -->
              <div class="flex justify-between space-x-4">
                <button type="button" class="closeModalButton bg-gray-100 text-gray-800 py-2 px-4 w-full rounded-lg hover:bg-gray-200 focus:outline-none">
                    Cancelar
                </button>
                <button type="submit" class="bg-green-500 text-white py-2 px-4 w-full rounded-lg hover:bg-green-600 focus:outline-none">
                    Crear
                </button>
            </div>
        </form>
    </div>
</div>