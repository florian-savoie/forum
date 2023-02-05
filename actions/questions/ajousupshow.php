<?php

require('actions/database.php');

$afficherCategory = $bdd->prepare('SELECT * FROM category');
$afficherCategory->execute();
$category = $afficherCategory->fetchALL();
$afficherinfosarticles = $bdd->prepare('SELECT c.category ,a.id_category , a.titre, a.description, a.pseudo_auteur, a.date_publication ,a.id from category c , articles a where c.id = a.id_category ');
$afficherinfosarticles->execute();
$infosarticles = $afficherinfosarticles->fetchALL();

if(isset($_POST['ajoutArticle'])){
 if (isset($_POST['category']) && !empty($_POST['category']) && isset($_POST['description']) && !empty($_POST['description']) && isset($_POST['titre']) && !empty($_POST['titre']) && isset($_POST['image']) && !empty($_POST['image'])){
  
        $selectcategory = $_POST['category'];
        $titre = $_POST['titre'];
        $description = $_POST['description'];
        $image = $_POST['image'];

               $insertarticle = $bdd->prepare('INSERT INTO articles(pseudo_auteur, id_category, titre, description, image_article )VALUES(?, ?, ?, ?, ?)');
                $insertarticle->execute(
                    array(
                        $_SESSION['pseudo'],
                        $selectcategory, 
                        $titre, 
                        $description, 
                        $image
                    ) 
                );
     }               
}  


    
/*
if(isset($_POST['modifier'])){
            $selectcategory = $_POST['category'];
            $afficherlesarticles = $bdd->prepare('SELECT a.titre, a.id FROM articles a , category c WHERE a.id_category = c.id and c.id = ?');
            $afficherlesarticles->execute(array($selectcategory));
            $afficherarticles = $afficherlesarticles->fetchALL();
            
        }      
*/

        if(isset($_POST['supprimer'])){
            $selectsuppresion = $_POST['supp'];
            $selectsuppresionarticles = $bdd->prepare('DELETE FROM articles WHERE id = ?');
            $selectsuppresionarticles->execute(array($selectsuppresion));
            header('Location: ajoutsuparticle.php?supprimer=1');

        }    


        if (isset($_POST["modifierarticle"])){
   /* $tesst = $_POST["category"];*/
    $selectcategory = $_POST['category'];
    $affichermofication = $bdd->prepare('SELECT c.category ,a.id_category , a.titre, a.description, a.pseudo_auteur, a.date_publication ,a.id from category c , articles a where c.id = a.id_category and a.id_category = ? ');
    $affichermofication->execute(array($selectcategory));
    $affichermofications = $affichermofication->fetchALL();


        }