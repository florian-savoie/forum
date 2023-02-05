<?php

require('actions/database.php');
/*
$getAllMyQuestions = $bdd->prepare('SELECT id, titre, description FROM questions WHERE id_auteur = ? ORDER BY id DESC');
$getAllMyQuestions->execute(array($_SESSION['id']));*/

if ( isset($_POST['sendmsg'])) {


$pseudo = htmlspecialchars($_POST['pseudo']) ;
$verifpseudodestination = $bdd->prepare('SELECT *  FROM users WHERE pseudo = ?');
$verifpseudodestination->execute(array($pseudo));
if ($verifpseudodestination->rowCount() > 0) {




    if (isset($_POST['subject']) && !empty($_POST['subject']) && isset($_POST['content']) && !empty($_POST['content']) ){

$subject =htmlspecialchars($_POST['subject']) ;
$content = htmlspecialchars($_POST['content']) ;


$sendmsg = $bdd->prepare('INSERT INTO messagerie(sender_pseudo, receiver_pseudo, subject, content)VALUES(?, ?, ?, ?)');
$sendmsg->execute(
    array(
        $_SESSION['pseudo'],
        $pseudo, 
        $subject, 
        $content
    ) 
);
      } else{ 
        $erreur = 'pseudo invalide' ;
    }
    }else{ 
        $erreur = 'pseudo invalide' ;
    }
} 

if (isset($_GET["recu"])) {
    $affichermsg = $bdd->prepare('SELECT *  FROM messagerie WHERE receiver_pseudo = ?');
    $affichermsg->execute(array($_SESSION['pseudo']));
    $messages = $affichermsg->fetchALL();

    if (isset($_GET["lire"])) {
        $idcontent = $_GET["lire"] ;
        $affichercontent = $bdd->prepare('SELECT content  FROM messagerie WHERE receiver_pseudo = ? AND id = ? ');
        $affichercontent->execute(array($_SESSION['pseudo'],$_GET["lire"]));
        $content = $affichercontent->fetchALL();
        $updateread = $bdd->prepare('UPDATE messagerie SET is_read = 1 WHERE receiver_pseudo = ? AND id = ?');
        $updateread->execute(array($_SESSION['pseudo'],$_GET["lire"]));

    }elseif (isset($_GET["supprimer"])){
        $supprimer = $_GET["supprimer"] ;
        $delete = $bdd->prepare('UPDATE messagerie SET delete_msg = 1 WHERE receiver_pseudo = ? AND id = ?');
        $delete->execute(array($_SESSION['pseudo'],$supprimer));
    }
}

if (isset($_GET["messageenvoyer"])) {
    $affichermsg = $bdd->prepare('SELECT *  FROM messagerie WHERE sender_pseudo = ?');
    $affichermsg->execute(array($_SESSION['pseudo']));
    $messages = $affichermsg->fetchALL();

    if (isset($_GET["lire"])) {
        $idcontent = $_GET["lire"] ;
        $affichercontent = $bdd->prepare('SELECT content  FROM messagerie WHERE sender_pseudo = ? AND id = ? ');
        $affichercontent->execute(array($_SESSION['pseudo'],$_GET["lire"]));
        $content = $affichercontent->fetchALL();


    }
}