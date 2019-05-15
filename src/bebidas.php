<?php
  include_once("conexao.php");
    // puxar produtos do banco
    $consulta = "SELECT * FROM `bebidas`";
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
                <a class="dropdown-item" href="pizzas.php">Pizzas     </a>
                <a class="dropdown-item" href="bebidas.php">Bebidas   </a>
                <a class="dropdown-item" href="usuarios.php">Usuários </a>
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
                <h4 class="modal-title" id="myModalLabel">Cadastrar Bebiba</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span
                    aria-hidden="true">&times;</span></button>
              </div>
              <div class="modal-body">
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
        </div>
    <!-- Fim Modal -->

    <!-- Início Table -->
    <div class="table-responsive-sm ">
        <div class="col-md-12">
          <h3 style="text-align:center">Bebidas</h3>
          <table class="table bg-light table-striped" style="text-align:center">
            <thead>
              <tr>
                <th>Nome</th>
                <th>Valor (R$)</th>
                <th>Estoque</th>  
                <th>Ação</th> 
              </tr>
            </thead>
            <tbody>
              <?php while($bebidas = mysqli_fetch_assoc($result)){ ?>
              <tr>
                <td><?php echo $bebidas['nome']; ?></td>
                <td><?php echo $bebidas['valor']; ?></td>
                <td><?php echo $bebidas['estoque']; ?></td>
                <td>
                  <button type="button" class="btn btn-xs btn-warning" data-toggle="modal" data-target="#editModal" data-whatever="<?php echo $bebidas['idbebida']; ?>" data-whateverestoque="<?php echo $bebidas['estoque']; ?>" data-whatevernome="<?php echo $bebidas['nome']; ?>" data-whatevervalor="<?php echo $bebidas['valor']; ?>">Editar</button>
                  <a href="apagar-bebida.php?nome=<?php echo $bebidas['nome']; ?>"><button type="button"
                      class="btn btn-xs btn-danger">Apagar</button></a>
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
                  <h4 class="modal-title text-dark" id="editModalLabel">Editar Bebida</h4>
                  <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                </div>
                <div class="modal-body">
                  <form method="POST" action="edita-bebida.php" enctype="multipart/form-data">
                    <div class="form-group">
                      <label>Nome</label>
                      <input type="text" id="recipient-nome" name="nome" required class="form-control" placeholder="nome">
                    </div>
                    <div class="form-group">
                      <label>Valor</label>
                      <input type="number" id="recipient-valor" name="valor" required class="form-control" placeholder="R$" step="0.01" min="0.01" max="99">
                    </div>
                    <div class="form-group">
                      <label>Estoque</label>
                      <input type="number" id="recipient-estoque" name="estoque" required class="form-control" placeholder="estoque" >
                    </div>
                    <input type="hidden" id="recepient-idbebida" name="idbebida">
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
            text: 'Bebida cadastrada com sucesso!!',
          })
        </script>
      <?php }elseif (isset($_GET['erro1'])) { ?>
        <script>
            Swal.fire({
            type: 'error',
            title: 'Oops...',
            text: 'Bebida já existe, tente novamente',
          })
        </script>
      <?php }elseif (isset($_GET['sucesso2'])) { ?>
        <script>
          Swal.fire({
            type: 'success',
            title: 'Feito!',
            text: 'Bebida editada com sucesso!!',
          })
        </script>
      <?php }elseif (isset($_GET['erro2'])) { ?>
        <script>
            Swal.fire({
            type: 'error',
            title: 'Oops...',
            text: 'Bebida não foi editada, tente novamente',
          })
        </script>
        <?php }elseif (isset($_GET['sucesso3'])) { ?>
        <script>
          Swal.fire({
            type: 'success',
            title: 'Feito',
            text: 'Bebida excluída com sucesso!!',
          })
        </script>
      <?php }elseif (isset($_GET['erro3'])) { ?>
        <script>
            Swal.fire({
            type: 'error',
            title: 'Oops...',
            text: 'Bebida não foi excluída, tente novamente',
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
        var recipientnome = button.data('whatevernome')
        var recipientvalor = button.data('whatevervalor')
        var recipientestoque = button.data('whateverestoque')
        // If necessary, you could initiate an AJAX request here (and then do the updating in a callback).
        // Update the modal's content. We'll use jQuery here, but you could use a data binding library or other methods instead.
        var modal = $(this)
        modal.find('.modal-title').text('ID do Bebida: ' + recipient)
        modal.find('#recepient-idbebida').val(recipient)
        modal.find('#recipient-nome').val(recipientnome)
        modal.find('#recipient-valor').val(recipientvalor)
        modal.find('#recipient-estoque').val(recipientestoque)
      })
    </script>
  </body>
</html>