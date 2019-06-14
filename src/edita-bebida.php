<?php
	include('database_functions.php');
	$pdo = connect_to_database("bd_pep");

	//recebendo dados login
	$idbebida = $_POST['idbebida'];
	$valor = $_POST['valor'];
	$nome = $_POST['nome'];
	$estoque = $_POST['estoque'];

	
	$sql_upd = "UPDATE bebidas SET nome_bebida = :nome, valorbeb = :valor, estoque = :estoque WHERE bebidas.idbebida = :idbebida";
	$stmt_upd = $pdo->prepare($sql_upd);
	$stmt_upd->bindParam(':idbebida', $idbebida);
	$stmt_upd->bindParam(':nome', $nome);
	$stmt_upd->bindParam(':valor', $valor);
	$stmt_upd->bindParam(':estoque', $estoque);

	try {
        $stmt_upd->execute();

        if ($stmt_upd->rowCount() == 0) {
			header('location:bebidas.php?erro2');
            exit();
        } else {
			header('location:bebidas.php?sucesso2');
            exit();
        }		
	} catch (Exception $e) {
	echo "ERROR: ".$e->getMessage()."<br>";
	exit('Oooops...');
	}
?>