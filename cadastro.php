<?php
    include_once('config/conexao.php');


    if(isset($_POST['submit']))
    {
        $nome = ($_POST['nome']);
        $email =($_POST['email']);
        $cpf = ($_POST['cpf']);
        $telefone = ($_POST['tel']);
        $endereco = ($_POST['endereco']);
        $senha = ($_POST['senha']);

        $sql_cliente = "INSERT INTO cliente(nome_completo, cpf, endereco, telefone) 
        VALUES ('$nome', '$cpf', '$endereco', '$telefone')";

        $result_cliente = mysqli_query($conexao, $sql_cliente);

        if ($result_cliente) {
            // Obtém o ID do cliente recém-cadastrado
            $id_cliente = mysqli_insert_id($conexao);
    
            // Insere o novo login associado ao ID do cliente
            $sql_login = "INSERT INTO login(id_cliente, email, senha) 
                          VALUES ('$id_cliente', '$email', '$senha')";
    
            $result_login = mysqli_query($conexao, $sql_login);
    
            if ($result_login) {
                // Inserções bem-sucedidas
                echo "Dados cadastrados com sucesso.";
            } else {
                // Erro ao inserir dados
                echo "Erro ao cadastrar os dados de login.";
            }
        } else {
            // Erro ao inserir dados
            echo "Erro ao cadastrar os dados de cliente.";
        }

       /*  $sql_login = "INSERT INTO login(email, senha) 
        VALUES ('$email', '$senha')";

        $result_login = mysqli_query($conexao, $sql_login);
        echo mysqli_insert_id($conexao);

        if ($result_cliente && $result_login) {
            // Inserções bem-sucedidas
            echo "Dados cadastrados com sucesso.";
        } else {
            // Erro ao inserir dados
            echo "Erro ao cadastrar os dados.";
        } */
    };

    

    
?>





<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="assets/css/styleLogin.css">
    <title>Tela de Cadastrar</title>
</head>
<body>
    <form class="login" action="" method="post">
        <h2>Cadastrar</h2>
        <div class="box-user">
            <input type="text" name="nome" required>
            <label>Nome Completo</label>
        </div>
        <div class="box-user">
            <input type="text" name="email" required>
            <label>Email</label>
        </div>
        <div class="box-user-dividido">
            <div class="box-user direita">
                <input type="number" name="cpf" required>
                <label>Cpf</label>
            </div>
            <div class="box-user esquerda">
                <input type="tel" name="tel" required>
                <label>Telefone</label>
            </div>
        </div>
        <div class="box-user">
            <input type="text" name="endereco" required>
            <label>Endereço</label>
        </div>
        <div class="box-user-dividido">
            <div class="box-user direita">
                <input type="password" name="senha" required>
                <label>Senha</label>
            </div>
            <div class="box-user esquerda">
                <input type="password" name="" required>
                <label>Confirmar senha</label>
            </div>
        </div>
        <input name="submit" class="btn" type="submit" value="Cadastrar">
        
    </form>
</body>
</html>