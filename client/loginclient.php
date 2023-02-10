
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
            <label class="form-label" for="InputEmail1">Email address</label>
            <input class="form-control" type="email" class="form-control" id="InputEmail1" aria-describedby="emailHelp" placeholder="Veuillez saisir votre adresse email.">
        </div>
        <div class="form-outline mb-4 w-50 m-auto">
            <label class="form-label" for="InputPassword1">Password</label>
            <input class="form-control" type="password" class="form-control" id="InputPassword1" placeholder="Mot de passe">
        </div>
        <div class="form-outline mb-4 w-50 m-auto">
            <input type="checkbox" class="form-check-input" id="exampleCheck1">
            <label class="form-label" class="form-check-label" for="exampleCheck1">Validez</label>
        </div>
        <div class="form-outline mb-4 w-50 m-auto">
        <input class="form-control" style="background-color: #fde3e9;" class="form-control" type="submit" name="connexion" value="Se connecter">
        <p class="small fw-bold mt-2">Vous n'avez pas de compte? veuillez vous inscrire :
        <a href="inscription.php">S'inscrire</a></p>
        </div>
    </form>
</div>
</body>
</html>