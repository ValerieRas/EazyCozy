<?php
include ('../includes/connect.php');

if(isset($_GET['idcreat'])){

    $idcreat=$_GET['idcreat'];

    $sql_suppr="DELETE FROM createur WHERE idcreat=$idcreat";
    $suppr=$BDD->query($sql_suppr);
    if($suppr){
        echo "<script>alert('Le créateur a été supprimée')</script>";
        echo "<script>window.open('index-admin.php?afficher-createur','_self')</script>";
    }
}

?>