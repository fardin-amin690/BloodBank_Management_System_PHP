<?php
session_start();
require_once('../models/logindata.php');

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $user_type = $_POST['user_type'];
    $email = $_POST['email'];
    $username = $_POST['username'];

    $_SESSION["email_val"] = $email;
    $_SESSION["username_val"] = $username;
    $_SESSION["user_type_val"] = $user_type;

    if (empty($user_type) || empty($email) || empty($username)) {
        $_SESSION["message"] = "Please fill in all fields.";
        header("Location: ../../index.php");
        exit();
    }

    $is_authenticated = auth($user_type, $email, $username);
    // exit();

    if ($is_authenticated) {
        $_SESSION["loggedin"] = true;
        $_SESSION["user"] = $is_authenticated;

        switch ($user_type) {
            case "admin":
                header("Location: ../views/admin/admin-dashboard.php");
                break;
            case "bloodbank":
                header("Location: ../views/bloodbank/bloodbank-dashboard.php");
                break;
            case "patient":
                header("Location: ../views/patient/patient-dashboard.php");
                break;
            case "donor":
                header("Location: ../views/donor/donor-dashboard.php");
                break;
            default:
                $_SESSION["message"] = "Invalid user type";
                header("Location: ../../index.php");
                break;
        }
    } else {
        $_SESSION["message"] = "Invalid credentials";
        header("Location: ../../index.php");
        exit();
    }
} else {
    header("Location: ../../index.php");
    exit();
}
?>
