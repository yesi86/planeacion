document.addEventListener('DOMContentLoaded', () => {
    const sidebar = document.getElementById('sidebar');
    const toggleButton = document.getElementById('toggleSidebar');
    const toggleIcon = document.getElementById('toggleIcon');
    const labels = sidebar.querySelectorAll('.label');

    // Quitar las transiciones al iniciar (para evitar transiciones en el primer renderizado)
    sidebar.classList.add('transition-none');

    // Leer el estado desde localStorage al cargar la página
    const isOpen = localStorage.getItem('sidebar-open') === 'true'; // Usar el valor guardado en localStorage

    // Aplicar clases iniciales basadas en el estado guardado
    sidebar.classList.toggle('w-64', isOpen);
    sidebar.classList.toggle('w-20', !isOpen);
    toggleIcon.classList.toggle('fa-bars', !isOpen);
    toggleIcon.classList.toggle('fa-chevron-left', isOpen);
    labels.forEach(label => label.classList.toggle('hidden', !isOpen));

    // Esperar un momento y luego eliminar la clase de transición
    setTimeout(() => {
        sidebar.classList.remove('transition-none');
    }, 50);  // Puedes ajustar el tiempo (50 ms debería ser suficiente)

    // Evento para alternar el estado del sidebar
    toggleButton.addEventListener('click', () => {
        const open = sidebar.classList.toggle('w-64');
        sidebar.classList.toggle('w-20', !open);
        toggleIcon.classList.toggle('fa-bars', !open);
        toggleIcon.classList.toggle('fa-chevron-left', open);
        labels.forEach(label => label.classList.toggle('hidden', !open));

        // Guardar el estado actualizado en localStorage
        localStorage.setItem('sidebar-open', open);
    });
});
