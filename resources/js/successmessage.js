// es para darle una duracion a los tiempos en mensaje
document.addEventListener('DOMContentLoaded', function () {
    // Verifica si el mensaje de éxito está presente
    const successMessage = document.querySelector('.success-message');
    if (successMessage) {
        // Desaparece después de 3 segundos
        setTimeout(function() {
            successMessage.style.display = 'none';
        }, 2000); // 3000 milisegundos = 3 segundos
    }
});