<?php
  include('../database_functions.php');
  $pdo = connect_to_database("bd_pep");

   //Recebendo dados do login
   $nome  = $_POST["nome"];
   $valor  = $_POST["valor"];
   $estoque  = $_POST["estoque"];

  //Consultar o banco de dados para uso
  $sql_search = "SELECT nome_bebida  FROM bebidas WHERE nome_bebida = :nome";
  $stmt_search = $pdo->prepare($sql_search);
  $stmt_search->bindParam(':nome', $nome);

  $sql_ins = "INSERT INTO bebidas (nome_bebida, valorbeb, estoque) VALUES (:nome, :valor, :estoque)";
  $stmt_ins = $pdo->prepare($sql_ins);
  $stmt_ins->bindParam(':nome', $nome);
  $stmt_ins->bindParam(':valor', $valor);
  $stmt_ins->bindParam(':estoque', $estoque);

  try {
          $stmt_search->execute();
          
          //verificar quantas linhas foram alteradas
          if ($stmt_search->rowCount() > 0) {
              header("Location: ../bebidas.php?erro1");
          } else {
              $stmt_ins->execute();
              header("Location: ../bebidas.php?sucesso1");
          }
      
  } catch (Exception $e) {
    echo "ERROR: ".$e->getMessage()."<br>";
    exit('Oooops...');
  }
    
    
?>




