<?php

include('../database_functions.php');
$pdo = connect_to_database("bd_pep");

//Recebendo dados 
$usuario = $_GET['usuario'];

$sql_del = "DELETE FROM usuarios WHERE usuario = :usuario";
$stmt_del = $pdo->prepare($sql_del);
$stmt_del->bindParam(':usuario', $usuario);

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