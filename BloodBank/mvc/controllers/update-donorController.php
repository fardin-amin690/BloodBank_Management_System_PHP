<?php

session_start();

function sanitize_input($input) {
    return htmlspecialchars(trim($input));
}

if (isset($_POST["update-donor-submit"])) {
    $id = sanitize_input($_POST["id"]);
    $name = sanitize_input($_POST["name"]);
    $email = sanitize_input($_POST["email"]);
    $age = sanitize_input($_POST["age"]);
    $address = sanitize_input($_POST["address"]);
    $phone = sanitize_input($_POST["phone"]);
    $bloodgroup = sanitize_input($_POST["bloodgroup"]);
    $gender = sanitize_input($_POST["gender"]);

    $has_err = false;

    if (!$has_err) {
        require_once('../models/update-donor-data.php');
        
        $is_updated = updateDonorData($name, $email, $age, $address, $bloodgroup, $gender, $phone, $id);

        if ($is_updated > 0) {
            $_SESSION["message"] = "Successfully updated donor information.";
        } else {
            $_SESSION["message"] = "Donor information not updated.";
        }

        header("Location: ../../logout.php");
        exit();
    } else {
        header("Location: ../views/donor/update-donor.php");
        exit();
    }
} else {
    header("Location: ../views/donor/update-donor.php");
    exit();
}
