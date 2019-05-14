<?php
	include_once("conexao.php");
	
	$usuario = $_GET['usuario'];
	
	$result_usuarios = "DELETE FROM usuarios WHERE usuario = '$usuario'";
	$resultado_usuarios = mysqli_query($conexao, $result_usuarios);	
?>

<!DOCTYPE html>
<html lang="pt-br">
	<head>
		<meta charset="utf-8">
	</head>

	<body> <?php
		if(mysqli_affected_rows($conexao) != 0){
			echo "
				<META HTTP-EQUIV=REFRESH CONTENT = '0;URL=usuarios.php'>
				<script type=\"text/javascript\">
					alert(\"Usuário Apagado com Sucesso.\");
				</script>
			";	
		}else{
			echo "
				<META HTTP-EQUIV=REFRESH CONTENT = '0;URL=usuarios.php'>
				<script type=\"text/javascript\">
					alert(\"Usuário não foi Apagado com Sucesso.\");
				</script>
			";	
		}?>
	</body>
</html>
<?php $conexao->close(); ?>