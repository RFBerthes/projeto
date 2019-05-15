<?php
    include('conexao.php');

    //Recebendo dados
    $tamanho  = $_POST["tamanho"];
    $sabor  = $_POST["sabor"];
    $valor  = $_POST["valor"];
    $nsabor  = $_POST["nsabor"];
    
   //Consultar colisão
    $query = "SELECT tamanho FROM `pizzas` WHERE tamanho = '{$tamanho}' ";
    
    //Consultar o banco de dados para uso
    $result = mysqli_query($conexao, $query);

    //verificar quantas linha a query retornou (0 não encontrou | 1 encontrou)
    $row = mysqli_num_rows($result);
    echo $row;

    if ($row == 1){
       header('location:produtos.php?erro1');
       exit();
       
    }else{
       $inserirdados = mysqli_query($conexao, "INSERT INTO `pizza` (`idpizza`, `tamanho`, `nsabor`, `valor`) VALUES (NULL, '$tamanho', '$nsabor', '$valor')");
       header('location:produtos.php?sucesso1');
       exit();
       
    }
    
?>

