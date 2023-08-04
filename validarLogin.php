<?php

    include_once('config/conexao.php');
    $email = $_POST['email'];
    $senha = $_POST['senha'];

    $sql = "SELECT * FROM login WHERE email = '$email' AND senha = '$senha'";
    $result = mysqli_query($conexao, $sql);


    if (mysqli_num_rows($result) < 1) {
        
        /* header("Location: login.php?erro=1");
        exit(); */

        echo "Não existe";

        
    } else {
        echo "existe";
        
        $row = mysqli_fetch_assoc($result);
        if ($row['id_adm'] !== null) {
            // Usuário é um administrador, redirecionar para adm.php
            header("Location: admCadastrarProduto.php");
            exit();
        } else {
            // Usuário é um cliente, redirecionar para cliente.php
            header("Location: cliente.php");
            exit();
        }
    }


?>