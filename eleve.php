<?php session_start();?>
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>Saisie des notes</title>
</head>
<body>
<form action="./controller.php">
    <?php
    $nbrE = $_SESSION['nbrE'];
    $nbrN = $_SESSION['nbrN'];
    $i = $_SESSION['actualE'];
    ?>
    <p>Eleves n°<?= $i+1 ?></p>
   <?php for($j = 0; $j < $nbrN;$j++) { ?>
    <p>Note n°<?= $j+1?></p>
        <input type="number" name="note_<?= $j?>" id="note_<?= $j?>">
   <?php } ?>
    <input type="submit" value="Entrer">
</form>
<a href="index.php">Revenir au formulaire.</a>
</body>
</html>