document.addEventListener('DOMContentLoaded', function() {
    const modalToggles = document.querySelectorAll("[data-modal-toggle]");

    modalToggles.forEach(modalToggle => {
        // Obtiene el ID del modal correspondiente desde el atributo 'data-modal-toggle'
        const modalId = modalToggle.getAttribute('data-modal-toggle');
        const modal = document.getElementById(modalId);
   
        // Mostrar modal
    if (modalToggle) {
        modalToggle.addEventListener("click", () => {
            modal.classList.remove("hidden");
        });
    }

    // Cerrar modal
    if (modal) {
        window.closeModal = function() {
            modal.classList.add("hidden");
        };
    }
});
});