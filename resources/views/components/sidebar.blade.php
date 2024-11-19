<aside class="sticky top-0 h-screen w-64 p-4">
    <div class="flex flex-col bg-gradient-to-b dark:from-sidebar-a-d dark:to-sidebar-b-d from-sidebar-a-l to-sidebar-b-l h-full rounded-lg shadow-xl">
        {{-- <!-- Logo de la Aplicación -->
        <div class="mb-6 px-3">
            <x-logo_aplicacion />
        </div> --}}

        <!-- Botones de la Sidebar -->
        <div class="flex flex-col gap-4">
            <!-- Botón Objetivos -->
            <x-buttom_sidebar 
                etiqueta="Objetivos"
                path=""
                :ruta="null" 
                :disabled="false" />

            <!-- Botón Acciones -->
            <x-buttom_sidebar 
                etiqueta="Acciones"
                path=""
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
