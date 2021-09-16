<?Php
    require('actions/database.php');
    
    //Si la session n'existe pas, on est redirigé sur la page de connexion
    if (!isset($_SESSION['auth'])) {
        header('Location: login.php');
    }

    //Récupérer l'identifier de l'user
    if (isset($_GET['id']) AND !empty($_GET['id'])) {
        
        //L'id de l'user
        $idOfUser = $_GET['id'];

        //Vérifier si l'id du profil(compte) est égal à l'id de la session en cours
        if ($idOfUser == $_SESSION['id']) {

            //Vérifier si l'user existe
            $checkIfUserExists = $bdd->prepare('SELECT pseudo, nom, prenom FROM users WHERE id = ?');
            $checkIfUserExists->execute(array($idOfUser));

            if ($checkIfUserExists->rowCount() > 0) {
                
                //Récupérer toutes les donées de l'user
                $usersInfos = $checkIfUserExists->fetch();

                $user_pseudo = $usersInfos['pseudo'];
                $user_lastname = $usersInfos['nom'];
                $user_firstname = $usersInfos['prenom'];

                //Récupérer toutes les questions publiées par l'user
                $getHisQuestions = $bdd->prepare('SELECT * FROM questions WHERE id_auteur = ? ORDER BY id DESC');
                $getHisQuestions->execute(array($idOfUser));

            } else {
                $errorMsg = "Aucun utilisateur trouvé";
            }

        } else {
            $errorMsg = "Vous ne pouvez pas visiter un profil qui n'est pas le sien";
        }
        
    } else {
        $errorMsg = "Aucun utilisateur trouvé";
    }
    
?>