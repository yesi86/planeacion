document.addEventListener('DOMContentLoaded', () => {
    const deleteButtons = document.querySelectorAll('.confirm-delete');
    deleteButtons.forEach(button => {
        button.addEventListener('click', (event) => {
            // Evitar el envío prematuro del formulario
            event.preventDefault();

            const id = button.getAttribute('data-id');
            const name = button.getAttribute('data-name');
            const form = document.getElementById(`delete-form-${id}`);
            
            // Confirmación de eliminación
            const confirmDelete = confirm(`¿Estás seguro de eliminar el puesto "${name}"?`);
            if (confirmDelete) {
                form.submit();  // Enviar el formulario si el usuario confirma
            }
        });
    });
});
