<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>suppression compte</title>
</head>
<body>

    <form action="" method="post">
        <div class="form-outline mb-4 w-50 m-auto p-5">
        <input type="submit"  class="btn bg-danger text-light" name="suppr_compte" value="Confirmer la suppression du compte">
        </div>
        <p class="text-danger p-5 text-center">La suppression de votre compte est irreversible. Vous serez automatiquement déconnecter.</p>
    </form>

 <?php
 if (isset($_POST['suppr_compte'])){

    $idcli=$_SESSION['idcli'];
    $sql_supp="DELETE FROM client WHERE idcli=$idcli";
    $supp_client=$BDD->query($sql_supp);
    if ($supp_client){
        session_destroy();
        echo "<script>alert('Votre compte a été supprimé')</script>";
        echo "<script>window.open('../index.php','_self')</script>";
    }
 }
 ?>
</body>
</html>