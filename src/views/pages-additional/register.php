<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com/" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Inter&family=Roboto:wght@400;700&display=swap" rel="stylesheet">

    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <link rel="stylesheet" href="../../public/styles/pages-additional/register.css">
    <title>Cadastro Adicionais</title>
</head>
<body>
   
<div>
    <div>
        <img src="../public/assets/icon.png" alt="">
    </div> 
    <div class="main">
        <form action="../controllers/AuthController.php" method="POST">
            <h1>Crie sua conta</h1>
            <div class="form-group">
                <label class="label-altura" for="altura">Altura:</label>
                <input class="input-altura" type="number" id="altura" name="height" required>
            </div>
            <div class="form-group">
                <label class="label-peso" for="peso">Peso:</label>
                <input class="input-peso" type="number" id="peso" name="peso" required>
            </div>
            <div class="form-group">
                <label class="label-objective" for="current_objective">Objetivo Atual:</label>
                <input class="input-objective" type="text" id="current_objective" name="current_objective" required>
            </div>

            <div class="link-login">
                <p>Já possui cadastro? <a href="../login.php">Clique aqui👈</a></p>
            </div>
        </form>
        <div class="button-next">
            <button class="button" type="submit" name="submit" value="register">Finalizar Cadastro</button>
        </div> 
    </div>
</div>
    

<script type="module" src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.esm.js"></script>
<script nomodule src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.js"></script>
<script src="./script/index.js"></script> 

</body>
</html>