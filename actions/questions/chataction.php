<?php

require('actions/database.php');


// affichage des 20 derniers messages par ordre du plus vieux au plus recent
try{
     $afficherchat = $bdd->prepare('SELECT * FROM chat ORDER BY date ASC LIMIT 20');
     $afficherchat->execute();
     $afficherchats = $afficherchat->fetchALL();   
}
     catch (PDOException $e) 
        {
         die($e->getMessage());
        }


//si l'utilisateur envoie un message  verifier que le contenu ne sois pas vide , rentrer son pseudo et le contenu du message dans la bdd 
if (isset($_POST['validate'])) 
{
    if (isset($_POST['content']) && !empty($_POST['content'])) 
    {

        $contentchat = nl2br(htmlspecialchars($_POST['content']));

        try {
            
            $inserchat = $bdd->prepare('INSERT INTO chat(sender_speudo, content)VALUES(:pseudo, :content) ');
            $inserchat->bindParam('pseudo',$_SESSION['pseudo'],PDO::PARAM_STR);
            $inserchat->bindParam('content',$contentchat,PDO::PARAM_STR);
            $inserchat = $inserchat->execute();

            } 
            catch (PDOException $e) 
                 {
                  die($e->getMessage());
                 }
    }
}