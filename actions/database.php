<?php
try{
    $bdd = new PDO('mysql:host=localhost;dbname=forum;charset=utf8', 'root', '');
}catch(Exception $e){
    die('une ereur a été trouvé');
}
