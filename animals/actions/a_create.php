<?php

    require_once '../../components/db_connect.php';
    require_once '../../components/file_upload.php';
    
    session_start();

    if (!isset($_SESSION["user"]) && !isset($_SESSION["adm"])) {
    header("Location: ../../index.php");
    exit;
    }
    if(isset($_SESSION["user"])){
    header("Location ../../home.php");
}


if ($_POST) {
    $name = $_POST['name'];
    $age = $_POST['age'];
    $breed = $_POST['breed'];
    $vaccine = $_POST['vaccine'];
    $size = $_POST['size'];
    $uploadError = '';
    $description = file_upload($_FILES['description'], "animals");

    $sql = "INSERT INTO `animals`(animal_name, age, breed, vaccine, size, description) VALUES 
    ('$name', $age, '$breed', '$vaccine', '$size', '$description->fileName')";


    if (mysqli_query($connect, $sql) === true) {
        $class = "success";
        $message = "The entry below was successfully created <br>
            <table class='table w-50'><tr>
            <td> $name </td>
            <td> $age </td>
            <td> $breed </td>

            </tr></table><hr>";
        $uploadError = ($description->error != 0) ? $description->ErrorMessage : '';
    } else {
        $class = "danger";
        $message = "Error while creating file. Please try again! <br>" . $connect->error;
        $uploadError = ($description->error != 0) ? $description->ErrorMessage : '';
    }
    mysqli_close($connect);
} else {
    header("location: ../error.php");
}

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Update</title>
    <?php require_once '../../components/boot.php' ?>
</head>

<body>
    <div class="container">
        <div class="mt-3 mb-3">
            <h1>Create request response</h1>
        </div>
        <div class="alert alert-<?= $class; ?>" role="alert">
            <p><?php echo ($message) ?? ''; ?></p>
            <p><?php echo ($uploadError) ?? ''; ?></p>
            <a href='../index.php'><button class="btn btn-primary" type='button'>Home</button></a>
        </div>
    </div>
</body>
</html>