
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Clients</title>
</head>
<body>        
    <h3 class="text-center">Tous les clients</h3>
    <table class="table mt-5">
        <thead>
            <tr>
            <th scope="col">Numéro du client</th>
            <th scope="col">Nom</th>
            <th scope="col">Prénom</th>
            <th scope="col">Date de naissance</th>
            <th scope="col">Adresse</th>
            <th scope="col">Telephone</th>
            <th scope="col">Email</th>
            <th scope="col">Img</th>
            <th scope="col">Opérations</th>
            </tr>
        </thead> 
        <tbody>
            <!-- Selectionner et affichage des clients-->
            <?php
            global $BDD;
            $sql_cli="SELECT * FROM client";
            $return_cli=$BDD->query($sql_cli);
            while ($cli=$return_cli->fetch()){
            $idcli=$cli['idcli'];
            ?>
            <tr scope="row">
            <td><?=$cli['idcli']?></td>
            <td><?=$cli['nom']?></td>
            <td><?=$cli['prenom']?></td>
            <td><?=$cli['dateNaissance']?></td>
            <td><?=$cli['adresse']?></td>
            <td><?=$cli['tel']?></td>
            <td><?=$cli['mail']?></td>
            <td>
                <img src="../client/client_img/<?=$cli['imgclient']?>" alt="" class="logo">
            </td>
            <td>
                <a href='suppr_client.php?idcli=<?=$idcli?>' class='btn btn-outline-dark '>Supprimer</a>
            </td>
            </tr>
             <?php  }?>
        </tbody>
    </table>
   
</body>
</html>