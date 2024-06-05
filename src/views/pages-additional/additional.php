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
        <!-- (restante do conteúdo) -->
        <div class="main">
            <form action="../../controllers/AuthController.php" method="POST">

                <h1>Cadastre suas Informações Adicionais</h1>

                <div class="form-group">
                    <label class="label-altura" for="altura">Altura:</label>
                    <input class="input-altura" type="number" id="altura" name="height" required>
                </div>

                <div class="form-group">
                    <label class="label-peso" for="peso">Peso:</label>
                    <input class="input-peso" type="number" id="peso" name="peso" required>
                </div>

                <div class="form-group">
                    <label for="current_objective" class="label-objective" >Objetivo Atual:</label>
                    <select id="current_objective" name="current_objective" class="select-objective" >
                        <option value="" disabled selected hidden>Selecione uma opção</option>
                        <option value="current_objective">Ganho de Massa</option>
                        <option value="current_objective">Ganho de Peso</option>
                        <option value="current_objective">Perda de Peso</option>
                    </select>
                </div>

                <div class="link-login">
                    <p>Já possui cadastro? <a href="../login.php">Clique aqui👈</a></p>
                </div>

                <div class="button-next">
                    <button class="button" type="submit" name="submit" value="register-additional">Finalizar Cadastro</button>
                </div>

            </form>
        </div>
    </div>

    <script type="module" src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.esm.js"></script>
    <script nomodule src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.js"></script>
    <script src="./script/index.js"></script>

</body>
</html>