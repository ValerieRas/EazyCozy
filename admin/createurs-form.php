<?php

include ('../includes/connect.php');

   if (isset($_POST['valider-creat'])){

      $NOMCREAT=$_POST['createur'];

      // Vérification de l'existence dans la BDD
      $sql_select="SELECT * FROM createur WHERE nomcreat='$NOMCREAT'";
      $result_select=$BDD->query($sql_select);
      $nbr=$result_select->fetch();
      if ($nbr){
         echo "<script>alert('Ce créateur existe déjà!')</script>";
      }else{
         // Insertion dans la base de donnée
         $sql_insert="INSERT INTO createur(nomcreat) VALUES ('$NOMCREAT')";

         $result_insert=$BDD->prepare($sql_insert);

         $result_insert->execute();

         if ($result_insert){
            echo "<script>alert('Nouveau créateur ajouté avec succès!')</script>";
         }
      }
   }
?>

<h2 class="text-center">Ajouter un nouveau créateur</h2>
<form action="" method="POST" class="mb-2">
   <div class="input-group w-90 mb-2">
       <span class="input-group-text" id="basic-addon1"><i class="fa-solid fa-receipt"></i></span>
       <input type="text" class="form-control" name="createur" placeholder="Nom du créateur"
       aria-label="Username" aria-describedby="basic-addon1">
    </div>
    <div class="input-group w-10 mb-2 m-auto">
       <input type="submit" class="p-2 my-3 border-0" name="valider-creat" value="Ajouter Créateur" style="background-color: #fde3e9;">
    </div>
</form>