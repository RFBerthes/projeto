<?php
	include('../database_functions.php');

	//recebendo dados login
	$idlanche = $_POST['idlanche'];
	$valor = $_POST['valor'];
	$nome = $_POST['nome'];

	$pdo = connect_to_database("bd_pep");
	
	$sql_upd = "UPDATE lanches SET nome_lanche = :nome, valorlan = :valor WHERE lanches.idlanche = :idlanche";
	$stmt_upd = $pdo->prepare($sql_upd);
	$stmt_upd->bindParam(':idlanche', $idlanche);
	$stmt_upd->bindParam(':nome', $nome);
	$stmt_upd->bindParam(':valor', $valor);

	try {
        $stmt_upd->execute();

        if ($stmt_upd->rowCount() == 0) {
			header('location: ../lanches.php?erro2');
            exit();
        } else {
			header('location: ../lanches.php?sucesso2');
            exit();
        }		
	} catch (Exception $e) {
	echo "ERROR: ".$e->getMessage()."<br>";
	exit('Oooops...');
	}
?>