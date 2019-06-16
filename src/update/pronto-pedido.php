<?php

include('../database_functions.php');
$pdo = connect_to_database("bd_pep");

//Recebendo dados 
$idpedido = $_GET['idpedido'];
$status = "Pronto";

$sql_upd = "UPDATE pedidos SET status = :status WHERE pedidos.idpedido = :idpedido";
$stmt_upd = $pdo->prepare($sql_upd);
$stmt_upd->bindParam(':idpedido', $idpedido);
$stmt_upd->bindParam(':status', $status);

try {

  $stmt_upd->execute();

  if ($stmt_upd->rowCount() == 1) {
    header("Location: ../cozinheiro.php?sucesso");
  } else {
    header("Location: ../cozinheiro.php?erro");
  }
} catch (Exception $e) {
  echo "ERROR: " . $e->getMessage() . "<br>";
  exit('Oooops...');
}
