<?php
include ('../includes/connect.php');

if(isset($_GET['idprod'])){

    $idprod=$_GET['idprod'];

    $sql_suppr="DELETE FROM produit WHERE idprod=$idprod";
    $suppr=$BDD->exec($sql_suppr);
    if($suppr){
        echo "<script>alert('Le produit a été supprimé')</script>";
        echo "<script>window.open('index-admin.php?afficher_produit')</script>";
    }
}

?>
