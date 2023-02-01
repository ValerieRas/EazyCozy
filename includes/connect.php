
<!-- Connexion à la base de données -->
<?php
 try{
    $BDD= new PDO('mysql:host=localhost;dbname=eazycozy;charset=utf8','root','');
    }catch(Exception $e){
        die ('Erreur:'.$e->getMessage()); 
        }
?>