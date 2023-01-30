<?php

require('actions/database.php');

if (isset($_GET['id']) AND !empty($_GET['id'])){


}else{
    $errorMsg = 'aucune question na ete trouvée';
}