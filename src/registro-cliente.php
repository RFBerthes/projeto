<?php
  include('database_functions.php');
  $pdo = connect_to_database("bd_pep");

  //recebendo dados login
  $nome  = $_POST["nome"];

  //Consultar o banco de dados para uso
  $sql_search = "SELECT * FROM clientes WHERE nome = :nome ";
  $stmt_search = $pdo->prepare($sql_search);
  $stmt_search->bindParam(':nome', $nome);

  $sql_ins = "INSERT INTO clientes (nome) VALUES (:nome)";
  $stmt_ins = $pdo->prepare($sql_ins);
  $stmt_ins->bindParam(':nome', $nome);

  try {
          $stmt_search->execute();
          
          //verificar quantas linhas foram alteradas
          if ($stmt_search->rowCount() > 0) {
              header("Location: clientes.php?erro1");
          } else {
              $stmt_ins->execute();
              header("Location: clientes.php?sucesso1");
          }
      
  } catch (Exception $e) {
    echo "ERROR: ".$e->getMessage()."<br>";
    exit('Oooops...');
  }
    
    
?>


