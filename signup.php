<?php require('./actions/signupAction.php') ?>
<!DOCTYPE html>
<html lang="en">
<?php include 'includes/head.php'; ?>
<body>
<div class="container">
<form class="mt-5" method="POST">
  <?php
  if (isset($errorMsg)){
    echo '<p>'.$errorMsg.'</p>';
  }
   ?>
  <div class="mb-3">
    <label for="exampleInputEmail1" class="form-label">pseudo</label>
    <input type="test" class="form-control" name="pseudo">
  </div>
  <div class="mb-3">
    <label for="exampleInputEmail1" class="form-label">nom</label>
    <input type="test" class="form-control" name="lastname">
  </div>
  <div class="mb-3">
    <label for="exampleInputEmail1" class="form-label">prenom</label>
    <input type="test" class="form-control" name="firstname">
  </div>
  <div class="mb-3">
    <label for="exampleInputPassword1" class="form-label">Password</label>
    <input type="password" name="password" class="form-control">
  </div>
  <button type="submit" class="btn btn-primary" name="validate">s'inscrire</button>
</form>
</div>
</body>
</html>