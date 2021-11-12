<?php
session_start();

$noteMin=999999;
$noteMax=0;
$moyenneClasse=0;
for ($i=0;$i<$_SESSION['nbrE'];$i++){
    $string = 'eleve_' . $i;
    $moyenne = 0;
    foreach ($_SESSION as $key => $eleve) {
        if ($key == $string){
            foreach ($eleve as $note) {
                $moyenne = $moyenne+$note;
                if ($note > $noteMax ) {
                    $noteMax = $note;
                }
                if ($note < $noteMin ) {
                    $noteMin = $note;
                }
            }
        }
    }
    echo "La moyenne de l'eleve n°" . ($i+1) . " est de: " . ($moyenne/$_SESSION['nbrN']) . '<br/>';
    $moyenneClasse = $moyenneClasse + ($moyenne/$_SESSION['nbrN']);
}
echo "La moyenne de la classe est de " . ($moyenneClasse/$_SESSION['nbrE']) . '<br/>';
echo "La note maximal est de " . $noteMax . '<br/>';
echo "La note minimal est de " . $noteMin . '<br/>';
echo '<a href="index.php">Revenir au formulaire.</a>';