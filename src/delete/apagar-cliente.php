<?php

include('../database_functions.php');
$pdo = connect_to_database("bd_pep");

//Recebendo dados 
$idcliente = $_GET['idcliente'];

$sql_del = "DELETE FROM clientes WHERE idcliente = :idcliente";
$stmt_del = $pdo->prepare($sql_del);
$stmt_del->bindParam(':idcliente', $idcliente);

try {
    $stmt_del->execute();

    if ($stmt_del->rowCount() == 0) {
      header("Location: ../clientes.php?erro3");
    } else {
      header("Location: ../clientes.php?sucesso3");
    }		
} catch (Exception $e) {
echo "ERROR: ".$e->getMessage()."<br>";
exit('Oooops...');
}

?>