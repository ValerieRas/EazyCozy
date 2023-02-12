<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>créateur</title>
</head>
<body>        
    <h3 class="text-center">Tous les créateurs</h3>
    <table class="table mt-5">
        <thead>
            <tr>
            <th scope="col">Numéro créateur</th>
            <th scope="col">Nom créateur</th>
            <th scope="col">Opérations</th>
            </tr>
        </thead> 
        <tbody>
            <!-- Selectionner et affichage des produits -->
            <?php
            global $BDD;
            $sql_creat="SELECT * FROM createur";
            $return_creat=$BDD->query($sql_creat);
            while ($creat=$return_creat->fetch()){
            $idcreat=$creat['idcreat'];
            ?>
            <tr scope="row">
            <td><?=$creat['idcreat']?></td>
            <td><?=$creat['nomcreat']?></td>
            <td>
                <a href='moddif-createur.php?idcreat=<?=$idcreat?>' class='btn btn-outline-dark '>Modifier</a>
                <a href='suppr-createur.php?idcreat=<?=$idcreat?>' class='btn btn-outline-dark '>Supprimer</a>
            </td>
            </tr>
             <?php  }?>
        </tbody>
    </table>
   
</body>
</html>