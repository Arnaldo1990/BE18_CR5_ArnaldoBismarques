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
            <td><a href='details.php?id=" . $data['animalId'] . "'>Details</a></td>
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
                </tr>
            </thead>
            <tbody>
                <?= $tbody; ?>
            </tbody>
        </table>
    </div>
    </div>
</body>
</html>