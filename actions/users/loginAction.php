<?php
session_start();
    require('actions/database.php');

//Validation du formulaire
if (isset($_POST['validate'])) {

    //Vérifier si tous les champs ont été bien renseignés
    if (!empty($_POST['pseudo']) AND !empty($_POST['password'])) {

        //Les données de l'user
        $user_pseudo = htmlspecialchars($_POST['pseudo']);
        $user_password = htmlspecialchars($_POST['password'], PASSWORD_DEFAULT);

        //Vérifier si l'user existe (si le pseudo existe est correct)
        $checkIfUserExists = $bdd->prepare('SELECT * FROM users WHERE pseudo = ?');
        $checkIfUserExists->execute(array($user_pseudo));

        if ($checkIfUserExists->rowCount() > 0) {
            
            //Récupérer les données de l'user
            $usersInfos = $checkIfUserExists->fetch();

            //Vérifier si le mot de passe est correct
            if (password_verify($user_password, $usersInfos['mdp'])) {
                
                //Authentifier l'user sur le site et récupérer ses données dans la bd
                $_SESSION['auth'] = true;
                $_SESSION['id'] = $usersInfos['id'];
                $_SESSION['lastname'] = $usersInfos['nom'];
                $_SESSION['firstname'] = $usersInfos['prenom'];
                $_SESSION['pseudo'] = $usersInfos['pseudo'];

                //Rédiriger l'utilisatuer vers la page d'accueil
                header('Location: index.php');

            } else {
                $errorMsg = "Votre mot de passe est incorrect...";
            }
            
            
        } else {
            $errorMsg = "Votre pseudo est incorrect...";
        }
        
    }else {
        $errorMsg = "Veuillez compléter tous les champs...";
    }
}
