<link rel="stylesheet" href="./assets/css/chat.css">

<?php 
    require('actions/questions/chatAction.php'); 
    $url = $_SERVER['PHP_SELF'] ; ?>


  <section class="blockchat container " style="height:<?php if (isset($_GET['chat'])) { echo "25rem"; } else { echo "3rem"; } ?>;">
    <div class="d-flex justify-content-center"><a class="nav-link chat" href="<?php if (isset($_GET['chat'])) { echo $url; } else { echo "?chat"; } ?>" >chat</a> 
     <?php  if (isset($_GET['chat'])){ ?><a class="boutonclose" href="<?= $url ?>"> <button type="submit" class="btn btn-danger" >❌</button>  </a><?php } ?></div>
<?php if (isset($_GET['chat'])) { ?>
  
    <?php foreach ($afficherchats as $chat): ?> 
    
<div class="blockmsg p-2 m-2" id="message">
    <p class="" style="color:red;"> <?= $chat['sender_speudo'] ?> <?= $chat['date'] ?> </p>
            <p class=""> <?= $chat['content'] ?> </p>
</div>
   <?php endforeach; ?>

    <form  method="POST">
        <div class="mb-3">
            <label for="exampleInputEmail1" class="form-label">Contenu du message</label>
            <textarea type="text" class="form-control" name="content"></textarea>
        </div>

        <button type="submit" class="btn btn-primary" name="validate">  📨envoyer</button> </form> 
        
        


<?php }
 ?>
    </section> 