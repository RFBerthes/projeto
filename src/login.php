<?php
     //Recebendo dados do login   
     $usuario = $POST["usuario"];
     $senha   = $POST["senha"];

     //Preparar para injetar
     $usuario = stripcslashes($usuario);
     $senha   = stripcslashes($senha);
     $usuario = mysql_real_escape_string($usuario);
     $senha   = mysql_real_escape_string($senha);

     //Conexão com servidor e BD
     mysql_connect("localhost", "root", "");
     mysql_select_db("pep");

     //Consultar o banco de dados para uso 
     $result = msql_query("select * form usuario where usuario = '$username' and senha = '$senha' ")
     or die("Failed to query database".mysql_error());

     $row = mysql_fetch_array($result);
     if ($row['usuario'] == $username && $row['senha'] == $senha){
         echo "Login efetuado com sucesso ".$row['usuario'];
     }else{
         echo "Erro no login, tente novamente"
     }
?>
