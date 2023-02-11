<?php
session_start();

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
    <!-- MAIN NAVBAR -->
    <nav class="navbar navbar-expand-lg" style="background-color: #fde3e9;">
        <div class="container-fluid">
           <a class="navbar-brand" href="../index.php">EAZY COZY</a>
           <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
               <span class="navbar-toggler-icon"></span>
           </button>
        </div>
    </nav>

    <!-- Formulaire inscription -->
    <div class="container-fluid my-5" style="background-color: #FFE8A8;">
    <h3 class="text-center my-5">C'est ici pour vous inscrire! :)</h3>
    <form action="#" method="post" enctype="multipart/form-data">
            
        <div class="form-outline mb-4 w-50 m-auto">
            <label for="nomclient" class="form-label">Nom:</label>
            <input class="form-control" type="text" id="nomclient" name="nomclient" value="" placeholder="Votre nom">
        </div>
            
        <div class="form-outline mb-4 w-50 m-auto">
            <label for="prenclient" class="form-label">Prénom:</label>
            <input class="form-control" type="text" id="prenclient" name="prenclient" value="" placeholder="Votre prénom">
        </div>
            
        <div class="form-outline mb-4 w-50 m-auto">
            <label for="datenaissance" class="form-label">Date de naissance:</label>
            <input class="form-control" type="date" id="datenaissance" name="datenaissance" value="">
        </div>
            
        <div class="form-outline mb-4 w-50 m-auto">
            <label for="adressecli" class="form-label">Adresse:</label>
            <input class="form-control" type="text" id="adressecli" name="adressecli" value="" placeholder="Adresse de livraison">
        </div>
            
        <div class="form-outline mb-4 w-50 m-auto">
            <label for="telclient" class="form-label">Téléphone:</label>
            <input class="form-control" type="text" id="telclient" name="telclient" value="" placeholder="Numéro de téléphone">
        </div>
            
        <div class="form-outline mb-4 w-50 m-auto">
            <label for="emailcli" class="form-label">Email:</label>
            <input class="form-control" type="text" id="emailcli" name="emailcli" value="" placeholder="Email">
            <small id="emailHelp" class="form-text text-muted">Votre email est strictement confidentiel et ne sera pas partagé avec un tiers.</small>
        </div>
            
        <div class="form-outline mb-4 w-50 m-auto">
            <label for="motdepasse" class="form-label">Mot de passe:</label>
            <input class="form-control" type="text" id="motdepasse" name="motdepasse" value="" placeholder="Votre mot de passe">
        </div>

        <div class="form-outline mb-4 w-50 m-auto">
            <label for="motdepasse_confirme" class="form-label">Confirmez le mot de passe:</label>
            <input class="form-control" type="text" id="motdepasse_confirme" name="motdepasse_confirme" value="" placeholder="Confirmez le mot de passe">
        </div>

        <div class="form-outline mb-4 w-50 m-auto">
            <label for="clientimg" class="form-label">Image</label>
            <input class="form-control" type="file" name="clientimg" id="clientimg" class="form-control" value="">
        </div>            
        <div class="form-outline mb-4 w-50 m-auto">
            <input style="background-color: #fde3e9;" class="form-control" type="submit" name="inscription_client" value="submit">

        <p class="text-center small fw-bold p-5">Déjà inscrit? veuillez vous connectez :
        <a href="loginclient.php">Se connecter</a></p>
        </div>
            
    </form>
</div>

<?php
// Récupération des informations du formulaire
if (isset($_POST['inscription_client'])){

    $clinom=$_POST['nomclient'];
    $clipren=$_POST['prenclient'];
    $datenaissance=$_POST['datenaissance'];
    $adrcli=$_POST['adressecli'];
    $telcli=$_POST['telclient'];
    $mailcli=$_POST['emailcli'];
    $motdepassecli=$_POST['motdepasse'];
    $hash_mdp=password_hash($motdepassecli, PASSWORD_DEFAULT);
    $motdepasseconfirm=$_POST['motdepasse_confirme'];

    // récupérer les images 
    $clientimg=$_FILES['clientimg']['name'];


    // récupérer le tmp des images
    $tmpimg=$_FILES['clientimg']['tmp_name'];

    // Storing product images in the folder
    move_uploaded_file($tmpimg,"./client_img/$clientimg");

    // Vérification si client déjà existant
    $sql_cliselect="SELECT * FROM client WHERE mail='$mailcli'";
    $result_select=$BDD->query($sql_cliselect);
    $select_nbr=$result_select->rowCount();
    if ($select_nbr>0){
        echo"<script>alert('Un client avec cet email existe déjà!')</script>";
    }elseif ($motdepassecli!=$motdepasseconfirm) {
        echo"<script>alert('Mot de passe ne correspond pas. Veuillez confirmer votre mot de passe!')</script>";
    
    }else{

    // écriture de la requête d'insertion
    $sql_cli="INSERT INTO client (idcli,nom,prenom,dateNaissance,adresse,tel,mail,motdepasse,imgclient)
    VALUES ('',:clinom,:clipren,:datenaissance,:adrcli,:telcli,:mailcli,:hash_mdp,:clientimg)";
    
    // préparation de la requête
    $query=$BDD->prepare($sql_cli);

    // On injecte les valeurs
    $query->bindvalue(":clinom",$clinom);
    $query->bindvalue(":clipren",$clipren);
    $query->bindvalue(":datenaissance",$datenaissance);
    $query->bindvalue(":adrcli",$adrcli);
    $query->bindvalue(":telcli",$telcli);
    $query->bindvalue(":mailcli",$mailcli);
    $query->bindvalue(":hash_mdp",$hash_mdp);
    $query->bindvalue(":clientimg",$clientimg);

    // execution de la requête
    $result=$query->execute();

    if ($result){
       echo "<script>alert('Vous êtes inscrit!')</script>";
    }else{
        echo "<script>alert('Inscription impossible!')</script>";
    }}
}


?>
</body>
<footer class="text-center" style="background-color: #fde3e9;">
    All rights reserved to Valérie RASOLOFOARISON - Simplon Grenoble - 2023
</html>