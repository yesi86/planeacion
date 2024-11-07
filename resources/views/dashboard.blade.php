<x-app-layout>
    <div class="flex min-h-screen">
        <!-- Sidebar -->
        <aside class="w-64 h-full bg-gray-800 text-white fixed">
            <div class="p-4 flex items-center space-x-4">
                <!-- Imagen de perfil -->
                <div>
                    <h2 class="text-lg font-semibold">Nombre del Usuario</h2>
                    <p class="text-sm text-gray-400">Rol o título</p>
                </div>
            </div>
            <nav class="mt-4">
                <!-- Enlaces de navegación -->
                <ul>
                    <li>
                        <a href="{{ route('dashboard') }}" class="block px-4 py-2 text-gray-300 hover:bg-gray-700 hover:text-white">
                            Objetivos
                        </a>
                    </li>
                    <li>
                        <a href="{{ route('profile.edit') }}" class="block px-4 py-2 text-gray-300 hover:bg-gray-700 hover:text-white">
                            Acciones
                        </a>
                    </li>
                    <li>
                        <a href="Ve" class="block px-4 py-2 text-gray-300 hover:bg-gray-700 hover:text-white">
                            Indicadores 
                        </a>
                    </li>
                    <li>
                        <a href="Ve" class="block px-4 py-2 text-gray-300 hover:bg-gray-700 hover:text-white">
                            Modulo de modificacion 
                        </a>
                    </li>
                    <li>
                        <a href="Ve" class="block px-4 py-2 text-gray-300 hover:bg-gray-700 hover:text-white">
                            Requisiciones 
                        </a>
                    </li>
                    <li>
                        <a href="{{ route('logout') }}" class="block px-4 py-2 text-gray-300 hover:bg-gray-700 hover:text-white justify-end"
                            onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                            Cerrar Sesión
                        </a>
                        <form id="logout-form" action="{{ route('logout') }}" method="POST" class="hidden">
                            @csrf
                        </form>
                    </li>
                </ul>
            </nav>
        </aside>

        
        <!-- Contenido principal desplazado -->
        <div class="flex-1 ml-64 p-6">
            <div class="py-12">
                <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                    <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                        <div class="p-6 text-gray-900 dark:text-gray-100">
                            {{ __("You're logged in!") }}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
