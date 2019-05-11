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

    if ($row == 0){
        //trata usuário ou senha inválidos
        header('location: index.html?erro1');
                
    }elseif ($row == 1){
        //trata encontrado
        switch ($perfil['perfil']) {
            case "admin":
                header("Location: admin.html");
                break;
            case "caixa":
                header("Location: caixa.html");
                break;
            case "atendente":
                header("Location: atendente.html");
                break;
            case "cozinheiro":
                header("Location: cozinheiro.html");
                break;
            default;
                //trata usuário com perfil inválido
                header('location: index.html?erro2');
                break;
        }
    }    

?>
