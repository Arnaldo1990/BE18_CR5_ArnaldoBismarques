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
    <title>Senior Pets</title>
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
    <a class="btn btn-warning position-absolute top-0 end-0" href="home.php">Back to Home</a>
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