<?php
include("config.php");

if(isset($_POST['submit'])) {
    $car_id = $_POST['car-id'];
    $arr_date = $_POST['arrived-date'];
    $service_date = $_POST['service-date'];
    $km = $_POST['km'];
    $lease_price = $_POST['lease-price'];
    $car_details = $_POST['car-details'];
    $invigilator = $_POST['invigilator'];

    $query = "UPDATE `car_collection` SET 
    `last_service_date`='$service_date',
    `arrived_date`='$arr_date',
    `lease_price`='$lease_price',
    `kilometer`='$km',
    `car_details`='$car_details',
    `invigilator_name`='$invigilator',
    `car_status`='Garaged'
    WHERE `car_id` = '$car_id'";

    if( mysqli_query($con, $query)) {
        header ("location:../index.php");
    }

    else{
        echo "failed";
    }
}
    ?>  