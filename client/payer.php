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
           <a class="navbar-brand" href="../index.php">EAZY COZY</a>
           <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
               <span class="navbar-toggler-icon"></span>
           </button>
           <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                   <li class="nav-item">
                      <a class="nav-link active" aria-current="page" href="../index.php">Home</a>
                    </li>
                    <li class="nav-item">
                      <a class="nav-link" href="../index.php">Nos produits</a>
                    </li>
                    <li class="nav-item dropdown">
                      <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                         Nos créateurs
                      </a>
                      <ul class="dropdown-menu">
                           <li><a class="dropdown-item" href="../index.php?createur=1">Noorvana</a></li>
                           <li><a class="dropdown-item" href="../index.php?createur=2">Mahum</a></li>
                           <li><a class="dropdown-item" href="../index.php?createur=3">Molly</a></li>
                           <li><a class="dropdown-item" href="../index.php?createur=4">Beach</a></li>
                           <li><a class="dropdown-item" href="../index.php?createur=5">Kiki</a></li>
                           <li><a class="dropdown-item" href="../index.php?createur=6">Kittengrl</a></li>
                      </ul>
                    </li>
                    <li class="nav-item">
                      <a class="nav-link" href="#">Nous contacter</a>
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
      <?php        
        if (!isset($_SESSION['idcli'])){
          echo "<li class='nav-item'>
          <a class='nav-link' href='../index.php'>Welcome Guest/a>
          </li>";
        }else{
          echo "<li class='nav-item'>
          <a class='nav-link' href='clientprofil.php'>Bienvenue sur ton profil!</a>
          </li>";
        }
        
        if (!isset($_SESSION['idcli'])){
          echo "<li class='nav-item'>
          <a class='nav-link' href='loginclient.php'>Se connecter</a>
          </li>";
        }else{
          echo "<li class='nav-item'>
          <a class='nav-link' href='../logout.php'>Se déconnecter</a>
          </li>";
        }
        ?>
      </ul>
    </nav>

    <div class="row">
        <div class="col-md-12">
        <?php
        if(!isset($_SESSION['idcli'])){

            include("loginclient.php");
            
        }else{
            include('paiementclient.php');
        }
        ?>
        </div>
        <div class="col-md-2">

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