<?php
	include('../database_functions.php');
	$pdo = connect_to_database("bd_pep");

	//recebendo dados login
	$idcliente = $_POST['idcliente'];
	$nome = $_POST['nome'];

	
	$sql_upd = "UPDATE clientes SET nome = :nome WHERE clientes.idcliente = :idcliente";
	$stmt_upd = $pdo->prepare($sql_upd);
	$stmt_upd->bindParam(':nome', $nome);
	$stmt_upd->bindParam(':idcliente', $idcliente);

	try {
        $stmt_upd->execute();

        if ($stmt_upd->rowCount() == 0) {
			header('location:clientes.php?erro2');
            exit();
        } else {
			header('location:clientes.php?sucesso2');
            exit();
        }		
	} catch (Exception $e) {
	echo "ERROR: ".$e->getMessage()."<br>";
	exit('Oooops...');
	}
?>