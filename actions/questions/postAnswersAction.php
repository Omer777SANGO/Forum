<?php
    require('actions/database.php');

    if (isset($_POST['validate'])) {

        //Il faut être connecter pour commenter sinon redirection
        if (!isset($_SESSION['auth'])) {
            header('Location: login.php');
        }
        
        if (!empty($_POST['answer'])) {
            
            $user_answer = nl2br(htmlspecialchars($_POST['answer']));

            $insertAnwer = $bdd->prepare('INSERT INTO answers(id_auteur, pseudo_auteur, id_question, reponse) VALUES(?, ?, ?, ?)');
            $insertAnwer->execute(array($_SESSION['id'], $_SESSION['pseudo'], $idOfTheQuestion, $user_answer));
        }
    }