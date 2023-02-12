<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Commande</title>
</head>
<body>        
    <h3 class="text-center">Toutes les commandes</h3>
    <table class="table mt-5">
        <thead>
            <tr>
            <th scope="col">Numéro de commande</th>
            <th scope="col">Numéro de client</th>
            <th scope="col">Prix de la commande</th>
            <th scope="col">Numéro Facturation</th>
            <th scope="col">Nombre d'articles</th>
            <th scope="col">Date de la commande</th>
            <th scope="col">statue de la commande</th>
            <th scope="col">Opérations</th>
            </tr>
        </thead> 
        <tbody>
            <!-- Selectionner et affichage des commandes -->
            <?php
            global $BDD;
            $sql_comm="SELECT * FROM commande";
            $return_comm=$BDD->query($sql_comm);
            while ($comm=$return_comm->fetch()){
            $idcomm=$comm['idcomm'];
            ?>
            <tr scope="row">
            <td><?=$comm['idcomm']?></td>
            <td><?=$comm['idcli']?></td>
            <td><?=$comm['prixcom']?></td>
            <td><?=$comm['idpaie']?></td>
            <td><?=$comm['nbrprod']?></td>
            <td><?=$comm['datcom']?></td>
            <td><?=$comm['statucom']?></td>
            <td>
                <a href='suppr_commande.php?idcomm=<?=$idcomm?>' class='btn btn-outline-dark '>Supprimer</a>
            </td>
            </tr>
             <?php  }?>
        </tbody>
    </table>
   
</body>
</html>