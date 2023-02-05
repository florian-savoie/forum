<?php 
    require('actions/users/securityAction.php');
    require('actions/questions/articlesshow.php');
?>
<!DOCTYPE html>
<html lang="en">
<?php include 'includes/head.php'; ?>
<link rel="stylesheet" href="assets/css/articles.css">
<body>
    <?php include 'includes/navbar.php'; ?>
<div class="container-fluid">
<div class="row">
<div class="col-2 blockCategory mt-5">
    
<?php 
    foreach ($category as $categorie):  ?>
 
             <h2><a href="articles.php?category=<?= $categorie['id'] ?>"><?= $categorie['category'] ?></a></h2><br>
        
       <?php      endforeach; ?>



</div>



<div class="col-10">
<div class="container-fluid">
<div class="row d-flex">
<?php 
if (isset($error) AND !empty($error)){
   ?> <div class=" d-flex align-items-center justify-content-center blockerreur">
    <?=$error?>
</div>
<?php }else{


    foreach ($article as $articl):  ?>



<div class="col-md-6 col-lg-3 mt-5">
    <div class="card" style="width:400px">
    <a href=""><img class="card-img-top img-fluid" src="<?= $articl['image_article'] ?>" alt="Card image" ></a>
    <div class="card-body">
      <h4 class="card-title"><?= $articl['titre'] ?></h4>
      <p class="card-text"><?= $articl['description'] ?></p>
      <p class="card-text"><?= $articl['pseudo_auteur'] ?></p>
      <p class="card-text"> publiée le <?= $articl['date_publication'] ?></p>
    </div>
  </div>
</div>
        
       <?php      endforeach; }?>
       </div>
</div>
</div>

</div>

</div>





    


   
</body>
</html>