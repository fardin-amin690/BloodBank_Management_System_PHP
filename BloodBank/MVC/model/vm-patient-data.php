<?php

require_once("database.php");

function patientData() {
    $con = conn();

    if ($con) {
        $sql = "SELECT * FROM `patient`";

        try {
            $result = $con->query($sql);

            if ($result->num_rows > 0) {
                $patients = $result->fetch_all(MYSQLI_ASSOC);
            } else {
                $patients = [];
            }

            $con->close();

            return $patients;
        } catch (Exception $e) {
            echo "Error executing query: " . $e->getMessage();
            return false;
        }
    } else {
        echo "Error connecting to the database.";
        return false;
    }
}

