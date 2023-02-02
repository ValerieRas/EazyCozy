<?php
include "./includes/connect.php";


// <Display CARD FOR PRODUCT From database
function Display_product(){
    
// Condition d'affichage
if (!isset($_GET['createur'])){
  if (!isset($_GET['categorie'])){

  global $BDD;
  $sql_prod="SELECT * FROM produit ORDER BY rand() LIMIT 0,6";
  $result_prod=$BDD->query($sql_prod);
  while ($donnees=$result_prod->fetch()){
    $idprod=$donnees['idprod'];
    $prodnom=$donnees['prodnom'];
    $descprod=$donnees['descprod'];
    $idcat=$donnees['idcat'];
    $idcreat=$donnees['idcreat'];
    $img1prod=$donnees['img1prod'];
    $img2prod=$donnees['img2prod'];
    $img3prod=$donnees['img3prod'];
    $prodprix=$donnees['prodprix'];
?>
  <div class="col-md-4 mb-2">
    <div class="card"  style="width: 18rem;">
      <img src="./admin/produit_img/<?=$img1prod?>" alt="<?=$prodnom?>" class="card-img-top">
      <div class="card-body">
        <h5 class="card-title"><?=$prodnom?></h5>
        <p class="card-text"><?=$descprod?></p>
        <a href="#" class="btn" style="background-color: #fde3e9;">Ajouter au panier</a>
        <a href="produit_details.php?idprod=<?=$idprod?>" class="btn" style="background-color: #fde3e9;">Détails</a>
      </div>
    </div>
  </div>
<?php 
// Fermeture While loop
}
// Fermeture if 'categorie
}
// Fermeture if 'createur'
}
// Fermeture fonction Display_product
}


// Display products of ONE category
function Display_ONE_cat(){
    if (isset($_GET['categorie'])){
    $catid=$_GET['categorie'];
    global $BDD;
    $sql_prod="SELECT * FROM produit WHERE idcat=$catid ORDER BY rand() LIMIT 0,6";
    $result_prod=$BDD->query($sql_prod);
    $nbr_prod=$result_prod->rowCount();
    if ($nbr_prod<=0){
      echo "<h2 class='text-center text-danger'>Cette catégorie n'a plus de stocks pour l'instant, revenez plus tard ! :)</h2>";
    }
    while ($donnees=$result_prod->fetch()){
      $idprod=$donnees['idprod'];
      $prodnom=$donnees['prodnom'];
      $descprod=$donnees['descprod'];
      $idcat=$donnees['idcat'];
      $idcreat=$donnees['idcreat'];
      $img1prod=$donnees['img1prod'];
      $img2prod=$donnees['img2prod'];
      $img3prod=$donnees['img3prod'];
      $prodprix=$donnees['prodprix'];

?>
  <div class="col-md-4 mb-2">
    <div class="card" style="width: 18rem;">
      <img src="./admin/produit_img/<?=$img1prod?>" class="card-img-top" alt="<?=$prodnom?>">
      <div class="card-body">
        <h5 class="card-title"><?=$prodnom?></h5>
        <p class="card-text"><?=$descprod?></p>
        <a href="#" class="btn" style="background-color: #fde3e9;">Ajouter au panier</a>
        <a href="produit_details.php?idprod=<?=$idprod?>" class="btn" style="background-color: #fde3e9;">Détails</a>
      </div>
    </div>
  </div>
<?php 
// Fermeture While loop
 }
// Fermeture if categorie
}
// Fermeture fonction Display_ONE_cat
}

