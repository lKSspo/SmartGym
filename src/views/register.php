<!-- register.php -->
<!DOCTYPE html>
<html lang="en">
<head>
    <!- <meta charset="UTF-8">
    
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com/" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Inter&family=Roboto:wght@400;700&display=swap" rel="stylesheet">

    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <link rel="stylesheet" href="../public/styles/register.css">
    <title>Cadastra-se</title>
</head>
<body>
   
<div>
    <div>
        <img src="../public/assets/icon.png" alt="">
    </div>
</head>
<body>
    <div>
        <div class="main">

            <form action="../controllers/AuthController.php" method="POST">
                <h1>Crie sua conta</h1>

                <div class="form-group">
                    <label class="label-name" for="name">Nome:</label>
                    <input class="input-name" type="text" id="name" name="name" required>
                </div>

                <div class="form-group">
                    <label class="label-email" for="email">Email:</label>
                    <input class="input-email" type="email" id="email" name="email" required>
                </div>

                <div class="form-group">
                    <label class="label-password" for="password">Senha:</label>
                    <input class="input-password" type="password" id="password" name="password" required>
                    <span>
                        <ion-icon class="icon-eye" name="eye-outline" id="icon-visible" onclick="togglePasswordVisibility()"></ion-icon>
                    </span>
                </div>
                
                <div class="form-check">
                    <input class="input-checkbox" type="checkbox" id="remember" name="remember">
                    <label for="remember">Lembrar da minha senha</label>
                </div>

                <div>
                    <p>Já possui cadastro? <a href="../views/login.php">Clique aqui👈</a></p>
                </div>

                <div class="button-next">
                    <button class="button" type="submit" name="submit" value="register">Continuar</button>
                </div>

            </form>
        </div>
    </div>

    <script type="module" src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.esm.js"></script>
    <script nomodule src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.js"></script>
    <script src="./script/index.js"></script>
    
</body>
</html>