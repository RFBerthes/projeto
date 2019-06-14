
<?php

include('database_functions.php');
$pdo = connect_to_database("bd_pep");

//Recebendo dados 
$idcomanda = $_GET['idcomanda'];
$status = "Paga";

$sql_upd = "UPDATE comandas SET data = CURRENT_TIMESTAMP, status_comanda = :status WHERE comandas.idcomanda = :idcomanda";
$stmt_upd = $pdo->prepare($sql_upd);
$stmt_upd->bindParam(':idcomanda', $idcomanda);
$stmt_upd->bindParam(':status', $status);

try {

  $stmt_upd->execute();

  if ($stmt_upd->rowCount() == 1) {
    header("Location: caixa.php?sucesso");
  } else {
    header("Location: caixa.php?erro");
  }
} catch (Exception $e) {
  echo "ERROR: " . $e->getMessage() . "<br>";
  exit('Oooops...');
}
