<?php

include('../database_functions.php');
$pdo = connect_to_database("bd_pep");

//Recebendo dados 
$idbebida = $_GET['idbebida'];

$sql_del = "DELETE FROM bebidas WHERE idbebida = :idbebida";
$stmt_del = $pdo->prepare($sql_del);
$stmt_del->bindParam(':idbebida', $idbebida);

try {
    $stmt_del->execute();

    if ($stmt_del->rowCount() == 0) {
      header("Location: ../bebidas.php?erro3");
      exit();
    } else {
      header("Location: ../bebidas.php?sucesso3");
      exit();
    }		
} catch (Exception $e) {
echo "ERROR: ".$e->getMessage()."<br>";
exit('Oooops...');
}

?>