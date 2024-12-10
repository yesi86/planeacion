<aside id="sidebar" 
       class="sticky top-0 h-screen w-64 transition-all duration-300 overflow-hidden bg-gradient-to-b dark:from-sidebar-a-d dark:to-sidebar-b-d from-sidebar-a-l to-sidebar-b-l h-full rounded-lg shadow-xl">
    <div class="relative flex flex-col h-full">
        
        <!-- Botón de Toggling Sidebar -->
        <button id="toggleSidebar" 
                class="absolute top-4 right-4 z-10 p-2 rounded-full text-white bg-gray-700 hover:bg-gray-800 focus:outline-none">
            <i id="toggleIcon" class="fas fa-bars"></i>
        </button>
      
        {{-- <div class="items-center text-cyan-50">
            {{ Auth::user()->name }}
        </div>  --}}


        <!-- Botones de la Sidebar -->
        <div class="flex flex-col p-3 h-full overflow-y-auto gap-y-2 mt-12">

            <!-- boton home--> 
            <x-buttom_sidebar
                etiqueta="HOME"
                path="{{ route('dashboard') }}"
                :ruta="null"
                :disable="false"
                icon="fas fa-home"
                x-bind:open="open"
             />

            <!-- Botón Usuarios -->
              @if(auth()->check() && auth()->user()->hasRole('SuperAdministrador'))
                 <x-buttom_sidebar
                     etiqueta="Usuarios"
                     path="{{ route('users.index') }}"
                     :ruta="request()->routeIs('users.*')"
                     :disabled="false"
                     icon="fas fa-users"
                />
              @endif

              @if(auth()->check() && (auth()->user()->hasRole('SuperAdministrador') || auth()->user()->hasRole('Administrador')))
              <!-- boton creacion responsable-->
                  <x-buttom_sidebar
                    etiqueta="Responsables"
                    path="{{ route('responsables.index') }}"
                    :ruta="request()->routeIs('responsable.*')"
                    :disable="false"
                    icon="fas fa-user-tie"
                     
                   />

                    <!-- boton area y responsables-->
                 <x-buttom_sidebar
                    etiqueta="Areas"
                    path="null"
                    :ruta="null"
                    :disable="false"
                    icon="fas fa-layer-group"
                     
                   />
              @endif
            <!-- Botón Objetivos -->
            <x-buttom_sidebar 
                etiqueta="Objetivos"
                path="objetivo"
                :ruta="null" 
                :disabled="false"
                icon="fas fa-bullseye"
                  />

            <!-- Botón Acciones -->
            <x-buttom_sidebar 
                etiqueta="Acciones"
                path="accion"
                :ruta="null" 
                :disabled="false"
                icon="fas fa-tasks"
                  />

            <!-- Botón Indicadores -->
            <x-buttom_sidebar 
                etiqueta="Indicadores"
                path=""
                :ruta="null" 
                :disabled="false" 
                icon="fas fa-chart-line"
                 />

            <!-- Botón Módulo de Modificación -->
            <x-buttom_sidebar 
                etiqueta="Módulo de Modificación"
                path=""
                :ruta="null" 
                :disabled="false" 
                icon="fas fa-edit"
                 />

            <!-- Botón Requisitos -->
            <x-buttom_sidebar 
                etiqueta="Requisitos"
                path=""
                :ruta="null" 
                :disabled="false"
                icon="fas fa-check-square"
                  />

            <!-- Botón Notificaciones -->
            <x-buttom_sidebar 
                etiqueta="Notificaciones"
                path=""
                :ruta="null" 
                :disabled="false"
                icon="fas fa-bell"
                 
            />
        </div>
    </div>
</aside>

<link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css" rel="stylesheet">
{{-- @vite(['resources/css/app.css', 'resources/js/sidebar.js'])  funciona con solo importarlo en el app.js
ya que el app.js se importa con vite desde el layout principal
--}}
{{-- checar el script de la vista de la sidebar --}}