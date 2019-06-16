<?php
  session_start();
  if((!isset ($_SESSION['nome']) == true)){
  unset($_SESSION['nome']);
  header('location: index.php?erro3');
  }

  $login =  $_SESSION['nome'];
  $perfil =  $_SESSION['perfil'];
  
  //Carrega perfil
  if($perfil == "Administrador"){ 
    require_once "header/header-admin.php";
  }elseif ($perfil == "Atendente") {
    require_once "header/header-atendente.php";
  }elseif ($perfil == "Cozinheiro") {
    require_once "header/header-cozinheiro.php";
  }elseif ($perfil == "Caixa") {
    require_once "header/header-caixa.php";
  }

  require_once 'database_functions.php';
  $pdo = connect_to_database("bd_pep");


?>