<?php
session_start();

$message = isset($_SESSION["message"]) ? $_SESSION["message"] : "";

?>
<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>New Inventory</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
</head>

<body>

    <style>
        a {
            text-decoration: none;
        }

        .btn-dp {
            text-decoration: none;
            color: #0d6efd;
        }

        .horizontal-buttons {
            display: flex;
            justify-content: space-between;
            margin-top: 2vh;
        }

        .headingg {
            text-align: center;
            margin-top: 25px;
        }

        .form-container {
            max-width: 800px;
            margin: 100px auto;
            padding: 20px;
            border: 1px solid #ccc;
            border-radius: 10px;
            box-shadow: 0px 7px 15px rgba(0, 0, 0, 0.1);
            background-color: ghostwhite;
        }
    </style>

    <div class="headingg" ;>
        <h3>New Inventory Information</h3>
    </div>

    <div>
        <form action="../../controllers/new-inventoryController.php" method="post" class="form-container row g-3">

            <span><?php echo $message; ?></span>
            <div class="col-md-4">
                <label><b>Name:</b></label>
                <input type="text" class="form-control" placeholder="Enter name" name="name">
            </div> <br>

            

            <div class="col-md-4">
                <label><b>Quantity:</b></label>
                <input type="text" class="form-control" placeholder="Enter quantity" name="quantity">
            </div><br>

            <div class="col-md-4">
                <label><b>Phone:</b></label>
                <input type="text" class="form-control" placeholder="Enter phone number" name="phone">
            </div><br>

            <div class="col-md-8">
                <label><b>Address:</b></label>
                <input type="text" class="form-control" placeholder="Enter address" name="address">
            </div><br>
           

            <div class="col-md-4">
                <label> <b>Blood Group:</b> </label><br>
                <select name="bloodgroup" class="form-control">
                    <option>Select Blood Group</option>
                    <option value="A+">A+</option>
                    <option value="A-">A-</option>
                    <option value="B+">B+</option>
                    <option value="B-">B-</option>
                    <option value="AB+">AB+</option>
                    <option value="AB-">AB-</option>
                    <option value="O+">O+</option>
                    <option value="O-">O-</option>
                </select>
            </div><br>

            
            <div class="horizontal-buttons" ;>
                <button type="submit" name="new-inventory-submit" class="btn btn-primary">Submit</button>
            </div>
        </form>
       

    </div>
</body>

</html>

<?php


unset($_SESSION["message"]);