<?php

require_once("database.php");

function updateDonorData($username, $email, $age, $address, $bloodgroup, $gender, $phone, $id) {
    $conn = conn();

    $affected_rows = 0;

    if ($conn) {
        try {
            $stmt = $conn->prepare("UPDATE donor SET name = ?, email = ?, age = ?, address = ?, bloodgroup = ?, gender = ?, phone = ? WHERE id = ?");
            
            if ($stmt === false) {
                throw new Exception("Error in preparing statement: " . $conn->error);
            }

            $stmt->bind_param("sssssssi", $username, $email, $age, $address, $bloodgroup, $gender, $phone, $id);

            $stmt->execute();
            $affected_rows = $stmt->affected_rows;
        } catch (Exception $e) {
            echo $e->getMessage();
        }
    }

    $conn->close();

    return $affected_rows;
}

