<?php

session_start();

if (!(isset($_SESSION["loggedin"]) && $_SESSION["loggedin"] == true)) {
    header("Location: ../../../index.php");
    exit();
}

require_once("../../controllers/view-patientController.php");

$message = isset($_SESSION["message"]) ? $_SESSION["message"] : "";

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>View patient</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
</head>

<body>
    <style>
        a {
            text-decoration: none;
        }

        .headingg {
            text-align: center;
            margin-top: 25px;
            margin-bottom: 25px;
        }
    </style>
    <div class="headingg">
        <h3>All Patient Information</h3>
    </div>
    <div class="container">

        <span><?php echo $message; ?></span><br>
        <button class="btn btn-primary my-5"><a href="../admin/admin-dashboard.php" class="text-light">HOME</a> </button>

        <table class="table">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>NAME</th>
                    <th>EMAIL ADDRESS</th>
                    <th>AGE</th>
                    <th>ADDRESS</th>
                    <th>PHONE</th>
                    <th>BLOOD GROUP</th>
                    <th>GENDER</th>
                    <th>ACTION</th>
                </tr>
            </thead>
            <tbody>
                <?php if (!empty($patients)): ?>
                    <?php foreach ($patients as $patient): ?>
                        <tr>
                            <td><?php echo $patient["id"]; ?></td>
                            <td><?php echo $patient["name"]; ?></td>
                            <td><?php echo $patient["email"]; ?></td>
                            <td><?php echo $patient["age"]; ?></td>
                            <td><?php echo $patient["address"]; ?></td>
                            <td><?php echo $patient["phone"]; ?></td>
                            <td><?php echo $patient["bloodgroup"]; ?></td>
                            <td><?php echo $patient["gender"]; ?></td>
                            <td>
                                <a href="../../controllers/delete-patientController.php?id=<?php echo $patient["id"]; ?>">Delete</a>
                            </td>
                        </tr>
                    <?php endforeach; ?>
                <?php else: ?>
                    <tr>
                        <td colspan="9" style="text-align:center;">There is no data</td>
                    </tr>
                <?php endif; ?>
            </tbody>
        </table>

    </div>
</body>

</html>

<?php
unset($_SESSION["message"]);
?>
