<?php
$db_host = 'localhost';
$db_user = 'root';
$db_password = 'root';
$db_db = 'moyenne';
$db_port = 8889;
try {
    $db = new PDO('mysql:host=localhost;port=8889;dbname=moyenne',
        'root',
        'root'
    );}
catch(Exception $e)
{
    // En cas d'erreur, on affiche un message et on arrête tout
    die('Erreur : '.$e->getMessage());
}
//
//if ($mysqli->connect_error) {
//    echo 'Errno: '.$mysqli->connect_errno;
//    echo '<br>';
//    echo 'Error: '.$mysqli->connect_error;
//    exit();
//}
//
//echo 'Success: A proper connection to MySQL was made.';
//echo '<br>';
//echo 'Host information: '.$mysqli->host_info;
//echo '<br>';
//echo 'Protocol version: '.$mysqli->protocol_version;
//
//$mysqli->close();