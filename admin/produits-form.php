<?php
include "../includes/connect.php";

// Récupération des informations du formulaire
if (isset($_POST['ajouter-produit'])){

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

    // écriture de la requête d'insertion
    $sql_prod="INSERT INTO produit (prodnom, descprod, prod_motcle, idcat, 
    idcreat, img1prod, img2prod, img3prod, prodprix, quantité, dateprod)
    VALUES ('$prodnom', '$descprod', '$prodcle', $prodcat, $prodcreat, '$prodimg1', '$prodimg2', '$prodimg3', $prodprix, $quantprod, NOW())";

    // préparation de la requête
    $query=$BDD->prepare($sql_prod);

    // execution de la requête
    $result=$query->execute();

    if ($result){
       echo "<script>alert('Le produit a bien été ajouté!')</script>";
    }else{
        echo "<script>alert('Impossible d'ajouter le produit!')</script>";
    }
}


?>


<div class="container">
    <h1 class="text-center mb-5">Ajouter un produit</h1>

<!-- Formulaire d'ajout d'un nouveau produit -->
    <form action="" method="POST" enctype="multipart/form-data">
        <div class="form-outline mb-4 w-50 m-auto">
            <label for="prodnom" class="form-label">Nom du produit</label>
            <input type="text" name="prodnom" id="prodnom" placeholder="Entrez le nom du produit" class="form-control" value="">
        </div>
        <div class="form-outline mb-4 w-50 m-auto">
            <label for="descprod" class="form-label">Description du produit</label>
            <input type="text" name="descprod" id="descprod" placeholder="Décrivez le produit" class="form-control" value="">
        </div>
        <div class="form-outline mb-4 w-50 m-auto">
            <label for="motcle" class="form-label">mots clés</label>
            <input type="text" name="motcle" id="motcle" placeholder="Entrez un mot clés" class="form-control" value="">
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
        </div>
        <div class="form-outline mb-4 w-50 m-auto">
            <label for="prodimg2" class="form-label">Image n°2</label>
            <input type="file" name="prodimg2" id="prodimg2" class="form-control" value="">
        </div>
        <div class="form-outline mb-4 w-50 m-auto">
            <label for="prodimg3" class="form-label">Image n°3</label>
            <input type="file" name="prodimg3" id="prodimg3" class="form-control" value="">
        </div>
        <!-- input prix -->
        <div class="form-outline mb-4 w-50 m-auto">
            <label for="prodprix" class="form-label">Prix du produit</label>
            <input type="text" name="prodprix" id="prodprix" placeholder="Entrez le prix du produit" class="form-control" value="">
        </div>
        <!-- input quantité -->
        <div class="form-outline mb-4 w-50 m-auto">
            <label for="quantprod" class="form-label">Quantité de produit</label>
            <input type="text" name="quantprod" id="quantprod" placeholder="Entrez la quantité de produit" class="form-control" value="">
        </div>

        <!-- valider le formulaire -->
        <div class="form-outline mb-4 w-50 m-auto">
        <input type="submit" name="ajouter-produit" class="p-2 my-3 border-0"  style="background-color: #fde3e9;" value="Ajouter le produit">
        </div>
    </form>
</div>
