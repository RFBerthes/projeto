
<?php

include('../database_functions.php');
$pdo = connect_to_database("bd_pep");

//Recebendo dados 
$idcomanda = $_GET['idcomanda'];
$status = "Fechada";

$sql_beb = "SELECT SUM(valorbeb) AS totalbeb FROM pedidos JOIN bebidas ON pedidos.bebidas_idbebida = bebidas.idbebida WHERE pedidos.comanda_idcomanda = :idcomanda ";
$stmt_beb = $pdo->prepare($sql_beb);
$stmt_beb->bindParam(':idcomanda', $idcomanda);
$stmt_beb->execute();

$sql_lan = "SELECT SUM(valorlan) AS totallan FROM pedidos JOIN lanches ON pedidos.lanches_idlanche = lanches.idlanche WHERE pedidos.comanda_idcomanda = :idcomanda ";
$stmt_lan = $pdo->prepare($sql_lan);
$stmt_lan->bindParam(':idcomanda', $idcomanda);
$stmt_lan->execute();

$bebida = $stmt_beb->fetch();
$lanche = $stmt_lan->fetch();
$totalcomanda = $bebida['totalbeb'] + $lanche['totallan'];

$sql_upd = "UPDATE comandas SET total = :total, status_comanda = :status WHERE comandas.idcomanda = :idcomanda";
$stmt_upd = $pdo->prepare($sql_upd);
$stmt_upd->bindParam(':idcomanda', $idcomanda);
$stmt_upd->bindParam(':total', $totalcomanda);
$stmt_upd->bindParam(':status', $status);

try {

  $stmt_upd->execute();

  if ($stmt_upd->rowCount() == 1) {
    header("Location: ../comandas.php?sucesso");
  } else {
    header("Location: ../comandas.php?erro");
  }
} catch (Exception $e) {
  echo "ERROR: " . $e->getMessage() . "<br>";
  exit('Oooops...');
}
