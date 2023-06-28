<?php
    include_once('config/conexao.php');

    /* if ($_SERVER["REQUEST_METHOD"] == "POST") {
        // Verificar se os campos obrigatórios foram preenchidos
        if (
            isset($_POST['nome']) &&
            isset($_POST['cpf']) &&
            isset($_POST['endereco']) &&
            isset($_POST['telefone']) &&
            isset($_POST['senha']) &&
            isset($_POST['email'])
        ) {
            $nome = $_POST['nome'];
            $cpf = $_POST['cpf'];
            $endereco = $_POST['endereco'];
            $telefone = $_POST['telefone'];
            $senha = $_POST['senha'];
            $email = $_POST['email'];

            // Criar a consulta SQL para inserção de dados na tabela cliente
            $sql_cliente = "INSERT INTO cliente (nome_completo, cpf, endereco, telefone) VALUES ('$nome', '$cpf', '$endereco', '$telefone')";

            // Executar a consulta na tabela cliente
            if ($conn->query($sql_cliente) === TRUE) {
                // Inserção bem-sucedida na tabela cliente

                // Recuperar o ID do cliente inserido
                $cliente_id = $conn->insert_id;

                // Criar a consulta SQL para inserção de dados na tabela login
                $sql_login = "INSERT INTO login (id_cliente, email, senha, usertype) VALUES ('$cliente_id', '$email', '$senha', 'user')";

                // Executar a consulta na tabela login
                if ($conn->query($sql_login) === TRUE) {
                    // Inserção bem-sucedida na tabela login
                    echo "Cadastro realizado com sucesso!";
                } else {
                    // Erro ao inserir os dados na tabela login
                    echo "Erro ao cadastrar na tabela login: " . $conn->error;
                }
            } else {
                // Erro ao inserir os dados na tabela cliente
                echo "Erro ao cadastrar na tabela cliente: " . $conn->error;
            }
        } else {
            // Campos obrigatórios não preenchidos
            echo "Por favor, preencha todos os campos obrigatórios.";
        }
    } */

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

        $result_client = mysqli_query($conexao, $sql_cliente);

        $sql_login = "INSERT INTO login(email, senha) 
        VALUES ('$email', '$senha')";

        $result = mysqli_query($conexao, $sql_login);

        if ($result_cliente && $result_login) {
            // Inserções bem-sucedidas
            echo "Dados cadastrados com sucesso.";
        } else {
            // Erro ao inserir dados
            echo "Erro ao cadastrar os dados.";
        }
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
    <form class="login" action="cadastro.php" method="post">
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