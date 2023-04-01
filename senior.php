<?php
session_start();
require_once 'components/db_connect.php';



$sql = "SELECT * FROM animals WHERE age > '8'";

?>