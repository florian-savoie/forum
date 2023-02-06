<?php 
    require('actions/users/securityAction.php');
    require('actions/questions/mymessagerie.php'); 
?>
<!DOCTYPE html>
<html lang="en">
<?php include 'includes/head.php'; ?>
<body>
    <?php include 'includes/navbar.php'; ?>

    <br><br>
    <div class="container-fluid">
    <div class="row ">
      <div class="col-10">
      <?php if (isset($_GET["envoyer"])) { ?>
   <?php   if (isset($erreur)) { echo $erreur ; } ?>


        <form class="container" method="POST">
<div class="mb-3">
    <label for="exampleInputEmail1" class="form-label">pseudo destinataire</label>
    <input type="text" class="form-control" name="pseudo">
</div>
<div class="mb-3">
    <label for="exampleInputEmail1" class="form-label">sujet</label>
    <input type="text" class="form-control" name="subject">
</div>
<div class="mb-3">
    <label for="exampleInputEmail1" class="form-label">Contenu du message</label>
    <textarea type="text" class="form-control" name="content"></textarea>
</div>

<button type="submit" class="btn btn-primary" name="sendmsg">envoyer le message</button>
</form>

        <?php  } elseif (isset($_GET["messageenvoyer"])) { ?>
            <?php   foreach ($messages as $message):  ?>
   <div class="row" <?php if ($message['is_read'] == 0 ) { echo 'style="background-color:red"' ;} ?> ><p class="col-8 ">Sujet : <?= $message['subject'] ?>  a <?= $message['receiver_pseudo'] ?>  le <?= $message['date'] ?></p>
   <a class="col-1" href="messagerie.php?messageenvoyer&&lire=<?php if (isset($_GET["lire"]) && $message['id'] == $_GET["lire"] ) {   } else { echo $message['id'];} ?>"> 
   <button type="button" class="btn btn-secondary "><?php if (isset($_GET["lire"]) && $message['id'] == $_GET["lire"] ) {  echo "cacher"; } else { echo "lire";} ?></button></a>
</div>
<?php if (isset($_GET["lire"]) && $message['id'] == $_GET["lire"] ) { ?>
   <p><?= $content[0]["content"] ?></p><?php  }?>
       <?php      endforeach; ?>


            <?php  } elseif (isset($_GET["recu"])) { ?>

                <?php   foreach ($messages as $message):  
if ($message['delete_msg'] == 0) { ?>
   <div class="row" <?php if ($message['is_read'] == 0 ) { echo 'style="background-color:red"' ;} ?> ><p class="col-8 ">Sujet : <?= $message['subject'] ?>  de <?= $message['sender_pseudo'] ?>  le <?= $message['date'] ?></p>
   <a class="col-1" href="messagerie.php?recu&&lire=<?php if (isset($_GET["lire"]) && $message['id'] == $_GET["lire"] ) {   } else { echo $message['id'];} ?>"> 
   <button type="button" class="btn btn-secondary "><?php if (isset($_GET["lire"]) && $message['id'] == $_GET["lire"] ) {  echo "cacher"; } else { echo "lire";} ?></button></a>
   <a class="col-1" href="messagerie.php?recu&&supprimer=<?= $message['id'] ?>"><button type="button" class="btn btn-danger">supprimer</button></a>
</div>
<?php if (isset($_GET["lire"]) && $message['id'] == $_GET["lire"] ) { ?>
   <p><?= $content[0]["content"] ?></p><?php  }?>

       <?php  }    endforeach; ?>
                <?php } ?>

      </div>
      <div class="col-2">
<div class="col-12" ><a href="messagerie.php?envoyer">envoyer un message</a></div>
<div class="col-12"><a href="messagerie.php?messageenvoyer">message envoyer</a></div>
<div class="col-12"><a href="messagerie.php?recu">message recu</a></div>
      </div>

 </div>
</div>
<?php include 'includes/footer.php'; ?>

</body>
</html>