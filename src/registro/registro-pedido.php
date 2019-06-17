<?php
  include('../database_functions.php');
  $pdo = connect_to_database("bd_pep");

  //recebendo dados login
  $idcomanda = $_POST['idcomanda'];
  $lanche  = $_POST["lanche"];
  $quantidade  = $_POST["quantidade"];
  $atendente  = $_POST["atendente"];
  $obs  = $_POST["obs"];
  $tipo  = "Lanche";
  $status  = "Preparo";

  $sql_ins = "INSERT INTO pedidos (data, status, tipo, comanda_idcomanda, usuario_idusuario, lanches_idlanche, quantidade, obs, bebidas_idbebida) VALUES (CURRENT_TIMESTAMP, :status, :tipo, :idcomanda, :atendente, :lanche, :quantidade, :obs, NULL)";
  $stmt_ins = $pdo->prepare($sql_ins);
  $stmt_ins->bindParam(':status', $status);
  $stmt_ins->bindParam(':tipo', $tipo);
  $stmt_ins->bindParam(':idcomanda', $idcomanda);
  $stmt_ins->bindParam(':atendente', $atendente);
  $stmt_ins->bindParam(':lanche', $lanche);
  $stmt_ins->bindParam(':quantidade', $quantidade);
  $stmt_ins->bindParam(':obs', $obs);

  try {
         $stmt_ins->execute();

         //verificar quantas linhas foram alteradas
         if ($stmt_ins->rowCount() > 0) {
            require_once('../update/atualiza-total.php');
            header("Location: ../comandas.php?sucesso");   
         } else {
            header("Location: ../comandas.php?erro");
         }
      
  } catch (Exception $e) {
    echo "ERROR: ".$e->getMessage()."<br>";
    exit('Oooops...');
  }