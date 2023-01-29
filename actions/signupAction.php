<?php

require('actions/database.php');

// validation du formulaire
if(isset($_POST['validate'])){

       //vérifier si l'user a  bien complété tous les champs du formulaire
 if(!empty($_POST['pseudo']) AND !empty($_POST['lastname']) AND !empty($_POST['firstname']) AND !empty($_POST['password']) ){

       //les données de l'user 
$user_pseudo = htmlspecialchars($_POST['pseudo']);
$user_lastname = htmlspecialchars($_POST['lastname']);
$user_firstname = htmlspecialchars($_POST['firstname']);
$user_password = password_hash($_POST['password'],PASSWORD_DEFAULT);

//verifier si l'utilisateur existe deja sur le site 
              $checkIfUserAlreadyExist = $bdd->prepare('SELECT pseudo FROM users WHERE pseudo = ? ');
              $checkIfUserAlreadyExist->execute(array($user_pseudo));
              
              if($checkIfUserAlreadyExist->rowCount() == 0){

                       // Insérer l'utilisateur dans la bdd
                     $insertUserOnWebsite = $bdd->prepare('INSERT INTO users(pseudo, nom, prenom, mdp) VALUES (?,?,?,?)');
                              $insertUserOnWebsite->execute(array($user_pseudo,$user_lastname,$user_firstname,$user_password));

                              //recuperer les informations de l'utilisateur 
                     $getInfosOfThisUserReq = $bdd->prepare('SELECT id, pseudo, nom, prenom FROM users WHERE nom = ? and prenom = ? and pseudo = ?');
                     $getInfosOfThisUserReq = execute(array($user_lastname, $user_firstname, $user_pseudo));

                     $usersInfos = $getInfosOfThisUserReq->fetch();

                     //authentifier l'utilisateur sur le site et recuperer ses données 
                     $_SESSION['auth'] = true;
                     $_SESSION['id'] = $usersInfos['id'];
                     $_SESSION['lastname'] = $usersInfos['nom'];
                     $_SESSION['firstname'] = $usersInfos['prenom'];
                     $_SESSION['pseudo'] = $usersInfos['peudo'];

                     //rediriger l'utilisateur vers la page d'acceuil
                     header('location: index.php');
              }else{
                     $errorMsg = 'l\'utilisateur existe deja sur le site';

              }



 }else{
        $errorMsg = 'veuillez completer tout les champs';
 }

}