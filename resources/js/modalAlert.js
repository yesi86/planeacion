document.addEventListener('DOMContentLoaded', function () {
    function showAlert(message) {
        const modal = document.getElementById('alertModal');
        const modalMessage = document.getElementById('modalMessage');

        if (!modal || !modalMessage) {
            console.error("El modal de alerta o su mensaje no están definidos.");
            return;
        }

        modalMessage.textContent = message;
        modal.classList.remove('hidden'); // Mostrar el modal

        // Cerrar el modal cuando el botón sea presionado
        const closeButton = modal.querySelector('.closeModalButton');
        closeButton.addEventListener('click', () => {
            modal.classList.add('hidden');
        });
    }

    // Detectar mensajes de alerta de sesión al cargar la página
    const alertMessageElement = document.getElementById('alertMessage');
    if (alertMessageElement && alertMessageElement.textContent.trim()) {
        showAlert(alertMessageElement.textContent.trim());
    }

    // Exportar globalmente para mostrar mensajes dinámicos
    window.showAlert = showAlert;
});
