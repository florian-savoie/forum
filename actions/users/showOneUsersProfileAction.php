<?php

require('actions/database.php');

//Récupérer l'identifiant de l'utilisateur
if(isset($_GET['id']) AND !empty($_GET['id'])){

    //L'id de l'utilisateur
    $idOfUser = $_GET['id'];

    //Vérifier si l'utilisateur existe
    $checkIfUserExists = $bdd->prepare('SELECT pseudo, nom, prenom ,email FROM users WHERE id = ?');
    $checkIfUserExists->execute(array($idOfUser));

    if($checkIfUserExists->rowCount() > 0){
        
        //Récupérer toutes les données de l'utilisateur
        $usersInfos = $checkIfUserExists->fetch();

        $user_pseudo = $usersInfos['pseudo'];
        $user_lastname = $usersInfos['nom'];
        $user_firstname = $usersInfos['prenom'];
        $user_firstname = $usersInfos['email'];

        //Récupérer toutes les questions publiées par l'utilisateur
        $getHisQuestions = $bdd->prepare('SELECT * FROM questions WHERE id_auteur = ? ORDER BY id DESC');
        $getHisQuestions->execute(array($idOfUser));

        // recupere le nombre de questions que l'utilisateur a posé
        $counQuestion = $bdd->prepare('SELECT count(*) as nbr FROM questions WHERE id_auteur = ? ');
        $counQuestion->execute(array($idOfUser));
        $nbrQuestions = $counQuestion->fetch();

        // recupere les information du profil de l'utilisateur 
        $infoProfil = $bdd->prepare('SELECT profil_image, nombre_de_clic ,date_inscription , DATEDIFF(CURDATE(),date_inscription) AS anciennete_en_jours ,description FROM profil WHERE id_auteur = ?');
        $infoProfil->execute(array($idOfUser));
        $infosProfil = $infoProfil->fetch();


       }else{
        $errorMsg = "Aucun utilisateur trouvé";
    }

}else{
    $errorMsg = "Aucun utilisateur trouvé";
}


// changement de la photo de profil 

if(isset($_POST['changeImg']) AND !empty($_POST['changeImg'])){

    $srcImg = $_POST['newslienimage'];
    $linkSrc = $bdd->prepare('UPDATE profil SET profil_image = ? WHERE id_auteur = ? ');
    $linkSrc->execute(array($srcImg,$idOfUser ));
 header("Location: profile.php?id=".$_SESSION['id']);

}

//changement de la description du profil 

if(isset($_POST['description']) AND !empty($_POST['description'])){

    $contenuDescription = htmlspecialchars($_POST['contenuDescription']);
    $description = $bdd->prepare('UPDATE profil SET description = ? WHERE id_auteur = ?');
    $description->execute(array($contenuDescription,$idOfUser ));
    header("Location: profile.php?id=".$_SESSION['id']);
}

//modification  de l'adresse email 
if(isset($_POST['changemail']) AND !empty($_POST['changemail'])){

    $change_email = htmlspecialchars($_POST['newemail']);;
    $change_emaildeux = htmlspecialchars($_POST['newemaildeux']);;
    if ( $change_email == $change_emaildeux)
    {
    $newmail = $bdd->prepare('UPDATE users SET email = ? WHERE id_auteur = ?');
    $newmail->execute(array($change_email,$idOfUser ));
    header("Location: profile.php?id=".$_SESSION['id']);
    }
}


// modification du mot de passe 
if (isset($_POST['changemdp']) and !empty($_POST['changemdp'])) {

    $change_pwd = $_POST['newmdp1'];
    $change_pwdtwo = $_POST['newmdp2'];
    $user_password = htmlspecialchars($_POST['ancienmdp']);
    $verifpwd = $bdd->prepare('SELECT mdp FROM users WHERE id_auteur = ?');
    $verifpwd->execute(array($_SESSION['id']));
    $usersInfospwd = $verifpwd->fetch();

    if (password_verify($user_password, $usersInfospwd['mdp'])) {

        if ($change_pwd == $change_pwdtwo) {

            $change_pwdtwo = password_hash($_POST['newmdp2'], PASSWORD_DEFAULT);
            $newpwd = $bdd->prepare('UPDATE users SET mdp = ? WHERE id_auteur = ?');
            $newpwd->execute(array($change_pwdtwo, $_SESSION['id']));
            header("Location: profile.php?id=" . $_SESSION['id']);

      }
    }
}
