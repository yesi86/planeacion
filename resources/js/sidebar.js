document.addEventListener('DOMContentLoaded', () => {
    const sidebar = document.getElementById('sidebar');
    const toggleButton = document.getElementById('toggleSidebar');
    const toggleIcon = document.getElementById('toggleIcon');
    const labels = sidebar.querySelectorAll('.label');
    const mainContent = document.querySelector('main');

    // Configuración inicial del sidebar
    sidebar.classList.add('transition-none');
    const isOpen = localStorage.getItem('sidebar-open') === 'true';

    sidebar.classList.toggle('w-64', isOpen);
    sidebar.classList.toggle('w-20', !isOpen);
    toggleIcon.classList.toggle('fa-bars', !isOpen);
    toggleIcon.classList.toggle('fa-chevron-left', isOpen);
    labels.forEach(label => label.classList.toggle('hidden', !isOpen));

    setTimeout(() => sidebar.classList.remove('transition-none'), 50);

    toggleButton.addEventListener('click', () => {
        const open = sidebar.classList.toggle('w-64');
        sidebar.classList.toggle('w-20', !open);
        toggleIcon.classList.toggle('fa-bars', !open);
        toggleIcon.classList.toggle('fa-chevron-left', open);
        labels.forEach(label => label.classList.toggle('hidden', !open));
        localStorage.setItem('sidebar-open', open);
    });

    // Función para cargar contenido dinámico
    function loadContent(url) {
        fetch(url)
            .then(response => response.text())
            .then(html => {
                const tempDiv = document.createElement('div');
                tempDiv.innerHTML = html;
    
                const newMainContent = tempDiv.querySelector('main').innerHTML;
                document.querySelector('main').innerHTML = newMainContent;
    
                window.history.pushState({}, '', url);
    
                // Re-inicializar modals después de cargar nuevo contenido
                initializeModals();
            })
            .catch(error => console.error('Error al cargar el contenido:', error));
    }

    // Manejadores de enlaces dentro del sidebar
    const sidebarLinks = sidebar.querySelectorAll('a');
    sidebarLinks.forEach(link => {
        link.addEventListener('click', (event) => {
            event.preventDefault();
            const url = link.getAttribute('href');
            loadContent(url);
        });
    });

    // Manejadores de enlaces dentro del contenido cargado dinámicamente
    document.body.addEventListener('click', (event) => {
        if (event.target.tagName.toLowerCase() === 'a') {
            const link = event.target;
            const url = link.getAttribute('href');
            if (url && url.startsWith('/')) { // Solo para enlaces internos
                event.preventDefault();
                loadContent(url);
            }
        }
    });
});
