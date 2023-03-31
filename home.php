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
            <td><img class='img-thumbnail' src='pictures/" . $data['picture'] . "'width='150'</td>
            <td>" . $data['name'] . "</td>
            <td>" . $data['price'] . "</td>
            <td>" . $data['sup_name'] . "</td>
            <td><a href='details.php?id=" . $data['id'] . "'>Details</a></td>
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
        <div class="hero">
            <img class="userImage" src="pictures/<?php echo $row['picture']; ?>" alt="<?php echo $row['first_name']; ?>">
            <p class="text-white">Hi <?php echo $row['first_name']; ?></p>
        </div>
        <a class="btn btn-outline-danger" href="logout.php?logout">Sign Out</a>
        <a class="btn btn-outline-warning" href="update.php?id=<?php echo $_SESSION['user'] ?>">Update your profile</a>

        <div class="manageProduct w-75 mt-3">
        <div class='mb-3'>
            <!-- <a href="create.php"><button class='btn btn-outline-primary' type="button">Add product</button></a> -->
            <!-- <a href="../dashboard.php"><button class='btn btn-outline-warning' type="button">Dashboard</button></a> -->
        </div>
        <p class='h2'>Animals</p>
        <table class='table table-striped'>
            <thead class='table-success'>
                <tr>
                    <th>Picture</th>
                    <th>Name</th>
                    <th>price</th>
                    <th>supplier</th>
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
</html>