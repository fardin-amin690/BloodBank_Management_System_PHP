<?php
session_start();


function senitize_input($input) {
    return htmlspecialchars(trim($input));
}

if (isset($_POST["new-inventory-submit"])) {
    $name = senitize_input($_POST["name"]);
    $quantity = senitize_input($_POST["quantity"]);
    $phone = senitize_input($_POST["phone"]);
    $address = senitize_input($_POST["address"]);
    $bloodgroup = senitize_input($_POST["bloodgroup"]);

    $has_err = false;

    if (!$has_err) {
        require_once('../models/database.php');

        $con = conn();

        $stmt = $con->prepare("INSERT INTO inventory (name, quantity, phone, address, bloodgroup) VALUES (?, ?, ?, ?, ?)");
        $stmt->bind_param("sssss", $name, $quantity,$phone, $address,  $bloodgroup);

        if ($stmt->execute()) {
            $_SESSION["message"] = "Successfully inventory created";
        } else {
            $_SESSION["message"] = "inventory not created";
        }

        $stmt->close();
        $con->close();

        header("Location: ../inventory/vm-inventory.php");
    } else {
        header("Location: ../views/inventory/new-inventory.php");
    }
} else {
    header("Location: ../views/inventory/new-inventory.php");
}
