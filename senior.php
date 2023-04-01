<?php
session_start();
require_once 'components/db_connect.php';

if (!isset($_SESSION['adm']) && !isset($_SESSION['user'])) {
    header("Location: index.php");
    exit;
}
$id = 'animalId';
$sql = "SELECT * FROM animals WHERE age > '8'";
$result = mysqli_query($connect ,$sql);
$tbody='';
if(mysqli_num_rows($result)  > 0) {
    while($data = mysqli_fetch_array($result, MYSQLI_ASSOC)){
        $tbody .= "<tr>
            <td><img class='img-thumbnail' src='pictures/" .$data['description']."' width='200'</td>
            <td>" .$data['animal_name']."</td>
            <td>" .$data['breed']."</td>
            <td>" .$data['size']."</td>
            <td>" .$data['age']."</td>
            <td>" .$data['vaccine']."</td>
            <td><a class= 'btn btn-outline-success' href='details.php?id= ".$data['animalId']."'>Details</a></td>
            </tr>";
    }
}

?>