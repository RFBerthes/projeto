<?php

include('../database_functions.php');
$pdo = connect_to_database("bd_pep");

//Recebendo dados 
$idpedido = $_GET['idpedido'];
$sql_busca = "SELECT * FROM pedidos WHERE idpedido = :idpedido";
$stmt_search = $pdo->prepare($sql_busca);
$stmt_search->bindParam(':idpedido', $idpedido);

$sql_del = "DELETE FROM pedidos WHERE pedidos.idpedido = :idpedido";
$stmt_del = $pdo->prepare($sql_del);
$stmt_del->bindParam(':idpedido', $idpedido);


try {

  $stmt_search->execute();
  if ($stmt_search->rowCount() == 1) {
    $row = $stmt_search->fetch();
    switch ($row['tipo']) {
      case "Lanche":
        $stmt_del->execute();
        header("Location: ../pedidos.php?sucesso");
        break;
      case "Bebida":
        $stmt_del->execute();
        header("Location: ../pedidos-bebidas.php?sucesso");
        break;
      default;
        echo "erro..";
        break;
    }
  } else {
    header("Location: ../pedidos.php?erro");
  }
} catch (Exception $e) {
  echo "ERROR: " . $e->getMessage() . "<br>";
  exit('Oooops...');
}
