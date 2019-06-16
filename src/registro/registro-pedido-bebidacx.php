<?php
   include('../database_functions.php');
   $pdo = connect_to_database("bd_pep");

   //recebendo dados login
   $idcomanda = $_POST['idcomanda'];
   $bebida  = $_POST["bebida"];
   $quantidade  = $_POST["quantidade"];
   $atendente  = $_POST["atendente"];
   $obs  = $_POST["obs"];
   $tipo  = "Bebida";
   $status  = "Servido";

   $sql_ins = "INSERT INTO pedidos ( data, status, tipo, comanda_idcomanda, usuario_idusuario, lanches_idlanche, quantidade, obs, bebidas_idbebida)
                        VALUES ( CURRENT_TIMESTAMP, :status, :tipo, :idcomanda, :atendente, NULL, :quantidade, :obs, :bebida);";
   $stmt_ins = $pdo->prepare($sql_ins);
   $stmt_ins->bindParam(':status', $status);
   $stmt_ins->bindParam(':tipo', $tipo);
   $stmt_ins->bindParam(':idcomanda', $idcomanda);
   $stmt_ins->bindParam(':atendente', $atendente);
   $stmt_ins->bindParam(':quantidade', $quantidade);
   $stmt_ins->bindParam(':obs', $obs);
   $stmt_ins->bindParam(':bebida', $bebida);

   // Atualizar total
   $sql_beb = "SELECT SUM(valorbeb) AS totalbeb FROM pedidos JOIN bebidas ON pedidos.bebidas_idbebida = bebidas.idbebida WHERE pedidos.comanda_idcomanda = :idcomanda ";
   $stmt_beb = $pdo->prepare($sql_beb);
   $stmt_beb->bindParam(':idcomanda', $idcomanda);

   $sql_lan = "SELECT SUM(valorlan) AS totallan FROM pedidos JOIN lanches ON pedidos.lanches_idlanche = lanches.idlanche WHERE pedidos.comanda_idcomanda = :idcomanda ";
   $stmt_lan = $pdo->prepare($sql_lan);
   $stmt_lan->bindParam(':idcomanda', $idcomanda);

   $sql_upd = "UPDATE comandas SET total = :total, status_comanda = :status WHERE comandas.idcomanda = :idcomanda";
   $stmt_upd = $pdo->prepare($sql_upd);
   $stmt_upd->bindParam(':idcomanda', $idcomanda);
   $stmt_upd->bindParam(':total', $totalcomanda);
   $stmt_upd->bindParam(':status', $status);


  try {
         $stmt_ins->execute();

         //verificar quantas linhas foram alteradas
         if ($stmt_ins->rowCount() == 1) {
            $stmt_beb->execute();
            $stmt_lan->execute();
            $bebida = $stmt_beb->fetch();
            $lanche = $stmt_lan->fetch();
            $totalcomanda = $bebida['totalbeb'] + $lanche['totallan'];
            // echo  $totalcomanda; exit;
            $stmt_upd->execute();
            header("Location: ../caixa.php?sucesso");
         } else {
            header("Location: ../caixa.php?erro");
         }

  } catch (Exception $e) {
    echo "ERROR: ".$e->getMessage()."<br>";
    exit('Oooops...');
  }
