<?php

require_once("database.php");

function bloodrequestData() {
    $con = conn();

    if ($con) {
        $sql = "SELECT * FROM `bloodrequest`";

        try {
            $result = $con->query($sql);

            if ($result->num_rows > 0) {
                $bloodrequests = $result->fetch_all(MYSQLI_ASSOC);
            } else {
                $bloodrequests = [];
            }

            $con->close();

            return $bloodrequests;
        } catch (Exception $e) {
            echo "Error executing query: " . $e->getMessage();
            return false;
        }
    } else {
        echo "Error connecting to the database.";
        return false;
    }
}

