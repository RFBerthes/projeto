<?php
    include('conexao.php');

    //Recebendo dados do login
    //$login = $_POST["usuario"];
    //$senha   = $_POST["senha"];
    $usuario = mysqli_real_escape_string($conexao, $_POST['usuario']);
    $senha = mysqli_real_escape_string($conexao, $_POST['senha']);
    //$senha = md5($_POST['senha']);

    $query = "SELECT * FROM usuarios WHERE usuario = '{$usuario}' AND senha = '{$senha}'";

    //Consultar o banco de dados para uso
    $result = mysqli_query($conexao, $query);
    //Isolar Perfil
    $dados = $result->fetch_assoc();

    //verificar quantas linha a query retornou (0 não encontrou | 1 encontrou)
    $row = mysqli_num_rows($result);

    if ($row == 0){
        //trata usuário ou senha inválidos
        header('location: index.php?erro1');
                
    }elseif ($row == 1){
        //trata encontrado
        switch ($dados['perfil']) {
            case "admin":
                header("Location: admin.php");
                session_start();
                $_SESSION['idusuario'] = $dados['idusuario'];
                exit();
                break;
            case "caixa":
            
                header("Location: caixa.php");
                exit();
                break;
            case "atendente":

                header("Location: atendente.php");
                session_start();
                $_SESSION['idusuario'] = $dados['idusuario'];
                exit();
                break;
            case "cozinheiro":

                header("Location: cozinheiro.php");
                exit();
                break;
            default;
                //trata usuário com perfil inválido
                header('location: index.php?erro2');
                break;
        }
    }    

?>
