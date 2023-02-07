<!-- Modification de la quantité d'articles dans panier -->
<?php
$idCli=1;
                if(isset($_POST["modif_panier"])){
                  $quantprod=$_POST["quant_panier"];
                  $sql_modif="UPDATE panierclient set quant=$quantprod where idclient=$idCli";
                  $modif=$BDD->query($sql_modif);
                  $prixtotal=$quantprod*$prixtotal;

                  if ($modif){
                    echo"window.open('panier.php','_self')";
                  }
                }
?>

<input class="btn btn-outline-dark" type="submit" name="modif_panier" value="Modifier">