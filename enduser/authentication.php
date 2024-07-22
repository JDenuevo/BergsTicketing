<?php

session_start();
include '../userconfig.php';

if(!isset($_SESSION["loggedinasuser"]) || $_SESSION["loggedinasuser"] !== true){
    header("location: ../signing_in.php");
    exit;
}