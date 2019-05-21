<?php
  include_once("conexao.php");
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
    <div class="container bg-dark text-white mt-3">
    <div class="row">
      <div class="column ml-4 mt-3 ">
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
      <div class="colunm ml-4 mt-3">
        <h2 style="text-align:center">Mesas</h2>
        <div class="row">
            <?php while($mesas = mysqli_fetch_assoc($result_mesas)){ ?>
              <div class="card text-dark mr-1"  style="width:120px;height:120px;" >
                  <div class="card-body ">
                    <p>Mesa nº <?php echo $mesas['idmesa']; ?></p>
                    <a href="apagar-mesa.php?idmesa=<?php echo $mesas['idmesa']; ?>"><button type="button" class="btn btn-xs btn-danger">Apagar</button></a>
                  </div> 
                </div>          
            <?php } ?>
          </div>
        </div>
      </div>
    <div class="row">
      <h2 style="text-align:center">Sabores</h2>
      <div class="column ml-4 mt-2">
          <table class="table bg-light table-striped" style="text-align:center">
              <thead>
                <tr>
                  <th>Nome</th>
                  <th>Ação</th>
                </tr>
              </thead>
              <tbody>
                <?php while($sabores = mysqli_fetch_assoc($result_sabores)){ ?>
                <tr>
                  <td><?php echo $sabores['nome']; ?></td>
                  <td>
                    <button type="button" class="btn btn-xs btn-warning" data-toggle="modal" data-target="#editModal" data-whatever="<?php echo $sabores['idsabor']; ?>" data-whatevernome="<?php echo $sabores['nome']; ?>" >Editar</button>
                    <a href="apagar-sabor.php?nome=<?php echo $sabores['nome']; ?>"><button type="button"
                        class="btn btn-xs btn-danger">Apagar</button></a>
                  </td>
                </tr>
                <?php } ?>
              </tbody>
            </table>

      </div>
      <div class="column ml-4 mt-3">
        <h2 style="text-align:center">Bebidas</h2>
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
              <?php while($bebidas = mysqli_fetch_assoc($result_bebidas)){ ?>
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
    
    </div>


    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="js/jquery.js"></script>
    <script src="js/popper.js"></script>
    <script src="js/bootstrap.js"></script>
  </body>
</html>