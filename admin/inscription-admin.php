<?php
include ('../includes/connect.php');
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>inscritpion admin</title>
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
  <!-- NAVBAR -->
  <div class="container-fluid p-0">

    <!-- PREMIER MENU -->
     <nav class="navbar navbar-expand-lg mb-3" style="background-color: #fde3e9;">
        <div class="container-fluid">
            <h2>EAZY COZY ADMIN</h2>

            <ul class="navbar-nav">
            <?php        
            if (!isset($_SESSION['idcli'])){
              echo "<li class='nav-item'>
              <a class='nav-link' href='index-admin.php'>Welcome Guest</a>
              </li>";
            }else{
              echo "<li class='nav-item'>
              <a class='nav-link' href='index-admin.php'>Bienvenue sur ton profil!</a>
              </li>";
            }
        
            if (!isset($_SESSION['idcli'])){
              echo "<li class='nav-item'>
              <a class='nav-link' href='login-admin.php'>Se connecter</a>
              </li>";
            }else{
              echo "<li class='nav-item'>
              <a class='nav-link' href='../logout.php'>Se déconnecter</a>
              </li>";
            }
            
            if (isset($_SESSION['idcli'])){
                 echo "";
            }else{
                echo "<li class='nav-item'>
                    <a class='nav-link' href='inscription-admin.php'>S'incrire</a>
                    </li>";
                }
        ?>              
            </ul>
        </div>
     </nav>

<div class="container-fluid m-3">
    <h2 class="mb-5 text-center">Inscription administrateur</h2>
    <form action="" method="POST">
        <div class="form-outline mb-4 w-50 m-auto">
            <label for="nomadmin" class="form-label">Nom d'utilisateur :</label>
            <input type="text" class="form-control" name="nomadmin" value="">
        </div>
        <div class="form-outline mb-4 w-50 m-auto">
            <label for="mailadmin" class="form-label">Email :</label>
            <input type="mail" class="form-control" name="mailadmin" value="">
        </div>
        <div class="form-outline mb-4 w-50 m-auto">
            <label for="motdepasse" class="form-label">Mot de passe :</label>
            <input type="text" class="form-control" name="motdepasse" value="">
        </div>

        <div class="form-outline mb-4 w-50 m-auto">
            <label for="confmdp" class="form-label">Confirmer votre mot de passe</label>
            <input type="text" class="form-control" name="confmdp" value="">
        </div>
        <div class="form-outline mb-4 w-50 m-auto">
            <input style="background-color: #fde3e9;" type="submit" class="form-control" name="inscript-admin" value="s'inscrire">

            <p class="text-center small fw-bold p-5">Déjà inscrit? veuillez vous connectez :
            <a href="login-admin.php">Se connecter</a></p>
        </div>
    </form>
</div>

<?php
// Récupération des informations du formulaire
if (isset($_POST['inscript-admin'])){

    $nomadmin=$_POST['nomadmin'];
    $mailadmin=$_POST['mailadmin'];
    $motdepasse=$_POST['motdepasse'];
    $mdpconfirm=$_POST['confmdp'];
    $hash_mdp=password_hash($motdepasse, PASSWORD_DEFAULT);

    // Vérification si admin déjà existant
    $sql_adselect="SELECT * FROM admin WHERE mailadmin='$mailadmin'";
    $result_select=$BDD->query($sql_adselect);
    $select_nbr=$result_select->rowCount();
    if ($select_nbr>0){
        echo"<script>alert('Un admin avec cet email existe déjà!')</script>";
    }elseif ($motdepasse!=$mdpconfirm) {
        echo"<script>alert('Mot de passe ne correspond pas. Veuillez confirmer votre mot de passe!')</script>";
    
    }else{

    // écriture de la requête d'insertion
    $sql_admin="INSERT INTO admin (idadmin,nomadmin,mailadmin,motdepasse)
    VALUES ('',:nomadmin,:mailadmin,:hash_mdp)";
    
    // préparation de la requête
    $query=$BDD->prepare($sql_admin);

    // On injecte les valeurs
    $query->bindvalue(":nomadmin",$nomadmin);
    $query->bindvalue(":mailadmin",$mailadmin);
    $query->bindvalue(":hash_mdp",$hash_mdp);

    // execution de la requête
    $result=$query->execute();

    if ($result){
       echo "<script>alert('Vous êtes inscrit!')</script>";
    }else{
        echo "<script>alert('Inscription impossible!')</script>";
    }}
}


?>



    
 <!-- Bootstrap JS link  -->
 <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js" 
    integrity="sha384-w76AqPfDkMBDXo30jS1Sgez6pr3x5MlQ1ZAGC+nuZB+EYdgRZgiwxhTBTkF7CXvN" crossorigin="anonymous"></script>
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.12.9/dist/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
</body>
<footer class="p-0 text-center" style="background-color: #fde3e9;">
    All rights reserved to Valérie RASOLOFOARISON - Simplon Grenoble - 2023
</footer>
</html>