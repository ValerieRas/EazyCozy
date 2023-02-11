<?php
include ('../includes/connect.php');

include ("../functions/function.php");

if (isset($_GET['idcli'])){
    $idcli=$_GET['idcli'];
}

// Chercher le prix total et nbre total de produits de la commande
global $BDD;
$prixtotal=0;
$nbrprod=0;
$sql_panier="SELECT * FROM panierclient WHERE idclient=$idcli";
$return_panier=$BDD->query($sql_panier);
$idpaie=mt_rand();
$statue="En attente";
// quantité dans le panier
$panier_count=$return_panier->rowCount();
while ($donnee=$return_panier->fetch()){
    $idprod=$donnee['prodid'];
    $select_prod="SELECT * FROM produit WHERE idprod=$idprod";
    $return_prod=$BDD->query($select_prod);
    while ($donnees=$return_prod->fetch()){
        $prixprod=array($donnees['prodprix']);
        $prixcom=array_sum($prixprod);
        $prixtotal=+$prixcom;
    }
}

// Prix total panier
$panier_selec="SELECT * FROM panierclient";
$panier= $BDD->query($panier_selec);
$value=$panier->fetch();
$quant=$value['quant'];
$subtotal=$prixtotal*$quant;


// insertion dans la table commande
$com_insert="INSERT INTO commande(idcli,prixcom,idpaie,nbrprod,datcom,statucom)
VALUES($idcli,$subtotal,$idpaie,$panier_count,NOW(),'$statue')";
$com_return=$BDD->query($com_insert);

if ($com_return){
    echo "<script>alert('Votre commande a été enregistrée')</script>";
    echo "<script>window.open('clientprofil.php','_self')</script>";
}

// insertion dans la table commande en attente
$attentecom_insert="INSERT INTO attentcom(idcli,idprod,idpaie,quant,statucom)
VALUES($idcli,$idprod,$idpaie,$quant,'$statue')";
$attentecom_return=$BDD->query($attentecom_insert);


// Suppression des produits dans le panier après insertion
$supp_prod="DELETE FROM panierclient WHERE idclient=$idcli";
$supp=$BDD->query($supp_prod);

?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Paiement Client</title>
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
            <a class='nav-link' href='client/clientprofil.php'>Bienvenue sur ton profil!</a>
            </li>";
          }
        
        if (!isset($_SESSION['idcli'])){
          echo "<li class='nav-item'>
          <a class='nav-link' href='client/loginclient.php'>Se connecter</a>
          </li>";
        }else{
          echo "<li class='nav-item'>
          <a class='nav-link' href='../logout.php'>Se déconnecter</a>
          </li>";
        }
        ?>

      </ul>
</nav>





<!-- Bootstrap JS link  -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js" 
    integrity="sha384-w76AqPfDkMBDXo30jS1Sgez6pr3x5MlQ1ZAGC+nuZB+EYdgRZgiwxhTBTkF7CXvN" crossorigin="anonymous"></script>
</body>
<footer class="text-center" style="background-color: #fde3e9;">
    All rights reserved to Valérie RASOLOFOARISON - Simplon Grenoble - 2023
</footer>