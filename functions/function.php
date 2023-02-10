<?php
include "./includes/connect.php";


// <Display 6 products on index
function Display_product(){
    
// Condition d'affichage
if (!isset($_GET['createur'])){
  if (!isset($_GET['categorie'])){

  global $BDD;
  $sql_prod="SELECT * FROM produit ORDER BY rand() LIMIT 0,9";
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
  <div class="col-md-4 mb-2 ">
    <div class="card"  style="width: 18rem;">
      <img src="./admin/produit_img/<?=$img1prod?>" alt="<?=$prodnom?>" class="card-img-top">
      <div class="card-body text-center">
        <h5 class="card-title"><?=$prodnom?></h5>
        <p class="card-text"><?=$descprod?></p>
        <p class="card-text"><?=$prodprix?> €</p>
        <a href="index.php?Ajouter_panier=<?=$idprod?>" class="btn" style="background-color: #fde3e9;">Ajouter au panier</a>
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

// Display ALL products
function Display_All_product(){
    
  // Condition d'affichage
  if (!isset($_GET['createur'])){
    if (!isset($_GET['categorie'])){
  
    global $BDD;
    $sql_prod="SELECT * FROM produit ORDER BY rand()";
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
        <div class="card-body text-center">
          <h5 class="card-title"><?=$prodnom?></h5>
          <p class="card-text"><?=$descprod?></p>
          <p class="card-text"><?=$prodprix?> €</p>
          <a href="index.php?Ajouter_panier=<?=$idprod?>" class="btn" style="background-color: #fde3e9;">Ajouter au panier</a>
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
  // Fermeture fonction Display_all_product
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
      <div class="card-body text-center">
        <h5 class="card-title"><?=$prodnom?></h5>
        <p class="card-text"><?=$descprod?></p>
        <p class="card-text"><?=$prodprix?> €</p>
        <a href="index.php?Ajouter_panier=<?=$idprod?>" class="btn" style="background-color: #fde3e9;">Ajouter au panier</a>
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
      <div class="card-body text-center">
        <h5 class="card-title"><?=$prodnom?></h5>
        <p class="card-text"><?=$descprod?></p>
        <p class="card-text"><?=$prodprix?> €</p>
        <a href="index.php?Ajouter_panier=<?=$idprod?>" class="btn" style="background-color: #fde3e9;">Ajouter au panier</a>
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
        <div class="card-body text-center">
          <h5 class="card-title"><?=$prodnom?></h5>
          <p class="card-text"><?=$descprod?></p>
          <p class="card-text"><?=$prodprix?> €</p>
          <a href="index.php?Ajouter_panier=<?=$idprod?>" class="btn" style="background-color: #fde3e9;">Ajouter au panier</a>
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

// Fonction plus de détails sur un produit
function prod_details(){
 // Condition d'affichage
if (isset($_GET['idprod'])){
if (!isset($_GET['createur'])){
  if (!isset($_GET['categorie'])){
  $prod_id=$_GET['idprod'];
  global $BDD;
  $sql_prod="SELECT * FROM produit WHERE idprod=$prod_id ORDER BY rand() LIMIT 0,6";
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
<div class="mb-2">
<div class="card">
    <div class="row">
        <div class="col-md-4">
            <img src="./admin/produit_img/<?=$img1prod?>" alt="$img1prod" class="card-img-top">
        </div>
        <div class="col-md-4">
            <img src="./admin/produit_img/<?=$img2prod?>" alt="$img2prod" class="card-img-top">
        </div>
        <div class="col-md-4">
            <img src="./admin/produit_img/<?=$img3prod?>" alt="$img3prod" class="card-img-top">
        </div>
    </div>
    <div class="row">
    <div class="card-body text-center">
      <h5 class="card-title"><?=$prodnom?></h5>
      <p class="card-text"><?=$descprod?></p>
      <p class="card-text"><?=$prodprix?> €</p>
      <a href="index.php?Ajouter_panier=<?=$idprod?>" class="btn" style="background-color: #fde3e9;">Ajouter au panier</a>
      <a href="index.php" class="btn" style="background-color: #fde3e9;">Continuer vos achats</a>
    </div>
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
// Fermeture if 'idprod'
}
// Fin fonction prod_details
}


// Fonction pour le panier
function panier(){
if(isset($_GET['Ajouter_panier'])){
  global $BDD;

  // come back later to properly set this with a session variable
  $idCli=1;
  $prodid=$_GET['Ajouter_panier'];
  $sql_select ="SELECT * FROM panierclient WHERE idclient=$idCli and prodid=$prodid";
  $result_pan=$BDD->query($sql_select);
  $nbr_prod=$result_pan->rowCount();
  if ($nbr_prod>0){
    echo "<script>alert('Ce produit se trouve déjà dans votre panier!')</script>";
    echo"<script>window.open('index.php','_self')</script>";  
  }else{
    $sql_insert="INSERT INTO panierclient(prodid,idclient,quant,det_panier)
    VALUES($prodid,$idCli,1,'nodeats')";
    $insert_pan=$BDD->query($sql_insert);
    echo "<script>alert('Un nouveau produit ajouté au panier!')</script>";
    echo "<script>window.open('index.php','_self')</script>";
  }
  
}
// Fin de la fonction panier
}

// Fonction pour obtenir le nombre de produits dans le panier
function nbr_prod_panier(){
  if(isset($_GET['Ajouter_panier'])){
  global $BDD;

  // come back later to properly set this with a session variable
  $idCli=1;
  $sql_select ="SELECT * FROM panierclient WHERE idclient=$idCli";
  $result_pan=$BDD->query($sql_select);
  $nbr_prod=$result_pan->rowCount();
  }else{
    global $BDD;

  // come back later to properly set this with a session variable
  $idCli=1;
  $sql_select ="SELECT * FROM panierclient WHERE idclient=$idCli";
  $result_pan=$BDD->query($sql_select);
  $nbr_prod=$result_pan->rowCount();

  }
  echo $nbr_prod;

// Fin de la fonction nbr_prod_panier
}

// Fonction pour le prix total d'un panier
function prix_total(){
  global $BDD;
  $idCli=1;
  $prixtotal=0;
  $sql_select="SELECT * FROM panierclient WHERE idclient=$idCli";
  $result_pan=$BDD->query($sql_select);
  $donnees=$result_pan->fetch();
    $idprod=$donnees['prodid'];
    $quant=$donnees['quant'];
      // Multiply product price by the quantity in cart
      $sql_multiply="SELECT produit.prodprix*panierclient.quant as 'multprodprix' FROM produit, panierclient
      WHERE panierclient.prodid=produit.idprod";
      $result_mult=$BDD->query($sql_multiply);
      while($multprod=$result_mult->fetch()){
      $tabprix=array($multprod['multprodprix']);
      $prixprod=array_sum($tabprix);
      $prixtotal+=$prixprod; 
  } 
 echo $prixtotal;
}
?> 