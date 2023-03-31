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
    <meta name="author" content="Arnaldo Bismarques">
    <meta name="description" content="">
    <title>Details</title>
</head>

<body>
 <div>

 <div class="card" style="width: 18rem;">
  <img src="pictures/<?= $row['description'] ?>" class="card-img-top" alt="<?= $row["animal_name"] ?>">
  <div class="card-body">
    <h5 class="card-title"><?= $row["animal_name"] ?></h5>
    <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
  </div>
  <ul class="list-group list-group-flush">
    <li class="list-group-item">An item</li>
    <li class="list-group-item">A second item</li>
    <li class="list-group-item">A third item</li>
  </ul>
  <div class="card-body">
    <a href="#" class="card-link">Card link</a>
    <a href="#" class="card-link">Another link</a>
  </div>
</div>
    <p>ID: <?= $row['animalId']?></p>
    <p><img src="pictures/<?= $row['description'] ?>"width="200"></p>
    <p>Name: <?= $row["animal_name"] ?></p>
    <p>Age: <?= $row["age"] ?></p>
    <p>Vaccine: <?= $row["vaccine"] ?></p>
</div>
</body>

</html>