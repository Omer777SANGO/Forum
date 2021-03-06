<?Php
    session_start();
    require('actions/users/showOneUsersProfileAction.php');
?>
<!DOCTYPE html>
<html lang="en">
<?php include 'includes/head.php'; ?>
<body>
    <?php include 'includes/navbar.php'; ?>
    <br><br>

    <div class="container">
        <?php
            if (isset($errorMsg)) {
                echo $errorMsg;
            }

            if (isset($getHisQuestions)) {
                ?>
                <div class="card">
                    <div class="card-body">
                        <h4>@<?= $user_pseudo; ?></h4>
                        <hr>
                        <p><?= $user_lastname . ' ' . $user_firstname; ?> <a href="change-password.php?id=<?= $idOfUser; ?>" class="text-decoration-none" style="float: right;">Changer son mot de passe</a> </p>
                    </div>
                </div>
                <br>
                <p class="text-muted fs-1">Mes publications</p>
                <?php
                    while ($question = $getHisQuestions->fetch()) {
                        ?>
                        <div class="card">
                            <div class="card-header">
                                <?= $question['titre']; ?>
                            </div>
                            <div class="card-body">
                                <?= $question['description']; ?>
                            </div>
                            <div class="card-footer">
                                <!-- Par --> <?php //$question['pseudo_auteur']; ?> Le <?= $question['date_publication']; ?>
                            </div>
                        </div>
                        <br>
                        <?php
                    }
            }
        ?>
    </div>
    
</body>
</html>