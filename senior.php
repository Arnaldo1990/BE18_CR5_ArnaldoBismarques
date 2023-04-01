<?php
session_start();
require_once 'components/db_connect.php';

if (!isset($_SESSION['adm']) && !isset($_SESSION['user'])) {
    header("Location: index.php");
    exit;
}
$id = 'animalId';
$sql = "SELECT * FROM animals WHERE age >= '8'";
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
            </tr>";
    }

}else {
    $tbody =  "<tr><td colspan='8'><center>No Data Available </center></td></tr>";
}
mysqli_close($connect);
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Welcome - <?php echo $row['first_name']; ?></title>
    <?php require_once 'components/boot.php' ?>
    <style>
        .userImage {
            width: 200px;
            height: 200px;
        }
        .hero {
            background: rgb(2, 0, 36);
            background: linear-gradient(24deg, rgba(2, 0, 36, 1) 0%, rgba(0, 212, 255, 1) 100%);
        }
    </style>
</head>
<body>
    <div class="container">
        <a class="btn btn-outline-succes" href="home.php" >Home</a>
        <div class="manageProduct w-75 mt-3">
            <p class='h2'>Senior Pets</p>
            <table class='table table-striped'>
                <thead class='table-success'>
                    <tr>
                    <th>Picture</th>
                    <th>Name</th>
                    <th>Breed</th>
                    <th>Size</th>
                    <th>Age</th>
                    <th>Vaccine</th>
                    </tr>
                </thead>
                <tbody>
                    <?= $tbody;?>
                </tbody>
            </table>
        </div>
    </div>
</body>
</html>