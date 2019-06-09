<?php

include('database_functions.php');
$pdo = connect_to_database("bd_pep");

//Recebendo dados 
$idpedido = $_GET['idpedido'];

$sql_del = "DELETE FROM pedidos WHERE pedidos.idpedido = :idpedido";
$stmt_del = $pdo->prepare($sql_del);
$stmt_del->bindParam(':idpedido', $idpedido);

try {
    $stmt_del->execute();

    if ($stmt_del->rowCount() == 0) {
      header("Location: pedidos.php?erro");
      exit();
    } else {
      header("Location: pedidos.php?sucesso");
      exit();
    }		
} catch (Exception $e) {
echo "ERROR: ".$e->getMessage()."<br>";
exit('Oooops...');
}

?>