<?php

if(isset($_POST['submit'])){
    include_once('config.php');


    $nome = $_POST['nome'];
    $email = $_POST['email'];
    $senha = $_POST['senha'];
    $check = $_POST['check'];

    #############

    $modelo = $_POST['veiculo'];
    $placa = $_POST['placa'];

    try{
        $result = mysqli_query($conexao, "INSERT INTO usuario (nome, email, senha, motorista) 
        VALUES ('$nome','$email','$senha', '$check')");

    header("Location: ");
        
    }catch(erro){
    header("Location: ./login.html");
    }


    $result = mysqli_query($conexao, "INSERT INTO carro (modelo, placa) 
    VALUES ('$modelo', '$placa')");
}

?>