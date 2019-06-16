<?php
    include('database_functions.php');

    $pdo = connect_to_database("bd_pep");

    //Recebendo dados do login
    // resgata variáveis do formulário
    $usuario = $_POST['usuario'];
    $senha = $_POST['senha'];

    $sql = "SELECT * FROM usuarios WHERE usuario = :usuario AND senha = :senha";
    $usuario_busca = $pdo->prepare($sql);

    $usuario_busca->bindParam(':usuario', $usuario);
    $usuario_busca->bindParam(':senha', $senha);

    $usuario_busca->execute();

    
    if ($usuario_busca->rowCount() == 1)
    {
        //trata encontrado
        $row = $usuario_busca->fetch();

        switch ($row['perfil']) {
            case "Administrador":
                session_start();
                $_SESSION['nome'] = $row['nome'];
                $_SESSION['perfil'] = $row['perfil'];
                $_SESSION['idusuario'] = $row['idusuario'];
                header('Location: admin.php');
                break;
            case "Atendente": 
                session_start();
                $_SESSION['nome'] = $row['nome'];
                $_SESSION['perfil'] = $row['perfil'];
                $_SESSION['idusuario'] = $row['idusuario'];
                header('Location: comandas.php');
                exit();
                break;
            case "Cozinheiro": 
                session_start();
                $_SESSION['nome'] = $row['nome'];
                $_SESSION['perfil'] = $row['perfil'];
                $_SESSION['idusuario'] = $row['idusuario'];
                header('Location: cozinheiro.php');
                exit();
                break;
            case "Caixa": 
                session_start();
                $_SESSION['nome'] = $row['nome'];
                $_SESSION['perfil'] = $row['perfil'];
                $_SESSION['idusuario'] = $row['idusuario'];
                header('Location: caixa.php');
                exit();
                break;
                
            default;
            //trata usuário com perfil inválido
            header('location: index.php?erro2');
            break;
    }   
    }else{
        //trata usuário ou senha inválidos
        header('location: index.php?erro1');
    } 

    ?>