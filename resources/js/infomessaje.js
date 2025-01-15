document.addEventListener('DOMContentLoaded', function () {
    const infoMessage = document.querySelector('.info-message');
    if (infoMessage) {
        setTimeout(function() {
            infoMessage.style.display = 'none';
        }, 3000); // 3000 milisegundos = 3 segundos
    }
});