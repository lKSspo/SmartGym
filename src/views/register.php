<?php
    session_start();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
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
    </div>
    <div class="main">
        <form id="register-form" action="../controllers/AuthController.php" method="POST">
            <h1>Crie sua conta</h1>

            <div class="forms">

                <div class="form-group">
                    <label class="label-name" for="name">Nome:</label>
                    <input class="input-name" type="text" id="name" name="name" value="<?php echo isset($_POST['name']) ? htmlspecialchars($_POST['name']) : ''; ?>">

                    <?php if (isset($_SESSION['errors']['name'])): ?>
                        <p class="error" id="error-name"><?php echo $_SESSION['errors']['name']; ?></p>
                    <?php endif; ?>

                </div>

                <div class="form-group">
                    <label class="label-email" for="email">Email:</label>
                    <input class="input-email" id="email" name="email" value="<?php echo isset($_POST['email']) ? htmlspecialchars($_POST['email']) : ''; ?>">

                    <?php if (isset($_SESSION['errors']['email'])): ?>
                        <p class="error" id="error-email"><?php echo $_SESSION['errors']['email']; ?></p>
                    <?php endif; ?>

                </div>

                <div class="form-group">
                    <label class="label-password" for="password">Senha:</label>
                    <input class="input-password" type="password" id="password" name="password" value="">

                    <span>
                        <ion-icon class="icon-eye" name="eye-outline" id="icon-visible" onclick="togglePasswordVisibility()"></ion-icon>
                    </span>

                    <?php if (isset($_SESSION['errors']['password'])): ?>
                        <p class="error" id="error-password"><?php echo $_SESSION['errors']['password']; ?></p>
                    <?php endif; ?>

                </div>
            </div>
                    
            <div class="form-check">
                <input class="input-checkbox" type="checkbox" id="remember" name="remember" <?php echo isset($_POST['remember']) ? 'checked' : ''; ?>>
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

    <script type="module" src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.esm.js"></script>
    <script nomodule src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.js"></script>
    <script src="./script/index.js"></script>
    <script src="./script/validationForm.js"></script>
</body>
</html>

<?php
    unset($_SESSION['errors']);
?>