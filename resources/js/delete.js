document.addEventListener('DOMContentLoaded', () => {
    // Confirmación para eliminar
    const deleteButtons = document.querySelectorAll('.confirm-delete');
    deleteButtons.forEach(button => {
        button.addEventListener('click', () => {
            const id = button.getAttribute('data-id');
            const name = button.getAttribute('data-name');
            const form = document.getElementById(`delete-form-${id}`);
            const confirmDelete = confirm(`¿Estás seguro de eliminar el puesto "${name}"?`);
            if (confirmDelete) {
                form.submit();
            }
        });
    });
});
