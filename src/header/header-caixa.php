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

  <title>Caixa</title>

  <nav class="navbar navbar-expand-lg navbar-dark " style="background-color:coral">
    <a class="navbar-brand" href="caixa.php">Peça&Pag</a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#conteudoNavbarSuportado"
      aria-controls="conteudoNavbarSuportado" aria-expanded="false" aria-label="Alterna navegação">
      <span class="navbar-toggler-icon"></span>
    </button>

    <div class="collapse navbar-collapse" id="conteudoNavbarSuportado">
      <ul class="navbar-nav mr-auto">
        <li class="nav-item ">
          <a class="nav-link" href="caixa.php" id="home">HOME <span class="sr-only">(página atual)</span></a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="comandascx.php"> COMANDAS </a>
        </li>
        <li class="nav-item">
          <a class="nav-link " href="relatorio.php">RELATÓRIO</a>
        </li>
       </li>
        <li class="nav-item" id="link-mesa">
          <a class="nav-link" href="clientes.php">CLIENTES</a>
        </li>


      </ul>
      <ul class="navbar-nav ml-auto">
        <li class="nav-item disable">
          <a class="nav-link disabled" href="#"><?php echo $perfil." - ".$login; ?></a>
        </li>
        <li class="nav-item ">
          <a class="nav-link" href="logout.php">SAIR <img src="open-iconic/png/account-logout-2x.png"> </a>
        </li>
      </ul>
    </div>
  </nav>


  </form>

  </div>
</header>