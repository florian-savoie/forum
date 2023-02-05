<?php 
    require('actions/users/securityAction.php');
    require('actions/questions/showListPlayer.php'); 
?>

<!DOCTYPE html>
<html lang="en">
<?php include 'includes/head.php'; ?>
<link rel="stylesheet" href="assets/css/profil.css">
<body >
    <?php include 'includes/navbar.php'; ?>
   <div class='container-fluid p-5 '>
<div class="d-flex justify-content-center my-5">
<form method="post">
  <div class="row">
    <div class="col">
      <input type="text" class="form-control" placeholder="recherche" name="recherche">
    </div>
    <div class="col">
    <button type="submit"  class="btn btn-info">RECHERCHE</button>
    </div>
  </div>
</form>
</div>


<!-- recherche d'un joueur -->

<?php  if (isset($_POST["recherche"]))
{ ?>
  <table class='table table-dark table-hover my-5'>
    <thead>
      <tr>
        <th>pseudo</th>
        <th>nombres de message</th>
        <th>date d'inscription</th>
        <th>profil</th>
      </tr>
    </thead>
    <tbody>
      
   <?php  while ($joueurChercher = $recherche->fetch()) 
            {?> <tr>

               <td class="text-primary"><?= $joueurChercher['pseudo'] ?></td>
               <td class='text-success'><?= $joueurChercher['nombre_de_message_poste'] ?></td>
               <td class='text-success'><?= $joueurChercher['date_inscription'] ?></td>
               <td><a href='../forum/profile.php?id=<?=$joueurChercher['id']?>'>profil</a></td>

               </tr>
              
               <?php  } ?>
                 </tbody>
                </table>
  <?php } ?>




<!---->
<?php if ( $_GET['page'] === 1 )
    { ?>
  
         <table class='table table-dark table-hover'>
         <thead>
           <tr>
           <th></th>
           <th>pseudo</th>
           <th>nombres de message</th>
           <th>date d'inscription</th>
           <th>profil</th>
           </tr>
         </thead>
         <tbody> 
      <?php   while ($row = $classementlimit->fetch()) 
                 { ?> <tr>
                    <td><?=$rank?></td>
                    <td class="text-primary"><?= $row['pseudo'] ?></td>
                    <td><?= $row['id'] ?></td>
                    <td><?= $row['date_inscription'] ?></td>
                    <td><a href='../forum/profile.php?id=<?=$row['id']?>'>profil</a></td>
                    </tr>
                   
             <?php  $rank++;  } ?>
                        </tbody>
                     </table>
    
  <?php  }
else 
 { 
    { ?>
        <table class='table table-dark table-hover'>
        <thead>
          <tr>
          <th></th>
          <th>pseudo</th>
          <th>nombres de message</th>
          <th>date d'inscription</th>
          <th>profil</th>
          </tr>
        </thead>
        <tbody>
       <?php  while ($rowz = $classementlimit->fetch()) { ?>   <tr>
            <td><?= $rank?></td>
            <td class='text-primary'><?= $rowz['pseudo'] ?></td>
            <td class='text-success'><?= $rowz['nombre_de_message_poste'] ?></td>
            <td class='text-success'><?= $rowz['date_inscription'] ?></td>
            <td><a href='../forum/profile.php?id=<?=$rowz['id']?>'>profil</a></td>
            </tr>
            
      <?php $rank++; } ?>
        </tbody> </table>
      <?php  }
}
?>


<div class='d-flex justify-content-center'> <ul class='pagination'>
<?php  for ($i = 1; $i <= $totalPages; $i++) {
    if ($i == $currentPage) { ?>
        <li class='page-item active'><a class='page-link' href='?page=$i'><?= $i ?></a></li>
  <?php   } else { ?>
       
        <li class='page-item '><a class='page-link' href='?page=$i'><?php $i ?></a></li>
   <?php }
}?>
</ul> </div>





</ul> </div>
</div>
<script src=""></script>

</body>
</html>