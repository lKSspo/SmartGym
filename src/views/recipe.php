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
        <p>Receita para Ganho de Massa Muscular
        Peito de Frango com Batata Doce e Brócolis

        Ingredientes:

        200g de peito de frango
        1 batata doce média
        1 xícara de brócolis
        1 colher de sopa de azeite de oliva
        Sal e pimenta a gosto
        1 dente de alho picado
        Suco de meio limão
        Modo de Preparo:

        Tempere o peito de frango com sal, pimenta, alho e suco de limão. Deixe marinar por 15 minutos.
        Enquanto isso, descasque e corte a batata doce em rodelas grossas.
        Cozinhe a batata doce em água fervente com uma pitada de sal por cerca de 10 minutos ou até ficar macia.
        Cozinhe o brócolis no vapor por cerca de 5 minutos. 
        Aqueça o azeite de oliva em uma frigideira e grelhe o frango até dourar e cozinhar completamente.
        Sirva o frango com a batata doce e o brócolis.</p>
    </div>

    <div id="perca-de-pesoText" class="text-container">
        <p>Receita para Ganho de Peso
        Smoothie Hipercalórico de Banana e Manteiga de Amendoim

        Ingredientes:

        2 bananas maduras
        2 colheres de sopa de manteiga de amendoim
        1 xícara de leite integral
        1 colher de sopa de mel
        1 colher de sopa de aveia
        1 colher de chá de cacau em pó (opcional)
        Gelo a gosto
        Modo de Preparo:

        Coloque todos os ingredientes no liquidificador.
        Bata até obter uma mistura homogênea.
        Sirva imediatamente.</p>
    </div>

    <div id="ganho-de-pesoText" class="text-container">
        <div class="recipe-texts">
        <p>Receita para Perda de Peso 
        Salada de Quinoa com Abacate e Grão-de-Bico 

        Ingredientes:

        1 xícara de quinoa
        1 abacate médio
        1 xícara de grão-de-bico cozido
        1 tomate médio picado
        1 pepino médio picado
        1/4 de xícara de cebola roxa picada
        Suco de 1 limão
        2 colheres de sopa de azeite de oliva
        Sal e pimenta a gosto
        Folhas de coentro ou salsa para decorar
        Modo de Preparo:

        Cozinhe a quinoa conforme as instruções da embalagem e deixe esfriar.
        Corte o abacate em cubos e regue com um pouco de suco de limão para evitar que escureça.
        Em uma tigela grande, misture a quinoa, o abacate, o grão-de-bico, o tomate, o pepino e a cebola roxa.
        Tempere com o suco de limão, azeite de oliva, sal e pimenta.
        Decore com folhas de coentro ou salsa e sirva.</p>
    </div>
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
