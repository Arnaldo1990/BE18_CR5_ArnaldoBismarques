<?php
require_once "components/db_connect.php";

session_start();

if(!isset($_SESSION["user"])){
    header("Location: index.php");
}

$id = $_GET["id"];
$sql = "SELECT * FROM animals WHERE animalId = $id";
$result = mysqli_query($connect, $sql);

$row = mysqli_fetch_assoc($result);

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="styles.css">
    <script type="text/javascript" src="scripts.js" defer></script>
    <?php require_once 'components/boot.php' ?>
    <meta name="author" content="Arnaldo Bismarques">
    <meta name="description" content="">
    <title>Details</title>
</head>

<body>

 <div class="card" style="width: 18rem;">
  <img src="pictures/<?= $row['description'] ?>" class="card-img-top" alt="<?= $row["animal_name"] ?>">
  <div class="card-body">
    <h5 class="card-title"><?= $row["animal_name"] ?></h5>
  </div>
  <ul class="list-group list-group-flush">
    <li class="list-group-item"><?= $row['age']?> years</li>
    <li class="list-group-item"><?= $row["breed"] ?></li>
    <li class="list-group-item">Vaccine: <?= $row["vaccine"] ?></li>
  </ul>
  <div class="card-body">
    <a class="btn btn-outline-warning" href="home.php">Back to Home</a>
  </div>
  </div>
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
</body>
</html>