<?php
session_start();

include("../includes/connect.php");
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Page login</title>
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
    <div class="container-fluid my-5">
        <h3 class="text-center my-5">Veuillez vous connecter</h3>
    <form action="" method="POST">
        <div class="form-outline mb-4 w-50 m-auto">
            <label class="form-label" for="InputEmail">Email address</label>
            <input class="form-control" type="email" class="form-control" id="InputEmail" name="InputEmail" placeholder="Veuillez saisir votre adresse email.">
        </div>
        <div class="form-outline mb-4 w-50 m-auto">
            <label class="form-label" for="InputPassword">Password</label>
            <input class="form-control" type="password" class="form-control" id="InputPassword" name="InputPassword" placeholder="Mot de passe">
        </div>

        <div class="form-outline mb-4 w-50 m-auto">
        <input class="form-control" style="background-color: #fde3e9;" class="form-control" type="submit" name="connexion" value="Se connecter">
        <p class="small fw-bold mt-2">Vous n'avez pas de compte? veuillez vous inscrire :
        <a href="inscription-admin.php">S'inscrire</a></p>
        </div>
        <div class="form-outline mb-4 w-50 m-auto">
        <a href="index-admin.php" class="btn btn" style="background-color: #fde3e9;">Revenir</a>
        </div>

    </form>
</div>
</body>
</html>

<?php

    if (isset($_POST['connexion'])){
        global $BDD;
        $mailadmin=$_POST['InputEmail'];
        $motdepasse=$_POST['InputPassword'];

        $sql_select="SELECT * FROM admin WHERE mailadmin='$mailadmin'";
        $return_login=$BDD->query($sql_select);
        $return_row=$return_login->rowCount();
        $value=$return_login->fetch();
        $idadmin=$_SESSION['idadmin']=$value['idadmin'];
        $_SESSION['nomadmin']=$value['nomadmin'];

        if (password_verify($motdepasse,$value['motdepasse'])){
            if ($return_row==1){
                $idadmin=$_SESSION['idadmin'];
                $_SESSION['nomadmin']=$value['nomadmin'];
                echo "<script>alert('Vous êtes connecté! :)')</script>"; 
                echo "<script>window.open('index-admin.php', '_self')</script>";
            }else{
                echo "<script>alert('Mot de passe invalide')</script>";
            }
        }else{
            echo "<script>alert('Cet email est invalide')</script>";
        }
    }
?>