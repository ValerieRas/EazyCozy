<?php

include ('../includes/connect.php');

// Récupération des informations du formulaire
if (isset($_POST['modifier-produit'])){


    $idprod=$_GET['idprod'];

    $prodnom=$_POST['prodnom'];
    $descprod=$_POST['descprod'];
    $prodcle=$_POST['motcle'];
    $prodcreat=$_POST['prodcreat'];
    $prodcat=$_POST['prodcat'];
    $prodprix=$_POST['prodprix'];
    $quantprod=$_POST['quantprod'];

    // récupérer les images 
    $prodimg1=$_FILES['prodimg1']['name'];
    $prodimg2=$_FILES['prodimg2']['name'];
    $prodimg3=$_FILES['prodimg3']['name'];

    // récupérer le tmp des images
    $tmpimg1=$_FILES['prodimg1']['tmp_name'];
    $tmpimg2=$_FILES['prodimg2']['tmp_name'];
    $tmpimg3=$_FILES['prodimg3']['tmp_name'];


    // Storing product images in the folder
    move_uploaded_file($tmpimg1,"./produit_img/$prodimg1");
    move_uploaded_file($tmpimg2,"./produit_img/$prodimg2");
    move_uploaded_file($tmpimg3,"./produit_img/$prodimg3");

    // écriture de la requête de modification
    $sql_prod="UPDATE produit SET prodnom='$prodnom', descprod='$descprod', prod_motcle='$prodcle', idcat=$prodcat, 
    idcreat=$prodcreat, img1prod='$prodimg1', img2prod='$prodimg2', img3prod='$prodimg3', prodprix=$prodprix, quantité=$quantprod, dateprod=NOW()
    WHERE idprod=$idprod";

    // préparation de la requête
    $query=$BDD->prepare($sql_prod);

    // execution de la requête
    $result=$query->execute();

    if ($result){
       echo "<script>alert('Le produit a bien été modifé!')</script>";
    }else{
        echo "<script>alert('Impossible de modifier le produit!')</script>";
    }
}

// Affichage des produits
$idprod=$_GET['idprod']; 

$sql_selct="SELECT * FROM produit WHERE idprod=$idprod";
$selct_return=$BDD->query($sql_selct);
$prod=$selct_return->fetch();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Modifier produit</title>
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
    <!-- MENU FONCTIONNALITE -->
    <div class="container-fluid p-0">
        <nav class="navbar navbar-expand-lg" style="background-color: #FFE8A8;">
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav me-auto text-center">
                <li class="nav-item">
                    <img src="../img/arche.jpg" alt="ProfilePic" class="logo">
                    <p>Admin name</p>
                </li>
                <li class="nav-item">
                    <button class="btn btn-outline-dark m-2"><a href="index-admin.php?insert-products" class="nav-link"> Ajouter Produits</a></button>
                </li>
                <li class="nav-item">
                    <button class="btn btn-outline-dark m-2"><a href="index-admin.php?afficher_produit" class="nav-link"> Consulter Produits</a></button>
                </li>
                <li class="nav-item">
                    <button class="btn btn-outline-dark m-2"><a href="index-admin.php?insert-categories" class="nav-link"> Ajouter Catégories</a></button>
                </li>
                <li class="nav-item">
                    <button class="btn btn-outline-dark m-2"><a href="" class="nav-link"> Consulter Catégories</a></button>
                </li>
                <li class="nav-item">
                    <button class="btn btn-outline-dark m-2"><a href="index-admin.php?insert-createurs" class="nav-link"> Ajouter Créateurs</a></button>
                </li>
                <li class="nav-item">
                    <button class="btn btn-outline-dark m-2"><a href="" class="nav-link"> Voir les créateurs</a></button>
                </li>
                <li class="nav-item">
                    <button class="btn btn-outline-dark m-2"><a href="" class="nav-link"> Commandes</a></button>
                </li>
                <li class="nav-item">
                    <button class="btn btn-outline-dark m-2"><a href="" class="nav-link"> Paiements</a></button>
                </li>
                <li class="nav-item">
                    <button class="btn btn-outline-dark m-2"><a href="" class="nav-link"> Utilisateurs</a></button>
                </li>
            </ul>
        </div>
        </nav>
    </div>

<div class="container">
    <h1 class="text-center mb-5">Modifier un produit</h1>

