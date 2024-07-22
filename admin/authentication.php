<?php

session_start();
include '../adminconfig.php';

if(!isset($_SESSION["loggedinasadmin"]) || $_SESSION["loggedinasadmin"] !== true){
    header("location: ../signing_in.php");
    exit;
}
?>