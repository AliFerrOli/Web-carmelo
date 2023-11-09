<?php
session_start();
include_once('config/conexao.php');

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    if (isset($_POST['remover'])) {
        $produto_id = $_POST['produto_id'];
        $id_cliente = $_SESSION['user_id'];
        $quantCarrinho = $_POST['quantCarrinho'];
        echo $quantCarrinho;
        echo $produto_id;
        echo $id_cliente;


        // Verifique se o pedido existe antes de excluí-lo para evitar erros
        $sqlVerificarPedido = "SELECT id FROM pedido WHERE id_cliente = $id_cliente AND id_produto = $produto_id";
        $resultVerificarPedido = mysqli_query($conexao, $sqlVerificarPedido);

        if (mysqli_num_rows($resultVerificarPedido) > 0) {
            // Exclua o pedido da tabela
            $sqlRemoverPedido = "DELETE FROM pedido WHERE id_cliente = $id_cliente AND id_produto = $produto_id";
            $resultRemoverPedido = mysqli_query($conexao, $sqlRemoverPedido);

            $sqlAltCarrinho = "SELECT valor_total FROM carrinho WHERE id_cliente = $id_cliente";
            $resultAltCarrinho = mysqli_query($conexao, $sqlAltCarrinho);

            $row = mysqli_fetch_assoc($resultAltCarrinho);
            $valorAntigo = $row['valor_total'];

            $valorNovo = $valorAntigo - $quantCarrinho;

            $sqlAtualizarValor = "UPDATE carrinho SET valor_total = $valorNovo WHERE id_cliente = $id_cliente";
            $resultAtualizarValor = mysqli_query($conexao, $sqlAtualizarValor);



            if ($resultRemoverPedido && $resultAtualizarValor) {
                // Pedido removido com sucesso, redirecione para a página do carrinho
                header("Location: carrinho.php");
            } else {
                echo "Erro ao remover o pedido.";
            }
        } else {
            echo "Pedido não encontrado ou não pertence ao usuário.";
        }
    } else {
        echo "ID do produto não especificado.";
    }
} else {
    echo "Método de requisição inválido.";
}
