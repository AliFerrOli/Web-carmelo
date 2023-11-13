<?php
session_start();

include_once('config/conexao.php');

// Consulta SQL para buscar informações dos Enderecos
$sqlListarAdm = "SELECT adm.id, adm.nome_completo, adm.cpf, adm.endereco, adm.telefone, adm.loja_id, loja.rua 
                FROM adm
                INNER JOIN loja ON adm.loja_id = loja.id";
$resultListarAdm = mysqli_query($conexao, $sqlListarAdm);

$sqlEmailAdm= "SELECT email FROM login";
$resultListarEmailAdm = mysqli_query($conexao, $sqlEmailAdm);
?>

<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="assets/css/styleAdm.css">
    <title>CoffeWay - Cadastrar Endereco</title>
</head>

<body>
    <header>
        <div class="container header">
            <div class="logo">
                <a href=""><img class="logo" src="assets/images/logo.png" /></a>
            </div>
            <div class="menu">
                <nav>
                    <ul>
                        <li><a href="index.php">DASHBOARD</a></li>
                        <li><a href="#sobreNos">PEDIDOS</a></li>
                        <li>
                            <a href="cliente.php">
                                <div class="admLogado"><?php echo $_SESSION['user_name']; ?><strong>ADM</strong></div>
                            </a>
                        </li>
                        <li>

                    </ul>
                </nav>
            </div>
    </header>

    <section class="areaEstilizada">
        <div class="menuAdmArea">

            <div class="tituloTopoArea">
                <div class="textoTopo">
                    <a class="setaVoltar" href="admAdministradores.php">
                        <svg width="51" height="45" viewBox="0 0 51 45" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <path d="M24.4194 0.927712C25.0134 1.52191 25.3471 2.3277 25.3471 3.16788C25.3471 4.00807 25.0134 4.81386 24.4194 5.40806L10.8168 19.0107H47.5277C48.3681 19.0107 49.174 19.3445 49.7683 19.9387C50.3625 20.533 50.6963 21.3389 50.6963 22.1793C50.6963 23.0196 50.3625 23.8255 49.7683 24.4198C49.174 25.014 48.3681 25.3478 47.5277 25.3478H10.8168L24.4194 38.9504C24.9966 39.548 25.316 40.3484 25.3088 41.1792C25.3015 42.01 24.9683 42.8047 24.3808 43.3922C23.7934 43.9797 22.9986 44.3129 22.1678 44.3201C21.3371 44.3273 20.5367 44.008 19.9391 43.4308L0.927712 24.4194C0.333699 23.8252 0 23.0194 0 22.1793C0 21.3391 0.333699 20.5333 0.927712 19.9391L19.9391 0.927712C20.5333 0.333699 21.3391 0 22.1793 0C23.0194 0 23.8252 0.333699 24.4194 0.927712Z" fill="#220404" />
                        </svg>

                    </a>
                    <p class="tituloCadastro">LISTAR ADMINISTRADORES</p>
                </div>
            </div>

            <section class="listarEnderecoArea">

                <div class="listarEnderecoCaixa">
                    <?php

                    $emailRow = mysqli_fetch_assoc($resultListarEmailAdm);
                    $email = $emailRow['email'];
                    // Loop para percorrer os resultados da consulta
                    while ($row = mysqli_fetch_assoc($resultListarAdm)) {
                        $id = $row['id'];
                        $nome_completo = $row['nome_completo'];
                        $cpf = $row['cpf'];
                        $endereco = $row['endereco'];
                        $telefone = $row['telefone'];
                        $loja = $row['rua'];
                    ?>
                        <div class="listarEnderecoCaixas">
                            <div class="listarEnderecoDesc">
                                <h3 style="text-transform: uppercase;"><?php echo $nome_completo; ?></h3>
                                <p><strong>Cpf:</strong> <?php echo $cpf; ?></p>
                                <p><strong>Endereço:</strong> <?php echo $endereco; ?></p>
                                <p><strong>Telefone:</strong> <?php echo $telefone; ?></p>
                                <p><strong>Email:</strong> <?php echo $email; ?></p>
                                <p><strong>Rua da Loja:</strong> <?php echo $loja?></p>

                            </div>
                            <div class="listarEnderecoBotoes">
                                <form action="admEditarCliente.php?id=<?php echo $id; ?>" method="get">

                                    <input type="hidden" name="id" value="<?php echo $id; ?>">
                                    <input class="listarEnderecoEditar" name="EditarEndereco" type="submit" value="EDITAR">
                                </form>


                                <form action="excluirCliente.php?id=<?php echo $id; ?>" method="get">

                                    <input type="hidden" name="id" value="<?php echo $id; ?>">
                                    <input class="listarEnderecoExcluir" name="ExcluirEndereco" type="submit" value="EXCLUIR">
                                </form>

                            </div>
                        </div>
                    <?php
                    }


                    ?>

                </div>
            </section>
        </div>

    </section>


</body>

</html>