<?php 
    session_start(); 
    require('actions/users/showOneUsersProfileAction.php');   
?>

<!DOCTYPE html>
<html lang="en">
<?php include 'includes/head.php'; ?>
<link rel="stylesheet" href="assets/css/profil.css">
<body >
    <?php include 'includes/navbar.php'; ?>
    <br><br>

    <div class="container blockglobal p-5">
        <?php 
            if(isset($errorMsg)){ echo $errorMsg; }

            if(isset($getHisQuestions)){

                ?>
                <div class="card cardprof p-3">
                    <div class="card-body row d-flex align-items-center">
                         <div class="col-7  ">
                              <h4>bonjour <?= $user_pseudo; ?></h4>
                                <h4> vous avez posé <?= $nbrQuestions['nbr'] ; ?>  question </h4>
                                <h4> vous vous etes inscrit le : <?= $infosProfil['date_inscription'] ; ?> </h4>
                                <h4> vous avez  <?= $infosProfil['anciennete_en_jours'] ; ?> jour d'ancienneté </h4>
                                <h4> vous avez  <?= $infosProfil['nombre_de_clic'] ; ?> clic sur le site </h4>
                           


                        
                
                         </div>                     
                         <div class="col-5 photo "> 
                           
                             <div class="d-flex justify-content-center" ><img src="<?= $infosProfil['profil_image'] ?>"  id="myImage" class="image" alt="" style=" height: 13rem; width: 13rem;"></div>
                             <h5 class="span" ><strong> changer photo de profile</strong></h5>
                              <form  method="post" class="mt-3 " id="blockNewPhoto">
                                    <label class="col-12 d-flex justify-content-center row">
                                        
                                                lien de la nouvel image  </label>
                                      <div class="d-flex justify-content-center my-3">
                                       <input class="col-6 " type="text" name="newslienimage"  value="lien :" />
                                  </div>
                                     <div class="row d-flex justify-content-center">
                                       <input class="col-4 btn-primary" name="changeImg" type="submit" value="envoyer" />
                                       </div>
                              </form>
                         </div>               



                    </div>
                </div>
                <br>

 <form method="POST">
 <h3>Description :</h3>
 <textarea name="contenuDescription" id="" cols="100" rows="8" style="width:100%;" ><?= $infosProfil['description'] ?></textarea>
 <div class="d-flex justify-content-center"> <input class="col-4 btn-primary" name="description" type="submit" value="envoyer" /></div>
</form>

<div class="row">
                <form method="POST" class="col-6">
  <div class="mb-3 mt-3">
    <h4>Votre adresse email actuel : <?= $usersInfos['email']; ?> </h4>
    <label for="email" class="form-label">nouvel email:</label>
    <input type="email" class="form-control"  placeholder="nouvel email" name="newemail">
  </div>
  <div class="mb-3">
    <label for="pwd" class="form-label">nouvel email:</label>
    <input type="email" class="form-control"  placeholder="nouvel email" name="newemaildeux">
  </div>
  <input class="col-4 btn-primary" name="changemail" type="submit" value="envoyer" />
</form>


<form method="POST" class="col-6">
  <div class="mb-3 mt-3">
    <h4>changer votre mots de passe </h4>
    <label for="pwd" class="form-label">ancien mot de passe </label>
    <input type="password" class="form-control" placeholder="Enter email" name="ancienmdp">
  </div>
  <div class="mb-3">
    <label for="pwd" class="form-label">Password:</label>
    <input type="password" class="form-control"  placeholder="Enter nouveau password" name="newmdp1">
  </div>
  <div class="mb-3">
    <label for="pwd" class="form-label">Password:</label>
    <input type="password" class="form-control"  placeholder="Enter nouveau password" name="newmdp2">
  </div>
  <input class="col-4 btn-primary" name="changemdp" type="submit" value="envoyer" />

</form>
</div>
<?php if (!empty($error)) {
      echo $error;} ?>
              <div class="row my-3 d-flex justify-content-between"> <h2 class=" col-9">vos questions posé</h2><h3 class="col-3">resultat : <?= $nbrQuestions['nbr'] ; ?></h3>  </div>
                <?php
                $i = 1;
                while($question = $getHisQuestions->fetch()){ 
                    ?>
                    <h5> question numero <?= $i ?> </h5>
                    <div class="card">
                        <div class="card-header">
                            <?= $question['titre']; ?>
                        </div>
                        <div class="card-body">
                            <?= $question['description']; ?>
                        </div>
                        <div class="card-footer">
                            Par <?= $question['pseudo_auteur']; ?> le <?= $question['date_publication'];  ?>
                        </div>
                    </div>
                    <br>
                    <?php
                    $i++;
                }

            }
        ?>  
    </div>

<script src="assets/profil.js"></script>


</body>
</html>