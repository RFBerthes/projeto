<?php

	include('../database_functions.php');
	$pdo = connect_to_database("bd_pep");

	//Recebendo dados 
	$idlanche = $_GET['idlanche'];

	$sql_del = "DELETE FROM lanches WHERE idlanche = :idlanche";
	$stmt_del = $pdo->prepare($sql_del);
	$stmt_del->bindParam(':idlanche', $idlanche);

	try {
			$stmt_del->execute();

			if ($stmt_del->rowCount() == 0) {
				header("Location: ../lanches.php?erro3");
				exit();
			} else {
				header("Location: ../lanches.php?sucesso3");
				exit();
			}		
	} catch (Exception $e) {
	echo "ERROR: ".$e->getMessage()."<br>";
	exit('Oooops...');
	}

 ?>