<?Php
    require('actions/database.php');

    //récupérer les questions par défaut sans recherche
    $getAllQuestions = $bdd->query('SELECT id, id_auteur, titre, description, pseudo_auteur, date_publication FROM questions ORDER BY id DESC LIMIT 0,5');

    //Vérifier si une recherche a été rentré par l'user
    if (isset($_GET['search']) AND !empty($_GET['search'])) {
        
        //La recherche
        $usersSearch = $_GET['search'];

        //récupérer toutes les questions qui correspondent à la recherche (en fonction du titre)
        $getAllQuestions = $bdd->query('SELECT id, id_auteur, titre, description, pseudo_auteur, date_publication FROM questions WHERE titre LIKE "%'.$usersSearch.'%" ORDER BY id DESC');
    }