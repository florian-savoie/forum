<?php 
    require('actions/users/securityAction.php');
    require('actions/questions/myQuestionsAction.php'); 
?>
<!DOCTYPE html>
<html lang="en">
<?php include 'includes/head.php'; ?>
<body>
    <?php include 'includes/navbar.php'; ?>

    <br><br>
    <div class="container-fluid">
<div class="row">
        <?php 

            while($question = $getAllMyQuestions->fetch())
            {
                ?>
                <div class="col-4 mb-3">
                <div class="card" style="height: 15rem;">
                    <h5 class="card-header" style="height: 5rem;">
                        <a href="article.php?id=<?= $question['id']; ?>">
                            <?= $question['titre']; ?>
                        </a>
                    </h5>
                    <div class="card-body" style="height: 5rem;">
                        <p class="card-text">
                            <?= $question['description']; ?>
                        </p></div>
                        <div class="row d-flex align-items-center px-2" style="height: 5rem;">
                      <div class="col-4 p-2"> <a href="article.php?id=<?= $question['id']; ?>" class="btn btn-primary">Accéder à la question</a></div> 
                      <div class="col-4 p-2">    <a href="edit-question.php?id=<?= $question['id']; ?>" class="btn btn-warning">Modifier la question</a></div> 
                      <div class="col-4 p-2">   <a href="actions/questions/deleteQuestionAction.php?id=<?= $question['id']; ?>" class="btn btn-danger">Supprimer la question</a></div> 
                        </div>
                    
                </div>
                </div>
                <?php
            }

        ?>
</div>
    </div>

</body>
</html>