<?php
	include_once("conexao.php");
	
	$nome = $_GET['nome'];
	
	
	$del_sabor = "DELETE FROM bebidas WHERE nome = '$nome'";
	$result = mysqli_query($conexao, $del_sabor);	


	if(mysqli_affected_rows($conexao) != 0){
		header('location:bebidas.php?sucesso3');

	}else{
		echo "erro1";
		header('location:bebidas.php?erro3');
	}
	
	$conexao->close();
 ?>