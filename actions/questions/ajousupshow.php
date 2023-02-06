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
  
        $selectcategory = htmlspecialchars($_POST['category']);
        $titre = htmlspecialchars($_POST['titre']);
        $description = htmlspecialchars($_POST['description']);
        $image = htmlspecialchars($_POST['image']);
        try {
               $insertarticle = $bdd->prepare('INSERT INTO articles(pseudo_auteur, id_category, titre, description, image_article )VALUES(:pseudo_auteur, :id_category, :titre, :description, :image_article)');
               $insertarticle->bindParam('pseudo_auteur', $_SESSION['pseudo'], PDO::PARAM_STR);
               $insertarticle->bindParam('id_category', $selectcategory, PDO::PARAM_INT);
               $insertarticle->bindParam('titre', $titre, PDO::PARAM_STR);
               $insertarticle->bindParam('description', $description, PDO::PARAM_STR);
               $insertarticle->bindParam('image_article', $image, PDO::PARAM_STR);
               $insertarticle->execute();

         }  catch (PDOException $e)
                {
                 die($e->getMessage());
                }
     }               
}





if (isset($_POST['supprimer'])) 
  {

    $selectsuppresion = htmlspecialchars($_POST['supp']);
    try {
        $selectsuppresionarticles = $bdd->prepare('DELETE FROM articles WHERE id = :id');
        $selectsuppresionarticles->bindParam('id', $selectsuppresion, PDO::PARAM_INT);
        $selectsuppresionarticles->execute();
        }  catch (PDOException $e)
             {
              die($e->getMessage());
             }

    header('Location: ajoutsuparticle.php?supprimer=1');
 }


if (isset($_POST["modifierarticle"])) {
    $selectcategory = htmlspecialchars($_POST['category']);
    try {
        $affichermofication = $bdd->prepare('SELECT c.category ,a.id_category , a.titre, a.description, a.pseudo_auteur, a.date_publication ,a.id
        from category c , articles a where c.id = a.id_category and a.id_category = :id_category ');
        $affichermofication->bindParam('id_category', $selectcategory, PDO::PARAM_INT);
        $affichermofication->execute();
        $affichermofications = $affichermofication->fetchALL();
    } catch (PDOException $e) {
        die($e->getMessage());
    }

}