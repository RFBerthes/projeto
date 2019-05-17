<!doctype html>
<html lang="pt-br">
  <head>
    <?php require_once "header-admin.php" ?>
  </head>
  <body>

      <div class="container bg-dark text-white mt-2 pb-3 pl-3" id="conteudoDinamico">
      
      <input onclick="addMesa()" type="button" id="addInput" value="Adicionar Mesa" class="btn btn-primary mb-2 mt-3" aria-hidden="true">

        <div class="row pl-3" id="mesas" >
        <!-- RECEBE DIVS DINAMICAS -->


        </div>
      </div>

      



    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="js/jquery.js"></script>
    <script src="js/popper.js"></script>
    <script src="js/bootstrap.js"></script>
  </body>
</html>


<!-- Inclusão de mesa v1 php-->
  <!-- include('conexao.php');
  $addMesa = "INSERT INTO 'mesa' ('idmesa') VALUES (NULL);";

  //Insere novo registro
  $result = mysqli_query($conexao, $addMesa);
  $mesas = $result->fetch_assoc();
  echo '$mesas['idmesa']';
  exit; -->

