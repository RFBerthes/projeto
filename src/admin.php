<?php
include_once("conexao.php");
session_start();
// puxar produtos do banco
$consulta1 = "SELECT * FROM `usuarios`";
$consulta2 = "SELECT * FROM `mesas`";
$consulta3 = "SELECT * FROM `sabores`";
$consulta4 = "SELECT * FROM `bebidas`";
$result_usuarios = mysqli_query($conexao, $consulta1) or die($conexao->error);
$result_mesas = mysqli_query($conexao, $consulta2) or die($conexao->error);
$result_sabores = mysqli_query($conexao, $consulta3) or die($conexao->error);
$result_bebidas = mysqli_query($conexao, $consulta4) or die($conexao->error);

?>
<!doctype html>
<html lang="pt-br">

<head>
  <?php require_once "header-admin.php" ?>
  <script>
  </script>
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
          <?php while ($usuarios = mysqli_fetch_assoc($result_usuarios)) { ?>
            <tr>
              <td>
                <?php echo $usuarios['perfil']; ?>
              </td>
              <td>
                <?php echo $usuarios['nome'];   ?>
              </td>
              <td>
                <?php echo $usuarios['usuario']; ?>
              </td>
            </tr>
          <?php } ?>
        </tbody>
      </table>
    </div>

    <div class="column ml-4 mr-3" style="width:45%">
    <h2 style="text-align:center;"><a class="text-white" href="mesas.php">Mesas</h2></a>
      <div class="row">
        <?php while ($mesas = mysqli_fetch_assoc($result_mesas)) { ?>
          <div class="card text-dark ml-2 mb-2" style="width:18%;height:18%">
            <div class="card-body ">
              <p>Mesa <?php echo $mesas['idmesa']; ?>  </p>
            </div>
          </div>
        <?php } ?>
      </div>
    </div>
  </div>

  <div class="row ml-3 mr-3 mt-3">
    <div class="column ml-3 mr-3" style="width:45%">
    <h2 style="text-align:center;"><a class="text-white" href="sabores.php">Sabores</h2></a>
      <table class="table bg-light table-striped" style="text-align:center">
        <thead>
          <tr>
            <th>Nome</th>
          </tr>
        </thead>
        <tbody>
          <?php while ($sabores = mysqli_fetch_assoc($result_sabores)) { ?>
            <tr>
              <td>
                <?php echo $sabores['nome']; ?>
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
          <?php while ($bebidas = mysqli_fetch_assoc($result_bebidas)) { ?>
            <tr>
              <td>
                <?php echo $bebidas['nome']; ?>
              </td>
              <td>
                <?php echo $bebidas['valor']; ?>
              </td>
              <td>
                <?php echo $bebidas['estoque']; ?>
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