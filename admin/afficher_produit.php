
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Produits</title>
</head>
<body>        
    <h3 class="text-center">Tous les produits</h3>
    <table class="table mt-5">
        <thead>
            <tr>
            <th scope="col">Numéro du produit</th>
            <th scope="col">Nom du produit</th>
            <th scope="col">Numéro de catégorie</th>
            <th scope="col">Numéro du créateur</th>
            <th scope="col">Image</th>
            <th scope="col">Nombre d'articles vendu</th>
            <th scope="col">Stock restant</th>
            <th scope="col">Prix du produit €</th>
            <th scope="col">Opérations</th>
            </tr>
        </thead> 
        <tbody>
            <!-- Selectionner et affichage des produits -->
            <?php
            global $BDD;
            $sql_prod="SELECT * FROM produit";
            $return_prod=$BDD->query($sql_prod);
            while ($prod=$return_prod->fetch()){
            $idprod=$prod['idprod'];
            $quant_prod=$prod['quantité'];
            $sql_panier="SELECT * FROM panierclient WHERE prodid=$idprod";
            $panier_return=$BDD->query($sql_panier);
            while($pan=$panier_return->fetch()){
            $panier=array($pan['quant']);
            $nbr_panier=array_sum($panier);
            }
            ?>
            <tr scope="row">
            <td><?=$prod['idprod']?></td>
            <td><?=$prod['prodnom']?></td>
            <td><?=$prod['idcat']?></td>
            <td><?=$prod['idcreat']?></td>
            <td>
                <img src="produit_img/<?=$prod['img1prod']?>" alt="" class="logo">
            </td>
            <td>
                <?php
                // nbre d'articles dans les paniers
                $sql_panier="SELECT * FROM panierclient WHERE prodid=$idprod";
                $panier_return=$BDD->query($sql_panier);
                $count=$panier_return->rowCount();
                if ($count>0){
                    while($pan=$panier_return->fetch()){
                    $panier=array($pan['quant']);
                    $nbr_panier=array_sum($panier);
                    echo $nbr_panier;
                    }
                }else{
                    $nbr_panier=0;
                    echo $nbr_panier;
                }
                ?>
            </td>
            <td>
                 <?php 
                // nbre d'articles dans les paniers + calcul du stock
                $sql_panier="SELECT * FROM panierclient WHERE prodid=$idprod";
                $panier_return=$BDD->query($sql_panier);
                $count=$panier_return->rowCount();
                if ($count>0){
                    while($pan=$panier_return->fetch()){
                    $panier=array($pan['quant']);
                    $nbr_panier=array_sum($panier);
                    $quant_prod=$quant_prod-$nbr_panier;
                    echo $quant_prod;
                    }
                }else{
                    $nbr_panier=0;
                    echo $quant_prod;
                }
                ?>
            </td>
            <td>
                <?=$prod['prodprix']?>
            </td>
            <td>
                <a href='moddif_produit.php?idprod=<?=$idprod?>' class='btn btn-outline-dark '>Modifier</a>
                <a href='suppr_produit.php?idprod=<?=$idprod?>' class='btn btn-outline-dark '>Supprimer</a>
            </td>
            </tr>
             <?php  }?>
        </tbody>
    </table>
   
</body>
</html>