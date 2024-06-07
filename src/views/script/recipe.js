document.addEventListener("DOMContentLoaded", function() {
    var select = document.getElementById("recipeSelect");
    select.addEventListener("change", function() {
        // Remove a classe 'selected' de todas as divs de texto
        var textContainers = document.getElementsByClassName("text-container");
        for (var i = 0; i < textContainers.length; i++) {
            textContainers[i].classList.remove("selected");
        }

        // Adiciona a classe 'selected' à div de texto selecionada
        var selectedTextContainer = document.getElementById(this.value + "Text");
        if (selectedTextContainer) {
            selectedTextContainer.classList.add("selected");
        }
    });
});
