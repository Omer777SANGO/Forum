<?Php
    session_start();
    require('actions/questions/showAllQuestionsAction.php');
?>
<!DOCTYPE html>
<html lang="en">
<?php include 'includes/head.php'; ?>
<body>
    <?php include 'includes/navbar.php'; ?>
    <br><br>

    <div class="container">
        <form action="" method="GET">
            <div class="row form-group">
                <div class="col-8">
                    <input type="search" name="search" class="form-control">
                </div>
                <div class="col-4">
                    <button type="submit" class="btn btn-success">rechercher</button>
                </div>
            </div>
        </form>
        <br>
        <?php
            while ($question = $getAllQuestions->fetch()) {
                ?>
                <div class="card">
                    <div class="card-header">
                        <a href="question.php?id=<?= $question['id']; ?>" class="text-decoration-none"> <?= $question['titre']; ?> </a>
                    </div>
                    <div class="card-body">
                        <?= $question['description']; ?>
                    </div>
                    <div class="card-footer">
                        Publié par <a href="profile.php?id=<?= $question['id_auteur']; ?>" class="text-decoration-none"> <?= $question['pseudo_auteur']; ?> </a> le <?= $question['date_publication']; ?>
                    </div>
                </div>
                <br>
                <?php 
            }
        ?>
    </div>
</body>
</html>