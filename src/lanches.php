<!doctype html>
<html lang="pt-br">

<head>
  <?php 
     require_once('verifica-login.php');

      //Buscas
      $sql1 = "SELECT * FROM lanches";
      $lanches = $pdo->query($sql1);
      // $row = $lanches->fetch() 
    ?>
</head>

<body>
  <div class="container bg-dark text-white mt-2 mb-2 pb-2">
    <div class="pull-right">
      <button type="button" class="btn btn-xs btn-success mt-2 mb-2" data-toggle="modal"
        data-target="#ModalNovoLanche">Cadastrar</button>
    </div>

    <!-- Inicio Modal -->
    <div class="modal fade text-dark" id="ModalNovoLanche" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
      <div class="modal-dialog" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <h4 class="modal-title" id="myModalLabel">Cadastrar Lanche</h4>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
          </div>
          <div class="modal-body">
            <form action="registro/registro-lanche.php" method="POST">
              <div class="form-group">
                <label>Nome</label>
                <input type="text" id="nome" name="nome" required class="form-control" placeholder="Descrição">
              </div>
              <div class="form-group">
                <label>Valor</label>
                <input type="number" id="valor" name="valor" required class="form-control" placeholder="R$" step="0.01"
                  min="0.01" max="99">
              </div>
              <div class="form-group"
                style="display: flex;flex-direction: row;justify-content: center;align-items: center;">
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
        <h3 style="text-align:center">Lanches</h3>
        <table class="table bg-light table-striped" style="text-align:center">
          <thead>
            <tr>
              <th>Descrição </th>
              <th>Valor (R$)</th>
              <th>Ação </th>
            </tr>
          </thead>
          <tbody>
            <?php while($row = $lanches->fetch()){ ?>
            <tr>
              <td><?php echo $row['nome_lanche']; ?></td>
              <td><?php echo $row['valorlan']; ?></td>
              <td>
                <button type="button" class="btn btn-xs btn-warning" data-toggle="modal" data-target="#editModal"
                  data-whatever="<?php echo $row['idlanche']; ?>" data-whatevernome="<?php echo $row['nome_lanche'];?>" data-whatevervalor="<?php echo $row['valorlan']; ?>"> <img src="open-iconic/png/pencil-2x.png"> </button>
                <a href="delete/apagar-lanche.php?idlanche=<?php echo $row['idlanche']; ?>"><button type="button" class="btn btn-xs btn-danger"> <img src="open-iconic/png/trash-2x.png"> </button></a>
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
            <h4 class="modal-title text-dark" id="editModalLabel">Editar Lanche</h4>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span
                aria-hidden="true">&times;</span></button>
          </div>
          <div class="modal-body text-dark">
            <form method="POST" action="edita/edita-lanche.php" enctype="multipart/form-data">
              <div class="form-group">
                <label>Nome</label>
                <input type="text" id="recipient-nome" name="nome" required class="form-control" placeholder="Descrição">
              </div>
              <div class="form-group">
                <label>Valor</label>
                <input type="number" id="recepient-valor" name="valor" required class="form-control" placeholder="R$" step="0.01"
                  min="0.01" max="99">
              </div>
              <input type="hidden" id="recepient-idlanche" name="idlanche">
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
        text: 'Lanche cadastrado com sucesso!!',
      })
    </script>
    <?php }elseif (isset($_GET['erro1'])) { ?>
    <script>
      Swal.fire({
        type: 'error',
        title: 'Oops...',
        text: 'Lanche já existe, tente novamente',
      })
    </script>
    <?php }elseif (isset($_GET['sucesso2'])) { ?>
    <script>
      Swal.fire({
        type: 'success',
        title: 'Feito!',
        text: 'Lanche editado com sucesso!!',
      })
    </script>
    <?php }elseif (isset($_GET['erro2'])) { ?>
    <script>
      Swal.fire({
        type: 'error',
        title: 'Oops...',
        text: 'Lanche não foi editado, tente novamente',
      })
    </script>
    <?php }elseif (isset($_GET['sucesso3'])) { ?>
    <script>
      Swal.fire({
        type: 'success',
        title: 'Feito',
        text: 'Lanche excluído com sucesso!!',
      })
    </script>
    <?php }elseif (isset($_GET['erro3'])) { ?>
    <script>
      Swal.fire({
        type: 'error',
        title: 'Oops...',
        text: 'Lanche não foi excluído, tente novamente',
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
      // If necessary, you could initiate an AJAX request here (and then do the updating in a callback).
      // Update the modal's content. We'll use jQuery here, but you could use a data binding library or other methods instead.
      var modal = $(this)
      modal.find('.modal-title').text('ID da lanche: ' + recipient)
      modal.find('#recepient-idlanche').val(recipient)
      modal.find('#recipient-nome').val(recipientnome)
      modal.find('#recepient-valor').val(recipientvalor)

    })
  </script>
</body>

</html>