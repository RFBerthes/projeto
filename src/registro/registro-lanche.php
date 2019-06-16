<?php
  include('../database_functions.php');
  $pdo = connect_to_database("bd_pep");

  //recebendo dados login
  $nome  = $_POST["nome"];
  $valor  = $_POST["valor"];

  //Consultar o banco de dados para uso
  $sql_search = "SELECT * FROM lanches WHERE nome_lanche = :nome ";
  $stmt_search = $pdo->prepare($sql_search);
  $stmt_search->bindParam(':nome', $nome);

  $sql_ins = "INSERT INTO lanches (nome_lanche, valorlan) VALUES (:nome, :valor)";
  $stmt_ins = $pdo->prepare($sql_ins);
  $stmt_ins->bindParam(':nome', $nome);
  $stmt_ins->bindParam(':valor', $valor);

  try {
          $stmt_search->execute();
          
          //verificar quantas linhas foram alteradas
          if ($stmt_search->rowCount() > 0) {
              header("Location: ../lanches.php?erro1");
          } else {
              $stmt_ins->execute();
              header("Location: ../lanches.php?sucesso1");
          }
      
  } catch (Exception $e) {
    echo "ERROR: ".$e->getMessage()."<br>";
    exit('Oooops...');
  }
    
    
?>

