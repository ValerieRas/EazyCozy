<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>categorie</title>
</head>
<body>        
    <h3 class="text-center">Toutes les catégories</h3>
    <table class="table mt-5">
        <thead>
            <tr>
            <th scope="col">Numéro catégorie</th>
            <th scope="col">Nom catégorie</th>
            <th scope="col">Opérations</th>
            </tr>
        </thead> 
        <tbody>
            <!-- Selectionner et affichage des produits -->
            <?php
            global $BDD;
            $sql_cat="SELECT * FROM categorie";
            $return_cat=$BDD->query($sql_cat);
            while ($cat=$return_cat->fetch()){
            $idcat=$cat['idcat'];
            ?>
            <tr scope="row">
            <td><?=$cat['idcat']?></td>
            <td><?=$cat['nomcat']?></td>
            <td>
                <a href='moddif-catégorie.php?idcat=<?=$idcat?>' class='btn btn-outline-dark '>Modifier</a>
                <a href='suppr-categorie.php?idcat=<?=$idcat?>' class='btn btn-outline-dark '>Supprimer</a>
            </td>
            </tr>
             <?php  }?>
        </tbody>
    </table>
   
</body>
</html>