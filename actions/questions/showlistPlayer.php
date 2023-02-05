<?php

require('actions/database.php');


$itemsPerPage = 30;
$currentPage = (isset($_GET['page']) && is_numeric($_GET['page'])) ? $_GET['page'] : 1;


 $classement = $bdd->prepare('SELECT count(id) as nombres FROM users ');
 $classement->execute();
 $totalItems = $classement->fetch();
 $totalItems = $totalItems['nombres'];
 $totalPages = ceil($totalItems / $itemsPerPage);
 $offset = ($currentPage - 1) * $itemsPerPage;
 $classementlimit = $bdd->prepare("SELECT users.id, users.pseudo, profil.id, profil.date_inscription, COUNT(questions.id) AS nombre_de_message_poste
 FROM users
 JOIN profil ON users.id = profil.id_auteur
 LEFT JOIN questions ON users.id = questions.id_auteur
 GROUP BY users.id, profil.id;
 LIMIT $offset, $itemsPerPage");
 $classementlimit->execute();
// $rank donne lemplacement au classement

$rank = $offset + 1;
// le if  signifie que la page doit etre supperieur comprise entre 1 total page et doit comporter un get de page

if ($_GET['page'] < 1  || $_GET['page'] > $totalPages || !$_GET['page']){
    header("Location: index.php");
    exit();
}



/*
$recherchedemander = $_POST['recherche'];
$recherche = $bdd->prepare("SELECT * FROM users ");
$recherche->execute();
$joueurChercher = $recherche->fetchALL();
var_dump($joueurChercher);
print_r($joueurChercher);
var_dump($recherche);
echo $recherchedemander;
echo $recherchedemander;
*/

/*
 if (isset($_POST["recherche"])){
    $recherchedemander = 'florian';
    $recherche = $bdd->prepare("SELECT id, pseudo FROM users WHERE pseudo = 'florian'");
    $recherche->execute();
    $joueurChercher = $recherche->fetchALL();

}
*/