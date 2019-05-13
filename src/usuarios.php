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
                <a class="dropdown-item" href="categorias.php">Categorias </a>
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

  </head>
  <body>
      <div class="container bg-dark text-white mt-2 mb-2">
        <div class="row">
          <div class="col">
            <div class="container pt-3">
              <h3 style="text-align:center">Cadastro</h3>
                <form action="registro-usuario.php" method="POST">
                
                  <?php if (isset($_GET['sucesso'])) { ?>
                    <div class="alert alert-success" role="alert" style="text-align:center">
                      <strong>Usuário cadastrado com sucesso!</strong>
                    </div>
                  <?php }elseif (isset($_GET['erro1'])){ ?>
                    <div class="alert alert-danger" role="alert" style="text-align:center">
                      <strong>Erro! Usuário já existe, tente novamente...</strong>
                    </div>
                  <?php } ?>

                <div class="form-group">
                  <label>Perfil</label>
                  <select name="perfil" id="perfil" class="form-control">
                      <option value="admin">Administrador</option>
                      <option value="caixa">Caixa</option>
                      <option value="atendente" selected>Atendente</option>
                      <option value="cozinheiro">Cozinheiro</option>
                  </select>
                </div>

                <div class="form-group">
                  <label>Nome</label>
                  <input type="text" id=nome name=nome required class="form-control" placeholder="Nome">
                </div>
                <div class="form-group">
                  <label>Usuario</label>
                  <input type="text" id=usuario name=usuario required class="form-control" placeholder="Usuário" >
                </div>

                <div class="form-group">
                  <label>Senha</label>
                  <input class="form-control" id="senha" name="senha" required placeholder="Senha" type="password" minlength="4">
                </div>
        
                <div class="form-group" style="display: flex;flex-direction: row;justify-content: center;align-items: center;">
                  <button type="submit" class="btn btn-primary btn-block mb-3" style="width:25%;"> Enviar </button>
                </div>
              </form>    
            </div>
          </div>
          <div class="col">
              <?php
              include("conexao.php");
              
              // puxar produtos do banco
              $consulta = "SELECT perfil, nome, usuario FROM `usuarios` WHERE 1";
              $result = mysqli_query($conexao, $consulta) or die ($conexao->error);
              $num = $result->num_rows;
              
              // pega a quantidade total de objetos no banco de dados
              //$num_total = $mysqli->query("select pro_nome, pro_preco from produto")->num_rows;
              ?>

              <div class="table-responsive-sm pt-3">
                <h3 style="text-align:center">Usuários</h3>
                  <div class="pt-2">
                    <?php if($num > 0){ ?>
                    <table class="table bg-light table-striped" style="text-align:center">
                      <thead style="text-align:center; font-weight:bold;" >
                        <tr>
                          <td>Perfil</td>
                          <td>Nome</td>
                          <td>Login</td>
                        </tr>
                      </thead>
                      <tbody >
                        <?php while($usuarios = $result->fetch_assoc()) { ?>
                        <tr>
                          <td><?php echo $usuarios['perfil']; ?></td>
                          <td><?php echo $usuarios['nome'];   ?></td>
                          <td><?php echo $usuarios['usuario'];?></td>
                        </tr>
                        <?php } ?>
                      </tbody>
                    </table>
                  <?php } ?>
                </div>
            </div>
          </div>
        </div>
      </div>

    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="js/jquery.js"></script>
    <script src="js/popper.js"></script>
    <script src="js/bootstrap.js"></script>
  </body>
</html>