<!-- Formulaire d'ajout d'un nouveau produit -->
    <form action="" method="POST" enctype="multipart/form-data">
        <div class="form-outline mb-4 w-50 m-auto">
            <label for="prodnom" class="form-label">Nom du produit</label>
            <input type="text" name="prodnom" id="prodnom" placeholder="Entrez le nom du produit" class="form-control" value="<?=$prod['prodnom']?>">
        </div>
        <div class="form-outline mb-4 w-50 m-auto">
            <label for="descprod" class="form-label">Description du produit</label>
            <input type="text" name="descprod" id="descprod" placeholder="Décrivez le produit" class="form-control" value="<?=$prod['descprod']?>">
        </div>
        <div class="form-outline mb-4 w-50 m-auto">
            <label for="motcle" class="form-label">mots clés</label>
            <input type="text" name="motcle" id="motcle" placeholder="Entrez un mot clés" class="form-control" value="<?=$prod['prod_motcle']?>">
        </div>
        <div class="form-outline mb-4 w-50 m-auto">
            <label for="prodcreat" class="form-label">Sélectionner un créateur</label>
            <select name="prodcreat" id="prodcreat" class="form-select">
                <option value="">Sélectionnez un créateur</option>
                <?php
                $select_creat="SELECT * FROM createur";
                $result_creat=$BDD->query($select_creat);
                while($creat=$result_creat->fetch()){
                $idcreat=$creat['idcreat'];
                $nomcreat=$creat['nomcreat'];
                echo "<option value='$idcreat'>$nomcreat</option>";
                } ?>
            </select>
        </div>
        <div class="form-outline mb-4 w-50 m-auto">
            <label for="prodcat" class="form-label">Sélectionner une catégorie</label>
            <select name="prodcat" id="prodcat" class="form-select">
                <option value="">Sélectionnez une catégorie</option>
                <?php
                $select_cat="SELECT * FROM categorie";
                $result_cat=$BDD->query($select_cat);
                while($categ=$result_cat->fetch()){
                $idcat=$categ['idcat'];
                $nomcat=$categ['nomcat'];
                echo "<option value='$idcat'>$nomcat</option>";
                } ?>
            </select>
        </div>
        <!-- insertion des images -->
        <div class="form-outline mb-4 w-50 m-auto">
            <label for="prodimg1" class="form-label">Image n°1</label>
            <input type="file" name="prodimg1" id="prodimg1" class="form-control" value="">
            <img src="produit_img/<?=$prod['img1prod']?>" alt="" class="logo">
        </div>
        <div class="form-outline mb-4 w-50 m-auto">
            <label for="prodimg2" class="form-label">Image n°2</label>
            <input type="file" name="prodimg2" id="prodimg2" class="form-control" value="">
            <img src="produit_img/<?=$prod['img2prod']?>" alt="" class="logo">
        </div>
        <div class="form-outline mb-4 w-50 m-auto">
            <label for="prodimg3" class="form-label">Image n°3</label>
            <input type="file" name="prodimg3" id="prodimg3" class="form-control" value="">
            <img src="produit_img/<?=$prod['img3prod']?>" alt="" class="logo">
        </div>
        <!-- input prix -->
        <div class="form-outline mb-4 w-50 m-auto">
            <label for="prodprix" class="form-label">Prix du produit</label>
            <input type="text" name="prodprix" id="prodprix" placeholder="Entrez le prix du produit" class="form-control" value="<?=$prod['prodprix']?>">
        </div>
        <!-- input quantité -->
        <div class="form-outline mb-4 w-50 m-auto">
            <label for="quantprod" class="form-label">Quantité de produit</label>
            <input type="text" name="quantprod" id="quantprod" placeholder="Entrez la quantité de produit" class="form-control" value="<?=$prod['quantité']?>">
        </div>

        <!-- valider le formulaire -->
        <div class="form-outline mb-4 w-50 m-auto">
        <input type="submit" name="modifier-produit" class="p-2 my-3 border-0"  style="background-color: #fde3e9;" value="Modifier le produit">
        </div>
    </form>
</div>
  <!-- Bootstrap JS link  -->
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js" 
    integrity="sha384-w76AqPfDkMBDXo30jS1Sgez6pr3x5MlQ1ZAGC+nuZB+EYdgRZgiwxhTBTkF7CXvN" crossorigin="anonymous"></script>
</body>
<footer class="p-0 text-center" style="background-color: #fde3e9;">
    All rights reserved to Valérie RASOLOFOARISON - Simplon Grenoble - 2023
</footer>
</html>