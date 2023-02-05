<?php
session_start();
require('actions/database.php');

//Validation du formulaire
if(isset($_POST['validate'])){

    //Vérifier si l'user a bien complété tous les champs
    if(!empty($_POST['pseudo']) AND !empty($_POST['lastname']) AND !empty($_POST['firstname']) AND !empty($_POST['password']) AND !empty($_POST['email'])){
        
        //Les données de l'user
        $user_pseudo = htmlspecialchars($_POST['pseudo']);
        $user_lastname = htmlspecialchars($_POST['lastname']);
        $user_firstname = htmlspecialchars($_POST['firstname']);
        $user_password = password_hash($_POST['password'], PASSWORD_DEFAULT);
        $user_email = htmlspecialchars($_POST['email']);

        //Vérifier si l'utilisateur existe déjà sur le site
        $checkIfUserAlreadyExists = $bdd->prepare('SELECT pseudo FROM users WHERE pseudo = ?');
        $checkIfUserAlreadyExists->execute(array($user_pseudo));

        $checkIfemailAlreadyExists = $bdd->prepare('SELECT pseudo FROM email WHERE email = ?');
        $checkIfemailAlreadyExists->execute(array($user_email));

        if($checkIfUserAlreadyExists->rowCount() == 0 && $checkIfemailAlreadyExists->rowCount() == 0 ){
            
            //Insérer l'utilisateur dans la bdd partie users 
            $insertUserOnWebsite = $bdd->prepare('INSERT INTO users(pseudo, nom, prenom, mdp, email)VALUES(?, ?, ?, ?, ?)');
            $insertUserOnWebsite->execute(array($user_pseudo, $user_lastname, $user_firstname, $user_password, $user_email));


            //Récupérer les informations de l'utilisateur
            $getInfosOfThisUserReq = $bdd->prepare('SELECT id, pseudo, nom, prenom, email FROM users WHERE nom = ? AND prenom = ? AND pseudo = ? AND email = ?');
            $getInfosOfThisUserReq->execute(array($user_lastname, $user_firstname, $user_pseudo, $user_email));

            $usersInfos = $getInfosOfThisUserReq->fetch();

            //Authentifier l'utilisateur sur le site et récupérer ses données dans des variables globales sessions
            $_SESSION['auth'] = true;
            $_SESSION['id'] = $usersInfos['id'];
            $_SESSION['lastname'] = $usersInfos['nom'];
            $_SESSION['firstname'] = $usersInfos['prenom'];
            $_SESSION['pseudo'] = $usersInfos['pseudo'];
            $_SESSION['email'] = $usersInfos['email'];
         


                        //Insérer l'utilisateur dans la bdd partie users 
                        $profile = $bdd->prepare('INSERT INTO profil (id_auteur, pseudo_profil, profil_image)VALUES(?, ?, ?)');
                        $profile->execute(array($usersInfos['id'],$user_pseudo,"https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcR6QtOt1lXuHsUC1fncf7PpGDmooIsuiE2fnvr4mDRMvYxHCAtMMT8va8tY-J13TM_Kw4s&usqp=CAU"));

            //Rediriger l'utilisateur vers la page d'accueil
            header('Location: index.php');

        }else{
            $errorMsg = "L'utilisateur existe déjà sur le site";
        }

    }else{
        $errorMsg = "Veuillez compléter tous les champs...";
    }

}