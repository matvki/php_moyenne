<?php
session_start();
include 'connectDB.php'; // include de la connection a la bdd

$req = $db->prepare('select * from eleve'); // requet pour récuperer tout les élèves
$req->execute();
$eleves = $req->fetchAll();
$req = $db->prepare('select * from note'); // requet pour récuperer toutes les notes
$req->execute();
$notes = $req->fetchAll();

$allNote = array();
foreach ($notes as $note) { // création d'un array pour calculé la note max et mini
    $allNote[] = $note['value'];
}
$result = moyenne($notes, $_SESSION['nbrE']); // appel de la fonction moyenne pour calculer les moyennes de chaque élèves et la moyenne général
$moyenneTot = $result['moyenneTot']; // récupération de la moyenne générale
$moyennes = $result['moyenneE']; // récupération de la moyenne de chaque élève
$noteMax = max($allNote); // récupération de la note max
$noteMin = min($allNote); // récupération de la note mini

foreach ($eleves as $eleve) { // affichage dynamique pour afficher le nom de chaque élève avec sa note
    echo '<p>Moyenne pour l\'élève '.$eleve['name'];
    foreach ($moyennes as $moyenne) { // foreach pour afficher la moyenne de chaque élève
        if ($eleve['id'] == $moyenne['eleve_id']) {
            echo ': '.$moyenne['moyenne'].'</p>';
        }
    }
}
echo '<br/>';
echo "La moyenne de la classe est de " . $moyenneTot . '<br/>'; // affichage de la moyenne générale
echo "La note maximal est de " . $noteMax . '<br/>'; // affichage de la note max
echo "La note minimal est de " . $noteMin . '<br/>'; // affichage de la note mini
echo '<a href="index.php">Revenir au formulaire.</a>';

$requet = "truncate table note;"; // requet pour vider la table des élèves
mysqli_query($mysqli, $requet);
$requet = "truncate table eleve;"; // requet pour vider la table des notes
mysqli_query($mysqli, $requet);

function moyenne($values,$nbE) { // fonction pour calculer la moyenne de chaque élève et la moyenne générale
    $moyenneTot = 0;
    $array = array();
    for ($i=1;$i<=$nbE;$i++) { // tant que i est inférieur ou égal au nombre délève je rentre dans la boucel
        $moyenne = 0; // initialisation d'une variable tampon pour calculer la moyenne d'un élève
        $j = 0; // initialisation d'une variable tampon pour calculer la moyenne d'un élève
        foreach ($values as $value) { // pour chaque note je fait ce qui suit
            if ($value['eleve_id'] == $i) { // si eleve_id est identique au i alors je rentre dans le if
                $moyenneTot = $moyenneTot + $value['value']; // j'ajoute a moyenneTot la valeur de chaque note de  chaque élève
                $moyenne = $moyenne + $value['value']; // j'ajoute a moyenne la valeur de chaque note de de l'élève qui a l'id $i
                $j++; // incrémentation de la variable tampon quand on rentre dans le if
            }
        }
        $moyenne = $moyenne/$j; // calcule de la moyenne de l'élève qui a pour id $i
        $array[] = ['eleve_id' => $i, 'moyenne' => $moyenne]; // Ajout dans un array l'id d'un élève avec sa moyenne
    }
    $moyenneTot = $moyenneTot/count($values); // calcule de la moyenne total en fonction du nombre de note total

    return $result = ['moyenneTot' => $moyenneTot, 'moyenneE' => $array ]; // return d'un array qui contient la moyenne général et un array qui contient la moyenne de chaque élève
}