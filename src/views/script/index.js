function togglePasswordVisibility() {
    const passwordInput = document.getElementById('password');
    const iconVisible = document.getElementById('icon-visible');

    if (passwordInput.type === 'password') {
        passwordInput.type = 'text';
        iconVisible.name = 'eye-off-outline';
    } else {
        passwordInput.type = 'password';
        iconVisible.name = 'eye-outline';
    }
}


document.querySelector('.icone').addEventListener('click', function() {
    // Exibindo a caixa de informações
    document.getElementById('infoBox').style.display = 'block';
});

// Adicionando evento de clique no documento para fechar o modal ao clicar fora dele
document.addEventListener('click', function(event) {
    var infoBox = document.getElementById('infoBox');
    var icone = document.querySelector('.icone');
    if (event.target !== infoBox && event.target !== icone) {
        infoBox.style.display = 'none';
    }
});