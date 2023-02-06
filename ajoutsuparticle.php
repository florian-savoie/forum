<?php 
    require('actions/users/securityAction.php');
    require('actions/questions/ajousupshow.php');
?>
<!DOCTYPE html>
<html lang="en">
<?php include 'includes/head.php'; ?>
<link rel="stylesheet" href="assets/css/articles.css">
<body>
    <?php include 'includes/navbar.php'; ?>
<div class="container-fluid">
<div class="row">

<div class="row d-flex justify-content-center my-5">
   <div class="col-2"> <a href="ajoutsuparticle.php?ajouter=1"> <input class="btn btn-primary" type="submit" value="ajouter"></a></div>
   <div class="col-2"><a href="ajoutsuparticle.php?modifier=1"> <input class="btn btn-success" type="submit" value="modifier"></a></div> 
    <div class="col-2"> <a href="ajoutsuparticle.php?supprimer=1"> <input type="submit" class="btn btn-danger" value="supprimer ❌"></a></div>
</div>



<?php if (isset($_GET["ajouter"])) { ?>
  
    <form class="container" method="POST">
<div class="mb-3">
<select class="form-select form-select-lg mb-3" aria-label=".form-select-lg example "name="category">
  <option selected>Category</option>

  <?php   foreach ($category as $categorie):  ?>
    <option  value="<?= $categorie['id'] ?>"><?= $categorie['category'] ?></option> 
       <?php      endforeach; ?>
</select>
</div>
<div class="mb-3">
    <label  class="form-label">titre</label>
    <input type="text" class="form-control" name="titre">
</div>
<div class="mb-3">
    <label  class="form-label">description</label>
    <input type="text" class="form-control" name="description">
</div>
<div class="mb-3">
    <label  class="form-label">image</label>
    <input type="text" class="form-control" name="image">
</div>
<button type="submit" class="btn btn-primary" name="ajoutArticle">Ajout</button>
</form> 


    <?php  } elseif (isset($_GET["modifier"])) { ?>
   
        <form class="container" method="POST" >
<div class="mb-3">
<select class="form-select form-select-lg mb-3" aria-label=".form-select-lg example "name="category">
  <option selected>Category</option>

  <?php   foreach ($category as $categorie):  ?>
    <option  value="<?= $categorie['id'] ?>"><?= $categorie['category'] ?></option> 
       <?php      endforeach; ?>
</select>
</div>
<button type="submit" class="btn btn-primary" name="modifierarticle">Afficher</button>
</form> 
<?php if (isset($_POST["category"])) { ?>
         <table class="table table-hover">
         <thead>
           <tr>
             <th>Category</th>
             <th>Titre</th>
             <th>description</th>
             <th>auteur</th>
             <th>date de publication</th>
             <th>modifier</th>
           </tr>
         </thead>
       <?php   foreach ($affichermofications as $affichermof):  ?>
     
         <tbody>
           <tr>
             <td><?= $affichermof['category'] ?></td>
             <td><?= $affichermof['titre'] ?></td>
             <td><?= $affichermof['description'] ?></td>
             <td><?= $affichermof['pseudo_auteur'] ?></td>
             <td><?= $affichermof['date_publication'] ?></td>
             <td><form  method="post">
                 <input type="hidden" name="supp" value="<?=$affichermof['id'] ?>">
                 <a href="editarticles.php?id=<?= $affichermof['id']; ?>" class="btn btn-succes col-3 m-2">Modifier</a>
               </form></td>
           </tr>
         </tbody>
     <?php      endforeach;   ?>
         </table>
<?php } ?>


<?php if(isset($tesst)) { echo $tesst ; }  ?>


   <?php  } elseif (isset($_GET["supprimer"])) { ?>
       <table class="table table-hover">
    <thead>
      <tr>
        <th>Category</th>
        <th>Titre</th>
        <th>description</th>
        <th>auteur</th>
        <th>date de publication</th>
        <th>supprimer</th>
      </tr>
    </thead>
  <?php   foreach ($infosarticles as $infosarticle):  ?>

    <tbody>
      <tr>
        <td><?= $infosarticle['category'] ?></td>
        <td><?= $infosarticle['titre'] ?></td>
        <td><?= $infosarticle['description'] ?></td>
        <td><?= $infosarticle['pseudo_auteur'] ?></td>
        <td><?= $infosarticle['date_publication'] ?></td>
        <td><form  method="post">
            <input type="hidden" name="supp" value="<?=$infosarticle['id'] ?>">
            <button type="submit" class="btn btn-danger" name="supprimer">❌</button>
          </form></td>
      </tr>
    </tbody>
<?php      endforeach;   ?>
    </table>  <?php  } else {
    echo "selectionner une action";
   } ?>




</div>

</div>





    


<?php include 'includes/footer.php'; ?>

</body>
</html>