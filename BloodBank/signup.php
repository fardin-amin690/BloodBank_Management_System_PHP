<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Signup</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <style>
        .horizontal-buttons {
            display: flex;            
            justify-content: space-evenly;
            content: center;
            margin-top: 25vh;
        }

        .btn {
            width: 155px; 
            height: 45px;  
            font-size: 1.25em; 
        }
        
        .welcome {
            text-align: center;
            padding-top:5px;
        }     
        .btn-dp {
            text-decoration: none; 
            color:#0d6efd; 
        }  
        
        
       
    </style>
</head>
<body class="p-3 mb-2 bg-light">

    <div class="welcome">
    <h3>WELCOME TO THE BLOOD BANK <br><br></h3><h5> Please choose your user type</h5>
    </div>


<div class="horizontal-buttons"> 
<a href="MVC/views/donor/new-donor.php" class="btn btn-outline-primary btn-dp">DONOR</a>
   <a href="MVC/views/patient/new-patient.php" class="btn btn-outline-primary btn-dp">PATIENT</a>

</div>
</body>
</html>
