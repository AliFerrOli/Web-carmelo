<?php
session_start();
include_once('config/conexao.php');

if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['add-to-cart'])) {
    if (isset($_POST['id_produto'])) {
        if (isset($_SESSION['user_type'])) { // Verifica se o usuário está logado
            $id_produto = $_POST['id_produto'];
            $id_cliente = $_SESSION['user_id'];
            $nomeProduto = $_POST['nomeProduto'];
            $nomePreco = $_POST['nomePreco'];

            mysqli_autocommit($conexao, false); // Desativa o modo autocommit

            // Verificar se já existe um registro no carrinho para esse cliente
            $checkCartQuery = "SELECT * FROM carrinho WHERE id_cliente = $id_cliente FOR UPDATE";
            $checkCartResult = mysqli_query($conexao, $checkCartQuery);

            if ($checkCartResult !== false) {
                if (mysqli_num_rows($checkCartResult) > 0) {
                    // Se o carrinho já existe, atualize o valor total no carrinho
                    $totalValueQuery = "SELECT SUM(valor_total) AS total FROM pedido WHERE id_cliente = $id_cliente";
                    $totalValueResult = mysqli_query($conexao, $totalValueQuery);

                    if ($totalValueResult !== false) {
                        $totalRow = mysqli_fetch_assoc($totalValueResult);
                        $totalValue = $totalRow['total'];

                        $updateCartQuery = "UPDATE carrinho SET valor_total = $totalValue WHERE id_cliente = $id_cliente";
                        $updateCartResult = mysqli_query($conexao, $updateCartQuery);

                        if (!$updateCartResult) {
                            mysqli_rollback($conexao); // Desfaz a transação em caso de erro
                            echo "Erro ao atualizar o carrinho: " . mysqli_error($conexao);
                            exit;
                        }
                    } else {
                        mysqli_rollback($conexao); // Desfaz a transação em caso de erro
                        echo "Erro ao calcular o valor total: " . mysqli_error($conexao);
                        exit;
                    }
                } else {
                    // Se o carrinho não existe, insira um novo registro no Carrinho
                    $insertCartQuery = "INSERT INTO carrinho (id_cliente, data_pedido, valor_total, situacao) 
                    VALUES ($id_cliente, NOW(), $nomePreco, 'Aguardando')";
                    $insertCartResult = mysqli_query($conexao, $insertCartQuery);

                    if (!$insertCartResult) {
                        mysqli_rollback($conexao); // Desfaz a transação em caso de erro
                        echo "Erro ao criar o carrinho: " . mysqli_error($conexao);
                        exit;
                    }
                }
            } else {
                mysqli_rollback($conexao); // Desfaz a transação em caso de erro
                echo "Erro na consulta SQL do carrinho: " . mysqli_error($conexao);
                exit;
            }

            // Verificar se já existe um registro no carrinho para esse produto
            $checkProductQuery = "SELECT * FROM pedido WHERE id_cliente = $id_cliente AND id_produto = $id_produto FOR UPDATE";
            $checkProductResult = mysqli_query($conexao, $checkProductQuery);

            if ($checkProductResult !== false) {
                $row = mysqli_fetch_assoc($checkProductResult);
                if (mysqli_num_rows($checkProductResult) > 0) {
                    // Se o produto já existe no carrinho, atualize a quantidade no Carrinho
                    $id_pedidoAtualizar = $row['id'];

                    $quantidadeSql = "SELECT quantidade_total, valor_total FROM pedido WHERE id_produto = $id_produto";
                    $quantidadeResult = mysqli_query($conexao, $quantidadeSql);
                    $row = mysqli_fetch_assoc($quantidadeResult);
                    $quantidade = $row['quantidade_total'];
                    $newQuantidade = $quantidade + 1;
                    $valor = $row['valor_total'];
                    $newValor = $valor + $nomePreco;

                    $updateQuery = "UPDATE pedido SET quantidade_total = $newQuantidade, valor_total = $newValor WHERE id = $id_pedidoAtualizar";
                    $updateResult = mysqli_query($conexao, $updateQuery);

                    $totalValueQuery = "SELECT SUM(valor_total) AS total FROM pedido WHERE id_cliente = $id_cliente";
                    $totalValueResult = mysqli_query($conexao, $totalValueQuery);

                    if ($totalValueResult !== false) {
                        $totalRow = mysqli_fetch_assoc($totalValueResult);
                        $totalValue = $totalRow['total'];

                        // Atualize o valor_total na tabela carrinho
                        $updateCartQuery = "UPDATE carrinho SET valor_total = $totalValue WHERE id_cliente = $id_cliente";
                        $updateCartResult = mysqli_query($conexao, $updateCartQuery);

                        if ($updateCartResult) {
                            mysqli_commit($conexao); // Confirma a transação
                            echo "Produto adicionado ao carrinho com sucesso.";
                        } else {
                            mysqli_rollback($conexao); // Desfaz a transação em caso de erro
                            echo "Erro ao atualizar o carrinho: " . mysqli_error($conexao);
                        }
                    } else {
                        mysqli_rollback($conexao); // Desfaz a transação em caso de erro
                        echo "Erro ao calcular o valor total: " . mysqli_error($conexao);
                    }
                } else {
                    // Se o produto não existe no carrinho, insira um novo registro no Carrinho
                    $insertQueryPedido = "INSERT INTO pedido (id_cliente, id_produto, quantidade_total, nome_produto, valor_total, data) 
                    VALUES ($id_cliente, $id_produto, 1, '$nomeProduto', $nomePreco, NOW())";
                    $insertResultPedido = mysqli_query($conexao, $insertQueryPedido);

                    if ($insertResultPedido) {
                        $totalValueQuery = "SELECT SUM(valor_total) AS total FROM pedido WHERE id_cliente = $id_cliente";
                        $totalValueResult = mysqli_query($conexao, $totalValueQuery);

                        if ($totalValueResult !== false) {
                            $totalRow = mysqli_fetch_assoc($totalValueResult);
                            $totalValue = $totalRow['total'];

                            // Atualize o valor_total na tabela carrinho
                            $updateCartQuery = "UPDATE carrinho SET valor_total = $totalValue WHERE id_cliente = $id_cliente";
                            $updateCartResult = mysqli_query($conexao, $updateCartQuery);

                            if ($updateCartResult) {
                                mysqli_commit($conexao); // Confirma a transação
                                echo "Produto adicionado ao carrinho com sucesso.";
                            } else {
                                mysqli_rollback($conexao); // Desfaz a transação em caso de erro
                                echo "Erro ao atualizar o carrinho: " . mysqli_error($conexao);
                            }
                        } else {
                            $insertQueryCarrinho = "INSERT INTO carrinho (id_cliente, data_pedido, valor_total, situacao) 
                            VALUES ($id_cliente, NOW(), $nomePreco, 'Aguardando')";
                            $insertResultCarrinho = mysqli_query($conexao, $insertQueryCarrinho);
                        }
                    } else {
                        mysqli_rollback($conexao); // Desfaz a transação em caso de erro
                        echo "Erro ao adicionar ao carrinho: " . mysqli_error($conexao);
                    }
                }
            } else {
                mysqli_rollback($conexao); // Desfaz a transação em caso de erro
                echo "Erro na consulta SQL: " . mysqli_error($conexao);
            }

            mysqli_autocommit($conexao, true); // Reativa o modo autocommit
        } else {
            // Redirecione o usuário para a tela de login se não estiver logado
            header("Location: login.php");
            exit; // Encerre o script
        }
    } else {
        echo "Erro: Parâmetros inválidos.";
    }
}
?>
