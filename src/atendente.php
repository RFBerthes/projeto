<!doctype html>
<html lang="pt-br">

<head>
  <?php 
    require_once('verifica-login.php');
  ?>
</head>

<body class="bg-dark text-white">
    <div class="container">


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
  <?php }elseif (isset($_GET['erro1'])) { ?>
  <script>
    Swal.fire({
      type: 'error',
      title: 'Oops...',
      text: 'Cliente já existe, tente novamente',
    })
  </script>
  <?php }elseif (isset($_GET['sucesso2'])) { ?>
  <script>
    Swal.fire({
      type: 'success',
      title: 'Feito!',
      text: 'Cliente editado com sucesso!!',
    })
  </script>
  <?php }elseif (isset($_GET['erro2'])) { ?>
  <script>
    Swal.fire({
      type: 'error',
      title: 'Oops...',
      text: 'Cliente não foi editado, tente novamente',
    })
  </script>
  <?php }elseif (isset($_GET['sucesso3'])) { ?>
  <script>
    Swal.fire({
      type: 'success',
      title: 'Feito',
      text: 'Cliente excluído com sucesso!!',
    })
  </script>
  <?php }elseif (isset($_GET['erro3'])) { ?>
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
</body>

</html>