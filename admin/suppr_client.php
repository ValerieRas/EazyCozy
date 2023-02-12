<?php

include ('../includes/connect.php');

 if (isset($_GET['idcli'])){

    $idcli=$_GET['idcli'];
    $sql_supp="DELETE FROM client WHERE idcli=$idcli";
    $supp_client=$BDD->query($sql_supp);
    if ($supp_client){
        session_destroy();
        echo "<script>alert('Le compte a été supprimé')</script>";
        echo "<script>window.open('index-admin.php?afficher_client','_self')</script>";
    }
 }