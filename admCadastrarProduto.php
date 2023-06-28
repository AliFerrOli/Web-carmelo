<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="assets/css/style.css">
    <title>CoffeWay - Cadastrar Produto</title>
</head>
<body>
<header>
    <div class="container header">
      <div class="logo">
          <a href=""><img class="logo" src="assets/images/logo.png"/></a>
      </div> 
      <div class="menu">
          <nav>
              <ul>
                  <li><a href="index.php">HOME</a></li>
                  <li><a href="#sobreNos">SOBRE NÓS</a></li>
                  <li><a href="cardapio.php">CARDÁPIO</a></li>
                  <li><a href="login.php">LOGIN</a></li>
                  <li><a href="cadastro.php">CADASTRAR</a></li>
                  <li><a href=""><svg class="carrinho" width="25" height="25" viewBox="0 0 25 25" fill="none" xmlns="http://www.w3.org/2000/svg">
                  <path d="M2.69122 2.50017L5.01244 16.4326C5.05483 16.7244 5.19973 16.9916 5.42118 17.1863C5.6548 17.3935 5.95769 17.5055 6.26992 17.5001H19.9998C20.2622 17.5001 20.518 17.4176 20.7309 17.2641C20.9439 17.1107 21.1031 16.8941 21.186 16.6451L24.9359 5.39515C24.9985 5.20724 25.0156 5.00714 24.9857 4.81135C24.9557 4.61556 24.8797 4.42968 24.7639 4.26903C24.648 4.10838 24.4957 3.97756 24.3193 3.88735C24.143 3.79714 23.9478 3.75012 23.7497 3.75016H5.43368L4.98744 1.06269C4.94163 0.755627 4.78241 0.476885 4.5412 0.281441C4.31258 0.094654 4.02513 -0.00500175 3.72996 0.000193321H1.24998C0.918468 0.000193321 0.60053 0.131888 0.366112 0.366307C0.131694 0.600726 0 0.918666 0 1.25018C0 1.5817 0.131694 1.89964 0.366112 2.13406C0.60053 2.36848 0.918468 2.50017 1.24998 2.50017H2.69122ZM7.30866 15.0001L5.84993 6.25014H22.016L19.0985 15.0001H7.30866ZM9.99988 22.5C9.99988 23.1631 9.73649 23.7989 9.26766 24.2678C8.79882 24.7366 8.16294 25 7.49991 25C6.83688 25 6.201 24.7366 5.73216 24.2678C5.26333 23.7989 4.99994 23.1631 4.99994 22.5C4.99994 21.837 5.26333 21.2011 5.73216 20.7323C6.201 20.2634 6.83688 20 7.49991 20C8.16294 20 8.79882 20.2634 9.26766 20.7323C9.73649 21.2011 9.99988 21.837 9.99988 22.5ZM21.2497 22.5C21.2497 23.1631 20.9864 23.7989 20.5175 24.2678C20.0487 24.7366 19.4128 25 18.7498 25C18.0867 25 17.4509 24.7366 16.982 24.2678C16.5132 23.7989 16.2498 23.1631 16.2498 22.5C16.2498 21.837 16.5132 21.2011 16.982 20.7323C17.4509 20.2634 18.0867 20 18.7498 20C19.4128 20 20.0487 20.2634 20.5175 20.7323C20.9864 21.2011 21.2497 21.837 21.2497 22.5Z" fill="#0D0D0D"/>
                  </svg></a></li>
              </ul>
          </nav>
      </div>
  </header>
    
    <section class="areaEstilizada">
        <div class="areaCadastroLogin">
            <p class="tituloCadastro">Cadastro Produto</p>
            <div class="areaCadastroCaixa">
                <div class="wrapCadastro">
                    <form action="" class="admCadastros">
                        <label>Nome do Produto</label>
                        <input type="text" name="nomeProduto" required>

                        <label>Descrição</label>
                        <textarea name="descProduto" id="descProduto" cols="30" rows="10"></textarea>

                        <div class="wrapper">
                        <input type="radio" id="comida" name="opcao" value="comida">
                        <label for="comida">Comida</label><br>
                        <input type="radio" id="bebida" name="opcao" value="bebida">
                        <label for="bebida">Bebida</label><br>
                        </div>
                        <div class="wrapper">
                            <div class="wrapperInput">
                                <label>Preço</label>
                                <input type="text" name="preco" required>
                            </div>
                            

                            <input type="submit" class="btnCadAdm" value="Concluir">
                        </div>
                        
                        
                    </form>
                    <div class="cadProdutoImg">
                        <a href="">
                            <svg width="37" height="37" viewBox="0 0 37 37" fill="none" xmlns="http://www.w3.org/2000/svg">
                                <path d="M27.3248 0.601846C27.7103 0.216484 28.2331 0 28.7781 0C29.3232 0 29.8459 0.216484 30.2314 0.601846L36.3982 6.76859C36.7835 7.15406 37 7.67681 37 8.22188C37 8.76695 36.7835 9.2897 36.3982 9.67518L17.8979 28.1754C17.5125 28.5609 16.9898 28.7776 16.4446 28.7777H10.2779C9.73273 28.7777 9.20988 28.5611 8.82439 28.1756C8.43889 27.7901 8.22232 27.2673 8.22232 26.7221V20.5554C8.22244 20.0102 8.43908 19.4875 8.82461 19.1021L27.3248 0.601846ZM12.3335 21.4064V24.6665H15.5936L32.0383 8.22188L28.7781 4.96173L12.3335 21.4064ZM0 8.22188C0 7.13153 0.433139 6.08584 1.20413 5.31485C1.97512 4.54386 3.02081 4.11072 4.11116 4.11072H14.3891C14.9342 4.11072 15.4571 4.32729 15.8426 4.71279C16.2281 5.09828 16.4446 5.62113 16.4446 6.1663C16.4446 6.71147 16.2281 7.23432 15.8426 7.61982C15.4571 8.00531 14.9342 8.22188 14.3891 8.22188H4.11116V32.8888H28.7781V22.6109C28.7781 22.0658 28.9947 21.5429 29.3802 21.1574C29.7657 20.7719 30.2885 20.5554 30.8337 20.5554C31.3789 20.5554 31.9017 20.7719 32.2872 21.1574C32.6727 21.5429 32.8893 22.0658 32.8893 22.6109V32.8888C32.8893 33.9792 32.4561 35.0249 31.6851 35.7959C30.9142 36.5669 29.8685 37 28.7781 37H4.11116C3.02081 37 1.97512 36.5669 1.20413 35.7959C0.433139 35.0249 0 33.9792 0 32.8888V8.22188Z" fill="white"/>
                            </svg>
                        </a>  
                    </div>
                </div>
            </div>
        </div>
    </section>

    
</body>
</html>