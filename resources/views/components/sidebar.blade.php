<style>
    #sidebar {
        transition: width 0.3s ease, opacity 0.3s ease;
    }
</style>
<aside id="sidebar" class="transition-all duration-300 ease-in-out">
    <div class="relative flex flex-col h-full">
        <!-- Botón de Toggling Sidebar -->
        <button id="toggleSidebar" 
                class="absolute top-4 right-4 z-10 p-2 rounded-full text-white bg-gray-700 hover:bg-gray-800 focus:outline-none">
            <i id="toggleIcon" class="fas fa-bars"></i>
        </button>
      
        <!-- Botones de la Sidebar -->
        <div class="flex flex-col p-3 h-full overflow-y-auto gap-y-2 mt-12">
            
            {{-- rutas para usuario general --}}
            @if(auth()->check() && auth()->user()->hasRole('Titular De Area|Responsable De Area|Delegado|Jefe De Carrera'))
            <!-- Botón para roles generales -->
                <x-buttom_sidebar
                    etiqueta="HOME"
                    path="{{ route('general') }}"
                    :disable="false"
                    icon="fas fa-home"
                />
            @endif
            
            {{-- rutas para administrador --}}
            @if(auth()->check()&&(auth()->user()->hasRole('Administrador')))
                 <!-- boton home --> 
               <x-buttom_sidebar
                  etiqueta="HOME"
                  path="{{ route('admin') }}"
                  :disable="false"
                  icon="fas fa-home"
                />

            @endif
             {{-- rutas para superadministrador --}}
            @if(auth()->check() && (auth()->user()->hasRole('SuperAdministrador')))
                <!-- boton home --> 
                <x-buttom_sidebar
                  etiqueta="HOME"
                  path="{{ route('dashboard') }}"
                  :disable="false"
                  icon="fas fa-home"
               />
            <!-- Botón Usuarios -->
                <x-buttom_sidebar
                    etiqueta="Usuarios"
                    path="{{ route('users.index') }}"
                    :ruta="request()->routeIs('users.*')"
                    :disable="false"
                    icon="fas fa-users"
                />    
            <!-- boton creacion puestos-->
                <x-buttom_sidebar
                    etiqueta="Puestos"
                    path="{{ route('puestos.index') }}"
                    :disable="false"
                    icon="fas fa-address-book"
                />
                <!-- Botón Áreas -->
                <x-buttom_sidebar
                    etiqueta="Áreas"
                    path="{{ route('areas.index') }}" 
                    :disable="false"
                    icon="fas fa-layer-group"
                />
                <!-- Botón Módulo de Catalogo de gasto -->
                <x-buttom_sidebar 
                    etiqueta="Objetos de Gasto"
                    path="{{route('objeto.index')}}"
                    :disabled="false" 
                    icon="fas fa-dollar"
                />

                 <!-- Botón Objetivos -->
                 <x-buttom_sidebar 
                    etiqueta="Objetivos"
                    path="{{route('objetivos.index')}}"
                    :disabled="false"
                    icon="fas fa-bullseye"
                 />

                     <!-- Botón Acciones -->
                <x-buttom_sidebar 
                    etiqueta="Acciones"
                    path="{{route('acciones.index')}}"
                    :disabled="false"
                    icon="fas fa-tasks"
                />

                  <!-- Botón Actividades -->
                <x-buttom_sidebar 
                    etiqueta="Actividades"
                    path="{{route('actividad.index')}}"
                    :disabled="false"
                    icon="fas fa-check-square"
                />
            @endif

            <!-- Botón Diccionario -->
            <x-buttom_sidebar 
                etiqueta="Reporte General"
                path="{{route('diccionario.index')}}"
                :disabled="false" 
                icon="fas fa-inbox"
            />
            <x-buttom_sidebar
                etiqueta="Perfil"
                path="{{ route('profile.show') }}"
                :disable="false"
                icon="fas fa-user"
             />
            <!--Boton de salir  -->
            <x-buttom_sidebar 
                etiqueta="Salir"
                path=""
                :ruta="request()->routeIs('notificacion')"
                :disabled="false"
                icon="fas fa-right-from-bracket"
                onclick="event.preventDefault(); document.getElementById('logout-form').submit();"
            />
            <form id="logout-form" method="POST" action="{{ route('logout') }}" class="hidden">
                @csrf
            </form>
            
           

        </div>
    </div>
</aside>

<link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css" rel="stylesheet">
