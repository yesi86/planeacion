document.addEventListener('DOMContentLoaded', function() {
    const modalToggle = document.querySelector("[data-modal-toggle='createUserModal']");
    const modal = document.getElementById("createUserModal");

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
