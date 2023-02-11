
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Commande client</title>
</head>
<body>        
    <?= commande_client(); ?>
    <h3 class="text-center">Toutes vos commandes.</h3>
    <table class="table">
        <thead>
            <th scope="col">Numéro de commande</th>
            <th scope="col">Prix de la commande</th>
            <th scope="col">Nombre d'articles</th>
            <th scope="col">Numéro de facturation</th>
            <th scope="col">Date de la commande</th>
            <th scope="col">statue de la commande</th>
            <th scope="col">Opérations</th>
        </thead>
            <!-- Selectionner et affichage les commandes du client -->
            <?php
            global $BDD;
            $idcli=$_SESSION['idcli'];
            $sql_com="SELECT * FROM commande where idcli=$idcli";
            $return_com=$BDD->query($sql_com);
            while ($com=$return_com->fetch()){
            $idcomm=$com['idcomm'];
            $tatue_com=$com['statucom'];
                if($tatue_com=="En attente"){
                    $tatue_com="En cours";
                }else{
                    $tatue_com="Payé";
                }
            ?>
            <tbody>
            <td><?=$com['idcomm']?></td>
            <td><?=$com['prixcom']?></td>
            <td><?=$com['nbrprod']?></td>
            <td><?=$com['idpaie']?></td>
            <td><?=$com['datcom']?></td>
            <td><?=$tatue_com?></td>
            <?php
            if ($tatue_com=='Payé'){
                echo "<td><a href='suppr_commande.php?idcom=$idcomm' class='btn btn-outline-dark'>Annuler</a></td>";
            }else{
                echo "<td><a href='confirmer_paiement.php?idcom=$idcomm' class='btn btn-outline-dark'>Confirmer</a></td>";
            }
            ?>
            
            </tbody>
             <?php } ?>
    </table>
   
</body>
</html>