document.addEventListener('DOMContentLoaded', () => {
    const dropdownButton = document.getElementById('dropdownButton');
    const dropdownContent = document.getElementById('dropdownContent');

    // Función para abrir y cerrar el dropdown
    dropdownButton.addEventListener('click', () => {
        dropdownContent.classList.toggle('hidden'); // Cambiar la visibilidad
    });

    // Cerrar el dropdown si se hace click fuera de él
    document.addEventListener('click', (e) => {
        if (!dropdownButton.contains(e.target) && !dropdownContent.contains(e.target)) {
            dropdownContent.classList.add('hidden'); // Ocultar el dropdown
        }
    });
});
