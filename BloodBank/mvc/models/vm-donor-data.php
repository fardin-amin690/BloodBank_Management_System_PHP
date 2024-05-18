<?php

require_once("database.php");

function donorData() {
    $con = conn();

    if ($con) {
        $sql = "SELECT * FROM `donor`";

        try {
            $result = $con->query($sql);

            if ($result->num_rows > 0) {
                $donors = $result->fetch_all(MYSQLI_ASSOC);
            } else {
                $donors = [];
            }

            $con->close();

            return $donors;
        } catch (Exception $e) {
            echo "Error executing query: " . $e->getMessage();
            return false;
        }
    } else {
        echo "Error connecting to the database.";
        return false;
    }
}

