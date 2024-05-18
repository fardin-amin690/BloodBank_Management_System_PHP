<?php

session_start();

if (!(isset($_SESSION["loggedin"]) && $_SESSION["loggedin"] == true)) {
    header("Location: ../../../index.php");
}

?>

<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Update Patient</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
</head>

<body>
    <style>
        .btn-dp {
            text-decoration: none;
            color: #0d6efd;
        }

        .headingg {
            text-align: center;
            margin-top: 25px;
        }

        .btn-home {
            display: block;
            text-align: center;
            margin: 10px auto;
            text-decoration: none;
            color: #0d6efd;
        }

        .form-container {
            max-width: 800px;
            margin: 100px auto;
            padding: 20px;
            border: 1px solid #ccc;
            border-radius: 10px;
            box-shadow: 0px 7px 15px rgba(0, 0, 0, 0.1);
            background-color: whitesmoke;
        }
    </style>

    <div class="headingg" ;>
        <h3>Make Blood Request</h3>
    </div>

    <div>
        <form action="../../controllers/request-bloodController.php" method="post" class="form-container row g-3">

            <div class="col-md-4">
                <label><b>Quantity:</b></label>
                <input type="text" class="form-control" placeholder="Enter blood amount" name="quantity">
            </div> <br>

            <button type="submit" name="blood-request-submit" class="btn btn-primary">submit</button>

            <a href="../patient/patient-dashboard.php" class="btn btn-outline-primary btn-home">HOME</a>

        </form>
        <div class="headingg" ;>
        <h3>After submitting your request, you'll automatically redirect to your home page..</h3>
    </div>

    </div>
</body>

</html>