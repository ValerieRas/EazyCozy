<?php

   include ('../includes/connect.php');

   if (isset($_POST['valider-cat'])){

      $NOMCAT=$_POST['categorie'];

      // Vérification de l'existence dans la BDD
      $sql_select="SELECT * FROM categorie WHERE nomcat='$NOMCAT'";
      $result_select=$BDD->query($sql_select);
      $nbr=$result_select->fetch();
      if ($nbr){
         echo "<script>alert('Cette catégorie existe déjà!')</script>";
      }else{
         // Insertion dans la base de donnée
         $sql_insert="INSERT INTO categorie(nomcat) VALUES ('$NOMCAT')";

         $result_insert=$BDD->prepare($sql_insert);

         $result_insert->execute();

         if ($result_insert){
            echo "<script>alert('Nouvelle catégorie ajoutée avec succès!')</script>";
         }
      }
   }
?>
<h2 class="text-center">Ajouter une nouvelle Catégorie</h2>
<form action="" method="POST" class="mb-2">
   <div class="input-group w-90 mb-2">
       <span class="input-group-text" id="basic-addon1"><i class="fa-solid fa-receipt"></i></span>
       <input type="text" class="form-control" name="categorie" placeholder="Nom de la catégorie"
       aria-label="Username" aria-describedby="basic-addon1">
    </div>
    <div class="input-group w-10 mb-2 m-auto">
      <input type="submit" class="p-2 my-3 border-0" name="valider-cat" value="Ajouter nouvelle catégorie" style="background-color: #fde3e9;">
    </div>
</form>