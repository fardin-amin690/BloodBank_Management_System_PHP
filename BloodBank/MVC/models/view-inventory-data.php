<?php

require_once("database.php");

function inventoryData() {
    $con = conn();

    if ($con) {
        $sql = "SELECT * FROM `inventory`";

        try {
            $result = $con->query($sql);

            if ($result->num_rows > 0) {
                $inventorys = $result->fetch_all(MYSQLI_ASSOC);
            } else {
                $inventorys = [];
            }

            $con->close();

            return $inventorys;
        } catch (Exception $e) {
            echo "Error executing query: " . $e->getMessage();
            return false;
        }
    } else {
        echo "Error connecting to the database.";
        return false;
    }
}

