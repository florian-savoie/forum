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
    <tbody>
      <tr>
        <td><?= $infosarticle['id_category'] ?></td>
      </tr>
      <tr>
        <td><?= $infosarticle['titre'] ?></td>
      </tr>
      <tr>
        <td><?= $infosarticle['description'] ?></td>
      </tr>
      <tr>
        <td><?= $infosarticle['pseudo_auteur'] ?></td>
      </tr>
      <tr>
        <td><?= $infosarticle['date_publication'] ?></td>
      </tr>
      <tr>
        <td><?= $infosarticle['id'] ?></td>
      </tr>
    </tbody>
  </table>




  <table class="table table-hover">
    <thead>
      <tr>
        <th>Firstname</th>
        <th>Lastname</th>
        <th>Email</th>
      </tr>
    </thead>
    <tbody>
      <tr>
        <td>John</td>
        <td>Doe</td>
        <td>john@example.com</td>
      </tr>
      <tr>
        <td>Mary</td>
        <td>Moe</td>
        <td>mary@example.com</td>
      </tr>
      <tr>
        <td>July</td>
        <td>Dooley</td>
        <td>july@example.com</td>
      </tr>
    </tbody>
  </table>

  <?php if (isset($_GET['chat'])) { echo $url; } else { echo "?chat"; } ?>