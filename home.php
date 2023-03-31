<?php

session_start();

if(isset($_SESSION["adm"])){
    header("Location: dashboard.php");
}elseif(!isset($_SESSION["user"])) {
    header("Location: index.php");
}

require_once "components/db_connect.php";

$sql = "SELECT * FROM users WHERE id = {$_SESSION["user"]}";
$result = mysqli_query($connect, $sql);
$row = mysqli_fetch_assoc($result);
?>