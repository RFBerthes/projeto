<?php
    session_start();
    include('conexao.php');

    //Recebendo dados do login   
    //$login = $_POST["usuario"];
    //$senha   = $_POST["senha"];
    $usuario = mysqli_real_escape_string($conexao, $_POST['usuario']);
    $senha = mysqli_real_escape_string($conexao, $_POST['senha']);

    $query = "SELECT idusuario, usuario FROM usuarios WHERE usuario = '{$usuario}' AND senha = '{$senha}'";

    //Consultar o banco de dados para uso 
    $result = mysqli_query($conexao, $query);
    $row = mysqli_num_rows($result);

    if($row == 1){
        //$_SESSION['usuario'] = $usuario;
        header("Location: /projeto/src/admin.html");
    }else{
        header("Location: /projeto/src/index.html");
    }

?>
