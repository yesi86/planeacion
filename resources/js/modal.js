function initializeModals() {
    const modalToggles = document.querySelectorAll("[data-modal-toggle]");
    modalToggles.forEach(modalToggle => {
        const modalId = modalToggle.getAttribute('data-modal-toggle');
        const modal = document.getElementById(modalId);

        if (modalToggle && modal) { // Asegúrate de que tanto el toggle como el modal existen
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
        }
    });
}

// Exportar globalmente
window.initializeModals = initializeModals;

document.addEventListener('DOMContentLoaded', function() {
    initializeModals();
});
