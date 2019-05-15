<?php
    include('conexao.php');

    //Recebendo dados do login
    $sabor  = $_POST["sabor"];
    
    $query = "SELECT nome FROM `sabores` WHERE nome = '{$sabor}' ";
    
    //Consultar o banco de dados para uso
    $result = mysqli_query($conexao, $query);

    //verificar quantas linha a query retornou (0 não encontrou | 1 encontrou)
    $row = mysqli_num_rows($result);
    echo $row;

    if ($row == 1){
       header('location:cadastros.php?erro1');
       exit();
       
    }else{
       $inserirdados = mysqli_query($conexao, "INSERT INTO `sabores` (`idsabores`, `nome`) VALUES (NULL, '$sabor');");
       header('location:cadastros.php?sucesso');
       exit();
       
    }
    
?>

