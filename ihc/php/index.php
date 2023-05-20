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

    <script src="https://cdn.jsdelivr.net/npm/leaflet@1.7.1/dist/leaflet.js"></script>
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/leaflet@1.7.1/dist/leaflet.css" />


<script src="https://api.mqcdn.com/sdk/mapquest-js/v1.3.2/mapquest.js"></script>
<link type="text/css" rel="stylesheet" href="https://api.mqcdn.com/sdk/mapquest-js/v1.3.2/mapquest.css"/>

        <script src="https://www.mapquestapi.com/sdk/leaflet/v2.2/mq-map.js?key=J65EbBCCmVdbvOt91c5vKpjVTrQKjnBP"></script>
        <script src="https://www.mapquestapi.com/sdk/leaflet/v2.2/mq-routing.js?key=J65EbBCCmVdbvOt91c5vKpjVTrQKjnBP"></script>
       
  
  
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/leaflet-routing-machine@3.2.12/dist/leaflet-routing-machine.css" />
<script src="https://cdn.jsdelivr.net/npm/leaflet-routing-machine@3.2.12/dist/leaflet-routing-machine.js"></script>
    

    <script src="../js/localizacao.js" defer ></script>

     <!-- Make sure you put this AFTER Leaflet's CSS -->

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
        <div class="distance">
                distancia
            </div>
            <form id="form">
            <input type="text" id="origin" name="origin" required>
            <input type="text" id="destination" name="destination" required>
                <button style="display: none;" type="submit">Get Directions</button>
            </form> 
            <div id="map"></div>
          
        </div>
            
        
        <script src="https://cdnjs.cloudflare.com/ajax/libs/leaflet/0.7.7/leaflet.js"></script>
        <script src="https://www.mapquestapi.com/sdk/leaflet/v2.2/mq-map.js?key=J65EbBCCmVdbvOt91c5vKpjVTrQKjnBP"></script>
        <script src="https://www.mapquestapi.com/sdk/leaflet/v2.2/mq-routing.js?key=J65EbBCCmVdbvOt91c5vKpjVTrQKjnBP"></script>
       
        
</body>
</html>