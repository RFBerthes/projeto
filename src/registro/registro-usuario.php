<?php

include('../database_functions.php');

//recebendo dados login
$perfil = $_POST['perfil'];
$nome = $_POST['nome'];
$usuario = $_POST['usuario'];
$senha = $_POST['senha'];

$pdo = connect_to_database("bd_pep");

$sql_search = "SELECT usuario FROM usuarios WHERE usuario = :usuario";
$stmt_search = $pdo->prepare($sql_search);
$stmt_search->bindParam(':usuario', $usuario);

$sql_ins = "INSERT INTO usuarios (idusuario, perfil, nome, usuario, senha) VALUES (NULL, :perfil, :nome, :usuario, :senha)";
$stmt_ins = $pdo->prepare($sql_ins);
$stmt_ins->bindParam(':perfil', $perfil);
$stmt_ins->bindParam(':nome', $nome);
$stmt_ins->bindParam(':usuario', $usuario);
$stmt_ins->bindParam(':senha', $senha);


try {
        $stmt_search->execute();

        if ($stmt_search->rowCount() > 0) {
            header("Location: ../usuarios.php?erro1");
            exit();
        } else {
            $stmt_ins->execute();
            header("Location: ../usuarios.php?sucesso1");
        }
        
    
} catch (Exception $e) {
  echo "ERROR: ".$e->getMessage()."<br>";
  exit('Oooops...');
}

?>



