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
    <link rel="stylesheet" href="../public/styles/recipe.css">
    <title>Receita</title>
</head>
<body>
    <div>
        <div class="icone"><?php echo $primeiraLetra; ?></div>
    </div> 
    
    <div class="select-container">
    <select class="select-style">
        <option value="" disabled selected hidden>Selecione o tipo de receita</option>
        <option value="ganho-de-massa">Ganho de Massa</option>
        <option value="perca-de-peso">Perca de Peso</option>
        <option value="ganho-de-peso">Ganho de Peso</option>
    </select>
    <div>
    
</body>
</html>