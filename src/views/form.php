<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com/" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Inter&family=Roboto:wght@400;700&display=swap" rel="stylesheet">

    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../public/styles/form.css">
    <title>Formulário</title>
</head>
<body>
<div>
    <div>
        <button class="button-back" onclick="window.location.href='./home.php'">
            <ion-icon name="arrow-back-outline" class="icon-back"></ion-icon>
        </button>
    </div>
    <div class="main">
        <form action="../controllers/AuthController.php" method="POST">
            <div class="form-group">
                <label for="name">Nome:</label>
                <input type="text" id="name" name="name" required>
            </div>
            <div class="form-group">
                <label for="email">Email:</label>
                <input type="email" id="email" name="email" required>
            </div>
            <div class="form-group">
                <label for="password">Senha:</label>
                <input type="password" id="password" name="password" required>
            </div>
            <div class="form-check">
                <input type="checkbox" id="remember" name="remember">
                <label for="remember">Lembrar da minha senha</label>
            </div>
            <button class="button" type="submit" name="submit" value="register">Enviar</button>
            <div>
                <p>Já possui cadastro? <a href="../views/login.php">Clique aqui👈</a></p>
            </div>
        </form>
    </div>
</div>

<script type="module" src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.esm.js"></script>
<script nomodule src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.js"></script>
</body>
</html>