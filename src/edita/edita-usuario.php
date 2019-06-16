<?php
	include('../database_functions.php');

	//recebendo dados login
	$idusuario = $_POST['idusuario'];
	$perfil = $_POST['perfil'];
	$nome = $_POST['nome'];
	$usuario = $_POST['usuario'];

	$pdo = connect_to_database("bd_pep");
	
	$sql_upd = "UPDATE usuarios SET perfil = :perfil, nome = :nome, usuario = :usuario WHERE usuarios.idusuario = :idusuario";
	$stmt_upd = $pdo->prepare($sql_upd);
	$stmt_upd->bindParam(':perfil', $perfil);
	$stmt_upd->bindParam(':nome', $nome);
	$stmt_upd->bindParam(':usuario', $usuario);
	$stmt_upd->bindParam(':idusuario', $idusuario);

	try {
        $stmt_upd->execute();

        if ($stmt_upd->rowCount() == 0) {
			header('location:usuarios.php?erro2');
            exit();
        } else {
			header('location:usuarios.php?sucesso2');
            exit();
        }		
	} catch (Exception $e) {
	echo "ERROR: ".$e->getMessage()."<br>";
	exit('Oooops...');
	}
?>