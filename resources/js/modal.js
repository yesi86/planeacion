function initializeModals() {
    const modalToggles = document.querySelectorAll("[data-modal-toggle]");
    modalToggles.forEach(modalToggle => {
        const modalId = modalToggle.getAttribute('data-modal-toggle');
        const modal = document.getElementById(modalId);

        if (modalToggle && modal) {
            modalToggle.addEventListener("click", () => {
                modal.classList.remove("hidden");
            });
        }

        if (modal) {
            const closeModalButton = modal.querySelector(".closeModalButton");
            if (closeModalButton) {
                closeModalButton.addEventListener("click", () => {
                    modal.classList.add("hidden");
                });
            }

            modal.addEventListener("click", (event) => {
                if (event.target === modal) {
                    modal.classList.add("hidden");
                }
            });

            // Si es un modal de eliminación, manejar la confirmación
            const confirmDeleteButton = modal.querySelector(".confirm-delete-action");
            if (confirmDeleteButton) {
                confirmDeleteButton.addEventListener("click", function() {
                    const itemId = this.getAttribute("data-item-id");
                    const itemName = this.getAttribute("data-item-name");

                    // Buscar el formulario de eliminación correspondiente
                    const form = document.getElementById("delete-form-" + itemId);
                    if (form) {
                        form.submit(); // Enviar el formulario de eliminación
                    }
                });
            }

            // Manejar la acción de Cancelar
            const cancelDeleteButton = modal.querySelector(".cancel-delete-action");
            if (cancelDeleteButton) {
                cancelDeleteButton.addEventListener("click", function() {
                    modal.classList.add("hidden"); 
                });
            }
        }
    });
}

// Exportar globalmente
window.initializeModals = initializeModals;
document.addEventListener('DOMContentLoaded', function() {
    initializeModals();
});
