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
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com/" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Inter&family=Roboto:wght@400;700&display=swap" rel="stylesheet">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../public/styles/training.css">
    <title>Training</title>
</head>
<body>
    <div class="icone"> 
        <?php echo $primeiraLetra; ?>
        <div class="info-box" id="infoBox">
            <p>Email: <?php echo $logado; ?></p>
            <p>Nome: <?php echo $nome; ?></p>
            <a href="../controllers/AuthController.php?action=logout">Sair</a>
        </div>
    </div> 
    <div class="header">
        <img src="../public/assets/icon.png" alt="" onclick="window.location.href='../views/account.php'">
        <div class="header-button-icon">
            <div class="custom-select-container">
                <select class="custom-select" id="treinoSelect">
                    <option value="LEG PRESS 45°" class="training">Treino01</option>
                    <option value="Flexão de Braço" class="training">Treino02</option>
                    <option value="Agachamento Livre" class="training">Treino03</option>
                </select>
                <ion-icon name="chevron-down-outline"></ion-icon>
            </div>
            <img class="icon-clock-img" src="../public/assets/icon-clock.png" alt="" />
        </div>
    </div>
    <div class="main">
        <div class="exercise">
            <h1 id="exerciseName">LEG PRESS 45°</h1>
            <img id="exerciseImage" src="../public/assets/leg-press-45.jpg" alt="Leg Press" class="exercise-img">
            <div class="details">
                <div class="reps">
                    <span>10</span>
                    <p>Repetições</p>
                </div>
                <div class="weight">
                    <span>65,0</span>
                    <p>KG</p>
                </div>
            </div>
            <div class="slider-wrapper">
                <div class="slider" id="slider">
                    <span>Próxima série</span>
                </div>
            </div>
            <div class="pagination">
                <span class="dot active"></span>
                <span class="dot"></span>
                <span class="dot"></span>
            </div>
            <button class="end-training" id="end-training"><ion-icon name="flash"></ion-icon> ENCERRAR TREINO</button>
        </div>
    </div>

<script>
  function messageFinal() {
    alert("Treino finalizado com sucesso");
  }

  document.getElementById('end-training').addEventListener('click', messageFinal);
</script>
    
    <script type="module" src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.esm.js"></script>
    <script nomodule src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.js"></script>
    <script src="./script/training.js"></script>
    <script src="./script/index.js"></script>
</body>
</html>