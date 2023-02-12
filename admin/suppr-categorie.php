<?php
include ('../includes/connect.php');

if(isset($_GET['idcat'])){

    $idcat=$_GET['idcat'];

    $sql_suppr="DELETE FROM categorie WHERE idcat=$idcat";
    $suppr=$BDD->query($sql_suppr);
    if($suppr){
        echo "<script>alert('La catégorie a été supprimée')</script>";
        echo "<script>window.open('index-admin.php?afficher_categorie','_self')</script>";
    }
}

?>