document.addEventListener('DOMContentLoaded', function() {
    // Obtener todos los elementos que tienen el atributo data-modal-toggle
    const modalToggles = document.querySelectorAll("[data-modal-toggle]");

    modalToggles.forEach(modalToggle => {

        const modalId = modalToggle.getAttribute('data-modal-toggle');
        const modal = document.getElementById(modalId);

        // Mostrar modal cuando se hace clic en el botón de abrir
        if (modalToggle) {
            modalToggle.addEventListener("click", () => {
                modal.classList.remove("hidden");
            });
        }

        // Cerrar modal cuando se hace clic en el botón de cerrar
        if (modal) {
            const closeModalButton = modal.querySelector(".closeModalButton");
            if (closeModalButton) {
                closeModalButton.addEventListener("click", () => {
                    modal.classList.add("hidden");
                });
            }
        }
    });
});
