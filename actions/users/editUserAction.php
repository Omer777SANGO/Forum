<?php
    require('actions/database.php');

    //Validation du formulaire
    if (isset($_POST['validate'])) {
        
        //Vérifier si les champs sont remplis
        if (!empty($_POST['pseudo']) AND !empty($_POST['oldpassword']) AND !empty($_POST['newpassword']) AND !empty(['cnewpassword'])) {
            
            //Les données à faire passer dans la requête
            $new_user_pseudo = htmlspecialchars($_POST['pseudo']);
            $new_user_oldpassword = htmlspecialchars($_POST['oldpassword'], PASSWORD_DEFAULT);
            $new_user_newpassword = htmlspecialchars($_POST['newpassword'], PASSWORD_DEFAULT);
            $new_user_cnewpassword = htmlspecialchars($_POST['cnewpassword'], PASSWORD_DEFAULT);

            //Vérifier le mot de passe saisi comparé au mot de passe existant dans la bd
            if (password_verify($new_user_oldpassword, $userInfos['mdp'])) {
                
                //Vérifier si le nouveau mot de passe saisi et le saisi confirmé sont conformes
                if ($new_user_newpassword == $new_user_cnewpassword) {

                    //Chashage du nouveau mot de passe
                    $new_user_newpassword = password_hash($_POST['newpassword'], PASSWORD_DEFAULT);
                    
                    //Modifier les informations de la question qui possède l'id rentré en paramètre passé dans l'url
                    $editUserOnWebsite = $bdd->prepare('UPDATE users SET pseudo = ?, mdp = ? WHERE id = ?');
                    $editUserOnWebsite->execute(array($new_user_pseudo, $new_user_newpassword, $idOfUser));

                    $errorMsg = "Mot de passe changé avec succès";
                    
                    $_SESSION = [];
                    session_destroy();

                } else {
                   $errorMsg = "Le nouveau mot de passe n'est pas comfirmé";
                }  
            } else {
                $errorMsg = "Le mot de passe entré ne correspond pas à l'ancien mot de passe ";
            }
        } else {
            $errorMsg = "Veuillez compléter tous les champs...";
        }
        
    }