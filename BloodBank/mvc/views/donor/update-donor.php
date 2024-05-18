<?php

session_start();

if (!(isset($_SESSION["loggedin"]) && $_SESSION["loggedin"] == true)) {
    header("Location: ../../../index.php");
    exit();
}

if (!isset($_GET["id"]) || empty($_GET["id"]) || !is_numeric($_GET["id"])) {
    header("Location: ./view-donor.php");
    exit();
}

require_once('../../models/database.php');

function getDonorById($id) {
    $con = conn();
    $stmt = $con->prepare("SELECT * FROM donor WHERE id = ?");
    $stmt->bind_param("i", $id);
    $stmt->execute();
    $result = $stmt->get_result();
    $donor = $result->fetch_assoc();
    $stmt->close();
    $con->close();
    return $donor;
}

$donor = getDonorById(trim($_GET["id"]));

if (empty($donor)) {
    header("Location: ./view-donor.php");
    exit();
}
?>

<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Update Donor Profile</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
</head>

<body>
    <style>
        .headingg {
            text-align: center;
            margin-top: 15px;
        }

        a {
            text-decoration: none;
        }
    </style>

    <div class="headingg">
        <h3>Update Your Information</h3>
    </div>

    <div class="container my-5">
        <form action="../../controllers/update-donorController.php" method="post">
            <input type="hidden" name="id" value="<?php echo htmlspecialchars($donor["id"]); ?>">

            <div class="form-group">
                <label><b>Name:</b></label>
                <input type="text" class="form-control" name="name" value="<?php echo htmlspecialchars($donor["name"]); ?>">
            </div>

            <div class="form-group">
                <label><b>Email address:</b></label>
                <input type="email" class="form-control" name="email" value="<?php echo htmlspecialchars($donor["email"]); ?>">
            </div>

            <div class="form-group">
                <label><b>Age:</b></label>
                <input type="text" class="form-control" name="age" value="<?php echo htmlspecialchars($donor["age"]); ?>">
            </div>

            <div class="form-group">
                <label><b>Address:</b></label>
                <input type="text" class="form-control" name="address" value="<?php echo htmlspecialchars($donor["address"]); ?>">
            </div>

            <div class="form-group">
                <label><b>Phone:</b></label>
                <input type="text" class="form-control" name="phone" value="<?php echo htmlspecialchars($donor["phone"]); ?>">
            </div>

            <div class="form-group">
                <label><b>Blood Group:</b></label><br>
                <select name="bloodgroup" class="form-control">
                    <option value="A+" <?php echo $donor["bloodgroup"] == "A+" ? "selected" : ""; ?>>A+</option>
                    <option value="A-" <?php echo $donor["bloodgroup"] == "A-" ? "selected" : ""; ?>>A-</option>
                    <option value="B+" <?php echo $donor["bloodgroup"] == "B+" ? "selected" : ""; ?>>B+</option>
                    <option value="B-" <?php echo $donor["bloodgroup"] == "B-" ? "selected" : ""; ?>>B-</option>
                    <option value="AB+" <?php echo $donor["bloodgroup"] == "AB+" ? "selected" : ""; ?>>AB+</option>
                    <option value="AB-" <?php echo $donor["bloodgroup"] == "AB-" ? "selected" : ""; ?>>AB-</option>
                    <option value="O+" <?php echo $donor["bloodgroup"] == "O+" ? "selected" : ""; ?>>O+</option>
                    <option value="O-" <?php echo $donor["bloodgroup"] == "O-" ? "selected" : ""; ?>>O-</option>
                </select>
            </div>

            <div class="form-group">
                <label><b>Gender:</b></label><br>
                <select name="gender" class="form-control">
                    <option value="Male" <?php echo $donor["gender"] == "Male" ? "selected" : ""; ?>>Male</option>
                    <option value="Female" <?php echo $donor["gender"] == "Female" ? "selected" : ""; ?>>Female</option>
                    <option value="Others" <?php echo $donor["gender"] == "Others" ? "selected" : ""; ?>>Others</option>
                </select>
            </div>

            <button type="submit" name="update-donor-submit" class="btn btn-primary">Update</button>
            <button class="btn btn-primary my-5"><a href="donor-dashboard.php" class="text-light">HOME</a></button>
            <div class="headingg">
                <h3>If you update your Information, you'll automatically logout the system..</h3>
            </div>
        </form>
    </div>
</body>

</html>
