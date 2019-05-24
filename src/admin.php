<?php
  include_once("conexao.php");
    session_start();
    // puxar produtos do banco
    $consulta1 = "SELECT * FROM `usuarios`";
    $consulta2 = "SELECT * FROM `mesas`";
    $consulta3 = "SELECT * FROM `sabores`";
    $consulta4 = "SELECT * FROM `bebidas`";
    $result_usuarios = mysqli_query($conexao, $consulta1) or die ($conexao->error);
    $result_mesas = mysqli_query($conexao, $consulta2) or die ($conexao->error);
    $result_sabores = mysqli_query($conexao, $consulta3) or die ($conexao->error);
    $result_bebidas = mysqli_query($conexao, $consulta4) or die ($conexao->error);

?>
<!doctype html>
<html lang="pt-br">
  <head>
    <?php require_once "header-admin.php" ?>
    <script>
      
    </script>
  </head>
  <body>
    <div class="container bg-dark text-white mt-3" style="height: auto">

    <div class="row">
      <div class="column mr-1 pl-2 pr-2 mt-3 ml-2">
        <div style="height: 50%">
          <h2 style="text-align:center">Usuários</h2>
          <table class="table bg-light table-striped " style="text-align:center">
              <thead>
                <tr>
                  <th>Perfil</th>
                  <th>Nome</th>
                  <th>Login</th>
                </tr>
              </thead>
              <tbody>
                <?php while($usuarios = mysqli_fetch_assoc($result_usuarios)){ ?>
                  <tr>
                    <td><?php echo $usuarios['perfil']; ?></td>
                    <td><?php echo $usuarios['nome'];   ?></td>
                    <td><?php echo $usuarios['usuario'];?></td>
                  </tr>
                <?php } ?>
              </tbody>
              </table>
          </div>
          
          <div>
            <h2 style="text-align:center">Sabores</h2>
            <table class="table bg-light table-striped" style="text-align:center">
                <thead>
                  <tr>
                    <th>Nome</th>
                  </tr>
                </thead>
                <tbody>
                  <?php while($sabores = mysqli_fetch_assoc($result_sabores)){ ?>
                  <tr>
                    <td><?php echo $sabores['nome']; ?></td>
                  </tr>
                  <?php } ?>
                </tbody>
              </table>
          </div>
      </div>
      <div class="colunm pl-4 pr-2 mt-3">
        <div style="height: 50%">
          <h2 style="text-align:center">Mesas</h2>
            <div class="row">
                <?php while($mesas = mysqli_fetch_assoc($result_mesas)){ ?>
                  <div class="card text-dark mr-1"  style="width:19,5%;height:15%" >
                      <div class="card-body ">
                        <p>Mesa nº <?php echo $mesas['idmesa']; ?></p>
                      </div> 
                    </div>          
                <?php } ?>
            </div>
        </div>
        <div>
          <h2 style="text-align:center">Bebidas</h2>
          <table class="table bg-light table-striped" style="text-align:center">
              <thead>
                <tr>
                  <th>Nome</th>
                  <th>Valor (R$)</th>
                  <th>Estoque</th>  
                </tr>
              </thead>
              <tbody>
                <?php while($bebidas = mysqli_fetch_assoc($result_bebidas)){ ?>
                <tr>
                  <td><?php echo $bebidas['nome']; ?></td>
                  <td><?php echo $bebidas['valor']; ?></td>
                  <td><?php echo $bebidas['estoque']; ?></td>
                </tr>
                <?php } ?>
              </tbody>
            </table>
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