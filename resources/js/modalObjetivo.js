// Variable para almacenar las áreas seleccionadas
let selectedAreas = [];

// Inicialización del modal
document.addEventListener('DOMContentLoaded', () => {
    initializeCreateObjetivo();
});

// Inicializar la lógica de creación de objetivos
function initializeCreateObjetivo() {
    const tipoAreaSelect = document.getElementById('tipoArea');
    const createObjetivoForm = document.getElementById('createObjetivoForm');
    const createObjetivoModal = document.getElementById('createObjetivoModal');

    if (tipoAreaSelect) {
        tipoAreaSelect.addEventListener('change', () => {
            const tipoArea = tipoAreaSelect.value;
            if (tipoArea) fetchAreas(tipoArea);
        });
    }

    if (createObjetivoForm) {
        createObjetivoForm.addEventListener('submit', (event) => {
            event.preventDefault();
            const descripcion = document.getElementById('descripcion').value;
            const tipoArea = document.getElementById('tipoArea').value;

            if (descripcion && tipoArea && selectedAreas.length > 0) {
                createObjetivo(descripcion, tipoArea, selectedAreas);
            } else {
                alert("Por favor, completa todos los campos.");
            }
        });
    }

    if (createObjetivoModal) {
        const closeModalButton = createObjetivoModal.querySelector('.closeModalButton');
        closeModalButton?.addEventListener('click', () => {
            createObjetivoModal.classList.add('hidden');
            resetModalState();
        });
    }
}

// Cargar áreas según el tipo seleccionado
function fetchAreas(tipo) {
    fetch('/objetivos/get-areas', {
        method: 'POST',
        headers: {
            'Content-Type': 'application/json',
            'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').content,
        },
        body: JSON.stringify({ tipo }),
    })
        .then((response) => {
            if (!response.ok) throw new Error('Error en la respuesta del servidor');
            return response.json();
        })
        .then((areas) => renderAreas(areas))
        .catch((error) => console.error('Error al cargar las áreas:', error));
}

// Renderizar las áreas disponibles
function renderAreas(areas) {
    const container = document.getElementById('areas-container');
    container.innerHTML = '';

    areas.forEach((area) => {
        const checkbox = document.createElement('input');
        checkbox.type = 'checkbox';
        checkbox.value = area.id;
        checkbox.name = 'areas[]';
        checkbox.addEventListener('change', (event) => handleAreaSelection(event, area.id));

        const label = document.createElement('label');
        label.textContent = area.nombre;
        label.classList.add('ml-2');

        const areaWrapper = document.createElement('div');
        areaWrapper.classList.add('flex', 'items-center', 'mb-2');
        areaWrapper.appendChild(checkbox);
        areaWrapper.appendChild(label);

        container.appendChild(areaWrapper);
    });
}

// Manejar selección de áreas
function handleAreaSelection(event, areaId) {
    if (event.target.checked) {
        selectedAreas.push(areaId);
    } else {
        selectedAreas = selectedAreas.filter((id) => id !== areaId);
    }
    updateSelectedAreasList();
}

// Actualizar la lista de áreas seleccionadas
function updateSelectedAreasList() {
    const list = document.getElementById('selectedAreas');
    list.innerHTML = '';

    selectedAreas.forEach((id) => {
        const item = document.createElement('li');
        item.textContent = `Área ID: ${id}`;
        list.appendChild(item);
    });
}

// Crear un objetivo
function createObjetivo(descripcion, tipoArea, areasSeleccionadas) {
    fetch('/objetivos/store', {
        method: 'POST',
        headers: {
            'Content-Type': 'application/json',
            'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').content,
        },
        body: JSON.stringify({
            descripcion,
            tipoArea,
            areas: areasSeleccionadas,
        }),
    })
        .then((response) => response.json())
        .then((data) => {
            alert(data.message || 'Objetivo creado con éxito');
            document.getElementById('createObjetivoModal').classList.add('hidden');
            resetModalState();
        })
        .catch((error) => {
            console.error('Error al crear el objetivo:', error);
            alert('Hubo un error al crear el objetivo.');
        });
}

// Restablecer el estado del modal
function resetModalState() {
    document.getElementById('createObjetivoForm').reset();
    selectedAreas = [];
    updateSelectedAreasList();
    const container = document.getElementById('areas-container');
    container.innerHTML = '';
}
