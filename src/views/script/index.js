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