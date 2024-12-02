<aside class="sticky top-0 h-screen w-64 p-4">
    <div class="flex flex-col bg-gradient-to-b dark:from-sidebar-a-d dark:to-sidebar-b-d from-sidebar-a-l to-sidebar-b-l h-full rounded-lg shadow-xl">
{{--   
        <div class="items-center text-cyan-50">
            {{ Auth::user()->name }}
        </div>  --}}
        
        <!-- Botones de la Sidebar -->
        
        <div class="flex flex-col p-3 h-full overflow-y-auto gap-y-2">
            
            <!-- boton home--> 
            <x-buttom_sidebar
                etiqueta="HOME"
                path="{{ route('dashboard') }}"
                :ruta="null"
                :disable="false"
             />

            <!-- Botón Usuarios -->
             @if (!request()->get('isAdmin')) <!-- Solo si NO es administrador -->
            
                <x-buttom_sidebar
                 etiqueta="Usuarios"
                 path="{{ route('users.index') }}"
                 :ruta="request()->routeIs('users.*')"
                 :disable="false"
                />
            @endif

            <!-- boton creacion responsable-->
            <x-buttom_sidebar
                etiqueta="Responsables"
                path="{{ route('responsable.index') }}"
                :ruta="request()->routeIs('responsable.*')"
                :disable="false"
            />
        
            <!-- boton area y responsables-->
            <x-buttom_sidebar
                etiqueta="Areas"
                path="null"
                :ruta="null"
                :disable="false"
            />

            <!-- Botón Objetivos -->
            <x-buttom_sidebar 
                etiqueta="Objetivos"
                path="objetivo"
                :ruta="null" 
                :disabled="false" />

            <!-- Botón Acciones -->
            <x-buttom_sidebar 
                etiqueta="Acciones"
                path="accion"
                :ruta="null" 
                :disabled="false" />

            <!-- Botón Indicadores -->
            <x-buttom_sidebar 
                etiqueta="Indicadores"
                path=""
                :ruta="null" 
                :disabled="false" />

            <!-- Botón Módulo de Modificación -->
            <x-buttom_sidebar 
                etiqueta="Módulo de Modificación"
                path=""
                :ruta="null" 
                :disabled="false" />

            <!-- Botón Requisitos -->
            <x-buttom_sidebar 
                etiqueta="Requisitos"
                path=""
                :ruta="null" 
                :disabled="false" />

            <!-- Botón Notificaciones -->
            <x-buttom_sidebar 
                etiqueta="Notificaciones"
                path=""
                :ruta="null" 
                :disabled="false" />
        </div>
    </div>
</aside>
