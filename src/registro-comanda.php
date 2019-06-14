<?php
  include('database_functions.php');
  $pdo = connect_to_database("bd_pep");

  //recebendo dados login
  $mesa  = $_POST["mesa"];
  $cliente  = $_POST["cliente"];
  $status  = "Aberta";
  $usuario = $_POST["atendente"];
  

  $sql_ins = "INSERT INTO comandas ( data, total, status_comanda, cliente_idcliente, mesa_idmesa, usuarios_idusuario) VALUES 
                                    ( CURRENT_TIMESTAMP, NULL, :status, :cliente, :mesa, :usuario)";
  $stmt_ins = $pdo->prepare($sql_ins);
  $stmt_ins->bindParam(':status', $status);
  $stmt_ins->bindParam(':cliente', $cliente);
  $stmt_ins->bindParam(':mesa', $mesa);
  $stmt_ins->bindParam(':usuario', $usuario);

  try {
          $stmt_ins->execute();
          
          //verificar quantas linhas foram alteradas
          if ($stmt_ins->rowCount() == 0) {
              header("Location: comandas.php?erro");
          } else {
              header("Location: comandas.php?sucesso");
          }
      
  } catch (Exception $e) {
    echo "ERROR: ".$e->getMessage()."<br>";
    exit('Oooops...');
  }
    
    
?>

