<?php
include "../includes/connect.php";
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
                <li class="nav-item">
                    <a href="" class="nav-link">Welcome Guest</a>
                </li>
                <li class="nav-item">
                    <a href="" class="nav-link">Se déconnecter</a>
                </li>
            </ul>
        </div>
     </nav>

    <!-- PAGE TITLE AND MESSAGE -->
    <div class="bg-light text-center mb-3 p-0">
        <h3 class="p-2">Bienvenue sur la Page admin.</h3>
        <p>Vous avez accès à toutes les fonctionnalités disponibles ci-dessous. 
            Veuillez prendre en compte que certaines actions sont irreversibles.
        </p>
    </div>

    <!-- MENU FONCTIONNALITE -->
    <div class="row" >
        <div class="col-md-2 p-1" style="background-color: #FFE8A8;">
            <ul class="navbar-nav me-auto text-center">
                <li class="nav-item">
                    <img src="../img/arche.jpg" alt="ProfilePic" class="logo">
                    <p>Admin name</p>
                </li>
                <li class="nav-item">
                    <button class="btn btn-outline-dark my-2"><a href="index.php?insert-products" class="nav-link"> Ajouter Produits</a></button>
                </li>
                <li class="nav-item">
                    <button class="btn btn-outline-dark my-2"><a href="" class="nav-link"> Consulter Produits</a></button>
                </li>
                <li class="nav-item">
                    <button class="btn btn-outline-dark my-2"><a href="index.php?insert-categories" class="nav-link"> Ajouter Catégories</a></button>
                </li>
                <li class="nav-item">
                    <button class="btn btn-outline-dark my-2"><a href="" class="nav-link"> Consulter Produits</a></button>
                </li>
                <li class="nav-item">
                    <button class="btn btn-outline-dark my-2"><a href="index.php?insert-createurs" class="nav-link"> Ajouter Créateurs</a></button>
                </li>
                <li class="nav-item">
                    <button class="btn btn-outline-dark my-2"><a href="" class="nav-link"> Voir les créateurs</a></button>
                </li>
                <li class="nav-item">
                    <button class="btn btn-outline-dark my-2"><a href="" class="nav-link"> Commandes</a></button>
                </li>
                <li class="nav-item">
                    <button class="btn btn-outline-dark my-2"><a href="" class="nav-link"> Paiements</a></button>
                </li>
                <li class="nav-item">
                    <button class="btn btn-outline-dark my-2"><a href="" class="nav-link"> Utilisateurs</a></button>
                </li>
            </ul>
        </div>

        <!-- Affichage des formulaires du menu -->
        <div class="col-md-10 my-5">
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
            ?>
        </div>
    </div>
  </div>  

  <!-- Bootstrap JS link  -->
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js" 
    integrity="sha384-w76AqPfDkMBDXo30jS1Sgez6pr3x5MlQ1ZAGC+nuZB+EYdgRZgiwxhTBTkF7CXvN" crossorigin="anonymous"></script>
</body>
<footer class="p-0 text-center" style="background-color: #fde3e9;">
    All rights reserved to Valérie RASOLOFOARISON - Simplon Grenoble - 2023
</footer>
</html>