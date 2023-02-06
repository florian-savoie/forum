<?php

require('actions/database.php');


try {
    $afficherCategory = $bdd->prepare('SELECT * FROM category');
    $afficherCategory->execute();
    $category = $afficherCategory->fetchALL();
       }  
         catch (PDOException $e) 
           {
             die($e->getMessage());
           }



if (isset($_GET['category']) and !empty($_GET['category'])) 
       {
    $id_category = htmlspecialchars($_GET['category']);

    try {

        $articles = $bdd->prepare('SELECT pseudo_auteur, date_publication, titre, description, image_article   FROM articles where id_category = :id_category');
        $articles->bindParam('id_category',$id_category,PDO::PARAM_INT);
        $articles->execute();
        $article = $articles->fetchALL();

        } 
         catch (PDOException $e) 
              {
               die($e->getMessage());
              }
      }
          else {
               $error = "<h1 >Choisir une category</h1>";
               }