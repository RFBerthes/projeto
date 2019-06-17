<?php

include('../database_functions.php');
$pdo = connect_to_database("bd_pep");

//Recebendo dados 
$idusuario = $_GET['idusuario'];

$sql_del = "DELETE FROM usuarios WHERE idusuario = :idusuario";
$stmt_del = $pdo->prepare($sql_del);
$stmt_del->bindParam(':idusuario', $idusuario);

try {
    $stmt_del->execute();

    if ($stmt_del->rowCount() == 1) {
		header("Location: ../usuarios.php?sucesso3");
    } else {
		header("Location: ../usuarios.php?erro3");
    }		
} catch (Exception $e) {
echo "ERROR: ".$e->getMessage()."<br>";
exit('Oooops...');
}

?>