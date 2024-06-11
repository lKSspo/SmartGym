const selectElement = document.getElementById('treinoSelect');
const exerciseName = document.getElementById('exerciseName');
const exerciseImage = document.getElementById('exerciseImage');
const repsElement = document.querySelector('.reps span');
const weightElement = document.querySelector('.weight span');
const slider = document.querySelector('.slider');
const paginationDots = document.querySelectorAll('.pagination .dot');
const endTrainingButton = document.getElementById('end-training');

let currentSeries = 0; // Série atual
const totalSeries = 3; // Total de séries

// Contadores de treinos concluídos para cada tipo de treino
let completedTrainings = {
    'LEG PRESS 45°': 0,
    'Flexão de Braço': 0,
    'Agachamento Livre': 0
};

const exerciseData = {
    'LEG PRESS 45°': {
        image: '../public/assets/leg-press-45.jpg',
        alt: 'Leg Press',
        reps: 10,
        weight: 65.0
    },
    'Flexão de Braço': {
        image: '../public/assets/flexoes-braço.jpg',
        alt: 'Flexão de Braço',
        reps: 15,
        weight: 10.0
    },
    'Agachamento Livre': {
        image: '../public/assets/agachamento-livre.jpeg',
        alt: 'Agachamento Livre',
        reps: 10,
        weight: 70.0
    }
};

// Função para atualizar os dados do exercício
function updateExerciseData(selectedOption) {
    const data = exerciseData[selectedOption];
    exerciseImage.src = data.image;
    exerciseImage.alt = data.alt;
    repsElement.textContent = data.reps;
    weightElement.textContent = data.weight;
}

// Função para atualizar a página de acordo com a série atual
// Função para atualizar a página de acordo com a série atual
// Função para atualizar a página de acordo com a série atual
function updatePagination() {
    paginationDots.forEach((dot, index) => {
        if (index === currentSeries) {
            dot.classList.add('active');
        } else {
            dot.classList.remove('active');
        }
    });

    // Destacar a primeira bolinha quando a primeira série estiver concluída
    if (currentSeries === 1) {
        paginationDots[0].classList.add('completed');
    }

    // Verificar se todas as séries do terceiro exercício foram concluídas antes de habilitar o botão de encerrar treino
    const selectedOption = selectElement.options[selectElement.selectedIndex].value;
    if (selectedOption === 'Agachamento Livre' && completedTrainings[selectedOption] === totalSeries) {
        endTrainingButton.removeAttribute('disabled');
        endTrainingButton.style.display = 'block';
    } else {
        endTrainingButton.setAttribute('disabled', 'disabled');
        endTrainingButton.style.display = 'none';
    }
}

selectElement.addEventListener('change', (e) => {
    const selectedOption = selectElement.options[selectElement.selectedIndex].value;
    exerciseName.textContent = selectedOption;
    updateExerciseData(selectedOption);
    currentSeries = 0; // Reinicia a série ao trocar de exercício
    updatePagination();
    endTrainingButton.style.display = 'none'; // Esconde o botão de encerrar treino ao trocar de exercício
});

slider.addEventListener('click', () => {
    const selectedOption = selectElement.options[selectElement.selectedIndex].value;

    if (currentSeries < totalSeries - 1) {
        currentSeries++;
        updatePagination();
        alert(`Você terminou a série ${currentSeries + 1}`);
    } else {
        // Incrementa o contador de treinos concluídos para o tipo de treino atual
        completedTrainings[selectedOption]++;
        updatePagination();
        alert(`Parabéns! Você concluiu o ${selectedOption}.`);
        
        // Verifica se há mais exercícios para mostrar
        const nextExerciseIndex = selectElement.selectedIndex + 1;
        if (nextExerciseIndex < selectElement.options.length) {
            // Se houver, seleciona o próximo exercício
            selectElement.selectedIndex = nextExerciseIndex;
            const nextSelectedOption = selectElement.options[nextExerciseIndex].value;
            exerciseName.textContent = nextSelectedOption;
            updateExerciseData(nextSelectedOption);
            currentSeries = 0; // Reinicia a série ao trocar de exercício
            updatePagination();
            alert('Ir para o próximo treino');
        } else {
            // Se não houver mais exercícios, exibe o botão de encerrar treino
            endTrainingButton.style.display = 'block' 
            
        }

        
    }
});


endTrainingButton.addEventListener('click', () => {
    // Verifica se todos os treinos foram concluídos
    let allTrainingsCompleted = true;
    for (const training in completedTrainings) {
        if (completedTrainings[training] < totalSeries) {
            allTrainingsCompleted = false;
            break;
        }
    }

    // Se todos os treinos foram concluídos, exibe o alerta
    if (allTrainingsCompleted) {
        alert("Parabéns! Você concluiu todos os exercícios.");
    } else {
        alert("Você precisa concluir todos os exercícios antes de encerrar o treino.");
    }
});

function messageFinal() {
    alert("Treino finalizado com sucesso")
}

document.getElementById('end-training').addEventListener('click', messageFinal);



// Set initial values
const initialData = exerciseData[selectElement.value];
exerciseName.textContent = selectElement.value;
exerciseImage.src = initialData.image;
exerciseImage.alt = initialData.alt;
repsElement.textContent = initialData.reps;
weightElement.textContent = initialData.weight;
updatePagination();
