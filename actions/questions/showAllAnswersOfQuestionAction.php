<?Php
    require('actions/database.php');

    $getAllAnswersOfThisQuestion = $bdd->prepare('SELECT id_auteur, pseudo_auteur, id_question, reponse FROM answers WHERE id_question = ? ORDER BY id DESC');
    $getAllAnswersOfThisQuestion->execute(array($idOfTheQuestion));