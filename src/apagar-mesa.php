<?php

include('database_functions.php');
$pdo = connect_to_database("bd_pep");

//Recebendo dados 
$idmesa = $_GET['idmesa'];

$sql_del = "DELETE FROM mesas WHERE idmesa = :idmesa";
$stmt_del = $pdo->prepare($sql_del);
$stmt_del->bindParam(':idmesa', $idmesa);

try {
    $stmt_del->execute();

    if ($stmt_del->rowCount() == 0) {
      header("Location: mesas.php?erro3");
    } else {
      header("Location: mesas.php?sucesso3");
    }		
} catch (Exception $e) {
echo "ERROR: ".$e->getMessage()."<br>";
exit('Oooops...');
}

?>