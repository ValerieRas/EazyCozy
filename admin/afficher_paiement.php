<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Paiement</title>
</head>
<body>        
    <h3 class="text-center">Tous les paiements</h3>
    <table class="table mt-5">
        <thead>
            <tr>
            <th scope="col">Identifiant de paiement</th>
            <th scope="col">Numéro Facturation</th>
            <th scope="col">Numéro de commande</th>
            <th scope="col">Prix de la commande</th>
            <th scope="col">Date de paiement</th>
            <th scope="col">Opérations</th>
            </tr>
        </thead> 
        <tbody>
            <!-- Selectionner et affichage les paiements-->
            <?php
            global $BDD;
            $sql_paie="SELECT * FROM paiement_client";
            $return_paie=$BDD->query($sql_paie);
            while ($paie=$return_paie->fetch()){
            $idfact=$paie['idfact'];
            ?>
            <tr scope="row">
            <td><?=$paie['idfact']?></td>
            <td><?=$paie['idpaie']?></td>
            <td><?=$paie['idcomm']?></td>
            <td><?=$paie['prixcom']?></td>
            <td><?=$paie['date_paie']?></td>
            </tr>
             <?php  }?>
        </tbody>
    </table>
   
</body>
</html>