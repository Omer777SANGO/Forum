<?Php
session_start();
require('actions/database.php');

//Validation du formulaire
if (isset($_POST['validate'])) {

    //Vérifier si tous les champs ont été bien renseignés
    if (!empty($_POST['pseudo']) AND !empty($_POST['lastname']) AND !empty($_POST['firstname']) AND !empty($_POST['password'])) {

        //Les données de l'user
        $user_pseudo = htmlspecialchars($_POST['pseudo']);
        $user_lastname = htmlspecialchars($_POST['lastname']);
        $user_firstname = htmlspecialchars($_POST['firstname']);
        $user_password = password_hash($_POST['password'], PASSWORD_DEFAULT);

        //Vérifier si l'user existe déjà sur le site
        $checkIfUserAlreadyExists = $bdd->prepare('SELECT pseudo FROM users WHERE pseudo = ?');
        $checkIfUserAlreadyExists->execute(array($user_pseudo));

        if ($checkIfUserAlreadyExists->rowCount() == 0) {
            
            //Insérer l'user dans la bd
            $insertUserOnWebsite = $bdd->prepare('INSERT INTO users(pseudo, nom, prenom, mdp) VALUES(?, ?, ?, ?)');
            $insertUserOnWebsite->execute(array($user_pseudo, $user_lastname,  $user_firstname, $user_password));
            
            //Récupérer les informations de l'utilisateur
            $getInfosOfThisUserreq = $bdd->prepare('SELECT id, pseudo, nom, prenom FROM users WHERE nom = ? AND prenom = ? AND pseudo = ?');
            $getInfosOfThisUserreq->execute(array($user_lastname,  $user_firstname, $user_pseudo));

            $userInfos = $getInfosOfThisUserreq->fetch();

            //Authentifier l'user sur le site et récupérer ses données dans des variables globales de sessions
            $_SESSION['auth'] = true;
            $_SESSION['id'] = $userInfos['id'];
            $_SESSION['lastname'] = $userInfos['nom'];
            $_SESSION['firstname'] = $userInfos['prenom'];
            $_SESSION['pseudo'] = $userInfos['pseudo'];
            
            //Rediriger l'user vers la page d'accueil
            header('Location: index.php');

        } else {
            $errorMsg = "L'utilisateur existe déjà sur le site";
        }
        
    }else {
        $errorMsg = "Veuillez compléter tous les champs...";
    }
}