<?php
  include('database_functions.php');
  $pdo = connect_to_database("bd_pep");

  //recebendo dados login
  $idmesa  = $_GET['idmesa'];

  $sql_ins = "INSERT INTO `mesas` (`idmesa`, `lugares`) VALUES ('', NULL)";
  $stmt_ins = $pdo->prepare($sql_ins);

  try {
        if($idmesa != 1){
          header("Location: mesas.php?erro1");
        } else {
            $stmt_ins->execute();
            header("Location: mesas.php?sucesso1");
        }
      
  } catch (Exception $e) {
    echo "ERROR: ".$e->getMessage()."<br>";
    exit('Oooops...');
  }
    
    
?>


