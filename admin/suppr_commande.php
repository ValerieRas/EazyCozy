<?php
include ('../includes/connect.php');

if(isset($_GET['idcomm'])){

    $idcomm=$_GET['idcomm'];

    $sql_suppr="DELETE FROM categorie WHERE idcomm=$idcomm";
    $suppr=$BDD->query($sql_suppr);
    if($suppr){
        echo "<script>alert('La commande a été supprimée')</script>";
        echo "<script>window.open('index-admin.php?afficher_commande','_self')</script>";
    }
}

?>