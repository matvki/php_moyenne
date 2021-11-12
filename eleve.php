<?php session_start();?>
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>Saisie des notes</title>
</head>
<body>
<form action="./controller.php">
    <?php // récupération des variable en session pour l'affichage dynamique
    $nbrE = $_SESSION['nbrE'];
    $nbrN = $_SESSION['nbrN'];
    $i = $_SESSION['actualE'];
    ?>
    <label for="nom">Nom de l'eleve n°<?= $i+1 ?></label> <!-- Affichage dynamique du numéro de l'élève que l'on va rentrer -->
    <input type="text" name="nom" id="nom">
   <?php for($j = 0; $j < $nbrN;$j++) { ?> <!-- pour qui permet d'afficher dynamiquement le nombre de notes a rentrer -->
    <p>Note n°<?= $j+1?></p> <!-- numéro de la note que l'on va rentrer -->
        <input type="number" name="note_<?= $j?>" id="note_<?= $j?>">
   <?php } ?>
    <input type="submit" value="Entrer">
</form>
<a href="index.php">Revenir au formulaire.</a>
</body>
</html>