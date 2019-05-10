<?php

    include('conexao.php');

    //Recebendo dados do login
    //$login = $_POST["usuario"];
    //$senha   = $_POST["senha"];
    $usuario = mysqli_real_escape_string($conexao, $_POST['usuario']);
    $senha = mysqli_real_escape_string($conexao, $_POST['senha']);

    $query = "SELECT usuario, perfil FROM usuarios WHERE usuario = '{$usuario}' AND senha = '{$senha}'";


    //Consultar o banco de dados para uso
    $result = mysqli_query($conexao, $query);
    //Isolar Perfil
    $perfil = $result->fetch_assoc();
    //verificar quantas linha a query retornou (0 não encontrou | 1 encontrou)
    $row = mysqli_num_rows($result);

    if ($row == 1){
        switch ($perfil['perfil']) {
            case "admin":
                header("Location: admin.php");
                break;
            case "caixa":
                header("Location: caixa.php");
                break;
            case "atendente":
                header("Location: atendente.php");
                break;
            case "cozinheiro":
                header("Location: cozinheiro.php");
                break;
            default;
                echo 'Usuário cadastrado com função inválida, procure o adminstrador!';
                header("Location: index.php");
                break;
        }
    }else{
        echo 'Senha ou usuário invalidos!';
        header("Location: index.php");
    }     

?>
