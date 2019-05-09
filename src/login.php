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
                header("Location: /projeto/src/admin.html");
                break;
            case "caixa":
                header("Location: /projeto/src/caixa.html");
                break;
            case "atendente":
                header("Location: /projeto/src/atendente.html");
                break;
            case "cozinheiro":
                header("Location: /projeto/src/cozinheiro.html");
                break;
            default;
                echo 'Usuário cadastrado com função inválida, procure o adminstrador!';
                header("Location: /projeto/src/index.html");
                break;
        }
    }else{
        echo 'Senha ou usuário invalidos!';
        exit;
        header("Location: /projeto/src/index.html");
    }

?>
