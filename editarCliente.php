<?php
session_start();

include_once('config/conexao.php');

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    

    // Recupere os dados enviados pelo formulário
    $id = $_POST['id'];
    $nome = $_POST['nome'];
    $email = $_POST['email'];
    $cpf = $_POST['cpf'];
    $telefone = $_POST['tel'];
    $endereco = $_POST['endereco'];
    $senha = $_POST['senha'];


    $sqlEditarCliente = "UPDATE cliente SET nome_completo = '$nome', cpf = '$cpf', endereco = '$endereco', telefone = '$telefone' WHERE id = $id";

    $resultEditarCliente= mysqli_query($conexao, $sqlEditarCliente);
    if ($resultEditarCliente) {
        // Redirecionar para a tela de sucesso após a exclusão
        header('Location: listarCliente.php');
        exit();
    } else {
        echo "<h2>Erro ao editar o Cliente.<h2>";
    }
} else {
    // Se o formulário não foi enviado por POST, você pode lidar com isso de acordo com a sua lógica.
}
?>
