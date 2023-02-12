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
    <title>Admin dashboard</title>
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
            if (!isset($_SESSION['idadmin'])){
              echo "<li class='nav-item'>
              <a class='nav-link' href='index-admin.php'>Welcome Admin</a>
              </li>";
            }else{
              echo "<li class='nav-item'>
              <a class='nav-link' href='index-admin.php'>Welcome!</a>
              </li>";
            }
            if (!isset($_SESSION['idadmin'])){
              echo "<li class='nav-item'>
              <a class='nav-link' href='login-admin.php'>Se connecter</a>
              </li>";
            }else{
              echo "<li class='nav-item'>
              <a class='nav-link' href='../logout.php'>Se déconnecter</a>
              </li>";
            }
            
            if (isset($_SESSION['idadmin'])){
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

    <?php
    if(isset($_SESSION['idadmin'])){
    
    ?>
    <!-- PAGE TITLE AND MESSAGE -->
    <div class="bg-light text-center mb-3 p-0">
        <h3 class="p-2">Bienvenue sur la Page admin.</h3>
        <p>Vous avez accès à toutes les fonctionnalités disponibles ci-dessous. 
            Veuillez prendre en compte que certaines actions sont irreversibles.
        </p>
    </div>

    <!-- MENU FONCTIONNALITE -->

    <div class="container-fluid p-0">
        <nav class="navbar navbar-expand-lg" style="background-color: #FFE8A8;">
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav m-auto text-center">
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
                    <button class="btn btn-outline-dark m-2"><a href="index-admin.php?afficher_categorie" class="nav-link"> Consulter Catégories</a></button>
                </li>
                <li class="nav-item">
                    <button class="btn btn-outline-dark m-2"><a href="index-admin.php?insert-createurs" class="nav-link"> Ajouter Créateurs</a></button>
                </li>
                <li class="nav-item">
                    <button class="btn btn-outline-dark m-2"><a href="index-admin.php?afficher_createur" class="nav-link"> Voir les créateurs</a></button>
                </li>
                <li class="nav-item">
                    <button class="btn btn-outline-dark m-2"><a href="index-admin.php?afficher_commande" class="nav-link"> Commandes</a></button>
                </li>
                <li class="nav-item">
                    <button class="btn btn-outline-dark m-2"><a href="index-admin.php?afficher_paiement" class="nav-link"> Paiements</a></button>
                </li>
                <li class="nav-item">
                    <button class="btn btn-outline-dark m-2"><a href="index-admin.php?afficher_client" class="nav-link"> Utilisateurs</a></button>
                </li>
            </ul>
        </div>
        </nav>
    </div>
    <?php
    }else{
        echo "<h1 class='text-center text-danger'>Veuillez vous connecter pour avoir accès aux fonctionnalités !</h1>";
    }
    ?>

        <!-- Affichage des formulaires du menu -->
        <div class="container-fluid p-0">
            <?php

            // Formulaire ajouter catégories   
               if (isset($_GET["insert-categories"])){
                include "categories-form.php";
               }
               
            // Formulaire Ajouter créateurs
               if (isset($_GET["insert-createurs"])){
                include "createurs-form.php";
               }

            // Formulaire Ajouter produits
               if (isset($_GET["insert-products"])){
                include "produits-form.php";
               }
            
            // Formulaire Afficher produits
            if (isset($_GET["afficher_produit"])){
                include "afficher_produit.php";
               }
            
             // Formulaire Afficher categorie
            if (isset($_GET["afficher_categorie"])){
                include "afficher-catégories.php";
               }
            
            // Formulaire Afficher createur
            if (isset($_GET["afficher_createur"])){
                include "afficher-createur.php";
               }

            // Formulaire Afficher commande
            if (isset($_GET["afficher_commande"])){
                include "afficher_commande.php";
               }

            // Formulaire Afficher paiement
            if (isset($_GET["afficher_paiement"])){
                include "afficher_paiement.php";
               }
               

            // Formulaire Afficher client
            if (isset($_GET["afficher_client"])){
                include "afficher_client.php";
               }
            
            ?>
        </div>
    </div>
  </div>  

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