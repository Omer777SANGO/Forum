<?Php
try{
    $bdd = new PDO('mysql:host=localhost;dbname=exo_forum;charset=UTF8;', 'root', '');
}
catch(Exception $e){
    die('Une erreur a été trouvée: '. $e->getMessage());
}