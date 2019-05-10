<?php

    include('conexao.php');

    //Recebendo dados do login
    $perfil  = $_POST["perfil"];
    $nome  = $_POST["nome"];
    $login = $_POST["usuario"];
    $senha = $_POST["senha"];
    
    $query = "SELECT usuario FROM usuarios WHERE usuario = '$usuario' ";
    
    //Consultar o banco de dados para uso
    $result = mysqli_query($conexao, $query);
    
    //verificar quantas linha a query retornou (0 não encontrou | 1 encontrou)
    $row = mysqli_num_rows($result);

    if ($row == 1){
        header('location:usuarios.php?erro1');
    }else{
        $inserirdados = mysqli_query($conexao, "NSERT INTO 'usuarios' ('idusuario', 'perfil', 'nome', 'usuario', 'senha') VALUES (NULL, '$perfil', '$nome', '$usuario', '$senha')");
        <script>alert('Usuário adicionado com sucesso!');location.href = \"usuarios.php\";</script>;

?>
