<?php

	include('database_functions.php');
	$pdo = connect_to_database("bd_pep");

	//Recebendo dados 
  $idcomanda = $_GET['idcomanda'];

	$sql_del = "DELETE FROM comandas WHERE comandas.idcomanda = :idcomanda";
	$stmt_del = $pdo->prepare($sql_del);
	$stmt_del->bindParam(':idcomanda', $idcomanda);

	try {
			$stmt_del->execute();

			if ($stmt_del->rowCount() == 0) {
				header("Location: comandas.php?erro");
				exit();
			} else {
				header("Location: comandas.php?sucesso");
				exit();
			}		
	} catch (Exception $e) {
	echo "ERROR: ".$e->getMessage()."<br>";
	exit('Oooops...');
	}

 ?>