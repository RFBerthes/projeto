<!doctype html>
<html lang="pt-br">
<head>
  <?php
    require_once('verifica-login.php');
    //Buscas
    $sql1 = "SELECT mesa_idmesa, idpedido, nome, comanda_idcomanda, status, nome_bebida, obs, quantidade FROM pedidos
    JOIN bebidas
    ON pedidos.bebidas_idbebida = bebidas.idbebida
    JOIN usuarios
    ON pedidos.usuario_idusuario = usuarios.idusuario
    JOIN comandas
    ON comandas.idcomanda = pedidos.comanda_idcomanda";
    $pedidos = $pdo->query($sql1);
  ?>
</head>

<body class="bg-dark">
  <div class="container bg-dark text-white mt-2 mb-2 pb-2">
  <div class="row">
      <?php while ($row = $pedidos->fetch()) { 
        if($row['status'] == "Aguardando"){
      ?>
        <div class="card text-dark mt-2 ml-3" style="width:25%">
          <a href="delete/apagar-pedido.php?idpedido=<?php echo $row['idpedido']; ?>"><button type="button" class="close float-right mr-2 mt-1"> <span aria-hidden="true">&times;</span></button></a>
          <h6 class="card-title" style="text-align:center"><b>Pedido Bebida nº <?php echo $row['idpedido']; ?></b></h6>
          <p class="card-text pl-2">
            Mesa: <?php echo $row['mesa_idmesa']; ?> <br>
            Comanda: <?php echo $row['comanda_idcomanda']; ?> <br>
            <?php echo $row['quantidade'] . " - " . $row['nome_bebida'] ?> <br>
            Obs: <?php echo $row['obs']; ?> <br>
            Satus: <?php echo $row['status']; ?> <br>
            <div class="text-center">
              <a href="update/servir-pedido.php?idpedido=<?php echo $row['idpedido']; ?>"><button type="button" class="btn btn-xs btn-success mb-2"><img src="open-iconic/png/coffee.png"> </button></a>
            </div>
        </div>
      <?php } }?>
    </div>
  </div>

  <!-- popup informativos -->
  <?php if (isset($_GET['sucesso'])) { ?>
  <script>
    Swal.fire({
      type: 'success',
      title: 'Feito!',
      text: 'Sucesso!!',
    })
  </script>
  <?php } elseif (isset($_GET['erro'])) { ?>
  <script>
    Swal.fire({
      type: 'error',
      title: 'Oops...',
      text: 'Erro, tente novamente',
    })
  </script>
  <?php } ?>

  <!-- Optional JavaScript -->
  <!-- jQuery first, then Popper.js, then Bootstrap JS -->
  <script src="js/jquery.js"></script>
  <script src="js/popper.js"></script>
  <script src="js/bootstrap.js"></script>

  <!-- Modal JavaScript -->
  <!-- <script type="text/javascript">
    $('#ModalNovoPedido').on('show.bs.modal', function (event) {
      var button = $(event.relatedTarget) // Button that triggered the modal
      var recipient = button.data('whatever') // Extract info from data-* attributes
      // If necessary, you could initiate an AJAX request here (and then do the updating in a callback).
      // Update the modal's content. We'll use jQuery here, but you could use a data binding library or other methods instead.
      var modal = $(this)
      modal.find('.modal-title').text('ID do Comanda: ' + recipient)
      modal.find('#recepient-idcomanda').val(recipient)

    })
  </script> -->

</body>

</html>