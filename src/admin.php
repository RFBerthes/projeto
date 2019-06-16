<!doctype html>
<html lang="pt-br">
<head>
  <?php 
    require_once('verifica-login.php');

    //Buscas
    $sql1 = "SELECT * FROM usuarios";
    $usuarios = $pdo->query($sql1);

    $sql2 = "SELECT * FROM mesas";
    $mesas = $pdo->query($sql2);

    $sql3 = "SELECT * FROM bebidas";
    $bebidas = $pdo->query($sql3);

    $sql4 = "SELECT * FROM lanches";
    $lanches = $pdo->query($sql4);
  ?>

</head>

<body class="bg-dark text-white">

  <div class="row pt-3 ml-3 mr-3">
    <div class="column ml-3 mr-3" style="width:45%">
      <h2 style="text-align:center;"><a class="text-white" href="usuarios.php">Usuários</h2></a>
      <table class="table bg-light table-striped " style="text-align:center">
        <thead>
          <tr>
            <th>Perfil</th>
            <th>Nome</th>
            <th>Login</th>
          </tr>
        </thead>
        <tbody>
          <?php while ($row = $usuarios->fetch()) { ?>
            <tr>
              <td>
                <?php echo $row['perfil']; ?>
              </td>
              <td>
                <?php echo $row['nome'];   ?>
              </td>
              <td>
                <?php echo $row['usuario'];?>
              </td>
            </tr>
          <?php } ?>
        </tbody>
      </table>
    </div>

    <div class="column ml-4 mr-3" style="width:45%">
    <h2 style="text-align:center;"><a class="text-white" href="mesas.php">Mesas</h2></a>
      <div class="row">
        <?php while ($row = $mesas->fetch()) { ?>
          <div class="card text-dark ml-2 mb-2" style="width:18%;height:18%">
            <div class="card-body ">
              <p>Mesa <?php echo $row['idmesa']; ?> </p>
            </div>
          </div>
        <?php } ?>
      </div>
    </div>
  </div>

  <div class="row ml-3 mr-3 mt-3">
    <div class="column ml-3 mr-3" style="width:45%">
    <h2 style="text-align:center;"><a class="text-white" href="lanches.php">Lanches</h2></a>
      <table class="table bg-light table-striped" style="text-align:center">
        <thead>
          <tr>
            <th>Nome</th>
            <th>Valor (R$)</th>
          </tr>
        </thead>
        <tbody>
          <?php while ($row = $lanches->fetch()) { ?>
            <tr>
              <td>
                <?php echo $row['nome_lanche']; ?>
              </td>
              <td>
                <?php echo $row['valorlan']; ?>
              </td>
            </tr>
          <?php } ?>
        </tbody>
      </table>
    </div>

    <div class="colunm ml-3 mr-3" style="width:45%">
    <h2 style="text-align:center;"><a class="text-white" href="bebidas.php">Bebidas</h2></a>
      <table class="table bg-light table-striped" style="text-align:center">
        <thead>
          <tr>
            <th>Nome</th>
            <th>Valor (R$)</th>
            <th>Estoque</th>
          </tr>
        </thead>
        <tbody>
          <?php while ($row = $bebidas->fetch()) { ?>
            <tr>
              <td>
                <?php echo $row['nome_bebida']; ?>
              </td>
              <td>
                <?php echo $row['valorbeb']; ?>
              </td>
              <td>
                <?php echo $row['estoque']; ?>
              </td>
            </tr>
          <?php } ?>
        </tbody>
      </table>
    </div>
  </div>

  <!-- Optional JavaScript -->
  <!-- jQuery first, then Popper.js, then Bootstrap JS -->
  <script src="js/jquery.js"></script>
  <script src="js/popper.js"></script>
  <script src="js/bootstrap.js"></script>
</body>

</html>