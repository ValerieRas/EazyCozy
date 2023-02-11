<?php
if (isset($_GET['idcom'])){

    $idcomm=$_GET['idcom'];
    
    $sql_delete="DELETE * FROM commande WHERE idcomm=$idcomm";
    $return=$BDD->query($sql_delete);
    if ($return){
        echo "<script>alert('Votre commande a étét annulée!')</script>";
        echo "<script>window.open('clientprofil.php?client_commandes','_self')</script>";
    }
}

?>