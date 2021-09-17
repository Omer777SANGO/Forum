<?Php
    require('actions/users/securityAction.php');
    require('actions/users/getInfosOfEditedUserAction.php');
    require('actions/users/editUserAction.php');
?>
<!DOCTYPE html>
<html lang="en">
<?php include 'includes/head.php'; ?>
<body>
<br><br>
    <form class="container" method="POST">

        <?php if(isset($errorMsg)){ echo ' <p>'.$errorMsg.' </p>'; } ?>

        <div class="mb-3">
            <label for="pseudo" class="form-label">Pseudo</label>
            <input type="text" class="form-control" name="pseudo" value="<?= $user_pseudo; ?>" >
        </div>
        <div class="mb-3">
            <label for="oldpasse" class="form-label">Old password</label>
            <input type="password" class="form-control" name="oldpassword">
        </div>
        <div class="mb-3">
            <label for="newpasse" class="form-label">New password</label>
            <input type="password" class="form-control" name="newpassword">
        </div>
        <div class="mb-3">
            <label for="cnewpasse" class="form-label">Confirm new password</label>
            <input type="password" class="form-control" name="cnewpassword">
        </div>
        <button type="submit" class="btn btn-primary" name="validate">Changer le mot de passe</button>
        <button type="submit" class="btn btn-outline-primary" name="validate"><a href="login.php" class="text-decoration-none"> Se connecter</a></button>
        <br><br>
        <!-- <p>Je n'ai pas de compte,<a href="signup.php" class="text-decoration-none"> je m'inscris</a></p> -->
    </form>
</body>
</html>