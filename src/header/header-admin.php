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

  <title>Admin</title>

  <nav class="navbar navbar-expand-lg navbar-dark" style="background-color: brown">
    <a class="navbar-brand" href="admin.php">Peça&Pag</a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#conteudoNavbarSuportado" aria-controls="conteudoNavbarSuportado" aria-expanded="false" aria-label="Alterna navegação">
      <span class="navbar-toggler-icon"></span>
    </button>

    <div class="collapse navbar-collapse" id="conteudoNavbarSuportado">
      <ul class="navbar-nav mr-auto">
        <li class="nav-item ">
          <a class="nav-link" href="admin.php" id="home">HOME <span class="sr-only">(página atual)</span></a>
        </li>
        <li class="nav-item dropdown ">
          <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
            ADMINISTRAÇÃO
          </a>
          <div class="dropdown-menu" aria-labelledby="navbarDropdown">
            <a class="dropdown-item" href="lanches.php"> Lanches </a>
            <a class="dropdown-item" href="bebidas.php"> Bebidas </a>
          </div>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="usuarios.php"> USUÁRIOS </a>
        </li>
        </li>
        <li class="nav-item" id="link-mesa">
          <a class="nav-link" href="mesas.php">MESAS</a>
        </li>
        <li class="nav-item" id="link-mesa">
          <a class="nav-link" href="clientes.php">CLIENTES</a>
        </li>
        <li class="nav-item">
          <a class="nav-link disabled" href="#">BACKUP</a>
        </li>
      </ul>
      <ul class="navbar-nav ml-auto">
        <li class="nav-item disable">
          <a class="nav-link disabled" href="#"><?php echo $perfil . " - " . $login; ?></a>
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