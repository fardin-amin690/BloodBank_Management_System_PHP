<?php

include '../../models/database.php';

if(isset($_GET['deleteid'])){
    $id=$_GET['deleteid'];
    $sql="delete from `patient` where id=$id";
    $result=mysqli_query($conn,$sql);
    if($result){
        // echo 'Deleted the data';
        header('location:view-patient.php');
    }else{
        die(mysqli_error($conn));

    }

}


?>