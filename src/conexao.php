<?php
    //Dados DB
    define('HOST', '127.0.0.1');
    define('USUARIO', 'root');
    define('SENHA', '');
    define('BD', 'bd_pep');

    //Conexão com servidor e BD
    $conexao = mysqli_connect(HOST, USUARIO, SENHA, BD) or die ('Não foi possível conectar ao banco de dados');
    session_start();
?>

<?php
  include('conexao.php');
  $addMesa = "INSERT INTO 'mesa' ('idmesa') VALUES (NULL);";

  //Insere novo registro
  $result = mysqli_query($conexao, $addMesa);
  $mesas = $result->fetch_assoc();
  echo '$mesas['idmesa']'
?>
