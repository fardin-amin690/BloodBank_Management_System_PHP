<?php

session_start();
function senitize_input($input)
{
    return htmlspecialchars(trim($input));
}


if (isset($_POST["blood-request-submit"])) {

    $patient = isset($_SESSION["user"]) ? $_SESSION["user"] : null;

    if ($patient == null) {
        header("Location: ../views/patient/patient-dashboard.php");
    }

    $name = $patient["name"];
    $email = $patient["email"];
    $address = $patient["address"];
    $bloodgroup = $patient["bloodgroup"];
    $quantity = senitize_input($_POST["quantity"]);

    // echo $name, $email, $address, $bloodgroup, $quantity;
    // exit();


    $has_err = false;


    if (!$has_err) {
        require_once ("../models/database.php");
        $con=conn();

        $stmt = $con->prepare("INSERT INTO bloodrequest (name, email, address,bloodgroup, quantity) VALUES (?, ?, ?, ?, ?)");
        $stmt->bind_param("sssss", $name, $email, $address, $bloodgroup, $quantity);

        if ($stmt->execute()) {
            $_SESSION["message"] = "Successfully request created";
        } else {
            $_SESSION["message"] = "request not created";
        }

        $stmt->close();
        $con->close();

        header("Location: ../views/patient/patient-dashboard.php");
    } else {
        // has validation error set it up in the session
        header("Location: ../views/bloodrequest/bloodrequest.php");
    }
} else {
    header("Location: ../views/bloodrequest/bloodrequest.php");
}
         