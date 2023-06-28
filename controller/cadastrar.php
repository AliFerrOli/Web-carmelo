<?php

include_once('../config/conexao.php'); //tá incluindo o arquivo de conexão com o banco

$nome="Claudia Raia";
$cpf="00444990";
$endereco="Rua sei lá oq";
$telefone= "4599999-3333";

$result = "INSERT INTO cliente
(nome_completo, cpf, endereco, telefone)
VALUES
(
    '".$nome."',
    '".$cpf."',
    '".$endereco."',
    '".$telefone."')"

?>