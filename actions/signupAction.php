<?php

require('actions/database.php');
if(isset($_POST['validate'])){
 if(!empty($_POST['pseudo']) AND !empty($_POST['lastname']) AND !empty($_POST['firstname']) AND !empty($_POST['password']) ){

$user_pseudo = htmlspecialchars($_POST['pseudo']);
$user_lastname = htmlspecialchars($_POST['lastname']);
$user_firstname = htmlspecialchars($_POST['firstname']);
$user_password = password_hash($_POST['password'],PASSWORD_DEFAULT);

              $checkIfUserAlreadyExist = $bdd->prepare('SELECT pseudo FROM users WHERE pseudo = ? ');
              $checkIfUserAlreadyExist->execute(array($user_pseudo));

              if($checkIfUserAlreadyExist->rowCount() == 0){
                     $insertUserOnWebsite = $bdd->prepare('INSERT INTO users(pseudo, nom, prenom, mdp) VALUES (?,?,?,?)');
                              $insertUserOnWebsite->execute(array($user_pseudo,$user_lastname,$user_firstname,$user_password));

                     $getInfosOfThisUserReq = $bdd->prepare('SELECT id, pseudo, nom, prenom FROM users WHERE nom = ? and prenom = ? and pseudo = ?');
                     $getInfosOfThisUserReq = execute(array($user_lastname, $user_firstname, $user_pseudo));
                     
                     $usersInfos = $getInfosOfThisUserReq->fetch();

                     $_SESSION['auth'] = true;
                     $_SESSION['id'] = $usersInfos['id'];
                     $_SESSION['lastname'] = $usersInfos['nom'];
                     $_SESSION['firstname'] = $usersInfos['prenom'];
                     $_SESSION['pseudo'] = $usersInfos['peudo'];

              }else{
                     $errorMsg = 'l\'utilisateur existe deja sur le site';

              }



 }else{
        $errorMsg = 'veuillez completer tout les champs';
 }

}