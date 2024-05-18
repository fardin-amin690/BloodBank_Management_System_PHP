<?php

session_start();

if (!(isset($_SESSION["loggedin"]) && $_SESSION["loggedin"] == true)) {
    header("Location: ../../../index.php");
}

$donor = isset($_SESSION["user"]) ? $_SESSION["user"] : null;

if ($donor == null) {
    header("Location: ./donor-dashboard.php");
}

?>

<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Donor Profile</title>
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

    <div class="headingg" ;>
        <h3>Your Information</h3>
    </div>

    <div class="container my-5">
        <form method="post">

            <div class="form-group">
                <label><b>Name:</b></label>
                <input type="text" class="form-control" name="name" value="<?php echo $donor["name"]; ?>" readonly>
            </div>

            <div class="form-group">
                <label><b>Email address:</b></label>
                <input type="email" class="form-control" name="email" value="<?php echo $donor["email"]; ?>" readonly>
            </div>

            <div class="form-group">
                <label><b>Age:</b></label>
                <input type="text" class="form-control" name="age" value="<?php echo $donor["age"]; ?>" readonly>
            </div>

            <div class="form-group">
                <label><b>Address:</b></label>
                <input type="text" class="form-control" name="address" value="<?php echo $donor["address"]; ?>" readonly>
            </div>

            <div class="form-group">
                <label><b>Phone:</b></label>
                <input type="text" class="form-control" name="phone" value="<?php echo $donor["phone"]; ?>" readonly>
            </div>

            <div class="form-group">
                <label> <b>Blood Group:</b> </label><br>
                <select name="bloodgroup" class="form-control" disabled>
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
                <label> <b>Gender: </b></label><br>
                <select name="gender" class="form-control" disabled>
                    <option value="Male" <?php echo $donor["gender"] == "Male" ? "selected" : ""; ?>>Male</option>
                    <option value="Female" <?php echo $donor["gender"] == "Female" ? "selected" : ""; ?>>Female</option>
                    <option value="Others <?php echo $donor["gender"] == "Others" ? "selected" : ""; ?>">Others</option>
                </select>
            </div>

        <button type="submit" class="btn btn-primary my-5 "><a href="./update-donor.php?id=<?php echo $donor["id"]; ?>"class="text-light">Update Info</a></button>
            <button class="btn btn-primary my-5"><a href="donor-dashboard.php" class="text-light">HOME</a> </button>


        </form>

    </div>
</body>

</html>