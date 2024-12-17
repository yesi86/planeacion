document.addEventListener('DOMContentLoaded', () => {
    const sidebar = document.getElementById('sidebar');
    const toggleButton = document.getElementById('toggleSidebar');
    const toggleIcon = document.getElementById('toggleIcon');
    const labels = sidebar.querySelectorAll('.label');
    const mainContent = document.querySelector('main');

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

    // Función para cargar contenido dinámicamente en el main sin recargar la página
    function loadContent(url) {
        fetch(url)
            .then(response => response.text())
            .then(html => {
                // Crear un contenedor temporal para procesar la respuesta HTML
                const tempDiv = document.createElement('div');
                tempDiv.innerHTML = html;
    
                // Seleccionar solo el contenido dentro del <main> y reemplazarlo
                const newMainContent = tempDiv.querySelector('main').innerHTML;
    
                // Actualizar solo el contenido del main sin recargar el sidebar ni otros elementos
                mainContent.innerHTML = newMainContent;
    
                // Cambiar la URL en el navegador
                window.history.pushState({}, '', url);
            })
            .catch(error => console.error('Error loading content:', error));
    }
    
    

    // Agregar evento para manejar los enlaces dentro del sidebar
    const sidebarLinks = sidebar.querySelectorAll('a');

    sidebarLinks.forEach(link => {
        link.addEventListener('click', (event) => {
            event.preventDefault();
            const url = link.getAttribute('href');
            loadContent(url);  // Cargar contenido sin recargar la página
        });
    });

    // También agregar la lógica de enlaces dentro del contenido cargado dinámicamente
    document.body.addEventListener('click', function(event) {
        if (event.target.tagName.toLowerCase() === 'a') {
            const link = event.target;
            const url = link.getAttribute('href');
            event.preventDefault();
            loadContent(url);  // Cargar contenido de los enlaces internos
        }
    });
});
