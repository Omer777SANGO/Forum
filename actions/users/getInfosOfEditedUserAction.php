<?php
    require('actions/database.php');

    //Vérifier si l'id du compte est bien passé en paramètre dans l'url
    if (isset($_GET['id']) AND !empty($_GET['id'])) {
    
        $idOfUser = $_GET['id'];

        //Vérifier si le compte existe
        $checkIfUserExists = $bdd->prepare('SELECT * FROM users WHERE id = ?');
        $checkIfUserExists->execute(array($idOfUser));

        if ($checkIfUserExists->rowCount() > 0) {

            //Récupérer les données du compte
            $userInfos = $checkIfUserExists->fetch();
            if ($userInfos['id'] == $_SESSION['id']) {
                
                $user_pseudo = $userInfos['pseudo'];
                $user_fname = $userInfos['prenom'];
                $user_lname = $userInfos['nom'];
                $user_password = $userInfos['mdp'];

            } else {
                $errorMsg = "Vous n'êtes pas l'auteur de ce compte";            
            }
            
        } else {
            $errorMsg = "Aucun compte n'a été trouvé";
        }
    } else {
        $errorMsg = "Aucun compte n'a été trouvé";
    }