// Função para remover mensagem de erro ao digitar no campo
function removeError(inputId, errorId) {
    const input = document.getElementById(inputId);
    const error = document.getElementById(errorId);

    if (input && error) {
        input.addEventListener('input', function() {
            error.style.display = 'none';
        });
    }
}

// Função para preencher campos do formulário com valores salvos na sessão
function fillFormFields() {
    const emailInput = document.getElementById('email');
    const savedEmail = sessionStorage.getItem('savedEmail');

    if (savedEmail) {
        emailInput.value = savedEmail;
    }
}

// Função para validar o formulário antes da submissão
function validateForm(event) {
    let validate = true;

    const name = document.getElementById('name');
    const email = document.getElementById('email');
    const password = document.getElementById('password');

    const nameError = document.getElementById('error-name');
    const emailError = document.getElementById('error-email');
    const passwordError = document.getElementById('error-password');

    // Reset errors
    nameError.style.display = 'none';
    emailError.style.display = 'none';
    passwordError.style.display = 'none';

    // Basic validation checks
    if (name.value.trim() === '') {
        validate = false;
        nameError.textContent = 'O nome é obrigatório.';
        nameError.style.display = 'block';
    }

    if (email.value.trim() === '') {
        validate = false;
        emailError.textContent = 'O email é obrigatório.';
        emailError.style.display = 'block';
    } 
    
    if (!validateEmail(email.value.trim())) {
        validate = false;
        emailError.textContent = 'O email é inválido.';
        emailError.style.display = 'block';
    }

    if (password.value.trim() === '') {
        validate = false;
        passwordError.textContent = 'A senha é obrigatória.';
        passwordError.style.display = 'block';
    } 
    
    if (password.value.trim().length < 6) {
        validate = false;
        passwordError.textContent = 'A senha deve ter pelo menos 6 caracteres.';
        passwordError.style.display = 'block';
    }

    if (!validate) {
        event.preventDefault(); // Impede o envio do formulário
    } else {
        // Salvar o email na sessão apenas se todos os campos estiverem válidos
        sessionStorage.setItem('savedEmail', email.value.trim());
    }
}

// Função para validar o formato do email
function validateEmail(email) {
    const regex = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
    return regex.test(String(email).toLowerCase());
}

// Adicionar evento de submit ao formulário
const form = document.getElementById('register-form');
form.addEventListener('submit', function(event) {
    validateForm(event);
    // Limpar o email salvo na sessão após o envio do formulário
    sessionStorage.removeItem('savedEmail');

    // Verificar se o email já existe
    const email = document.getElementById('email').value.trim();
    const existingUser = localStorage.getItem(email);
    if (existingUser) {
        // Se o usuário já existir, salvar o nome e a senha no localStorage
        localStorage.setItem('savedName', document.getElementById('name').value.trim());
        localStorage.setItem('savedPassword', document.getElementById('password').value.trim());
    }
});

// Chamar a função para cada campo
removeError('name', 'error-name');
removeError('email', 'error-email');
removeError('password', 'error-password');

// Preencher campos do formulário com valores salvos na sessão
window.addEventListener('DOMContentLoaded', fillFormFields);