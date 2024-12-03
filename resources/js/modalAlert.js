document.addEventListener('DOMContentLoaded', function() {
    const alertMessage = document.getElementById('alertMessage').textContent;
    const modal = document.getElementById('alertModal');

    if (alertMessage.trim()) {  
        modal.classList.remove('hidden');
        const modalMessage = document.getElementById('modalMessage');
        modalMessage.textContent = alertMessage;

        setTimeout(function() {
            modal.classList.add('hidden'); 
        }, 3000); 
    }
});
