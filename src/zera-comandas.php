<?php
  include('database_functions.php');
  $pdo = connect_to_database("bd_pep");

  //Consultar o banco de dados para uso
  $sql_alter = "ALTER TABLE comandas AUTO_INCREMENT = 1";
  $stmt_alter = $pdo->prepare($sql_alter);

  try {
          $stmt_alter->execute();
          header("Location: comandas.php?sucesso");          
              
  } catch (Exception $e) {
    echo "ERROR: ".$e->getMessage()."<br>";
    exit('Oooops...');
  }
    
    
?>

