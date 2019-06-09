<?php
  include('database_functions.php');
  session_start();
  if((!isset ($_SESSION['usuario']) == true)){
    unset($_SESSION['usuario']);
    header('location:index.php?erro3');
  }
  $login =  $_SESSION['usuario'];
  
  $pdo = connect_to_database("bd_pep");
?>

<header>
  <!-- Required meta tags -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

  <!-- Bootstrap CSS -->
  <link rel="stylesheet" href="css/main.css">
  <link rel="stylesheet" href="css/styles.css">
  <link rel="stylesheet" href="../node_modules/sweetalert2/dist/sweetalert2.css">

  <!-- JavaScript -->
  <script src="../node_modules/sweetalert2/dist/sweetalert2.all.min.js"></script>

  <title>Atendente</title>

  <nav class="navbar navbar-expand-lg navbar-dark bg-info">
    <a class="navbar-brand" href="atendente.php">Peça&Pag</a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#conteudoNavbarSuportado"
      aria-controls="conteudoNavbarSuportado" aria-expanded="false" aria-label="Alterna navegação">
      <span class="navbar-toggler-icon"></span>
    </button>

    <div class="collapse navbar-collapse" id="conteudoNavbarSuportado">
      <ul class="navbar-nav mr-auto">
        <li class="nav-item ">
          <a class="nav-link" href="atendente.php" id="home">HOME <span class="sr-only">(página atual)</span></a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="comandas.php"> COMANDAS </a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="pedidos.php">PEDIDOS</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="pedidos-bebidas.php">BEBIDAS</a>
        </li> 
       </li>
        <li class="nav-item" id="link-mesa">
          <a class="nav-link" href="clientes.php">CLIENTES</a>
        </li>


      </ul>
      <ul class="navbar-nav ml-auto">
        <li class="nav-item ">
          <a class="nav-link" href="logout.php">SAIR <img src="open-iconic/png/account-logout-2x.png"> </a>
        </li>
      </ul>
    </div>
  </nav>


  </form>

  </div>
</header>