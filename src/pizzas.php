<?php
  include_once("conexao.php");
    // puxar produtos do banco
    $consulta = "SELECT * FROM `pizzas`";
    $result = mysqli_query($conexao, $consulta) or die ($conexao->error);
  ?>

<!doctype html>
<html lang="pt-br">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="css/main.css">
    <link rel="stylesheet" href="css/styles.css">
    <link rel="stylesheet" href="../node_modules/sweetalert2/dist/sweetalert2.css">

    <!-- JavaScript -->
    <script src="../node_modules/sweetalert2/dist/sweetalert2.all.min.js"></script>


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
                <a class="dropdown-item" href="sabores.php">Sabores   </a>
                <a class="dropdown-item" href="pizzas.php">Pizzas    </a>
                <a class="dropdown-item" href="bebidas.php">Bebidas    </a>
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

  </head>
  <body>
      <div class="container bg-dark text-white mt-2 mb-2 pb-2">
      <div class="pull-right">
        <button type="button" class="btn btn-xs btn-success mt-2 mb-2" data-toggle="modal"
          data-target="#myModalcad">Cadastrar</button>
      </div>
  
      <!-- Inicio Modal -->
      <div class="modal fade text-dark" id="myModalcad" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
        <div class="modal-dialog" role="document">
          <div class="modal-content">
            <div class="modal-header">
              <h4 class="modal-title" id="myModalLabel">Cadastrar Pizza</h4>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span
                  aria-hidden="true">&times;</span></button>
            </div>
            <div class="modal-body">
              <form action="registro-pizza.php" method="POST">                 
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
        </div>
      </div>
    <!-- Fim Modal -->

    <!-- Início Table -->
    <div class="table-responsive-sm ">
        <div class="col-md-12">
          <h3 style="text-align:center">Pizzas</h3>
          <table class="table bg-light table-striped" style="text-align:center">
            <thead>
              <tr>
                <th>Tamanho</th>
                <th>Nº Sabores</th>
                <th>Valor (R$)</th>
                <th>Ação</th> 
              </tr>
            </thead>
            <tbody>
              <?php while($pizzas = mysqli_fetch_assoc($result)){ ?>
              <tr>
                <td><?php echo $pizzas['tamanho']; ?></td>
                <td><?php echo $pizzas['nsabor']; ?></td>
                <td><?php echo $pizzas['valor']; ?></td>
                <td>
                  <button type="button" class="btn btn-xs btn-warning" data-toggle="modal" data-target="#editModal" data-whatever="<?php echo $pizzas['idpizza']; ?>" data-whatevertamanho="<?php echo $pizzas['tamanho']; ?>" data-whatevervalor="<?php echo $pizzas['valor']; ?>" data-whatevernsabor="<?php echo $pizzas['nsabor']; ?>">Editar</button>
                  <a href="apagar-pizza.php?idpizza=<?php echo $pizzas['idpizza']; ?>"><button type="button" class="btn btn-xs btn-danger">Apagar</button></a>
                </td>
              </tr>
              <?php } ?>
            </tbody>
          </table>
        </div>
      </div>
      <!-- Fim Table -->

      <!-- Inicio editModal -->
        <div class="modal fade" id="editModal" tabindex="-1" role="dialog" aria-labelledby="editModalLabel">
            <div class="modal-dialog" role="document">
              <div class="modal-content">
                <div class="modal-header">
                  <h4 class="modal-title text-dark" id="editModalLabel">Editar Sabor</h4>
                  <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                </div>
                <div class="modal-body">
                  <form method="POST" action="edita-pizza.php" enctype="multipart/form-data">
                    <div class="form-group">
                        <label>Tamanho</label>
                        <select name="tamanho" id="recipient-tamanho" class="form-control">
                            <option value="Pequena">Pequena</option>
                            <option value="Média">Média</option>
                            <option value="Grande" >Grande</option>
                            <option value="Família">Família</option>
                        </select>
                      </div>
                      <div class="form-group">
                        <label>Nº Sabores</label>
                        <select name="nsabor" id="recipient-nsabor" class="form-control">
                            <option value="1">1</option>
                            <option value="2">2</option>
                            <option value="3">3</option>
                            <option value="4">4</option>
                        </select>
                      </div>
                      <div class="form-group">
                          <label>Valor</label>
                          <input type="number" id="recipient-valor" name="valor" required class="form-control" placeholder="R$" step="0.01" min="0.01" max="99">
                      </div>
                    <input type="hidden" id="recepient-idpizza" name="idpizza">
                    <div class="modal-footer">
                      <button type="button" class="btn btn-primary" data-dismiss="modal">Cancelar</button>
                      <button type="submit" class="btn btn-danger">Alterar</button>
                    </div>
                  </form>
                </div>			  
              </div>
            </div>
          </div>
          <!-- Fim ModalExcluir -->

      <!-- popup informativos -->
      <?php if (isset($_GET['sucesso1'])) { ?>
        <script>
          Swal.fire({
            type: 'success',
            title: 'Feito!',
            text: 'Sabor cadastrado com sucesso!!',
          })
        </script>
      <?php }elseif (isset($_GET['erro1'])) { ?>
        <script>
            Swal.fire({
            type: 'error',
            title: 'Oops...',
            text: 'Sabor já existe, tente novamente',
          })
        </script>
      <?php }elseif (isset($_GET['sucesso2'])) { ?>
        <script>
          Swal.fire({
            type: 'success',
            title: 'Feito!',
            text: 'Sabor editado com sucesso!!',
          })
        </script>
      <?php }elseif (isset($_GET['erro2'])) { ?>
        <script>
            Swal.fire({
            type: 'error',
            title: 'Oops...',
            text: 'Sabor não foi editado, tente novamente',
          })
        </script>
        <?php }elseif (isset($_GET['sucesso3'])) { ?>
        <script>
          Swal.fire({
            type: 'success',
            title: 'Feito',
            text: 'Sabor excluído com sucesso!!',
          })
        </script>
      <?php }elseif (isset($_GET['erro3'])) { ?>
        <script>
            Swal.fire({
            type: 'error',
            title: 'Oops...',
            text: 'Sabor não foi excluído, tente novamente',
          })
        </script>
      <?php } ?>

    </div>

    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="js/jquery.js"></script>
    <script src="js/popper.js"></script>
    <script src="js/bootstrap.js"></script>
    <script src="../node_modules/sweetalert2/dist/sweetalert2.all.min.js"></script>

    <!-- Modal JavaScript -->
    <script type="text/javascript">
      $('#editModal').on('show.bs.modal', function (event) {
        var button = $(event.relatedTarget) // Button that triggered the modal
        var recipient = button.data('whatever') // Extract info from data-* attributes
        var recipienttamanho = button.data('whatevertamanho')
        var recipientvalor = button.data('whatevervalor')
        var recipientnsabor = button.data('whatevernsabor')
        // If necessary, you could initiate an AJAX request here (and then do the updating in a callback).
        // Update the modal's content. We'll use jQuery here, but you could use a data binding library or other methods instead.
        var modal = $(this)
        modal.find('.modal-title').text('ID da Pizza: ' + recipient)
        modal.find('#recepient-idpizza').val(recipient)
        modal.find('#recipient-tamanho').val(recipienttamanho)
        modal.find('#recepient-valor').val(recipientvalor)
        modal.find('#recepient-nsabor').val(recipientnsabor)

      })
    </script>
  </body>
</html>

