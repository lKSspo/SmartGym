<?php
session_start();
// print_r($_SESSION);

// Caso não existir uma sessão com email ou password ele retornará para tela de login 
if ((!isset($_SESSION['email']) === true) && (!isset($_SESSION['password']) === true)) {
    unset($_SESSION['email']);
    unset($_SESSION['password']);
    header('Location: login.php');
    exit();
}

// Pegando o email e nome da sessão
$logado = $_SESSION['email'];
$nome = $_SESSION['name'];

// Pegando a primeira letra do nome
$primeiraLetra = strtoupper(substr($nome, 0, 1));
?>
<!DOCTYPE html>
<html lang="PT-BR">
<head>
    <meta charset="UTF-8">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com/" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Inter&family=Roboto:wght@400;700&display=swap" rel="stylesheet">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>SmartTech</title>
    <link rel="stylesheet" href="../public/styles/account.css">
</head>
<body>
    <div class="video-container">
    <video autoplay muted loop class="video-background">
        <source src="../public/assets/workout.mp4" type="video/mp4">
        Your browser does not support the video tag.
    </video>
    </div>
    <div>
        <div class="icone"><?php echo $primeiraLetra; ?></div>
    </div>        
    <div class="header">
        
        <div class="left-buttons">
            <button type="button" class="glow-on-hover">Treino</button>
            <button type="button" class="glow-on-hover" onclick="window.location.href='./recipe.php'">Receita</button>
            <button type="button" class="glow-on-hover">Aulas Coletivas</button>
            <button type="button" class="glow-on-hover">Contato</button>
        </div>
        <!-- <div class="right-buttons">
            <button type="button" class="button button-cadastro" onclick="window.location.href='./form.php'">Cadastro</button>
            <button type="button" class="button button-login" onclick="window.location.href='./login.php'">Login</button>
        </div> -->
        <img scr="../public/assets/image 5.png" aut="" >
    </div>
</body>
</html>