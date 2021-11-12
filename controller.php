<?php
session_start();
foreach ($_GET as $value) {
    if ($value == 0) {
        $_SESSION['error'] = 'value 0';
        header('Location: http://localhost:8888/index.php');
        die;}
}
if (isset($_SESSION['actualE'])){
    if ($_SESSION['actualE'] < $_SESSION['nbrE']) {
        $string = 'eleve_' . $_SESSION['actualE'];
        $_SESSION[$string] = $_GET;
        $_SESSION['actualE'] = $_SESSION['actualE'] + 1;
        if ($_SESSION['actualE'] < $_SESSION['nbrE']) {
            header('Location: http://localhost:8888/eleve.php');
            die;
        }else {
            header('Location: http://localhost:8888/result.php');
            die;
        }
    }else
        header('Location: http://localhost:8888/result.php');die;
}else{
    $_SESSION['nbrN'] = $_GET['nbrN'];
    $_SESSION['nbrE'] = $_GET['nbrE'];
    $_SESSION['actualE'] = 0;
    header('Location: http://localhost:8888/eleve.php');die;
}
