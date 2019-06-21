<?php
   // Atualizar total
   $sql_beb = "SELECT SUM(b.valorbeb) AS totalbeb
   FROM pedidos p
   JOIN bebidas b
   ON p.bebidas_idbebida = b.idbebida
   WHERE p.comanda_idcomanda = :idcomanda";
   $stmt_beb = $pdo->prepare($sql_beb);
   $stmt_beb->bindParam(':idcomanda', $idcomanda);

   $sql_lan = "SELECT SUM(l.valorlan) AS totallan
   FROM pedidos p
   JOIN lanches l
   ON p.lanches_idlanche = l.idlanche
   WHERE p.comanda_idcomanda = :idcomanda";
   $stmt_lan = $pdo->prepare($sql_lan);
   $stmt_lan->bindParam(':idcomanda', $idcomanda);

   $stmt_beb->execute();
   $stmt_lan->execute();
   $bebida = $stmt_beb->fetch();
   $lanche = $stmt_lan->fetch();

   $totalcomanda = $bebida['totalbeb'] + $lanche['totallan'];

   //Update TOTAL   
   $sql_upd = "UPDATE comandas SET total = :total WHERE comandas.idcomanda = :idcomanda";
   $stmt_upd = $pdo->prepare($sql_upd);
   $stmt_upd->bindParam(':idcomanda', $idcomanda);
   $stmt_upd->bindParam(':total', $totalcomanda);

    //echo  $totalcomanda; exit;
   $stmt_upd->execute();

?>