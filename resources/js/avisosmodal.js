document.addEventListener('DOMContentLoaded', function () {
    const successMessage = document.querySelector('#successModal');
    const errorMessage = document.querySelector('#errorModal');
    const infoMessage = document.querySelector('#infoModal');

    const hideModalAfterTimeout = (modal) => {
        if (modal) {
            setTimeout(function() {
                modal.classList.add('hidden');
            }, 3000); // 4000 milisegundos = 4 segundos
        }
    };

    hideModalAfterTimeout(successMessage);
    hideModalAfterTimeout(errorMessage);
    hideModalAfterTimeout(infoMessage);
});
