<?php session_start();
if (isset($_SESSION['error'])) {?> <!-- Message d'erreur si une mauvaise valeur est rentrée.-->
    <p style="color: red">Au moins une des entrée était "0", ce n'est pas une valeur acceptable, veuillez rentrer une autre valeur.</p>
<?php }
session_destroy();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>formulaire</title>
</head>
<body>
<form action="./controller.php" method="get">
    <input type="hidden" value="note" id="type">
    <label for="nbrE">nombres d'eleves</label>
    <input type="number" id="nbrE" name="nbrE">
    <label for="nbrN">nombres de notes</label>
    <input type="number" id="nbrN" name="nbrN">
    <input type="submit" value="Entré">
</form>
</body>
</html>