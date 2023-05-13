<?php
session_start();
    if((!isset($_SESSION['email']) == true) and (!isset($_SESSION['senha']) == true ))
    {
        header('Location: ./login.html');
    }
    $logado = $_SESSION['email'];
?>


<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/index.css">

    <link rel="stylesheet" href="https://unpkg.com/leaflet@1.9.3/dist/leaflet.css"
     integrity="sha256-kLaT2GOSpHechhsozzB+flnD+zUyjE2LlfWPgU04xyI="
     crossorigin=""/>
    
    <script src="../js/localizacao.js" defer ></script>

     <!-- Make sure you put this AFTER Leaflet's CSS -->
 <script src="https://unpkg.com/leaflet@1.9.3/dist/leaflet.js"
     integrity="sha256-WBkoXOwTeyKclOHuWtc+i2uENFpDZ9YPdf5Hf+D7ewM="
     crossorigin="" defer></script>
    <title>IHC</title>
</head>
<body>
    
<nav>
            <div class="logo">
               <a href="index.php">PROJETO IHC</a> 
            </div>

            <div class="login">
                <?php echo "<span>Seja bem vindo $logado</span>" ?>
            </div>

            <div class="menu">
                sair
            </div>
        </nav>


        <div class="conteudo">
            Para onde deseja ir?


            <div class="localizacao">
            <div class="autocomplete-container" id="autocomplete-container"></div>
                <button onclick="aeste()">Pesquisar</button>
            <h3></h3>
            </div>
            <div id="map"></div>
        </div>
       
</body>
</html>