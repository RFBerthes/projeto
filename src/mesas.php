<!doctype html>
<html lang="pt-br">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="css/main.css">
    <link rel="stylesheet" href="css/styles.css">

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
            <li class="nav-item dropdown ">
              <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                ADMINISTRAÇÃO
              </a>
              <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                <a class="dropdown-item" href="categorias.php">Categorias </a>
                <a class="dropdown-item" href="produtos.php">  Produtos   </a>
                <a class="dropdown-item" href="usuarios.php">  Usuários   </a>
              </div>
            </li>
            <li class="nav-item active">
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


      </form>

      </div>

      <script>
        function addMesa(){
        let conteudo =  '<div class="card text-dark mt-2 mr-2" id="cadr_@VALOR@" style="width:15%" >'+
                          '<div class="card-body ">'+
                            '<h5 class="card-title" >Mesa nº ..</h5>'+
                            '<p class="card-text">Garçom: João</p>'+
                            '<input onclick="rmRow(this)" type="button" class="btn btn-outline-danger" id="remInput" value="Excluir" aria-hidden="true">'+
                          '</div>'+ 
                        '</div>'
          //conteudo.replace("@VALOR@", last)
          //last += 1
          $(".row").append(conteudo)   // Append new elements
        
        }

        function rmMesa(btnstate){
          var eMesa = document.getElementById("tempMesa")
          eMesa.parentNode.removeChild(eMesa)
        }

      </script>

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

