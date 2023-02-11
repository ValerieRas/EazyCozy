<?php


// fonction pour afficher les commandes du client
function commande_client(){

global $BDD;

if (isset($_GET['attente_commandes_client'])){
    $idcli=$_SESSION['idcli'];
    $sql="SELECT * FROM attentcom WHERE idcli=$idcli";
    $return=$BDD->query($sql);
    $pending=$return->rowCount();
    if ($pending>0){
        echo "<h3 class='text-center'>Vous avez ".$pending." commandes en attentes!</h3>";
    }else{
        echo "<h3 class='text-center'>Vous n'avez aucune commandes en attentes!</h3>";
    }
}
}



?>