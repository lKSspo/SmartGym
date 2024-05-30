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
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../public/styles/account.css">
    <title>Account</title>
</head>
<body>
    <div>
        <div class="icone"><?php echo $primeiraLetra; ?></div>
        <a href="../controllers/AuthController.php?action=logout">Sair</a>
    </div>
</body>
</html>
