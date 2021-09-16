<?php
    //vérifier si l'user est authentifié au niveau du site
    session_start();
    if (!isset($_SESSION['auth'])) {
        header('Location: ../../login.php');
    }

    require('../database.php');

    //Vérifier si l'id est rentré e paramètre dans l'url
    if (isset($_GET['id']) AND !empty($_GET['id'])) {
        
        //L'id de la question en paramètre
        $idOftheQuestion = $_GET['id'];

        //Vérifier si la question existe
        $checkIfQuestionExists = $bdd->prepare('SELECT * FROM questions WHERE id = ?');
        $checkIfQuestionExists->execute(array($idOftheQuestion));

        if ($checkIfQuestionExists->rowCount() > 0) {
            
            //Récupérer les infos de la question
            $usersInfos = $checkIfQuestionExists->fetch();
            if ($usersInfos['id_auteur'] == $_SESSION['id']) {
                
                //Supprimer la question en fonction de son id rentré en paramètre 
                $deleteThisQuestion = $bdd->prepare('DELETE FROM questions WHERE id = ?');
                $deleteThisQuestion->execute(array($idOftheQuestion));

                header('Location: ../../my-questions.php');
            } else {
                echo "Vous n'avez pas le droit de supprimer une question qui ne vous appartient pas";
            }
            
        } else {
            echo "Aucune question n'a été trouvée";
        }
        
    } else {
        echo "Aucune question n'a été trouvée";
    }
    