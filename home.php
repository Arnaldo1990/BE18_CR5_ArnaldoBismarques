<?php
session_start();
require_once 'components/db_connect.php';

if (isset($_SESSION['adm'])) {
    header("Location: dashboard.php");
    exit;
}

if (!isset($_SESSION['adm']) && !isset($_SESSION['user'])) {
    header("Location: index.php");
    exit;
}

$res = mysqli_query($connect, "SELECT * FROM users WHERE id=" . $_SESSION['user']);
$row = mysqli_fetch_array($res, MYSQLI_ASSOC);

$Id = 'Id';

$sql = "SELECT * FROM animals WHERE 'Id' = '$Id'";
$result = mysqli_query($connect, $sql);
$tbody = '';
if (mysqli_num_rows($result)  > 0) {
    while ($data = mysqli_fetch_array($result, MYSQLI_ASSOC)) {
        $tbody .= "<tr>
            <td>" . $data['animal_name'] . "</td>
            <td>" . $data['age'] . "</td>
            <td>" . $data['size'] . "</td>
            <td>" . $data['breed'] . "</td>
            <td><a href='details.php?id=" . $data['animalId'] . "'>More Details</a></td>
            </tr>";
    };
} else {
    $tbody =  "<tr><td colspan='5'><center>No Data Available </center></td></tr>";
}


mysqli_close($connect);
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="styles.css">
    <title>Welcome, <?php echo $row['first_name']; ?></title>
    <?php require_once 'components/boot.php' ?>
</head>

<body>
    <div class="container">
        <div class="hero">
            <img class="userImage" src="pictures/<?php echo $row['picture']; ?>" alt="<?php echo $row['first_name']; ?>">
            <p class="text-warning">Welcome, <?php echo $row['first_name']; ?>!</p>
            <p class="text-warning"> Username: <?php echo $row['email']; ?></p>
        </div>
        <a class="btn btn-danger position-absolute top-0 end-0" href="logout.php?logout">Sign Out</a>
        <a class="btn btn-outline-warning" href="senior.php">Senior Pets</a>

        <div class="manageProduct w-75 mt-3">
        <div class='mb-3'>
            <!-- <a href="create.php"><button class='btn btn-outline-primary' type="button">Add product</button></a> -->
            <!-- <a href="../dashboard.php"><button class='btn btn-outline-warning' type="button">Dashboard</button></a> -->
        </div>
        <p class='h2'>Animals</p>
        <table class='table table-striped'>
            <thead class='table-success'>
                <tr>
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