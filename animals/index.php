<?php
session_start();

require_once '../components/db_connect.php';


if (!isset($_SESSION["user"]) && !isset($_SESSION["adm"])) {
    header("Location: ../index.php");
    exit;
}
if(isset($_SESSION["user"])){
    header("Location ../home.php");
}

$Id = 'Id';

$sql = "SELECT * FROM animals WHERE 'Id' = '$Id'";
$result = mysqli_query($connect, $sql);
$tbody = ''; 
if (mysqli_num_rows($result)  > 0) {
    while ($row = mysqli_fetch_array($result, MYSQLI_ASSOC)) {
        $tbody .= "<tr>
            <td><img class='img-thumbnail' src='../pictures/" . $row['description'] . "'</td>
            <td>" . $row['animal_name'] . "</td>
            <td>" . $row['age'] . "</td>
            <td>" . $row['size'] . "</td>
            <td>" . $row['breed'] . "</td>
            <td><a href='delete.php?id=" . $row['animalId'] . "'><button class='btn btn-danger btn-sm' type='button'>Delete</button></a></td>
            </tr>";
    };
} else {
    $tbody =  "<tr><td colspan='6'><center>No Data Available </center></td></tr>";
}

mysqli_close($connect);
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Listed animals</title>
    <link rel="stylesheet" type="text/css" href="styles.css">
    <?php require_once '../components/boot.php' ?>
    <style type="text/css">
        
    </style>
</head>

<body>
    <div class="manageProduct w-75 mt-3">
        <div class='mb-3'>
            <a href="create.php"><button class='btn btn-outline-primary' type="button">Add a Pet</button></a>
            <a class="btn btn-outline-success" href="../senior.php">Senior Pets</a>
            <a href="../dashboard.php"><button class='btn btn-outline-warning' type="button">Dashboard</button></a>
            <a class="btn btn-danger" href="../logout.php?logout">Sign Out</a>

        </div>
        <p class='h2'>Animals</p>
        <table class='table table-striped'>
            <thead class='table-success'>
                <tr>
                    <th>Picture</th>
                    <th>Name</th>
                    <th>Age</th>
                    <th>Size</th>
                    <th>Breed</th>
                    <th>Action</th>

                </tr>
            </thead>
            <tbody>
                <?= $tbody; ?>
            </tbody>
        </table>
    </div>
</body>
<footer class="bg-dark text-center text-white">
    <div class="container p-4 pb-0">
        <section class="mb-4">
            <a class="btn btn-outline-light btn-floating m-1" href="https://www.facebook.com/" role="button"><i class="fab fa-facebook-f"></i
        ></a>

            <a class="btn btn-outline-light btn-floating m-1" href="https://twitter.com/?lang=de" role="button"><i class="fab fa-twitter"></i
        ></a>

            <a class="btn btn-outline-light btn-floating m-1" href="https://www.google.at/" role="button"><i class="fab fa-google"></i
        ></a>

            <a class="btn btn-outline-light btn-floating m-1" href="https://www.instagram.com/" role="button"><i class="fab fa-instagram"></i
        ></a>

            <a class="btn btn-outline-light btn-floating m-1" href="https://at.linkedin.com/" role="button"><i class="fab fa-linkedin-in"></i
        ></a>

            <a class="btn btn-outline-light btn-floating m-1" href="https://github.com/" role="button"><i class="fab fa-github"></i
        ></a>
        </section>
    </div>

    <div class="text-center p-3" style="background-color: rgba(0, 0, 0, 0.2);">
        © 2023 Copyright:
        <p>Arnaldo Bismarques </p>
    </div>
</footer>
</html>