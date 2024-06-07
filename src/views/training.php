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
    <div class="header">
        <img src="../public/assets/icon.png" alt="">
        <div class="header-button-icon">
            <!-- <button class="dropdown">TREINO 01 <ion-icon name="chevron-down-outline"></ion-icon></button> -->
            <div class="custom-select-container">
                <select class="custom-select">
                   <option value="1" class="training">Treino01</option>
                   <option value="2" class="training"> Treino02</option>
                   <option value="3" class="training"> Treino03</option>
                   <option value="4" class="training"> Treino04</option>
                </select>
                <ion-icon name="chevron-down-outline"></ion-icon>
            </div>
            <!-- <ion-icon class="icon-clock" name="time-outline"></ion-icon> -->
             <img class="icon-clock-img" src="../public/assets/icon-clock.png" alt="" />
        </div>
    </div>
    <div class="main">
        <div class="exercise">
            <h1>LEG PRESS 45°</h1>
                <img src="../public/assets/leg-press-45.jpg" alt="Leg Press" class="exercise-img">
            <div class="details">
                <div class="reps">
                    <span>16</span>
                    <p>Repetições</p>
                </div>
                <div class="weight">
                    <span>65,0</span>
                    <p>KG</p>
                </div>
            </div>
            <div class="slider-wrapper">
                <div class="slider" id="slider">
                    <div class="slider-button" id="sliderButton">
                        <ion-icon class="icon-slider-button" name="arrow-forward-outline"></ion-icon>
                    </div>
                    <span>Próxima série</span>
                </div>
            </div>
            <div class="pagination">
                <span class="dot active"></span>
                <span class="dot"></span>
                <span class="dot"></span>
            </div>
            <button class="end-training"><ion-icon name="flash"></ion-icon> ENCERRAR TREINO</button>
        </div>
    </div>
    
    <script type="module" src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.esm.js"></script>
    <script nomodule src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.js"></script>
    <script src="./script/training.js"></script>
</body>
</html>