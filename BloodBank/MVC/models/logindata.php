<?php
require_once('database.php');

function auth($user_type, $email, $username) {
    $con = conn();
    if (!$con) {
        die("Connection failed: " . mysqli_connect_error());
    }

    $table = '';
    switch ($user_type) {
        case "admin":
            $table = 'admin';
            break;
        case "bloodbank":
            $table = 'bloodbank';
            break;
        case "patient":
            $table = 'patient';
            break;
        case "donor":
            $table = 'donor';
            break;
        default:
            return false;
    }

    $results = [];

    if ($con) {
        try {
            $stmt = $con->prepare("SELECT * FROM $table WHERE name = ? AND email = ?");

            if ($stmt === false) {
                throw new Exception("Error in preparing statement: " . $con->error);
            }

            $stmt->bind_param("ss", $username, $email);

            $stmt->execute();
            
            $result = $stmt->get_result();

            while ($row = $result->fetch_assoc()) {
                $results[] = $row;
            }
        } catch (Exception $e) {
            echo $e->getMessage();
        }
    }

    $con->close();

    // echo "<pre>";
    // var_dump($results);
    // echo "</pre>";

    return !empty($results) ? $results[0] : NULL;
}
