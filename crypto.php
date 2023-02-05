<?php 
    require('actions/questions/cryptoshow.php');
?>
<!DOCTYPE html>
<html lang="en">
<?php include 'includes/head.php'; ?>
<link rel="stylesheet" href="assets/css/crypto.css">
<body>
    <div class="container-fluid">
<div class="row d-flex">
    <?php include 'includes/navbar.php';
    $i = 1;
    $o = 0;
    foreach ($elements as $prix):  ?>
<div class="col-md-6 col-lg-3 mt-5">
    <div class="card" style="width:400px">
    <img class="card-img-top img-fluid" src="assets/img/crypto/<?=$i?>.jpg" alt="Card image" >
    <div class="card-body">
      <h4 class="card-title"></h4>
      <p class="card-text"><?= message($monnaie[$o], "binance", $prix) ?></p>
    </div>
  </div>
</div>
       <?php
       $i++;
       $o++;
   endforeach; ?>
</div>
</div>




    


   
</body>
</html>