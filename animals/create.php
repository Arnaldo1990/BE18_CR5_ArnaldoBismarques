<?php

    require_once "../components/db_connect.php";

    session_start();

    if (!isset($_SESSION["user"]) && !isset($_SESSION["adm"])) {
    header("Location: ../index.php");
    exit;
    }
    if(isset($_SESSION["user"])){
    header("Location ../home.php");
    }


?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <?php require_once '../components/boot.php' ?>
    <title>Add a Pet</title>
    <style>
        fieldset {
            margin: auto;
            margin-top: 100px;
            width: 60%;
        }
    </style>
</head>

<body>
    <fieldset>
        <div>
        <legend class='h2'>Add a pet</legend>
        <form action="actions/a_create.php" method="post" enctype="multipart/form-data">
            <table class='table'>
                <tr>
                    <th>Name</th>
                    <td><input class='form-control' type="text" name="name" placeholder="Name of the animal" /></td>
                </tr>
                <tr>
                    <th>Age</th>
                    <td><input class='form-control' type="number" name="age" placeholder="Enter the age of the pet" step="any" /></td>
                </tr>
                <tr>
                    <th>Description</th>
                    <td><input class='form-control' type="file" name="description" /></td>
                </tr>
                <tr>
                    <th>Breed</th>
                    <td><input class='form-control' type="text" name="breed" step="any" /></td>
                </tr>
                <tr>
                    <th>Vaccine</th>
                    <td><input class='form-control' type="text" name="vaccine" step="any" /></td>
                </tr>
                <tr>
                    <th>Size</th>
                    <td><input class='form-control' type="text" name="size" step="any" /></td>
                </tr>
                <tr>
                    <th>Address</th>
                    <td><input class='form-control' type="text" name="address" step="any" /></td>
                </tr>
                <tr>
                    <td><button class='btn btn-success' type="submit">Insert Animal</button></td>
                    <td><a href="index.php"><button class='btn btn-warning' type="button">Go back to Home</button></a></td>
                </tr>
            </table>
        </form>
    </fieldset>
    </div>
</body>
</html>