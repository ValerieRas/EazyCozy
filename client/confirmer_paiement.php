<?php
session_start();

include ('../includes/connect.php');


if(isset($_GET['idcom'])){

    $idcomm=$_GET['idcom'];

    $sql_com="SELECT * FROM commande WHERE idcomm=$idcomm";
    $sql_return=$BDD->query($sql_com);
    $comm=$sql_return->fetch();

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>profil client</title>
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

<div class="container my-5">
    <h1 class="text-center">Confirmer le paiement</h1>
    <form action="" method="post">
        <div class="form-outline text-center my-4 w-50 m-auto ">
            <label for="idpaie" >Numéro de facturation</label>
            <input type="text" class="form-control w-50 m-auto" name="idpaie" value="<?=$comm['idpaie']?>">
        </div>
        <div class="form-outline text-center my-4 w-50 m-auto ">
            <label for="prixcom">Prix de votre commande</label>
            <input type="text" class="form-control w-50 m-auto" name="prixcom" value="<?=$comm['prixcom']?>">
        </div>
        <div class="form-outline text-center my-4 w-50 m-auto ">
            <input type="submit" class="btn bg-dark text-light" name="payer" value="Payer">
        </div>
    </form>
</div>

<?php } 

if(isset($_POST['payer'])){
    $idpaie=$_POST['idpaie'];
    $prixcom=$_POST['prixcom'];

    $idcomm=$_GET['idcom'];

    $sql_insert="INSERT INTO paiement_client(idpaie,idcomm,prixcom,date_paie)
    VALUES($idpaie,$idcomm,$prixcom,NOW())";
    $return_paie=$BDD->query($sql_insert);
    if ($return_paie){
        echo "<script>alert('Votre paiement a été confirmé !')</script>";
    }

    $update_com="UPDATE commande SET statucom='Payé' WHERE idcomm=$idcomm";
    $update_return=$BDD->query($update_com);
    if ($update_return){
        echo "<script>window.open('clientprofil.php?client_commandes','_self')</script>";
    }
}

?> 

    <!-- Bootstrap JS link  -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js" 
    integrity="sha384-w76AqPfDkMBDXo30jS1Sgez6pr3x5MlQ1ZAGC+nuZB+EYdgRZgiwxhTBTkF7CXvN" crossorigin="anonymous"></script>
</body>
<footer class="text-center" style="background-color: #fde3e9;">
    All rights reserved to Valérie RASOLOFOARISON - Simplon Grenoble - 2023
</footer>
</html>