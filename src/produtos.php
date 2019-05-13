<!doctype html>
<html lang="pt-br">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="css/main.css">
    <link rel="stylesheet" href="css/styles.css">

    <title>Admin</title>

    <nav class="navbar navbar-expand-lg navbar-dark bg-info">
        <a class="navbar-brand" href="admin.php">Peça&Pag</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#conteudoNavbarSuportado" aria-controls="conteudoNavbarSuportado" aria-expanded="false" aria-label="Alterna navegação">
          <span class="navbar-toggler-icon"></span>
        </button>
      
        <div class="collapse navbar-collapse" id="conteudoNavbarSuportado">
          <ul class="navbar-nav mr-auto">
            <li class="nav-item ">
              <a class="nav-link" href="admin.php">HOME <span class="sr-only">(página atual)</span></a>
            </li>
            <li class="nav-item dropdown active">
              <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                ADMINISTRAÇÃO
              </a>
              <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                <a class="dropdown-item" href="cadastros.php">cadastros </a>
                <a class="dropdown-item" href="produtos.php">Produtos    </a>
                <a class="dropdown-item" href="usuarios.php">Usuários    </a>
              </div>
            </li>
            <li class="nav-item ">
              <a class="nav-link" href="mesas.php">MESAS</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="#">RELATÓRIOS</a>
            </li>
            <li class="nav-item">
              <a class="nav-link disabled" href="#">BACKUP</a>
            </li>
            <li class="nav-item ">
              <a class="nav-link" href="index.php">SAIR</a>
            </li>
          </ul>
          <ul class="navbar-nav ml-auto">
            
          </ul>
          <form class="form-inline my-2 my-lg-0">
            <input class="form-control mr-sm-2" type="search" placeholder="Pesquisar" aria-label="Pesquisar">
            <button class="btn btn-outline-success my-2 my-sm-0 bg-dark" type="submit">OK</button>
          </form>
        </div>
      </nav>

      <script type="text/JavaScript">

      
      </script>
      <?php 
        include("conexao.php");
      ?> 

  </head>
  <body>
      <div class="container bg-dark text-white mt-2 mb-2">
        <div class="row">
          <div class="col">
            <div class="container pt-3">
              <h3 style="text-align:center">Nova Pizza</h3>
                <form action="registro-produto.php" method="POST">                 
                  <div class="form-group">
                    <label>Tamanho</label>
                    <select name="tamanho" id="tamanho" class="form-control">
                        <option value="Pequena">Pequena</option>
                        <option value="Média">Média</option>
                        <option value="Grande" >Grande</option>
                        <option value="Família">Família</option>
                    </select>
                  </div>

                  <div class="form-group">
                    <label>Nº Sabores</label>
                    <select name="nsabor" id="nsabor" class="form-control">
                        <option value="1">1</option>
                        <option value="2">2</option>
                        <option value="3">3</option>
                        <option value="4">4</option>
                    </select>
                  </div>

                  <div class="form-group">
                      <label>Valor</label>
                      <input type="number" id="valor" name="valor" required class="form-control" placeholder="R$" step="0.01" min="0.01" max="99">
                    </div>
    
                <div class="form-group" style="display: flex;flex-direction: row;justify-content: center;align-items: center;">
                  <button type="submit" class="btn btn-primary btn-block mb-3" style="width:25%;"> Salvar </button>
                </div>
              </form>
            </div>
          </div>

          <div class="col">
            <div class="container pt-3">
                <h3 style="text-align:center">Nova Bebida</h3>
                  <form action="registro-bebida.php" method="POST">
                    <div class="form-group">
                        <label>Nome</label>
                        <input type="text" id="nome" name="nome" required class="form-control" placeholder="nome">
                    </div>
      
                    <div class="form-group">
                        <label>Valor</label>
                        <input type="number" id="valor" name="valor" required class="form-control" placeholder="R$" step="0.01" min="0.01" max="99">
                    </div>
  
                    <div class="form-group">
                        <label>Estoque</label>
                        <input type="number" id="estoque" name="estoque" required class="form-control" placeholder="estoque" >
                    </div>
      
                  <div class="form-group" style="display: flex;flex-direction: row;justify-content: center;align-items: center;">
                    <button type="submit" class="btn btn-primary btn-block mb-3" style="width:25%;"> Salvar </button>
                  </div>
                </form>
              </div>
          </div>
        </div>

        <div class="row">
            <div class="col">
                <?php  
                  // puxar produtos do banco
                  $consulta = "SELECT tamanho, nsabor, valor FROM `pizza` WHERE 1";
                  $result = mysqli_query($conexao, $consulta) or die ($conexao->error);
                  $num = $result->num_rows;
                ?>
      
                <div class="table-responsive-sm pt-3">
                  <h3 style="text-align:center">Pizzas</h3>
                    <div class="pt-2">
                      <?php if($num > 0){ ?>
                      <table class="table bg-light table-striped" style="text-align:center">
                        <thead style="text-align:center; font-weight:bold;" >
                          <tr>
                            <td>Tamanho</td>
                            <td>Sabor</td>
                            <td>Valor (R$)</td>      
                          </tr>
                        </thead>
                        <tbody >
                          <?php while($pizzas = $result->fetch_assoc()) { ?>
                          <tr>
                            <td><?php echo $pizzas['tamanho']; ?></td>
                            <td><?php echo $pizzas['nsabor']; ?></td>
                            <td><?php echo $pizzas['valor']; ?></td>
                          </tr>
                          <?php } ?>
                        </tbody>
                      </table>
                    <?php } ?>
                  </div>
              </div>
            </div>

            <div class="col">
                <?phP           
                  // puxar produtos do banco
                  $consulta = "SELECT nome, valor, estoque FROM `bebida` WHERE 1";
                  $result = mysqli_query($conexao, $consulta) or die ($conexao->error);
                  $num = $result->num_rows;
                ?>
      
                <div class="table-responsive-sm pt-3">
                  <h3 style="text-align:center">Bebidas</h3>
                    <div class="pt-2">
                      <?php if($num > 0){ ?>
                      <table class="table bg-light table-striped" style="text-align:center">
                        <thead style="text-align:center; font-weight:bold;" >
                          <tr>
                            <td>Nome</td>
                            <td>Valor (R$)</td>
                            <td>Estoque</td>      
                          </tr>
                        </thead>
                        <tbody >
                          <?php while($bebidas = $result->fetch_assoc()) { ?>
                          <tr>
                            <td><?php echo $bebidas['nome']; ?></td>
                            <td><?php echo $bebidas['valor']; ?></td>
                            <td><?php echo $bebidas['estoque']; ?></td>
                          </tr>
                          <?php } ?>
                        </tbody>
                      </table>
                    <?php } ?>
                  </div>
              </div>
            </div>
            <?php if (isset($_GET['sucesso1'])) { ?>
              <script>alert('Pizza cadastrada com sucesso!')</script>
                  <!-- <div class="alert alert-success" role="alert" style="text-align:center">
                    <strong>Pizza cadastrado com sucesso!</strong>
                  </div> -->
                <?php }elseif (isset($_GET['erro1'])){ ?>
                  <script>alert('Erro! Pizza já existe, tente novamente...')</script>
                  <!-- <div class="alert alert-danger" role="alert" style="text-align:center">
                    <strong>Erro! Pizza já existe, tente novamente...</strong>
                  </div> -->
                <?php }elseif (isset($_GET['sucesso2'])) { ?>
                  <script>alert('Bebida cadastrado com sucesso!')</script>
                  <!-- <div class="alert alert-success" role="alert" style="text-align:center">
                    <strong>Bebida cadastrado com sucesso!</strong>
                  </div> -->
                <?php }elseif (isset($_GET['erro2'])){ ?>
                  <script>alert('Erro! Bebida já existe, tente novamente...')</script>
                  <!-- <div class="alert alert-danger" role="alert" style="text-align:center">
                    <strong>Erro! Bebida já existe, tente novamente...</strong>
                  </div> -->
                <?php } ?>

          </div>

      </div>

    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="js/jquery.js"></script>
    <script src="js/popper.js"></script>
    <script src="js/bootstrap.js"></script>
  </body>
</html>

