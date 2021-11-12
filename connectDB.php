<?php
try {
    $db = new PDO('mysql:host=localhost;port=8889;dbname=moyenne',
        'root',
        'root'
    );} // connection bdd
catch(Exception $e)
{
    // En cas d'erreur, on affiche un message et on arrête tout
    die('Erreur : '.$e->getMessage());
}
