<?php 
    session_start();
    session_unset();

    $_SESSION['privilege'] = "";
    header('Location: ../index.php');
    exit;
?>