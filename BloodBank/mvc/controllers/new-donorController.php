<?php
session_start();


function senitize_input($input) {
    return htmlspecialchars(trim($input));
}

if (isset($_POST["new-donor-submit"])) {
    $name = senitize_input($_POST["name"]);
    $email = senitize_input($_POST["email"]);
    $age = senitize_input($_POST["age"]);
    $address = senitize_input($_POST["address"]);
    $phone = senitize_input($_POST["phone"]);
    $bloodgroup = senitize_input($_POST["bloodgroup"]);
    $gender = senitize_input($_POST["gender"]);

    $has_err = false;

    if (!$has_err) {
        require_once('../models/database.php');

        $con = conn();

        $stmt = $con->prepare("INSERT INTO donor (name, email, age, address, phone, bloodgroup, gender) VALUES (?, ?, ?, ?, ?, ?, ?)");
        $stmt->bind_param("ssissss", $name, $email, $age, $address, $phone, $bloodgroup, $gender);

        if ($stmt->execute()) {
            $_SESSION["message"] = "Successfully Donor created";
        } else {
            $_SESSION["message"] = "Donor not created";
        }

        $stmt->close();
        $con->close();

        header("Location: ../../index.php");
    } else {
        // has validation error set it up in the session
        header("Location: ../views/donor/new-donor.php");
    }
} else {
    header("Location: ../views/donor/new-donor.php");
}
