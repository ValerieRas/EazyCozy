<?php

   include ('../includes/connect.php');

   if (isset($_POST['modifier-creat'])){
        $idcreat=$_GET['idcreat'];
        $NOMCREAT=$_POST['createur'];

      // Vérification de l'existence dans la BDD
      $sql_update="UPDATE createur SET nomcreat='$NOMCREAT' WHERE idcreat=$idcreat ";
      $result_update=$BDD->query($sql_update);
      if ($result_update){
            echo "<script>alert('CR2ATEUR modifiée avec succès!')</script>";
            echo "<script>window.open('index-admin.php?afficher_createur','_self')</script>";
        }
      }

    $idcreat=$_GET['idcreat'];
    $creat_select="SELECT * FROM createur WHERE idcreat=$idcreat";
    $creat_return=$BDD->query($creat_select);
    $creat=$creat_return->fetch();
    $Nomcreat=$creat['nomcreat'];
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Modifier produit</title>
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
 <!-- MENU FONCTIONNALITE -->
 <div class="container-fluid p-0">
        <nav class="navbar navbar-expand-lg" style="background-color: #FFE8A8;">
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav me-auto text-center">
                <li class="nav-item">
                    <img src="../img/arche.jpg" alt="ProfilePic" class="logo">
                    <p>Admin name</p>
                </li>
                <li class="nav-item">
                    <button class="btn btn-outline-dark m-2"><a href="index-admin.php?insert-products" class="nav-link"> Ajouter Produits</a></button>
                </li>
                <li class="nav-item">
                    <button class="btn btn-outline-dark m-2"><a href="index-admin.php?afficher_produit" class="nav-link"> Consulter Produits</a></button>
                </li>
                <li class="nav-item">
                    <button class="btn btn-outline-dark m-2"><a href="index-admin.php?insert-categories" class="nav-link"> Ajouter Catégories</a></button>
                </li>
                <li class="nav-item">
                    <button class="btn btn-outline-dark m-2"><a href="" class="nav-link"> Consulter Catégories</a></button>
                </li>
                <li class="nav-item">
                    <button class="btn btn-outline-dark m-2"><a href="index-admin.php?insert-createurs" class="nav-link"> Ajouter Créateurs</a></button>
                </li>
                <li class="nav-item">
                    <button class="btn btn-outline-dark m-2"><a href="" class="nav-link"> Voir les créateurs</a></button>
                </li>
                <li class="nav-item">
                    <button class="btn btn-outline-dark m-2"><a href="" class="nav-link"> Commandes</a></button>
                </li>
                <li class="nav-item">
                    <button class="btn btn-outline-dark m-2"><a href="" class="nav-link"> Paiements</a></button>
                </li>
                <li class="nav-item">
                    <button class="btn btn-outline-dark m-2"><a href="" class="nav-link"> Utilisateurs</a></button>
                </li>
            </ul>
        </div>
        </nav>
    </div>

<h2 class="text-center">Modifier le créateur</h2>
<form action="" method="POST" class="mb-2">
   <div class="input-group w-90 mb-2">
       <span class="input-group-text" id="basic-addon1"><i class="fa-solid fa-receipt"></i></span>
       <input type="text" class="form-control" name="createur" placeholder="Nom de la catégorie" value="<?=$Nomcreat?>">
    </div>
    <div class="input-group w-10 mb-2 m-auto">
      <input type="submit" class="p-2 my-3 border-0" name="modifier-creat" value="Ajouter nouvelle catégorie" style="background-color: #fde3e9;">
    </div>
</form>

<!-- Bootstrap JS link  -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js" 
    integrity="sha384-w76AqPfDkMBDXo30jS1Sgez6pr3x5MlQ1ZAGC+nuZB+EYdgRZgiwxhTBTkF7CXvN" crossorigin="anonymous"></script>
</body>
<footer class="p-0 text-center" style="background-color: #fde3e9;">
    All rights reserved to Valérie RASOLOFOARISON - Simplon Grenoble - 2023
</footer>
</htmreat