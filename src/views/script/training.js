const sliderButton = document.querySelector('.slider-button');
const slider = document.querySelector('.slider');

let isDragging = false;
let startX, offsetX;

sliderButton.addEventListener('mousedown', (e) => {
    isDragging = true;
    startX = e.clientX;
    offsetX = sliderButton.offsetLeft;
    sliderButton.style.transition = 'none'; // Disable transition during drag
});

document.addEventListener('mouseup', () => {
    if (isDragging) {
        isDragging = false;
        sliderButton.style.transition = 'left 0.3s ease'; // Re-enable transition after drag
        if (sliderButton.offsetLeft >= (slider.clientWidth - sliderButton.clientWidth - 10)) {
            alert('Próxima série clicked!');
        } else {
            sliderButton.style.left = '0';
        }
    }
});

document.addEventListener('mousemove', (e) => {
    if (isDragging) {
        const sliderRect = slider.getBoundingClientRect();
        const buttonWidth = sliderButton.clientWidth;
        let newLeft = offsetX + (e.clientX - startX);

        if (newLeft < 0) {
            newLeft = 0;
        } else if (newLeft > (slider.clientWidth - buttonWidth - 10)) {
            newLeft = slider.clientWidth - buttonWidth - 10;
        }

        sliderButton.style.left = newLeft + 'px';
    }
});

document.addEventListener('mouseleave', () => {
    if (isDragging) {
        isDragging = false;
        sliderButton.style.transition = 'left 0.3s ease'; // Re-enable transition after drag
        sliderButton.style.left = '0';
    }
});



const treinos = [
    'TREINO 01: Abdominal Canivete',
    'TREINO 02: Flexão de Braço',
    'TREINO 03: Agachamento Livre',
    'TREINO 04: Levantamento Terra',
    'TREINO 05: Barra Fixa',
    'TREINO 06: Prancha Abdominal',
    'TREINO 07: Corrida Intervalada',
    'TREINO 08: Burpees',
    'TREINO 09: Supino',
    'TREINO 10: Remada Curvada'
];

// Função para preencher a lista de treinos
function preencherDropdown() {
    const dropdownContent = document.getElementById('dropdownContent');
    treinos.forEach(treino => {
        const a = document.createElement('a');
        a.textContent = treino;
        a.href = '#'; // Pode ser alterado para um link real se necessário
        dropdownContent.appendChild(a);
    });
}

// Mostrar/ocultar a lista de treinos ao clicar no botão
document.querySelector('.dropdown').addEventListener('click', () => {
    const dropdownContent = document.getElementById('dropdownContent');
    dropdownContent.style.display = dropdownContent.style.display === 'block' ? 'none' : 'block';
});

// Preencher a lista de treinos ao carregar a página
window.onload = preencherDropdown;