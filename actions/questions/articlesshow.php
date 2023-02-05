<?php

require('actions/database.php');


$afficherCategory = $bdd->prepare('SELECT * FROM category');
$afficherCategory->execute();
$category = $afficherCategory->fetchALL();



if(isset($_GET['category']) AND !empty($_GET['category'])){
$id_category = $_GET['category'];
 
$articles = $bdd->prepare('SELECT pseudo_auteur, date_publication, titre, description, image_article   FROM articles where id_category = ?');
$articles->execute(array($id_category));
$article = $articles->fetchALL();
}else{
    $error = "<h1 >Choisir une category</h1>";
}