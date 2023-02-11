<?php

include ('../includes/connect.php');
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Page Inscription</title>
    <!-- Bootstrap Css link -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" 
    integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">

    <!-- Font awesome link -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.1/css/all.min.css" 
    integrity="sha512-MV7K8+y+gLIBoVD59lQIYicR65iaqukzvf/nwasF0nqhPay5w/9lJmVM2hMDcnK1OnMGCdVK+iQrJ7lzPJQd1w==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    
    <!-- CSS file link -->
    <link rel="stylesheet" href="../style.css">

</head>
<body>
    <!-- Affichage des informations profil -->
    <?php
    global $BDD;
    $idcli =$_SESSION['idcli'];
    $client_select="SELECT * FROM client WHERE idcli=$idcli";
    $client_return=$BDD->query($client_select);
    while ($client=$client_return->fetch()){
    ?>
    <!-- Formulaire Modification profil -->
    <div class="container-fluid my-5" style="background-color: #FFE8A8;">
    <h3 class="text-center my-5">Modifier votre profil</h3>
    <form action="#" method="post" enctype="multipart/form-data">
            
        <div class="form-outline mb-4 w-50 m-auto">
            <label for="nomclient" class="form-label">Nom:</label>
            <input class="form-control" type="text" id="nomclient" name="nomclient" value="<?=$client['nom']?>">
        </div>
            
        <div class="form-outline mb-4 w-50 m-auto">
            <label for="prenclient" class="form-label">Prénom:</label>
            <input class="form-control" type="text" id="prenclient" name="prenclient" value="<?=$client['prenom']?>">
        </div>
            
        <div class="form-outline mb-4 w-50 m-auto">
            <label for="datenaissance" class="form-label">Date de naissance:</label>
            <input class="form-control" type="date" id="datenaissance" name="datenaissance" value="<?=$client['dateNaissance']?>">
        </div>
            
        <div class="form-outline mb-4 w-50 m-auto">
            <label for="adressecli" class="form-label">Adresse:</label>
            <input class="form-control" type="text" id="adressecli" name="adressecli" value="<?=$client['adresse']?>">
        </div>
            
        <div class="form-outline mb-4 w-50 m-auto">
            <label for="telclient" class="form-label">Téléphone:</label>
            <input class="form-control" type="text" id="telclient" name="telclient" value="<?=$client['tel']?>">
        </div>
            
        <div class="form-outline mb-4 w-50 m-auto">
            <label for="emailcli" class="form-label">Email:</label>
            <input class="form-control" type="text" id="emailcli" name="emailcli" value="<?=$client['mail']?>" >
            <small id="emailHelp" class="form-text text-muted">Votre email est strictement confidentiel et ne sera pas partagé avec un tiers.</small>
        </div>

        <div class="form-outline mb-4 w-50 m-auto">
            <label for="clientimg" class="form-label">Image</label>
            <input class="form-control" type="file" name="clientimg" id="clientimg" class="form-control" value="<?=$client['imgclient']?>">
            <img src="client_img/<?=$client['imgclient']?>" class="logo" alt="">
        </div>            
        <div class="form-outline mb-4 w-50 m-auto">
            <input style="background-color: #fde3e9;" class="form-control" type="submit" name="modifier_client" value="submit">
        </div>
            
    </form>
    <?php } ?>
</div>

<?php
// Récupération des informations du formulaire
if (isset($_POST['modifier_client'])){
    $idcli =$_SESSION['idcli'];
    $clinom=$_POST['nomclient'];
    $clipren=$_POST['prenclient'];
    $datenaissance=$_POST['datenaissance'];
    $adrcli=$_POST['adressecli'];
    $telcli=$_POST['telclient'];
    $mailcli=$_POST['emailcli'];

    // récupérer les images 
    $clientimg=$_FILES['clientimg']['name'];

    // récupérer le tmp des images
    $tmpimg=$_FILES['clientimg']['tmp_name'];

    // Storing product images in the folder
    move_uploaded_file($tmpimg,"./client_img/$clientimg");


    // écriture de la requête de modif
    $sql_cli="UPDATE client SET nom=:clinom,prenom=:clipren,dateNaissance=:datenaissance,
    adresse=:adrcli,tel=:telcli,mail=:mailcli,imgclient=:clientimg WHERE idcli=$idcli";
    
    // préparation de la requête
    $query=$BDD->prepare($sql_cli);

    // On injecte les valeurs
    $query->bindvalue(":clinom",$clinom);
    $query->bindvalue(":clipren",$clipren);
    $query->bindvalue(":datenaissance",$datenaissance);
    $query->bindvalue(":adrcli",$adrcli);
    $query->bindvalue(":telcli",$telcli);
    $query->bindvalue(":mailcli",$mailcli);
    $query->bindvalue(":clientimg",$clientimg);

    // execution de la requête
    $result=$query->execute();

    if ($result){
       echo "<script>alert('Profil modifié!')</script>";
    }else{
        echo "<script>alert('Modification impossible!')</script>";
    }}
?>
</body>

</html>