<!doctype html>
<html lang="pt-br">

<head>
  <?php
    require_once('verifica-login.php');

    //Buscas
    $sql1 = "SELECT * FROM clientes ORDER BY nome ASC";
    $clientes = $pdo->query($sql1);
  ?>
</head>

<body>
  <div class="container bg-dark text-white mt-2 mb-2 pb-2">

    <div class="pull-right">
      <button type="button" class="btn btn-xs btn-success mt-2 mb-2" data-toggle="modal" data-target="#ModalNovoCli">Novo Cliente</button>
    </div>

    <!-- Inicio Modal Cliente -->
    <div class="modal fade text-dark" id="ModalNovoCli" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
      <div class="modal-dialog" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <h4 class="modal-title" id="myModalLabel">Cadastrar Cliente</h4>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
          </div>
          <div class="modal-body">
            <form action="registro/registro-cliente.php" method="POST">
              <div class="form-group">
                <label>Nome</label>
                <input type="text" id="nome" name="nome" required class="form-control" placeholder="Cliente">
              </div>

              <div class="form-group" style="display: flex;flex-direction: row;justify-content: center;align-items: center;">
                <button type="submit" class="btn btn-primary btn-block mb-3" style="width:25%;"> Cadastrar </button>
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
        <h3 style="text-align:center">Clientes</h3>
        <table class="table bg-light table-striped" style="text-align:center">
          <thead>
            <tr>
              <th>Nome</th>
              <th>Ação</th>
            </tr>
          </thead>
          <tbody>
            <?php while ($row = $clientes->fetch()) { ?>
              <tr>
                <td><?php echo $row['nome']; ?></td>
                <td>
                  <button type="button" class="btn btn-xs btn-warning" data-toggle="modal" data-target="#editModal" data-whatever="<?php echo $row['idcliente']; ?>" data-whatevernome="<?php echo $row['nome']; ?>"> <img src="open-iconic/png/pencil-2x.png"> </button>
                  <a href="delete/apagar-cliente.php?idcliente=<?php echo $row['idcliente']; ?>"><button type="button" class="btn btn-xs btn-danger"> <img src="open-iconic/png/trash-2x.png"> </button></a>
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
            <h4 class="modal-title text-dark" id="editModalLabel">Editar Cliente</h4>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
          </div>
          <div class="modal-body">
            <form method="POST" action="edita/edita-cliente.php" enctype="multipart/form-data">
              <div class="form-group">
                <label>Nome</label>
                <input type="text" id="recipient-nome" name="nome" required class="form-control" placeholder="Nome">
              </div>
              <input type="hidden" id="recipient-idcliente" name="idcliente">
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


  </div>

  <!-- popup informativos -->
  <?php if (isset($_GET['sucesso1'])) { ?>
    <script>
      Swal.fire({
        type: 'success',
        title: 'Feito!',
        text: 'Cliente cadastrado com sucesso!!',
      })
    </script>
  <?php } elseif (isset($_GET['erro1'])) { ?>
    <script>
      Swal.fire({
        type: 'error',
        title: 'Oops...',
        text: 'Cliente já existe, tente novamente',
      })
    </script>
  <?php } elseif (isset($_GET['sucesso2'])) { ?>
    <script>
      Swal.fire({
        type: 'success',
        title: 'Feito!',
        text: 'Cliente editado com sucesso!!',
      })
    </script>
  <?php } elseif (isset($_GET['erro2'])) { ?>
    <script>
      Swal.fire({
        type: 'error',
        title: 'Oops...',
        text: 'Cliente não foi editado, tente novamente',
      })
    </script>
  <?php } elseif (isset($_GET['sucesso3'])) { ?>
    <script>
      Swal.fire({
        type: 'success',
        title: 'Feito',
        text: 'Cliente excluído com sucesso!!',
      })
    </script>
  <?php } elseif (isset($_GET['erro3'])) { ?>
    <script>
      Swal.fire({
        type: 'error',
        title: 'Oops...',
        text: 'Cliente não foi excluído, tente novamente',
      })
    </script>
  <?php } ?>

  <!-- Optional JavaScript -->
  <!-- jQuery first, then Popper.js, then Bootstrap JS -->
  <script src="js/jquery.js"></script>
  <script src="js/popper.js"></script>
  <script src="js/bootstrap.js"></script>

  <!-- Modal JavaScript -->
  <script type="text/javascript">
    $('#editModal').on('show.bs.modal', function(event) {
      var button = $(event.relatedTarget) // Button that triggered the modal
      var recipient = button.data('whatever') // Extract info from data-* attributes
      var recipientnome = button.data('whatevernome')
      // If necessary, you could initiate an AJAX request here (and then do the updating in a callback).
      // Update the modal's content. We'll use jQuery here, but you could use a data binding library or other methods instead.
      var modal = $(this)
      modal.find('.modal-title').text('ID do Cliente: ' + recipient)
      modal.find('#recipient-idcliente').val(recipient)
      modal.find('#recipient-nome').val(recipientnome)
    })
  </script>
</body>

</html>