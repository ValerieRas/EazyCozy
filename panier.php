<?php
include ('includes/connect.php');
include ("functions/function.php");
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Panier</title>
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
                           <li><a class="dropdown-item" href="index.php?createur=1">Noorvana</a></li>
                           <li><a class="dropdown-item" href="index.php?createur=2">Mahum</a></li>
                           <li><a class="dropdown-item" href="index.php?createur=3">Molly</a></li>
                           <li><a class="dropdown-item" href="index.php?createur=4">Beach</a></li>
                           <li><a class="dropdown-item" href="index.php?createur=5">Kiki</a></li>
                           <li><a class="dropdown-item" href="index.php?createur=6">Kittengrl</a></li>
                      </ul>
                    </li>
                    <li class="nav-item">
                      <a class="nav-link" href="client/inscription.php">S'incrire</a>
                    </li>
                    <li class="nav-item">
                      <a class="nav-link" href="#">Nous contacter</a>
                    </li>
                    <li class="nav-item">
                      <a class="nav-link" href="panier.php"><i class="fa-solid fa-cart-shopping">
                      <!-- Affichage du nombre de produit dans le panier -->
                      <sup>
                      <?php
                      nbr_prod_panier();
                      ?>
                      </sup></i></a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>

    <!-- SECONDARY NAVBAR -->
    <nav class="navbar navbar-expand-lg" style="background-color: #FFE8A8;">
      <ul class="navbar-nav me-auto">
      <?php        
        if (!isset($_SESSION['idcli'])){
          echo "<li class='nav-item'>
          <a class='nav-link' href='index.php'>Welcome Guest/a>
          </li>";
        }else{
          echo "<li class='nav-item'>
          <a class='nav-link' href='client/clientprofil.php'>Bienvenue sur ton profil!</a>
          </li>";
        }
        if (!isset($_SESSION['idcli'])){
          echo "<li class='nav-item'>
          <a class='nav-link' href='client/loginclient.php'>Se connecter</a>
          </li>";
        }else{
          echo "<li class='nav-item'>
          <a class='nav-link' href='logout.php'>Se déconnecter</a>
          </li>";
        }
        ?>
      </ul>
    </nav>


    <!-- PAGE TITLE AND MESSAGE -->

    <div class="bg-ligt">
      <h3 class="text-center">EAZY COZY</h3>
      <p class="text-center">Bienvenue dans votre panier tout doux !</p>
    </div>
    

    <!-- MAIN PAGE, affichage des produits du panier-->

    <div class="container">
        <div class="row">
            <!-- Affichage des produits dans le panier de la base de données -->
            <?php
            if (isset($_SESSION['idcli'])){
            global $BDD;
            $idCli=$_SESSION['idcli'];
            $prixtotal=0;
            $sql_select="SELECT * FROM panierclient WHERE idclient=$idCli";
            $result_pan=$BDD->query($sql_select);
            // Vérifier si le panier est vide ou non
            $result_count=$result_pan->rowCount();
            if ($result_count>0){
            ?>
              <!--  Table pour le panier client -->

              <table class="table">
                <thead>
                  <tr>
                    <th scope="col">Nom du produit</th>
                    <th scope="col">Image</th>
                    <th scope="col">Détails</th>
                    <th scope="col">Prix</th>
                    <th scope="col">Quantité</th>
                    <th scope="col">Options</th>
                  </tr>
                </thead>
                <tbody>
            <?php
            while($donnees=$result_pan->fetch()){
              $prod_dets=$donnees['det_panier'];
              $idprod=$donnees['prodid'];
              $quant=$donnees['quant'];
              $sql_prod="SELECT * FROM produit WHERE idprod=$idprod";
              $result_prod=$BDD->query($sql_prod);
              while ($donnee=$result_prod->fetch()){
                $prodnom=$donnee['prodnom'];
                $imgprod=$donnee['img1prod'];
                $one_prodprix=$donnee['prodprix'];
            ?>
            <tr>
              <th scope="row">
                <?=$prodnom?>
              </th>
              <td>
                <img src="admin/produit_img/<?=$imgprod?>" alt="<?=$imgprod?>" class="img_panier">
              </td>
              <td>
                <p><?=$prod_dets?></p>
              </td>
              <td>
                <?=$one_prodprix?> €
              </td>
              <td>

                <!-- Affichage de la quantité actuelle -->
              <!-- Formulaire pour le panier -->
              <form action="" method="POST">
                <input type="number" min=1 max=5 name="quant_panier<?=$idprod?>" value="<?=$quant?>">
              </td>
              <td>
                <input class="btn btn-outline-dark" type="submit" name="modif_panier<?=$idprod?>" value="Modifier">
              </form>
                <a href="panier.php?suppr_panier=<?=$idprod?>" class="btn btn-outline-dark">Supprimer</a>
              </td>
            </tr>
            <?php
            // Fermeture while loop affichage de produits
              }
            }
            ?>
          <table>
          
        <div>
            <p>Prix total: <strong> <?php prix_total() ?> €</strong></p>
            <a href="index.php" class="btn btn-outline-dark mb-3" style="background-color: #fde3e9;" >Continuer vos achats</a>
            <a href="client/payer.php" class="btn btn-outline-dark mb-3" style="background-color: #fde3e9;">Payer</a>
        </div>
        <?php
          // Si le panier est vide.
          }else{

            echo "<h3 class='text-center mb-5 my-5'> Oops, Votre panier est vide !!</h3> <br> <br>
            <a href='index.php' class='btn btn-outline-dark my-5' style='background-color: #fde3e9;' >Continuer vos achats</a>";
          
          // Fermeture if vérification si le panier est vide.
          }
        // si client non connecté.
        }else{
          echo "<script>alert('Vous devez vous connecter')</script>";
          echo "<script>window.open('client/loginclient.php','_self')</script>";
        


          //  Modification de la quantité d'articles dans panier
          if(isset($_POST["modif_panier".$idprod])){      
            $idCli=1;            
            $quantprod=$_POST["quant_panier".$idprod];
            $sql_modif="UPDATE panierclient SET quant=$quantprod WHERE idclient=$idCli AND prodid=$idprod";
            $modif=$BDD->query($sql_modif);
            
            if ($modif){
              echo"<script>window.open('panier.php','_self')</script>";
             }
            }
          }
         ?>
        <?php

        // Suppression de produits dans panier

        if(isset($_GET["suppr_panier"])){
          $idCli=1;
          $prodid=$_GET["suppr_panier"];
          $sql_supp="DELETE FROM panierclient WHERE prodid=$prodid AND idclient=$idCli";
         $suppr=$BDD->query($sql_supp);
        
          if ($suppr){
            echo"<script>alert('Un article a été supprimé !')</script>";
            echo "<script>window.open('panier.php','_self')</script>";
          }
        }
  
        ?>
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