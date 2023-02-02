<?php
include "includes/connect.php";
include "functions/function.php";
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Eazy cozy homepage</title>
    <!-- Bootstrap Css link -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" 
    integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">

    <!-- Font awesome link -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.1/css/all.min.css" 
    integrity="sha512-MV7K8+y+gLIBoVD59lQIYicR65iaqukzvf/nwasF0nqhPay5w/9lJmVM2hMDcnK1OnMGCdVK+iQrJ7lzPJQd1w==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    
    <!-- CSS file link -->
    <link rel="stylesheet" href="style.css">

</head>
<body>

  <div class="container-fluid p-0">
    <!-- MAIN NAVBAR -->
    <nav class="navbar navbar-expand-lg" style="background-color: #fde3e9;">
        <div class="container-fluid">
           <a class="navbar-brand" href="index.php">EAZY COZY</a>
           <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
               <span class="navbar-toggler-icon"></span>
           </button>
           <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                   <li class="nav-item">
                      <a class="nav-link active" aria-current="page" href="index.php">Home</a>
                    </li>
                    <li class="nav-item">
                      <a class="nav-link" href="index.php">Nos produits</a>
                    </li>
                    <li class="nav-item dropdown">
                      <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                         Nos créateurs
                      </a>
                      <ul class="dropdown-menu">
                           <li><a class="dropdown-item" href="#">Action</a></li>
                           <li><a class="dropdown-item" href="#">Another action</a></li>
                           <li><a class="dropdown-item" href="#">Something else here</a></li>
                           <li><a class="dropdown-item" href="#">Something else here</a></li>
                      </ul>
                    </li>
                    <li class="nav-item">
                      <a class="nav-link" href="#">S'incrire</a>
                    </li>
                    <li class="nav-item">
                      <a class="nav-link" href="#">Nous contacter</a>
                    </li>
                    <li class="nav-item">
                      <a class="nav-link" href="#"><i class="fa-solid fa-cart-shopping"><sup>1</sup></i></a>
                    </li>
                </ul>
                <form class="d-flex" action="" method="GET">
                   <input class="form-control me-2" type="search" placeholder="Search" aria-label="Search" name="search_data">
                   <input type="submit" class="btn btn-outline-dark" value="search" name="search_prod">
                </form>
            </div>
        </div>
    </nav>

    <!-- SECONDARY NAVBAR -->
    <nav class="navbar navbar-expand-lg" style="background-color: #FFE8A8;">
      <ul class="navbar-nav me-auto">
        <li class="nav-item">
          <a class="nav-link" href="#">Welcome Guest</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="#">Se connecter</a>
        </li>
      </ul>
    </nav>


    <!-- PAGE TITLE AND MESSAGE -->

    <div class="bg-ligt">
      <h3 class="text-center">EAZY COZY</h3>
      <p class="text-center">The easiest place to find the coziest creations!</p>
    </div>
    

    <!-- MAIN PAGE -->

    <div class="row">

      <!-- PRODUCT TABLE -->
      <div class="col-md-10">
        <div class="row">
        <!-- Display CARD FOR PRODUCT From database with function-->
        <?php
        if (!isset($_GET["search_prod"])&& !isset($_GET['Display_all'])){
          Display_product();
        }else{
        search_prod();
        }
        if (isset($_GET['Display_all'])){
        Display_All_product();
        }
        Display_ONE_cat();
        Display_ONE_creat();
        ?>
        <!-- Affichage de tous les produits -->
        <a href="index.php?Display_all" class="btn" style="background-color: #fde3e9;" name="display_all">Voir tous les produits</a>
      <!-- Fermeture div ROW dans col des produits -->
      </div>
       <!-- Fermeture div COL des produits dans la page -->
      </div>

      <!-- SIDE NAV -->
    <div class="col-md-2 p-0" style="background-color: #FFE8A8;">
        
        <!-- Menu des créateurs -->
        <ul class="navbar-nav me-auto text-center">
          <li class="nav-item bg-light">
            <a href="" class="nav-link"><h4>Nos créateurs</h4></a>
          </li>
          <!-- Affichage créateur depuis la base de données -->
          <?php
          Display_creat();
          ?>
        </ul>

        <!-- Menu des catégories -->
        <ul class="navbar-nav me-auto text-center">
          <li class="nav-item bg-light">
            <a href="" class="nav-link"><h4>Nos catégories</h4></a>
          </li>
          <!-- Affichage catégorie depuis la base de données -->
          <?php
          Display_cat();
          ?>
        </ul>
      </div>
    </div>


    </div>
    <!-- Bootstrap JS link  -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js" 
    integrity="sha384-w76AqPfDkMBDXo30jS1Sgez6pr3x5MlQ1ZAGC+nuZB+EYdgRZgiwxhTBTkF7CXvN" crossorigin="anonymous"></script>
</body>
<footer class="text-center" style="background-color: #fde3e9;">
    All rights reserved to Valérie RASOLOFOARISON - Simplon Grenoble - 2023
</footer>
</html>