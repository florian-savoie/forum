<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
  <div class="container-fluid">
    <a class="navbar-brand" href="#">Forum</a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarSupportedContent">
      <ul class="navbar-nav me-auto mb-2 mb-lg-0">
        <li class="nav-item">
          <a class="nav-link" href="index.php">Les questions</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="publish-question.php">Publier une question</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="my-questions.php">Mes questions</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="listPlayer.php?page=1">les membres</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="messagerie">messagerie</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="crypto.php">Crypto</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="articles.php">les articles</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="ajoutsuparticle.php">ajouter supprimer articles</a>
        </li>
        <?php 
          if(isset($_SESSION['auth'])){
            ?>
            <li class="nav-item">
              <a class="nav-link" href="profile.php?id=<?= $_SESSION['id']; ?>">Mon profil</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="actions/users/logoutAction.php">Déconnexion</a>
            </li>
            <?php
          }
?>
      </ul>
    </div>
  </div>
</nav>