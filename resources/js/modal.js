function initializeModals() {
    const modalToggles = document.querySelectorAll("[data-modal-toggle]");
    modalToggles.forEach(modalToggle => {
        const modalId = modalToggle.getAttribute('data-modal-toggle');
        const modal = document.getElementById(modalId);

        if (modalToggle && modal) {
            modalToggle.addEventListener("click", () => {
                // Cerrar todos los modales antes de abrir el nuevo
                const allModals = document.querySelectorAll('.modal');
                allModals.forEach(m => m.classList.add("hidden"));

                // Mostrar el modal seleccionado
                modal.classList.remove("hidden");
            });
        }

        if (modal) {
            const closeModalButton = modal.querySelector(".closeModalButton");
            if (closeModalButton) {
                closeModalButton.addEventListener("click", () => {
                    modal.classList.add("hidden");
                    resetModal(modal); // Llamar a la función para reiniciar
                });
            }

            const closeModalButtontwo =  modal.querySelector(".closeModalButtontwo");
            if (closeModalButtontwo) {
                closeModalButtontwo.addEventListener("click", () => {
                    modal.classList.add("hidden");
                   
                });
            }

            modal.addEventListener("click", (event) => {
                if (event.target === modal) {
                    modal.classList.add("hidden");
                    // resetModal(modal); // Llamar a la función para reiniciar
                }
            });

            // Si es un modal de eliminación, manejar la confirmación
            const confirmDeleteButton = modal.querySelector(".confirm-delete-action");
            if (confirmDeleteButton) {
                confirmDeleteButton.addEventListener("click", function() {
                    const itemId = this.getAttribute("data-item-id");

                    // Buscar el formulario de eliminación correspondiente
                    const form = document.getElementById("delete-form-" + itemId);
                    if (form) {
                        form.submit(); // Enviar el formulario de eliminación
                    }
                });
            }

            const cancelDeleteButton = modal.querySelector(".cancel-delete-action");
            if (cancelDeleteButton) {
                cancelDeleteButton.addEventListener("click", function() {
                    modal.classList.add("hidden");
                    resetModal(modal); // Llamar a la función para reiniciar
                });
            }
        }
    });
}

function resetModal(modal) {
    const forms = modal.querySelectorAll("form");
    forms.forEach(form => {
        form.reset(); 
    });

    const inputs = modal.querySelectorAll("input, textarea, select");
    inputs.forEach(input => {
        if (input.type === "checkbox" || input.type === "radio") {
            input.checked = false; 
        } else if (input.tagName.toLowerCase() === "select") {
            input.selectedIndex = 0; 
        } else {
            input.value = ""; 
        }
    });
}

// Exportar globalmente
window.initializeModals = initializeModals;
document.addEventListener('DOMContentLoaded', function() {
    initializeModals();
});
