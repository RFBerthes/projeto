<?php
	include_once("conexao.php");
	$idusuario = mysqli_real_escape_string($conexao, $_POST['idusuario']);
	$usuario = mysqli_real_escape_string($conexao, $_POST['usuario']);
	$nome = mysqli_real_escape_string($conexao, $_POST['nome']);
	$perfil = mysqli_real_escape_string($conexao, $_POST['perfil']);
	
	echo "id $idusuario <br>";
	echo "user $usuario <br>";
	echo "nome $nome <br>";
	echo "perfil $perfil<br>";
	exit;
	
	$result_usuarios = "UPDATE usuarios SET nome='$nome', perfil = '$perfil' WHERE idusuario = '$idusuario'";	
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
					alert(\"Usuário alterado com Sucesso.\");
				</script>
			";	
		}else{
			echo "
				<META HTTP-EQUIV=REFRESH CONTENT = '0;URL=usuarios.php'>
				<script type=\"text/javascript\">
					alert(\"Usuário não foi alterado com Sucesso.\");
				</script>
			";	
		}?>
	</body>
</html>
<?php $conexao->close(); ?>