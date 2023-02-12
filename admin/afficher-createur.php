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
                <a href='suppr-createur.php?idcreat=<?=$idcreat?>' class='btn btn-outline-dark '
                type="button" data-toggle="modal" data-target="#exampleModal">Supprimer</a>
            </td>
            </tr>
             <?php  }?>
        </tbody>
    </table>
<!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-body">
        <h4>êtes-vous sure? cette action est irreversible !!</h4>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal"><a href='index-admin.php?afficher_createur' class='text-light text-decoration-none'>Annuler</a></button>
        <button type="button" class="btn btn-primary"><a href='suppr-createur.php?idcreat=<?=$idcreat?>'class='text-light text-decoration-none'>Confirmer</a></button>
      </div>
    </div>
  </div>
</div>
      
</body>
</html>