<?php

include('database_functions.php');
$pdo = connect_to_database("bd_pep");

//Recebendo dados 
$idpedido = $_GET['idpedido'];
$status = "Servido";

$sql_busca = "SELECT * FROM pedidos WHERE idpedido = :idpedido";
$stmt_search = $pdo->prepare($sql_busca);
$stmt_search->bindParam(':idpedido', $idpedido);

$sql_upd = "UPDATE pedidos SET status = :status WHERE pedidos.idpedido = :idpedido";
$stmt_upd = $pdo->prepare($sql_upd);
$stmt_upd->bindParam(':idpedido', $idpedido);
$stmt_upd->bindParam(':status', $status);

try {

  $stmt_search->execute();
  if ($stmt_search->rowCount() == 1) {
    $row = $stmt_search->fetch();
    switch ($row['tipo']) {
      case "Lanche":
        $stmt_upd->execute();

        if ($stmt_upd->rowCount() == 1) {
          header("Location: pedidos.php?sucesso");
        } else {
          header("Location: pedidos.php?erro");
        }
        header("Location: pedidos.php?sucesso");
        break;
      case "Bebida":
        $stmt_upd->execute();

        if ($stmt_upd->rowCount() == 1) {
          header("Location: pedidos-bebidas.php?sucesso");
        } else {
          header("Location: pedidos-bebidas.php?erro");
        }
        header("Location: pedidos-bebidas.php?sucesso");
        break;
      default;
        echo "erro..";
        break;
    }
  } else {
    header("Location: pedidos.php?erro");
  }


} catch (Exception $e) {
  echo "ERROR: " . $e->getMessage() . "<br>";
  exit('Oooops...');
}
