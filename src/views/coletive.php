<?php
session_start();

if ((!isset($_SESSION['email']) === true) && (!isset($_SESSION['password']) === true)) {
    unset($_SESSION['email']);
    unset($_SESSION['password']);
    header('Location: login.php');
    exit();
}

$logado = $_SESSION['email'];
$nome = $_SESSION['name'];
$primeiraLetra = strtoupper(substr($nome, 0, 1));
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../public/styles/coletive.css"> 
    <title>aulas coletivas</title>
</head>
<body>
    <div class="icone"><?php echo $primeiraLetra;?></div> 
    
    <div>
        <div class-="container">
        <select class="select-style" id="coletiveSelect">
            <option value="" disabled selected hidden>Selecione a semana</option>
            <option value="aula-semana-1">Semana 1</option>
            <option value="aula-semana-2">Semana 2</option>
            <option value="aula-semana-3">Semana 3</option>
        </select>
    </div>
    </div>

    <!-- Div para exibir o vídeo -->
    <div id="videoContainer" class="video"></div>

    <script src="./script/coletive.js"></script> 
</body>
</html>