// Display products of ONE createur
function Display_ONE_creat(){
  if (isset($_GET['createur'])){
    $creatid=$_GET['createur'];
    global $BDD;
    $sql_prod="SELECT * FROM produit WHERE idcreat=$creatid ORDER BY rand() LIMIT 0,6";
    $result_prod=$BDD->query($sql_prod);
    $nbr_prod=$result_prod->rowCount();
    if ($nbr_prod<=0){
      echo "<h2 class='text-center text-danger'>Ce créateur n'a plus de stocks pour l'instant, revenez plus tard ! :)</h2>";
    }
    while ($donnees=$result_prod->fetch()){
      $idprod=$donnees['idprod'];
      $prodnom=$donnees['prodnom'];
      $descprod=$donnees['descprod'];
      $idcat=$donnees['idcat'];
      $idcreat=$donnees['idcreat'];
      $img1prod=$donnees['img1prod'];
      $img2prod=$donnees['img2prod'];
      $img3prod=$donnees['img3prod'];
      $prodprix=$donnees['prodprix'];

?>
  <div class="col-md-4 mb-2">
    <div class="card" style="width: 18rem;">
      <img src="./admin/produit_img/<?=$img1prod?>" class="card-img-top" alt="<?=$prodnom?>">
      <div class="card-body">
        <h5 class="card-title"><?=$prodnom?></h5>
        <p class="card-text"><?=$descprod?></p>
        <a href="#" class="btn" style="background-color: #fde3e9;">Ajouter au panier</a>
        <a href="produit_details.php?idprod=<?=$idprod?>" class="btn" style="background-color: #fde3e9;">Détails</a>
      </div>
    </div>
  </div>
<?php 
// Fermeture While loop
 }
// Fermeture if creat
}
// Fermeture fonction Display_ONE_creat
}


// Display Créateur in SIDE NAVBAR
function Display_creat(){
  global $BDD;
  $select_createur="SELECT * FROM createur";
  $result_createur=$BDD->query($select_createur);
  while($donnees=$result_createur->fetch()){
    $idcreat=$donnees['idcreat']
    ?>
    <li class="nav-item">
      <a href="index.php?createur=<?=$idcreat?>" class="nav-link"><?=$donnees['nomcreat'];?></a>
    </li>
<?php  }
// FIN fonction Display_creat
}

// Display catégorie in SIDE NAVBAR
function Display_cat(){
  global $BDD;
  $select_cat="SELECT * FROM categorie";
  $result_cat=$BDD->query($select_cat);
  while($donnees=$result_cat->fetch()){
    $idcat=$donnees['idcat'];
    ?>
    <li class="nav-item">
      <a href="index.php?categorie=<?=$idcat?>" class="nav-link"><?=$donnees['nomcat'];?></a>
    </li>
<?php  }
// Fin fonction Display_cat
}

// Function for searching products
function search_prod(){

    global $BDD;
    if (isset($_GET["search_prod"])){
    $user_search=$_GET["search_data"];
    $sql_search="SELECT * FROM produit WHERE prod_motcle LIKE '%$user_search%' ORDER BY rand() LIMIT 0,6";
    $result_prod=$BDD->query($sql_search);
    $nbr_search=$result_prod->rowCount();
    if ($nbr_search<=0){
      echo "<h2 class='text-center text-danger'>Pas de résultat pour l'instant, Essayer nos autres produits ! :)</h2>";
    }
    while ($donnees=$result_prod->fetch()){
      $idprod=$donnees['idprod'];
      $prodnom=$donnees['prodnom'];
      $descprod=$donnees['descprod'];
      $idcat=$donnees['idcat'];
      $idcreat=$donnees['idcreat'];
      $img1prod=$donnees['img1prod'];
      $img2prod=$donnees['img2prod'];
      $img3prod=$donnees['img3prod'];
      $prodprix=$donnees['prodprix'];
  ?>
    <div class="col-md-4 mb-2">
      <div class="card" style="width: 18rem;">
        <img src="./admin/produit_img/<?=$img1prod?>" class="card-img-top" alt="<?=$prodnom?>">
        <div class="card-body">
          <h5 class="card-title"><?=$prodnom?></h5>
          <p class="card-text"><?=$descprod?></p>
          <a href="#" class="btn" style="background-color: #fde3e9;">Ajouter au panier</a>
          <a href="produit_details.php?idprod=<?=$idprod?>" class="btn" style="background-color: #fde3e9;">Détails</a>
        </div>
      </div>
    </div>
  <?php 
  // Fermeture While loop
  }
}
// Fin fonction search_prod
}

// Fonction plus de détails

?>