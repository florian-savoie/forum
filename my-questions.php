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
    <div class="row ">
        <div class="col-2">
<h2>Category</h2>


        </div>
        <div class="col-10">
<div class="container-fluid">
    <div class="row d-flex justify-content-center">
        <?php 

            while($question = $getAllMyQuestions->fetch()){
                ?>
                <div class="card col-3 m-3">
                    <h5 class="card-header">
                        <a href="article.php?id=<?= $question['id']; ?>">
                            <?= $question['titre']; ?>
                        </a>
                    </h5>
                    <div class="card-body">
                        <p class="card-text">
                            <?= $question['description']; ?>
                        </p>

                       <div class="row d-flex justify-content-center"> <a href="article.php?id=<?= $question['id']; ?>" class="btn btn-primary col-3 m-2">Accéder à la question</a>
                        <a href="edit-question.php?id=<?= $question['id']; ?>" class="btn btn-warning col-3 m-2">Modifier la question</a>
                        <a href="actions/questions/deleteQuestionAction.php?id=<?= $question['id']; ?>" class="btn btn-danger col-3 m-2">Supprimer la question</a>
                    </div>
                </div>
            </div>
                <br>
                <?php
            }

        ?>
</div>
 </div>
</div>
 </div>
</div>
<?php include 'includes/footer.php'; ?>

</body>
</html>