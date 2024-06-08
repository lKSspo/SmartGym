document.addEventListener("DOMContentLoaded", function() {
    var select = document.getElementById("coletiveSelect");
    var videoContainer = document.getElementById("videoContainer");

    // Função para exibir o vídeo correspondente à semana selecionada
    function showVideo(semana) {
        var videoSource;
        switch (semana) {
            case "aula-semana-1":
                videoSource = "https://www.youtube.com/embed/cvm89a_cHKA";
                break;
            case "aula-semana-2":
                videoSource = "https://www.youtube.com/embed/MWs4E45Zg2w?si=WGHdyGiB6VnM-fIO";
                break;
            case "aula-semana-3":
                videoSource = "https://www.youtube.com/embed/x-5_l0DyV5s?si=9V9tRV0ko7x_dUIh";
                break;
            default:
                videoSource = "";
        }
        // Define o conteúdo da div do vídeo como um iframe do YouTube
        if (videoSource !== "") {
            videoContainer.innerHTML = '<iframe width="560" height="315" src="' + videoSource + '" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>'; /*Utilizado, para hospedar video do youtube sem depender do cookie atual*/
        } else {
            // Limpa o conteúdo do container de vídeo se nenhuma semana for selecionada
            videoContainer.innerHTML = "";
        }
    }

    // Evento de mudança no menu dropdown
    select.addEventListener("change", function() {
        // Chama a função para exibir o vídeo correspondente à semana selecionada
        showVideo(this.value);
    });
});
