<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com/" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Inter&family=Roboto:wght@400;700&display=swap" rel="stylesheet">

    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../public/styles/login.css">
    <title>Tela de Login</title>
</head>
<body>
<div>
    <div>
        <img src="../public/assets/icon.png" alt="">
    </div>
    <div class="main">
        <form action="../controllers/AuthController.php" method="POST">
            <h1>Acesse sua conta</h1>
            <div class="form-group">
                <label for="email">E-mail</label>
                <input type="email" id="email" name="email" required>
            </div>
            <div class="form-group">
                <label for="password">Senha</label>
                <input type="password" id="password" name="password" required>
                <span>
                    <ion-icon class="icon-eye" name="eye-outline" id="icon-visible" onclick="togglePasswordVisibility()"></ion-icon>
                </span>
            </div>
            <div class="forgot-password">
                <button class="button" type="submit" name="submit" value="login">
                    Entrar
                </button>
                <a href="#">Esqueci minha senha</a>
            </div>
        </form>
    </div>
</div>

<script type="module" src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.esm.js"></script>
<script nomodule src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.js"></script>
<script src="./script/index.js"></script> 

</body>
</html>
