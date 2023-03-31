<?php

session_start();

if(!isset($_SESSION["user"])){
    header("Location: index.php");
}

if(!isset($_SESSION["adm"])){
    header("Location: dashboard.php");
}

require_once "components/db_connect.php";
?>