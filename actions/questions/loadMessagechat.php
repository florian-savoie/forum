
<?php

require('actions/database.php');

$afficherchat = $bdd->prepare('SELECT *  FROM chat LIMIT 20 ');
$afficherchat->execute();
$afficherchats = $afficherchat->fetchALL();
 ?>


