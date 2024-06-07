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
    <div class="icone"><?php echo $primeiraLetra; ?></div> 
    
    <div>
        <select class="select-style" id="recipeSelect">
            <option value="" disabled selected hidden>Selecione o tipo de receita</option>
            <option value="ganho-de-massa">Ganho de Massa</option>
            <option value="perca-de-peso">Perca de Peso</option>
            <option value="ganho-de-peso">Ganho de Peso</option>
        </select>
    </div>
    
    <div id="ganho-de-massaText" class="text-container">
        <p>djawlkdnlwabdlknw</p>
    </div>

    <div id="perca-de-pesoText" class="text-container">
        <p>djawlkdabknw</p>
    </div>

    <div id="ganho-de-pesoText" class="text-container">
        <p>djawçlkdw</p>
    </div>

    <script>
        document.addEventListener("DOMContentLoaded", function() {
            console.log("DOM totalmente carregado");
            var select = document.getElementById("recipeSelect");
            select.addEventListener("change", function() {
                console.log("Valor selecionado:", this.value);
                // Remove a classe 'selected' de todas as divs de texto
                var textContainers = document.getElementsByClassName("text-container");
                for (var i = 0; i < textContainers.length; i++) {
                    textContainers[i].classList.remove("selected");
                }

                // Adiciona a classe 'selected' à div de texto selecionada
                var selectedTextContainer = document.getElementById(this.value + "Text");
                if (selectedTextContainer) {
                    console.log("Elemento encontrado:", selectedTextContainer);
                    selectedTextContainer.classList.add("selected");
                } else {
                    console.log("Elemento não encontrado para o valor:", this.value);
                }
            });
        });
    </script>
</body>
</html>
