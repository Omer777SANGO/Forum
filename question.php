<?Php
    session_start();
    require('actions/questions/showQuestionContentAction.php');
    require('actions/questions/postAnswersAction.php');
    require('actions/questions/showAllAnswersOfQuestionAction.php');
?>
<!DOCTYPE html>
<html lang="en">
<?php include 'includes/head.php'; ?>
<body>
    <?php include 'includes/navbar.php'; ?>
    <br><br>

    <div class="container">
        <?Php
            if (isset($errorMsg)) {
                echo $errorMsg;
            }

            if (isset($question_date_publication)) {
                ?>
                <section class="show-content">
                    <h3> <?= $question_title; ?></h3>
                    <hr>
                    <h3> <?= $question_content; ?></h3>
                    <hr>
                    <small> <?= '<a href="profile.php?id='.$question_id_author.'" class="text-decoration-none">'.$question_pseudo_author. '</a> ' . $question_date_publication; ?></small>
                </section>
                <br>
                <section class="show-answers">
                    <form action="" method="POST" class="form-group">
                        <div class="mb-3">
                            <label for="" class="form-label">Réponse:</label>
                            <textarea name="answer" id="" cols="" rows="" class="form-control"></textarea>
                            <br>
                            <button class="btn btn-primary" type="submit" name="validate">Répondre</button>
                        </div>
                    </form>
                    <?Php
                        while ($answer = $getAllAnswersOfThisQuestion->fetch()) {
                            ?>
                            <div class="card">
                                <div class="card-header">
                                    <a href="profile.php?id=<?= $answer['id_auteur']; ?>"><?= $answer['pseudo_auteur']; ?></a>
                                </div>
                                <div class="card-body">
                                    <?= $answer['reponse']; ?>
                                </div>
                            </div>
                            <br>
                            <?Php
                        }
                    ?>
                </section>
                <?Php
            }
        ?>
    </div>
</body>
</html>