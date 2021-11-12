<?php
session_start();

foreach ($_GET as $value) { // récupération de ce qu'il y a dans le get pour vérifier si les valeurs sont bonnes
    if ($value == "0" || $value == "" || $value == null) {
        $_SESSION['error'] = 'value 0';
        header('Location: http://localhost:8888/index.php');
        die;}
}

if (isset($_SESSION['actualE'])){ // si la variable actualE est initailisé on rentre dans la boucle
    if ($_SESSION['actualE'] < $_SESSION['nbrE']) { // si la variable actualE est inférieur stricte au nombre d'élève on rentre dans la boucle
        include 'connectDB.php'; // appel du controller pour la connection a la bdd
        $req = $db->prepare("INSERT INTO eleve (id, name) VALUES ('".($_SESSION['actualE']+1)."' ,'".$_GET['nom']."')"); // requet pour inserrer en bdd le nom et l'id d'un élève
        $req->execute();
        for ($i=0;$i<$_SESSION['nbrN'];$i++) { // pour qui est la pour rentrer les notes en liens avec l'élève en question
            $req = $db->prepare("INSERT INTO note (value,eleve_id) VALUES ('".$_GET['note_'.$i]."','".($_SESSION['actualE']+1)."')");
            $req->execute();
        }
        $_SESSION['actualE'] = $_SESSION['actualE'] + 1; // incrémentation de actualE
        if ($_SESSION['actualE'] < $_SESSION['nbrE']) { // si actualE est inférieur strict au nombre d'élève on renvoie sur le formulaire pour entrer les informations de l'élève suivant
            header('Location: http://localhost:8888/eleve.php');
            die;
        }else { // si actualE est égal ou supérieur au nombre d'élève, on renvoie sur la vue result
            header('Location: http://localhost:8888/result.php');
            die;
        }
    }else // si la variable actualE est égal ou supérieur au nombre d'élève on renvoie sur la vue result
        header('Location: http://localhost:8888/result.php');die;
}else{ // si la variable actualE n'est pas initialisé on l'initialise et on renvoie sur le formulaire
    $_SESSION['nbrN'] = $_GET['nbrN'];
    $_SESSION['nbrE'] = $_GET['nbrE'];
    $_SESSION['actualE'] = 0;
    header('Location: http://localhost:8888/eleve.php');die;
}
