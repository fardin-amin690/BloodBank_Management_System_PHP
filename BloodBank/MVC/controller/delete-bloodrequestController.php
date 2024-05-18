<?php
session_start();

function sanitize_input($input) {
    return htmlspecialchars(trim($input));
}

if (isset($_GET["id"])) {
    $id = sanitize_input($_GET["id"]);

    if (empty($id) || !is_numeric($id)) {
        header("Location: ../views/bloodrequest/vm-bloodrequest.php");
        exit();
    }

    require_once("../models/database.php");
    $conn = conn();

    if ($conn) {
        $sql = "DELETE FROM bloodrequest WHERE id = ?";
        if ($stmt = $conn->prepare($sql)) {
            $stmt->bind_param("i", $id);
            $stmt->execute();

            if ($stmt->affected_rows > 0) {
                $_SESSION["message"] = "Successfully deleted bloodrequest";
            } else {
                $_SESSION["message"] = "bloodrequest not deleted";
            }

            $stmt->close();
        } else {
            $_SESSION["message"] = "Error preparing statement: " . $conn->error;
        }
        
        $conn->close();
    } else {
        $_SESSION["message"] = "Error connecting to the database.";
    }

    header("Location: ../views/bloodrequest/vm-bloodrequest.php");
    exit();
} else {
    header("Location: ../views/bloodrequest/vm-bloodrequest.php");
    exit();
}
