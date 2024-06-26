<?php
session_start();

if (!(isset($_SESSION["loggedin"]) && $_SESSION["loggedin"] == true)) {
    header("Location: ../../../index.php");
}


?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Dashboard</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <style>
        .horizontal-buttons {
            display: flex;
            justify-content: space-evenly;
            margin-top: 75vh;
            height: 100vh;
        }

        .btn {
            width: 155px;
            height: 45px;
            font-size: 1.25em;
        }

        a {
            text-decoration: none;
            color: white;
        }

        .welcome {
            text-align: center;
            padding-top: 5px;
        }
    </style>
</head>

<body class="p-3 mb-2 bg-light">

    <div class="welcome">
        <h3><?php echo "Hello, BOSS"; ?><br><br>WELCOME TO THE BLOOD BANK </h3>
    </div>

    <div class="horizontal-buttons">
        <button class="btn btn-info"><a href="../donor/vm-donor.php">Donors</a></button>
        <button class="btn btn-info"><a href="../patient/vm-patient.php">Patients</a></button>
        <button class="btn btn-info"><a href="../bloodrequest/vm-bloodrequest.php">Blood Request</a></button>
        <button class="btn btn-info"><a href="../inventory/va-inventory.php">Inventory</a></button>
        <button class="btn btn-warning"><a href="../../../logout.php">Logout</a></button>
    </div>
</body>

</html>